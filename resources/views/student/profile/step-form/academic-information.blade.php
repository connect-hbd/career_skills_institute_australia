{{-- ── Pre-populate Alpine from backend ──────────────────────────────────── --}}
@php
    $ai = $academicInformation;

    $initialAcademic = [
        'highestQual' => [
            'degree'      => old('highest_degree',      $ai?->highest_degree      ?? ''),
            'institution' => old('highest_institution', $ai?->highest_institution ?? ''),
            'gradDate'    => old('highest_grad_date',   $ai?->highest_grad_date   ?? ''),
            'gpa'         => old('highest_gpa',         $ai?->highest_gpa         ?? ''),
            'maxGpa'      => old('highest_max_gpa',     $ai?->highest_max_gpa     ?? ''),
        ],
        'educationHistory' => old('education_history', $ai?->education_history ?? []),
        'ielts' => [
            'overall'   => old('ielts_overall',   $ai?->ielts_overall   ?? ''),
            'testDate'  => old('ielts_test_date', $ai?->ielts_test_date?->format('Y-m-d') ?? ''),
            'listening' => old('ielts_listening', $ai?->ielts_listening ?? ''),
            'reading'   => old('ielts_reading',   $ai?->ielts_reading   ?? ''),
            'writing'   => old('ielts_writing',   $ai?->ielts_writing   ?? ''),
            'speaking'  => old('ielts_speaking',  $ai?->ielts_speaking  ?? ''),
        ],
        'gre' => [
            'combined'  => old('gre_combined',  $ai?->gre_combined  ?? ''),
            'testDate'  => old('gre_test_date', $ai?->gre_test_date?->format('Y-m-d') ?? ''),
            'quant'     => old('gre_quant',     $ai?->gre_quant     ?? ''),
            'verbal'    => old('gre_verbal',    $ai?->gre_verbal    ?? ''),
            'awa'       => old('gre_awa',       $ai?->gre_awa       ?? ''),
        ],
    ];

@endphp

<div x-data="academicForm({{ Js::from($initialAcademic) }})"
     x-init="init()"
     class="bg-white dark:bg-neutral-900 sm:rounded-2xl shadow-xs sm:border border-neutral-200/80 dark:border-neutral-800 overflow-hidden">

    {{-- ── Header ──────────────────────────────────────────────────────────── --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-neutral-100 dark:border-neutral-800 py-5 mb-5 px-4 sm:px-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-950/50 dark:text-brand-400">
                <iconify-icon icon="lucide:graduation-cap" class="text-xl"></iconify-icon>
            </div>
            <div>
                <h3 class="text-lg font-bold text-neutral-900 dark:text-white">Academic Background Setup</h3>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-0.5">Edit highest qualification, education history, and test scores.</p>
            </div>
        </div>
    </div>

    <form action="{{ route('student.account.academic-information.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        <div class="px-5 sm:px-8 space-y-8 mb-6">

            {{-- ══════════════════════════════════════════════════════════════
                 SECTION 1 — Highest Qualification
            ══════════════════════════════════════════════════════════════ --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <iconify-icon icon="lucide:award" class="text-brand-500 text-base"></iconify-icon>
                    <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">1. Highest Qualification</h4>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- Degree Name --}}
                    <div class="sm:col-span-2">
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Degree Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="highest_degree"
                            x-model="highestQual.degree"
                            placeholder="e.g. Bachelor of Science in Computer Science"
                            class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                {{ $errors->has('highest_degree') ? 'border-rose-400 bg-rose-50/30 dark:bg-rose-950/20' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                text-xs font-medium text-neutral-800 dark:text-neutral-200
                                focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                            required>
                        @error('highest_degree')
                            <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Graduation Date (uses form-date component — has @error built-in) --}}
                    <div>
                        <x-form.form-date
                            id="highest_grad_date"
                            name="highest_grad_date"
                            label="Graduation Date"
                            placeholder="YYYY-MM-DD"
                            :defaultDate="old('highest_grad_date', $ai?->highest_grad_date ?? '')"
                            required />
                        {{-- Sync flatpickr value back into Alpine on change --}}
                        {{-- (hidden input keeps server-side value; flatpickr updates it directly) --}}
                    </div>

                    {{-- Institution & Country --}}
                    <div class="sm:col-span-2">
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Institution & Country <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="highest_institution"
                            x-model="highestQual.institution"
                            placeholder="e.g. University of Oxford, United Kingdom"
                            class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                {{ $errors->has('highest_institution') ? 'border-rose-400 bg-rose-50/30 dark:bg-rose-950/20' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                text-xs font-medium text-neutral-800 dark:text-neutral-200
                                focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                            required>
                        @error('highest_institution')
                            <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- GPA Score + Scale --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                GPA Score <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="highest_gpa"
                                x-model="highestQual.gpa"
                                placeholder="3.50"
                                class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                    {{ $errors->has('highest_gpa') ? 'border-rose-400 bg-rose-50/30 dark:bg-rose-950/20' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                required>
                            @error('highest_gpa')
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Scale / Max GPA</label>
                            <input type="text" name="highest_max_gpa"
                                x-model="highestQual.maxGpa"
                                placeholder="4.00"
                                class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                    border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                        </div>
                    </div>

                </div>

            </div>

            {{-- ══════════════════════════════════════════════════════════════
                 SECTION 2 — Education History
            ══════════════════════════════════════════════════════════════ --}}
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <div class="flex items-center gap-2">
                        <iconify-icon icon="lucide:book-open" class="text-brand-500 text-base"></iconify-icon>
                        <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">2. Education History</h4>
                    </div>
                    <button type="button" @click="addEducation()"
                        class="inline-flex items-center gap-1.5 rounded-lg bg-brand-50 dark:bg-brand-950/50 px-3 py-1.5 text-xs font-semibold text-brand-600 dark:text-brand-400 hover:bg-brand-100 transition-colors">
                        <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                        Add Education
                    </button>
                </div>

                <template x-if="educationHistory.length === 0">
                    <div class="rounded-xl border border-dashed border-neutral-200 dark:border-neutral-800 p-6 text-center bg-neutral-50/50 dark:bg-neutral-800/20">
                        <iconify-icon icon="lucide:school" class="text-2xl text-neutral-400 dark:text-neutral-500 mb-1"></iconify-icon>
                        <p class="text-xs text-neutral-500 dark:text-neutral-400">No education history added yet.</p>
                        <button type="button" @click="addEducation()"
                            class="mt-2 text-xs font-semibold text-brand-600 dark:text-brand-400 hover:underline">
                            Click here to add your first entry
                        </button>
                    </div>
                </template>

                <div class="space-y-4" x-show="educationHistory.length > 0">
                    <template x-for="(edu, index) in educationHistory" :key="index">
                        <div class="p-4 rounded-xl border border-neutral-200/80 dark:border-neutral-800 bg-neutral-50/40 dark:bg-neutral-800/30 space-y-4 relative">

                            {{-- Hidden inputs — mirror Alpine state for server POST --}}
                            <input type="hidden" :name="`education_history[${index}][degree]`"      :value="edu.degree">
                            <input type="hidden" :name="`education_history[${index}][institution]`" :value="edu.institution">
                            <input type="hidden" :name="`education_history[${index}][country]`"     :value="edu.country">
                            <input type="hidden" :name="`education_history[${index}][year]`"        :value="edu.year">
                            <input type="hidden" :name="`education_history[${index}][grade]`"       :value="edu.grade">

                            <div class="flex items-center justify-between border-b border-neutral-200/60 dark:border-neutral-700/60 pb-2.5">
                                <span class="text-xs font-bold text-neutral-700 dark:text-neutral-300" x-text="'Entry #' + (index + 1)"></span>
                                <button type="button" @click="removeEducation(index)"
                                    class="text-rose-500 hover:text-rose-700 text-xs flex items-center gap-1 font-medium transition-colors">
                                    <iconify-icon icon="lucide:trash-2" class="text-sm"></iconify-icon>
                                    Remove
                                </button>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Degree / Level</label>
                                    <input type="text" x-model="edu.degree" placeholder="e.g. B.Sc."
                                        class="w-full px-3.5 py-2 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Institution</label>
                                    <input type="text" x-model="edu.institution" placeholder="Institution Name"
                                        class="w-full px-3.5 py-2 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Country</label>
                                    <input type="text" x-model="edu.country" placeholder="Country"
                                        class="w-full px-3.5 py-2 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Year Completed</label>
                                    <input type="text" x-model="edu.year" placeholder="YYYY"
                                        class="w-full px-3.5 py-2 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                </div>
                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Grade / Score</label>
                                    <input type="text" x-model="edu.grade" placeholder="e.g. 3.82 GPA"
                                        class="w-full px-3.5 py-2 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                @error('education_history')
                    <p class="text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- ══════════════════════════════════════════════════════════════
                 SECTION 3 — Standardized Test Scores
            ══════════════════════════════════════════════════════════════ --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <iconify-icon icon="lucide:file-check-2" class="text-brand-500 text-base"></iconify-icon>
                    <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">3. Standardized Test Scores</h4>
                </div>

                {{-- ── IELTS ───────────────────────────────────────────────── --}}
                <div class="p-4 rounded-xl border border-neutral-200/80 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-800/20 space-y-4">
                    <div class="flex flex-wrap items-center justify-between gap-2 border-b border-neutral-200/70 dark:border-neutral-700/70 pb-3">
                        <span class="text-xs font-bold text-neutral-900 dark:text-white">IELTS Academic</span>
                        <div class="flex items-center gap-2">
                            <label class="text-xs font-semibold text-neutral-700 dark:text-neutral-300">Test Date:</label>
                            <input type="date" name="ielts_test_date"
                                x-model="ielts.testDate"
                                class="px-3 py-1.5 rounded-lg border
                                    {{ $errors->has('ielts_test_date') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 dark:border-neutral-700' }}
                                    bg-white dark:bg-neutral-900 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            @error('ielts_test_date')
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-1.5 text-xs font-bold text-brand-600 dark:text-brand-400">Overall</label>
                            <input type="text" name="ielts_overall" x-model="ielts.overall" placeholder="0.0"
                                class="w-full px-3 py-2 rounded-lg border
                                    {{ $errors->has('ielts_overall') ? 'border-rose-400 bg-rose-50/30' : 'border-brand-200 dark:border-brand-800/80' }}
                                    bg-white dark:bg-neutral-900 text-xs font-bold text-neutral-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            @error('ielts_overall')
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                        @foreach(['listening','reading','writing','speaking'] as $band)
                        <div>
                            <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300 capitalize">{{ $band }}</label>
                            <input type="text" name="ielts_{{ $band }}" x-model="ielts.{{ $band }}" placeholder="0.0"
                                class="w-full px-3 py-2 rounded-lg border placeholder:text-neutral-400
                                    {{ $errors->has('ielts_'.$band) ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 dark:border-neutral-700' }}
                                    bg-white dark:bg-neutral-900 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            @error('ielts_'.$band)
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- ── GRE ─────────────────────────────────────────────────── --}}
                <div class="p-4 rounded-xl border border-neutral-200/80 dark:border-neutral-800 bg-neutral-50/30 dark:bg-neutral-800/20 space-y-4">
                    <div class="flex flex-wrap items-center justify-between gap-2 border-b border-neutral-200/70 dark:border-neutral-700/70 pb-3">
                        <span class="text-xs font-bold text-neutral-900 dark:text-white">GRE General</span>
                        <div class="flex items-center gap-2">
                            <label class="text-xs font-semibold text-neutral-700 dark:text-neutral-300">Test Date:</label>
                            <input type="date" name="gre_test_date"
                                x-model="gre.testDate"
                                class="px-3 py-1.5 rounded-lg border
                                    {{ $errors->has('gre_test_date') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 dark:border-neutral-700' }}
                                    bg-white dark:bg-neutral-900 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            @error('gre_test_date')
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block mb-1.5 text-xs font-bold text-brand-600 dark:text-brand-400">Combined Score</label>
                            <input type="text" name="gre_combined" x-model="gre.combined" placeholder="0"
                                class="w-full px-3 py-2 rounded-lg border
                                    {{ $errors->has('gre_combined') ? 'border-rose-400 bg-rose-50/30' : 'border-brand-200 dark:border-brand-800/80' }}
                                    bg-white dark:bg-neutral-900 text-xs font-bold text-neutral-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            @error('gre_combined')
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                        @foreach(['quant' => 'Quant', 'verbal' => 'Verbal', 'awa' => 'AWA'] as $key => $label)
                        <div>
                            <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">{{ $label }}</label>
                            <input type="text" name="gre_{{ $key }}" x-model="gre.{{ $key }}" placeholder="0"
                                class="w-full px-3 py-2 rounded-lg border placeholder:text-neutral-400
                                    {{ $errors->has('gre_'.$key) ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 dark:border-neutral-700' }}
                                    bg-white dark:bg-neutral-900 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            @error('gre_'.$key)
                                <p class="mt-1 text-xs text-rose-600 dark:text-rose-400">{{ $message }}</p>
                            @enderror
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

        {{-- ── Footer ───────────────────────────────────────────────────────── --}}
        <div class="flex items-center justify-between gap-3 px-5 sm:px-8 py-4 bg-neutral-50/50 dark:bg-neutral-800/30 border-t border-neutral-100 dark:border-neutral-800">
            <button type="button" @click="$dispatch('go-to-step', 1)"
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg text-xs font-semibold text-neutral-600 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors">
                <iconify-icon icon="lucide:arrow-left" class="text-sm"></iconify-icon>
                Back
            </button>
            <div class="flex items-center gap-3">
                <button type="button" onclick="window.location.reload()"
                    class="px-4 py-2.5 rounded-lg text-xs font-semibold text-neutral-600 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors">
                    Discard
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-brand-600 text-white text-xs font-bold shadow-xs hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 active:scale-[0.98] transition-all">
                    <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                    Save & Continue
                </button>
            </div>
        </div>

    </form>
</div>

@push('scripts')
<script>
function academicForm(initial) {
    return {
        highestQual:      initial.highestQual,
        educationHistory: initial.educationHistory,
        ielts:            initial.ielts,
        gre:              initial.gre,

        init() {},

        addEducation() {
            this.educationHistory.push({
                degree: '', institution: '', country: '', year: '', grade: ''
            });
        },

        removeEducation(index) {
            this.educationHistory.splice(index, 1);
        },
    };
}
</script>
@endpush
