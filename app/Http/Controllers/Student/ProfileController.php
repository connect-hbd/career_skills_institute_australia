<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\UpdateAcademicInformationRequest;
use App\Http\Requests\Student\UpdateImmigrationHistoryRequest;
use App\Http\Requests\Student\UpdatePersonalInformationRequest;
use App\Http\Requests\Student\UpdateStudyPlanRequest;
use App\Http\Requests\Student\UpdateVisaDocumentsChecklistRequest;
use App\Http\Requests\Student\UpdateWorkExperienceRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Profile\StudentDocument;
use App\Models\Profile\StudyPlan;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use HandlesFiles;

    public function __construct(
        private readonly UserRepositoryInterface $users,
    ) {}

    // =========================================================================
    // Basic Profile (avatar / password)
    // =========================================================================

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('student.profile.index', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $request->validate([
            'name'             => ['nullable', 'string', 'max:191'],
            'phone'            => ['nullable', 'string', 'max:191'],
            'avatar'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'current_password' => ['required_with:password'],
            'password'         => ['nullable', 'min:8', 'confirmed'],
        ]);

        $data = [];

        if ($request->filled('name')) {
            $data['name'] = $request->name;
        }

        if ($request->filled('phone')) {
            $data['phone'] = $request->phone;
        }

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->replaceFile(
                $request->file('avatar'),
                $user->avatar,
                'users'
            );
        }

        if ($request->filled('password')) {
            if (! Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $data['password'] = bcrypt($request->password);
        }

        if (! empty($data)) {
            $user->update($data);
        }

        return back()->with('success', 'Profile updated successfully.');
    }

    // =========================================================================
    // Account Settings — shared GET for all 6 steps
    // =========================================================================

    public function accountSettings(Request $request)
    {
        $user    = $request->user();
        $student = $user->student;

        abort_if(! $student, 404, 'Student profile not found.');

        // ── Step 1 data ──────────────────────────────────────────────────────
        $countries = Country::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        $cities = City::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'country_id']);

        $currentAddress   = $student->addresses()->where('type', 'current')->first();
        $permanentAddress = $student->addresses()->where('type', 'permanent')->first();

        $sameAddress = $currentAddress
            && $permanentAddress
            && $currentAddress->address    === $permanentAddress->address
            && $currentAddress->city_id    === $permanentAddress->city_id
            && $currentAddress->country_id === $permanentAddress->country_id;

        // ── Step 2 data ──────────────────────────────────────────────────────
        $academicInformation = $student->academicInformation;

        // ── Step 3 data ──────────────────────────────────────────────────────
        $studyPlan = $student->studyPlan()->with('choices')->first();

        // ── Step 4 data ──────────────────────────────────────────────────────
        $workExperiences = $student->workExperiences()->get();

        // ── Step 5 data ──────────────────────────────────────────────────────
        $immigrationRefusals = $student->immigrationRefusals()->get();

        // ── Step 6 data ──────────────────────────────────────────────────────
        // Build a keyed collection from the checklist so every slot is always
        // present in the view, even if the student hasn't uploaded it yet.
        $savedDocuments  = $student->documents()->get()->keyBy('document_key');
        $documentSlots   = collect(StudentDocument::CHECKLIST)
            ->map(function (string $label, string $key) use ($savedDocuments) {
                return $savedDocuments->get($key) ?? (object) [
                    'document_key'  => $key,
                    'document_name' => $label,
                    'file_path'     => null,
                    'original_name' => null,
                    'file_size'     => null,
                    'status'        => 'pending',
                ];
            });

        // ── Active step (driven by query-string after a successful save) ──────
        $activeStep = (int) $request->query('step', $student->profile_step ?? 1);
        $activeStep = max(1, min(6, $activeStep));

        return view('student.profile.settings', compact(
            'student',
            'countries',
            'cities',
            'currentAddress',
            'permanentAddress',
            'sameAddress',
            'academicInformation',
            'studyPlan',
            'workExperiences',
            'immigrationRefusals',
            'documentSlots',
            'activeStep',
        ));
    }

    // =========================================================================
    // Step 1 — Personal & Passport Information
    // =========================================================================

    public function updatePersonalInformation(
        UpdatePersonalInformationRequest $request
    ): RedirectResponse {
        $student = $request->user()->student;
        abort_if(! $student, 404, 'Student profile not found.');

        $validated    = $request->validated();
        $sameAddress  = (bool) ($validated['same_address'] ?? false);

        DB::transaction(function () use ($student, $validated, $sameAddress) {
            $student->update([
                'date_of_birth'        => $validated['date_of_birth']        ?? null,
                'gender'               => $validated['gender']               ?? null,
                'nationality'          => $validated['nationality']          ?? null,
                'place_of_birth'       => $validated['place_of_birth']       ?? null,
                'marital_status'       => $validated['marital_status']       ?? null,
                'passport_number'      => $validated['passport_number']      ?? null,
                'passport_issue_date'  => $validated['passport_issue_date']  ?? null,
                'passport_expiry_date' => $validated['passport_expiry_date'] ?? null,
            ]);

            $student->addresses()->updateOrCreate(
                ['type' => 'current'],
                [
                    'address'    => $validated['current_address']    ?? null,
                    'city_id'    => $validated['current_city_id']    ?? null,
                    'country_id' => $validated['current_country_id'] ?? null,
                ]
            );

            $permanentData = $sameAddress
                ? [
                    'address'    => $validated['current_address']    ?? null,
                    'city_id'    => $validated['current_city_id']    ?? null,
                    'country_id' => $validated['current_country_id'] ?? null,
                ]
                : [
                    'address'    => $validated['permanent_address']    ?? null,
                    'city_id'    => $validated['permanent_city_id']    ?? null,
                    'country_id' => $validated['permanent_country_id'] ?? null,
                ];

            $student->addresses()->updateOrCreate(
                ['type' => 'permanent'],
                $permanentData
            );
        });

        $student->advanceStepTo(1);

        return redirect()
            ->route('student.account.settings', ['step' => 2])
            ->with('success', 'Personal information saved successfully.');
    }

    // =========================================================================
    // Step 2 — Academic Information
    // =========================================================================

    public function updateAcademicInformation(
        UpdateAcademicInformationRequest $request
    ): RedirectResponse {
        $student = $request->user()->student;
        abort_if(! $student, 404, 'Student profile not found.');

        $validated = $request->validated();

        $student->academicInformation()->updateOrCreate(
            ['student_id' => $student->id],
            [
                'highest_degree'      => $validated['highest_degree'],
                'highest_institution' => $validated['highest_institution'],
                'highest_grad_date'   => $validated['highest_grad_date'],
                'highest_gpa'         => $validated['highest_gpa'],
                'highest_max_gpa'     => $validated['highest_max_gpa']     ?? null,
                'education_history'   => $validated['education_history']   ?? [],
                'ielts_overall'       => $validated['ielts_overall']       ?? null,
                'ielts_test_date'     => $validated['ielts_test_date']     ?? null,
                'ielts_listening'     => $validated['ielts_listening']     ?? null,
                'ielts_reading'       => $validated['ielts_reading']       ?? null,
                'ielts_writing'       => $validated['ielts_writing']       ?? null,
                'ielts_speaking'      => $validated['ielts_speaking']      ?? null,
                'gre_combined'        => $validated['gre_combined']        ?? null,
                'gre_test_date'       => $validated['gre_test_date']       ?? null,
                'gre_quant'           => $validated['gre_quant']           ?? null,
                'gre_verbal'          => $validated['gre_verbal']          ?? null,
                'gre_awa'             => $validated['gre_awa']             ?? null,
            ]
        );

        $student->advanceStepTo(2);

        return redirect()
            ->route('student.account.settings', ['step' => 3])
            ->with('success', 'Academic information saved successfully.');
    }

    // =========================================================================
    // Step 3 — Study Plan
    // =========================================================================

    public function updateStudyPlan(
        UpdateStudyPlanRequest $request
    ): RedirectResponse {
        $student = $request->user()->student;
        abort_if(! $student, 404, 'Student profile not found.');

        $validated = $request->validated();

        DB::transaction(function () use ($student, $validated) {
            /** @var StudyPlan $plan */
            $plan = $student->studyPlan()->updateOrCreate(
                ['student_id' => $student->id],
                ['target_degree' => $validated['target_degree']]
            );

            // Sync choices: delete old ones and re-insert in submitted order
            $plan->choices()->delete();

            foreach ($validated['choices'] as $i => $choice) {
                $plan->choices()->create([
                    'sort_order'  => $i,
                    'program'     => $choice['program'],
                    'university'  => $choice['university'],
                    'country'     => $choice['country'],
                    'duration'    => $choice['duration']    ?? null,
                    'start_date'  => $choice['start_date']  ?? null,
                    'end_date'    => $choice['end_date']    ?? null,
                    'tuition'     => $choice['tuition']     ?? null,
                    'scholarship' => $choice['scholarship'] ?? null,
                    'summary'     => $choice['summary']     ?? null,
                ]);
            }
        });

        $student->advanceStepTo(3);

        return redirect()
            ->route('student.account.settings', ['step' => 4])
            ->with('success', 'Study plan saved successfully.');
    }

    // =========================================================================
    // Step 4 — Work Experience
    // =========================================================================

    public function updateWorkExperience(
        UpdateWorkExperienceRequest $request
    ): RedirectResponse {
        $student = $request->user()->student;
        abort_if(! $student, 404, 'Student profile not found.');

        $validated = $request->validated();

        DB::transaction(function () use ($student, $validated) {
            $student->workExperiences()->delete();

            foreach ($validated['roles'] as $i => $role) {
                $student->workExperiences()->create([
                    'sort_order'   => $i,
                    'title'        => $role['title'],
                    'organization' => $role['organization'],
                    'department'   => $role['department']  ?? null,
                    'start_date'   => $role['start_date'],
                    'end_date'     => $role['is_current'] ?? false ? null : ($role['end_date'] ?? null),
                    'is_current'   => $role['is_current'] ?? false,
                    'description'  => $role['description'] ?? null,
                ]);
            }
        });

        $student->advanceStepTo(4);

        return redirect()
            ->route('student.account.settings', ['step' => 5])
            ->with('success', 'Work experience saved successfully.');
    }

    // =========================================================================
    // Step 5 — Immigration History
    // =========================================================================

    public function updateImmigrationHistory(
        UpdateImmigrationHistoryRequest $request
    ): RedirectResponse {
        $student = $request->user()->student;
        abort_if(! $student, 404, 'Student profile not found.');

        $validated = $request->validated();

        DB::transaction(function () use ($student, $validated, $request) {
            // Collect existing document paths before deleting records
            $existingPaths = $student->immigrationRefusals()
                ->whereNotNull('document_path')
                ->pluck('document_path');

            $student->immigrationRefusals()->delete();

            // Delete old uploaded files
            foreach ($existingPaths as $oldPath) {
                $this->deleteFile($oldPath);
            }

            foreach ($validated['refusals'] as $i => $refusal) {
                $docPath = null;
                $docName = null;

                // Handle optional per-record file upload via HandlesFiles trait
                if ($request->hasFile("refusals.{$i}.document")) {
                    $file    = $request->file("refusals.{$i}.document");
                    $docPath = $this->uploadFile(
                        $file,
                        "students/{$student->id}/immigration"
                    );
                    $docName = $file->getClientOriginalName();
                }

                $student->immigrationRefusals()->create([
                    'sort_order'    => $i,
                    'country'       => $refusal['country'],
                    'visa_type'     => $refusal['visa_type'],
                    'year'          => $refusal['year'],
                    'status'        => $refusal['status'] ?? 'Refused',
                    'grounds'       => $refusal['grounds'],
                    'document_path' => $docPath,
                    'document_name' => $docName,
                ]);
            }
        });

        $student->advanceStepTo(5);

        return redirect()
            ->route('student.account.settings', ['step' => 6])
            ->with('success', 'Immigration history saved successfully.');
    }

    // =========================================================================
    // Step 6 — Visa Documents Checklist
    // =========================================================================

    public function updateVisaDocumentsChecklist(
        UpdateVisaDocumentsChecklistRequest $request
    ): RedirectResponse {
        $student = $request->user()->student;
        abort_if(! $student, 404, 'Student profile not found.');

        foreach (StudentDocument::CHECKLIST as $key => $label) {
            if (! $request->hasFile("documents.{$key}")) {
                continue;
            }

            $file     = $request->file("documents.{$key}");
            $existing = $student->documents()->where('document_key', $key)->first();

            // replaceFile deletes $existing->file_path then uploads the new file
            $path = $this->replaceFile(
                $file,
                $existing?->file_path,
                "students/{$student->id}/documents"
            );

            $student->documents()->updateOrCreate(
                ['document_key' => $key],
                [
                    'document_name' => $label,
                    'file_path'     => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'file_size'     => $this->formatFileSize($file->getSize()),
                    'status'        => 'ready',
                ]
            );
        }

        $student->advanceStepTo(6);

        return redirect()
            ->route('student.account.settings', ['step' => 6])
            ->with('success', 'Documents checklist updated successfully.');
    }

    // =========================================================================
    // Helpers
    // =========================================================================

    private function formatFileSize(int $bytes): string
    {
        if ($bytes >= 1_048_576) {
            return round($bytes / 1_048_576, 1) . ' MB';
        }

        return round($bytes / 1024, 0) . ' KB';
    }
}
