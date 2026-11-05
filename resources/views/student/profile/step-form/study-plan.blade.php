{{-- Pre-populate Alpine from backend data --}}
@php
    $sp = $studyPlan;

    $initialChoices = [];
    if ($sp && $sp->choices->count()) {
        foreach ($sp->choices as $i => $c) {
            $initialChoices[] = [
                'id'          => $c->id,
                'program'     => old("choices.{$i}.program",     $c->program     ?? ''),
                'university'  => old("choices.{$i}.university",  $c->university  ?? ''),
                'country'     => old("choices.{$i}.country",     $c->country     ?? ''),
                'duration'    => old("choices.{$i}.duration",    $c->duration    ?? ''),
                'start_date'  => old("choices.{$i}.start_date",  $c->start_date  ?? ''),
                'end_date'    => old("choices.{$i}.end_date",    $c->end_date    ?? ''),
                'tuition'     => old("choices.{$i}.tuition",     $c->tuition     ?? ''),
                'scholarship' => old("choices.{$i}.scholarship", $c->scholarship ?? ''),
                'summary'     => old("choices.{$i}.summary",     $c->summary     ?? ''),
            ];
        }
    } elseif (old('choices')) {
        foreach (old('choices') as $i => $c) {
            $initialChoices[] = array_merge(['id' => null], $c);
        }
    }

    $initialStudyPlan = [
        'targetDegree' => old('target_degree', $sp?->target_degree ?? ''),
        'choices'      => $initialChoices,
    ];
@endphp

<div x-data="studyPlanForm({{ Js::from($initialStudyPlan) }})"
     x-init="init()"
     class="bg-white dark:bg-neutral-900 sm:rounded-2xl shadow-xs sm:border border-neutral-200/80 dark:border-neutral-800 overflow-hidden">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-neutral-100 dark:border-neutral-800 py-5 mb-5 px-4 sm:px-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-950/50 dark:text-brand-400">
                <iconify-icon icon="lucide:compass" class="text-xl"></iconify-icon>
            </div>
            <div>
                <h3 class="text-lg font-bold text-neutral-900 dark:text-white">Study Plan & University Details Setup</h3>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-0.5">Fill in target degree level and university preference choices.</p>
            </div>
        </div>

        {{-- Target Degree Dropdown --}}
        <div class="flex items-center gap-2 rounded-xl bg-neutral-50/80 dark:bg-neutral-800/50 px-3 py-1.5 border border-neutral-200/80 dark:border-neutral-700">
            <label class="text-xs font-semibold text-neutral-600 dark:text-neutral-300 whitespace-nowrap">Target Degree:</label>
            <select x-model="targetDegree" name="target_degree"
                class="bg-transparent text-xs font-bold text-brand-600 dark:text-brand-400 focus:outline-none border-none cursor-pointer pr-2">
                <option value="" disabled class="bg-white dark:bg-neutral-900 text-neutral-800">Select Degree</option>
                <option value="Master's Degree"       class="bg-white dark:bg-neutral-900 text-neutral-800">Master's Degree</option>
                <option value="Bachelor's Degree"     class="bg-white dark:bg-neutral-900 text-neutral-800">Bachelor's Degree</option>
                <option value="PhD / Doctorate"       class="bg-white dark:bg-neutral-900 text-neutral-800">PhD / Doctorate</option>
                <option value="Postgraduate Diploma"  class="bg-white dark:bg-neutral-900 text-neutral-800">Postgraduate Diploma</option>
            </select>
        </div>
    </div>

    @error('target_degree')
        <p class="px-5 sm:px-8 -mt-3 mb-2 text-xs text-rose-600">{{ $message }}</p>
    @enderror

    <form action="{{ route('student.account.study-plan.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Bind target_degree from Alpine (select is outside form tag) --}}
        <input type="hidden" name="target_degree" :value="targetDegree">

        <div class="px-5 sm:px-8 space-y-6 mb-6">

            <div class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                <div class="flex items-center gap-2">
                    <iconify-icon icon="lucide:compass" class="text-brand-500 text-base"></iconify-icon>
                    <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">University / Program Choices</h4>
                </div>
                <button type="button" @click="addChoice()"
                    class="inline-flex items-center gap-1.5 rounded-lg bg-brand-50 dark:bg-brand-950/50 px-3 py-1.5 text-xs font-semibold text-brand-600 dark:text-brand-400 hover:bg-brand-100 transition-colors">
                    <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                    Add Preference Choice
                </button>
            </div>

            @error('choices')
                <p class="text-xs text-rose-600">{{ $message }}</p>
            @enderror

            <div class="space-y-4">
                <template x-for="(choice, index) in choices" :key="choice.id || index">
                    <div class="p-4 sm:p-5 rounded-xl border border-neutral-200/80 dark:border-neutral-800 bg-neutral-50/40 dark:bg-neutral-800/30 space-y-4 relative">

                        {{-- Hidden form fields that submit to server --}}
                        <input type="hidden" :name="`choices[${index}][program]`"     :value="choice.program">
                        <input type="hidden" :name="`choices[${index}][university]`"  :value="choice.university">
                        <input type="hidden" :name="`choices[${index}][country]`"     :value="choice.country">
                        <input type="hidden" :name="`choices[${index}][duration]`"    :value="choice.duration">
                        <input type="hidden" :name="`choices[${index}][start_date]`"  :value="choice.start_date">
                        <input type="hidden" :name="`choices[${index}][end_date]`"    :value="choice.end_date">
                        <input type="hidden" :name="`choices[${index}][tuition]`"     :value="choice.tuition">
                        <input type="hidden" :name="`choices[${index}][scholarship]`" :value="choice.scholarship">
                        <input type="hidden" :name="`choices[${index}][summary]`"     :value="choice.summary">

                        <div class="flex items-center justify-between border-b border-neutral-200/60 dark:border-neutral-700/60 pb-3">
                            <div class="flex items-center gap-2">
                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-brand-100 dark:bg-brand-900/60 text-brand-700 dark:text-brand-300 text-[11px] font-bold" x-text="index + 1"></span>
                                <span class="text-xs font-bold text-neutral-800 dark:text-neutral-200"
                                    x-text="index === 0 ? 'Choice 1 (Primary Destination)' : 'Choice ' + (index + 1)"></span>
                            </div>
                            <button type="button" x-show="choices.length > 1" @click="removeChoice(index)"
                                class="text-xs font-medium text-rose-500 hover:text-rose-700 flex items-center gap-1 transition-colors">
                                <iconify-icon icon="lucide:trash-2" class="text-sm"></iconify-icon>
                                Remove Choice
                            </button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                            <div class="sm:col-span-2 lg:col-span-3">
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Intended Program <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" x-model="choice.program"
                                    placeholder="e.g. MSc in Human-Computer Interaction"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    University Name <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" x-model="choice.university"
                                    placeholder="e.g. University of Manchester"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Destination Country <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" x-model="choice.country"
                                    placeholder="e.g. United Kingdom"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Program Duration</label>
                                <input type="text" x-model="choice.duration"
                                    placeholder="e.g. 1 Year / 24 Months"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Intended Start Date</label>
                                <input type="month" x-model="choice.start_date"
                                    class="w-full px-4 py-2.5 rounded-lg border border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all cursor-pointer">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Expected End Date</label>
                                <input type="month" x-model="choice.end_date"
                                    class="w-full px-4 py-2.5 rounded-lg border border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all cursor-pointer">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Tuition Fee</label>
                                <input type="text" x-model="choice.tuition"
                                    placeholder="e.g. £28,500 / year"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            </div>

                            <div class="sm:col-span-2 lg:col-span-3">
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Scholarship / Funding Status</label>
                                <input type="text" x-model="choice.scholarship"
                                    placeholder="e.g. Self-funded, Merit Award Applied, etc."
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                            </div>

                            <div class="sm:col-span-2 lg:col-span-3">
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Study Plan Summary & Academic Motivation</label>
                                <textarea x-model="choice.summary" rows="3"
                                    placeholder="Explain your academic objective, alignment with career goals, and reasons for selecting this university..."
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all resize-y"></textarea>
                            </div>

                        </div>
                    </div>
                </template>
            </div>

        </div>

        {{-- Footer --}}
        <div class="flex items-center justify-between gap-3 px-5 sm:px-8 py-4 bg-neutral-50/50 dark:bg-neutral-800/30 border-t border-neutral-100 dark:border-neutral-800">
            <button type="button" @click="$dispatch('go-to-step', 2)"
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
function studyPlanForm(initial) {
    return {
        targetDegree: initial.targetDegree,
        choices:      initial.choices,

        init() {
            if (this.choices.length === 0) {
                this.addChoice();
            }
        },

        addChoice() {
            this.choices.push({
                id: Date.now(), program: '', university: '', country: '',
                duration: '', start_date: '', end_date: '',
                tuition: '', scholarship: '', summary: ''
            });
        },

        removeChoice(index) {
            if (this.choices.length > 1) {
                this.choices.splice(index, 1);
            }
        },
    };
}
</script>
@endpush
