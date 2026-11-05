{{-- Pre-populate Alpine from backend data --}}
@php
    $initialRefusals = [];
    if ($immigrationRefusals->count()) {
        foreach ($immigrationRefusals as $i => $ir) {
            $initialRefusals[] = [
                'id'           => $ir->id,
                'country'      => old("refusals.{$i}.country",   $ir->country   ?? ''),
                'visa_type'    => old("refusals.{$i}.visa_type",  $ir->visa_type  ?? ''),
                'year'         => old("refusals.{$i}.year",       $ir->year       ?? date('Y')),
                'status'       => old("refusals.{$i}.status",     $ir->status     ?? 'Refused'),
                'grounds'      => old("refusals.{$i}.grounds",    $ir->grounds    ?? ''),
                'document_name'=> $ir->document_name ?? '',
            ];
        }
    } elseif (old('refusals')) {
        foreach (old('refusals') as $i => $r) {
            $initialRefusals[] = array_merge([
                'id' => null, 'document_name' => '', 'status' => 'Refused',
            ], $r);
        }
    }

    $initialImmigration = ['refusals' => $initialRefusals];
@endphp

<div x-data="immigrationForm({{ Js::from($initialImmigration) }})"
     x-init="init()"
     class="bg-white dark:bg-neutral-900 sm:rounded-2xl shadow-xs sm:border border-neutral-200/80 dark:border-neutral-800 overflow-hidden">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-neutral-100 dark:border-neutral-800 py-5 mb-5 px-4 sm:px-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400">
                <iconify-icon icon="lucide:shield-alert" class="text-xl"></iconify-icon>
            </div>
            <div>
                <h3 class="text-lg font-bold text-neutral-900 dark:text-white">Immigration History Setup</h3>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-0.5">Record prior visa refusals and travel record details.</p>
            </div>
        </div>
        <div class="flex items-center gap-1.5 rounded-xl bg-neutral-50/80 dark:bg-neutral-800/50 px-3 py-1.5 border border-neutral-200/80 dark:border-neutral-700">
            <iconify-icon icon="lucide:file-warning" class="text-amber-600 dark:text-amber-400 text-sm"></iconify-icon>
            <span class="text-xs font-bold text-neutral-800 dark:text-neutral-200"
                x-text="refusals.length + ' Record' + (refusals.length !== 1 ? 's' : '')"></span>
        </div>
    </div>

    <form action="{{ route('student.account.immigration-history.update') }}" method="POST"
          enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="px-5 sm:px-8 space-y-6 mb-6">

            <div class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                <div class="flex items-center gap-2">
                    <iconify-icon icon="lucide:history" class="text-amber-500 text-base"></iconify-icon>
                    <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">Refusal & Travel Records</h4>
                </div>
                <button type="button" @click="addRefusal()"
                    class="inline-flex items-center gap-1.5 rounded-lg bg-amber-50 dark:bg-amber-950/50 px-3 py-1.5 text-xs font-semibold text-amber-700 dark:text-amber-400 hover:bg-amber-100 transition-colors">
                    <iconify-icon icon="lucide:plus" class="text-sm"></iconify-icon>
                    Add Refusal Record
                </button>
            </div>

            @error('refusals')
                <p class="text-xs text-rose-600">{{ $message }}</p>
            @enderror

            <div class="space-y-4">
                <template x-for="(record, index) in refusals" :key="record.id || index">
                    <div class="p-4 sm:p-5 rounded-xl border border-amber-200/80 dark:border-amber-900/40 bg-amber-50/30 dark:bg-amber-950/10 space-y-4 relative">

                        {{-- Visible text inputs also carry name attrs for direct POST --}}
                        <div class="flex items-center justify-between border-b border-amber-200/60 dark:border-amber-900/30 pb-3">
                            <div class="flex items-center gap-2">
                                <div class="flex h-5 w-5 items-center justify-center rounded-full bg-amber-100 dark:bg-amber-900/60 text-amber-700 dark:text-amber-300">
                                    <iconify-icon icon="lucide:file-warning" class="text-xs"></iconify-icon>
                                </div>
                                <span class="text-xs font-bold text-neutral-800 dark:text-neutral-200"
                                    x-text="record.country ? record.country + ' — ' + (record.visa_type || 'Visa Entry') : 'Refusal Record #' + (index + 1)"></span>
                            </div>
                            <button type="button" x-show="refusals.length > 1" @click="removeRefusal(index)"
                                class="text-xs font-medium text-rose-500 hover:text-rose-700 flex items-center gap-1 transition-colors">
                                <iconify-icon icon="lucide:trash-2" class="text-sm"></iconify-icon>
                                Remove Record
                            </button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Country <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    :name="`refusals[${index}][country]`"
                                    x-model="record.country"
                                    placeholder="e.g. Canada"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all">
                                {{-- @error("refusals.{$loop->index}.country")
                                    <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Visa Category / Type <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    :name="`refusals[${index}][visa_type]`"
                                    x-model="record.visa_type"
                                    placeholder="e.g. Study Permit"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Application Year <span class="text-rose-500">*</span>
                                </label>
                                <input type="number" min="1990" max="2100"
                                    :name="`refusals[${index}][year]`"
                                    x-model="record.year"
                                    placeholder="e.g. 2023"
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">Status</label>
                                <select :name="`refusals[${index}][status]`" x-model="record.status"
                                    class="w-full px-4 py-2.5 rounded-lg border border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all appearance-none">
                                    <option value="Refused">Refused</option>
                                    <option value="Withdrawn">Withdrawn</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>

                            <div class="sm:col-span-2 lg:col-span-3">
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Grounds for Refusal <span class="text-rose-500">*</span>
                                </label>
                                <textarea
                                    :name="`refusals[${index}][grounds]`"
                                    x-model="record.grounds"
                                    rows="3"
                                    placeholder="e.g. Section 216(1)(b) — Officer not satisfied applicant would leave..."
                                    class="w-full px-4 py-2.5 rounded-lg border placeholder:text-neutral-400 border-neutral-200 bg-white dark:bg-neutral-900 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all resize-y"></textarea>
                            </div>

                            {{-- File upload --}}
                            <div class="sm:col-span-2 lg:col-span-3">
                                <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                    Upload Refusal Letter / Document
                                </label>
                                <div class="flex flex-wrap items-center gap-3">
                                    <label class="cursor-pointer inline-flex items-center gap-2 px-3.5 py-2 rounded-lg border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 hover:bg-neutral-50 dark:hover:bg-neutral-800 text-xs font-medium text-neutral-700 dark:text-neutral-300 transition-colors">
                                        <iconify-icon icon="lucide:upload-cloud" class="text-base text-neutral-500"></iconify-icon>
                                        <span>Choose File</span>
                                        <input type="file" :name="`refusals[${index}][document]`"
                                            accept=".pdf,.png,.jpg,.jpeg"
                                            class="hidden"
                                            @change="handleFile($event, index)">
                                    </label>

                                    <template x-if="record.document_name">
                                        <div class="flex items-center gap-2 rounded-lg border border-neutral-200/80 dark:border-neutral-700 bg-white dark:bg-neutral-900 px-3 py-1.5 text-xs text-neutral-700 dark:text-neutral-300 shadow-2xs">
                                            <iconify-icon icon="lucide:file-text" class="text-neutral-400 text-sm"></iconify-icon>
                                            <span class="font-medium" x-text="record.document_name"></span>
                                            <button type="button"
                                                @click="record.document_name = ''"
                                                class="text-neutral-400 hover:text-rose-500 transition-colors ml-1">
                                                <iconify-icon icon="lucide:x" class="text-xs"></iconify-icon>
                                            </button>
                                        </div>
                                    </template>

                                    {{-- Show existing saved file --}}
                                    <template x-if="!record.document_name && record.existingDoc">
                                        <span class="text-xs text-neutral-500 italic" x-text="'Saved: ' + record.existingDoc"></span>
                                    </template>
                                </div>
                            </div>

                        </div>
                    </div>
                </template>
            </div>

        </div>

        {{-- Footer --}}
        <div class="flex items-center justify-between gap-3 px-5 sm:px-8 py-4 bg-neutral-50/50 dark:bg-neutral-800/30 border-t border-neutral-100 dark:border-neutral-800">
            <button type="button" @click="$dispatch('go-to-step', 4)"
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
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-amber-600 text-white text-xs font-bold shadow-xs hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 active:scale-[0.98] transition-all">
                    <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>
                    Save & Continue
                </button>
            </div>
        </div>

    </form>
</div>

@push('scripts')
<script>
function immigrationForm(initial) {
    return {
        refusals: initial.refusals,

        init() {
            if (this.refusals.length === 0) {
                this.addRefusal();
            }
        },

        addRefusal() {
            this.refusals.push({
                id: Date.now(), country: '', visa_type: '',
                year: new Date().getFullYear(), status: 'Refused',
                grounds: '', document_name: '', existingDoc: ''
            });
        },

        removeRefusal(index) {
            if (this.refusals.length > 1) {
                this.refusals.splice(index, 1);
            }
        },

        handleFile(event, index) {
            const file = event.target.files[0];
            if (file) {
                this.refusals[index].document_name = file.name;
            }
        },
    };
}
</script>
@endpush
