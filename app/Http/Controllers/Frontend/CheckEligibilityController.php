<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EligibilityApplication;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CheckEligibilityController extends Controller
{
public function index()
{
    $industries = json_decode(
        File::get(resource_path('data/industries.json')),
        true
    );

    $qualifications = json_decode(
        File::get(resource_path('data/qualifications.json')),
        true
    );

    $coursesByIndustry = collect($qualifications)
        ->groupBy('industry_slug')
        ->map(fn ($courses) => $courses->map(fn ($course) => [
            'code' => $course['code'],
            'name' => $course['name'],
        ])->values())
        ->toArray();

    return view(
        'frontend.pages.check-eligibility.index',
        compact('industries', 'coursesByIndustry')
    );
}

   public function submit(Request $request): JsonResponse
{
    /*
    |--------------------------------------------------------------------------
    | Load JSON Data
    |--------------------------------------------------------------------------
    */

    $industries = json_decode(
        File::get(resource_path('data/industries.json')),
        true
    );

    $courses = json_decode(
        File::get(resource_path('data/qualifications.json')),
        true
    );

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    $validator = Validator::make($request->all(), [
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:30'],

        'industry' => [
            'required',
            'string',
            'max:255',
            'in:'.implode(',', collect($industries)->pluck('slug')->all()),
        ],

        'qualification' => [
            'required',
            'string',
            'max:255',
        ],

        'experience_years' => [
            'required',
            'integer',
            'min:0',
            'max:50',
        ],

        'has_formal_qualification' => [
            'required',
            'boolean',
        ],

        'state' => [
            'required',
            'string',
            'in:'.implode(',', array_keys(EligibilityApplication::STATES)),
        ],

        'terms_accepted' => [
            'required',
            'accepted',
        ],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Validate Qualification Against Selected Industry
    |--------------------------------------------------------------------------
    */

    $validator->after(function ($validator) use ($request, $courses) {
        if (
            $request->filled('industry') &&
            $request->filled('qualification')
        ) {
            $courseExists = collect($courses)->contains(
                fn ($course) =>
                    $course['code'] === $request->qualification &&
                    $course['industry_slug'] === $request->industry
            );

            if (! $courseExists) {
                $validator->errors()->add(
                    'qualification',
                    'The selected qualification does not belong to the selected industry.'
                );
            }
        }
    });

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Please correct the highlighted errors.',
            'errors' => $validator->errors(),
        ], 422);
    }

    $data = $validator->validated();

    /*
    |--------------------------------------------------------------------------
    | Find Industry and Qualification
    |--------------------------------------------------------------------------
    */

    $industry = collect($industries)->firstWhere(
        'slug',
        $data['industry']
    );

    $course = collect($courses)->first(
        fn ($course) =>
            $course['code'] === $data['qualification'] &&
            $course['industry_slug'] === $data['industry']
    );

    $industryName = $industry['name'];

    $qualificationName = "{$course['code']} - {$course['name']}";

    /*
    |--------------------------------------------------------------------------
    | Save Application
    |--------------------------------------------------------------------------
    */

    $application = EligibilityApplication::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'phone' => $data['phone'],

        // Save readable names in the database.
        'industry' => $industryName,
        'qualification' => $qualificationName,

        'experience_years' => $data['experience_years'],
        'has_formal_qualification' => $data['has_formal_qualification'],
        'state' => $data['state'],
        'terms_accepted' => $data['terms_accepted'],
    ]);

    /*
    |--------------------------------------------------------------------------
    | Send Email
    |--------------------------------------------------------------------------
    */

    try {
        Mail::raw(
            "Application ID: {$application->id}\n".
            "Name: {$application->first_name} {$application->last_name}\n".
            "Phone: {$application->phone}\n".
            "Email: {$application->email}\n".
            "Industry: {$industryName}\n".
            "Qualification: {$qualificationName}\n".
            "Experience: {$application->experience_years} years\n".
            "State: {$application->state}\n".
            'Formal Qualification: '.
            ($application->has_formal_qualification ? 'Yes' : 'No'),
            function ($message) {
                $message
                    ->to('mannan.hbdservices@gmail.com')
                    ->subject(
                        'New Eligibility Application - Career Skills Institute Australia'
                    );
            }
        );
    } catch (Throwable $e) {
        Log::error('Eligibility Email Error', [
            'application_id' => $application->id,
            'error' => $e->getMessage(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Success Response
    |--------------------------------------------------------------------------
    */

    return response()->json([
        'success' => true,
        'message' => 'Thank you! Your eligibility check has been submitted successfully.',
    ]);
}
}
