@php
    use App\Models\Profile\StudentDocument;

    $initialDocs = [];

    foreach ($documentSlots as $key => $slot) {
        $initialDocs[] = [
            'key'              => $key,
            'name'             => StudentDocument::CHECKLIST[$key] ?? ucfirst($key),
            'originalName'     => $slot->original_name ?? '',
            'fileSize'         => $slot->file_size ?? '',
            'status'           => $slot->status ?? 'pending',
            // savedFilePath = persisted DB path, never touched by JS
            'savedFilePath'    => $slot->file_path ?? '',
            // filePath = reactive display path (same initially, cleared on new pick)
            'filePath'         => $slot->file_path ?? '',
            // saved* = snapshot used by clearFile() to restore state
            'savedOriginalName' => $slot->original_name ?? '',
            'savedFileSize'     => $slot->file_size ?? '',
        ];
    }
@endphp


<div x-data="docsChecklist(@js($initialDocs))" class="max-w-5xl mx-auto">

    <form action="{{ route('student.account.visa-documents-checklist.update') }}" method="POST"
        enctype="multipart/form-data" class="space-y-6">

        @csrf
        @method('PUT')


        {{-- Validation Error --}}
        @if ($errors->any())

            <div class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">

                <div class="font-semibold mb-2">
                    Please fix the following errors:
                </div>

                <ul class="list-disc pl-5 space-y-1">

                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach

                </ul>

            </div>

        @endif     


        <div
            class="sm:rounded-2xl sm:border border-neutral-200/80 bg-white dark:bg-neutral-900 dark:border-neutral-800 p-5 sm:p-6 shadow-xs space-y-6">


            {{-- HEADER --}}
            <div
                class="flex flex-wrap items-center justify-between gap-4 border-b border-neutral-100 dark:border-neutral-800 pb-5">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

                        <iconify-icon icon="lucide:folder-check" class="text-xl"></iconify-icon>

                    </div>

                    <div>

                        <h2 class="text-base font-bold text-neutral-900 dark:text-white">
                            Visa Documents Upload
                        </h2>

                        <p class="text-xs text-neutral-500 dark:text-neutral-400">
                            Upload and manage required verification & compliance files
                        </p>

                    </div>

                </div>


                {{-- PROGRESS --}}
                <div class="flex flex-col items-end gap-1.5 min-w-[180px]">

                    <div class="flex items-center gap-3 text-xs font-semibold">

                        <span class="text-neutral-500 dark:text-neutral-400"
                            x-text="completedCount + ' of ' + totalCount + ' Completed'"></span>

                        <span
                            class="rounded-full bg-emerald-50 dark:bg-emerald-900/30 px-2.5 py-0.5 text-emerald-700 dark:text-emerald-400 border border-emerald-200/60"
                            x-text="percentage + '% Ready'"></span>

                    </div>


                    <div class="h-2 w-full overflow-hidden rounded-full bg-neutral-100 dark:bg-neutral-800">

                        <div class="h-full bg-emerald-500 transition-all duration-300"
                            :style="'width: ' + percentage + '%'"></div>

                    </div>

                </div>

            </div>


            {{-- DOCUMENT GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <template x-for="(doc, index) in documents" :key="doc.key">

                    <div class="p-4 rounded-xl border transition-all duration-200 flex flex-col justify-between space-y-3"
                        :class="{
                            'border-emerald-200/80 bg-emerald-50/20 dark:border-emerald-800/40 dark:bg-emerald-950/10': doc
                                .status === 'ready',
                        
                            'border-amber-200/80 bg-amber-50/20 dark:border-amber-800/40': doc.status === 'in_review',
                        
                            'border-neutral-200 bg-neutral-50/50 dark:border-neutral-800 dark:bg-neutral-800/20': doc
                                .status === 'pending'
                        }">


                        {{-- LABEL --}}
                        <div class="flex items-start justify-between gap-2">

                            <div class="min-w-0">

                                <label class="block text-xs font-bold text-neutral-800 dark:text-neutral-200"
                                    x-text="doc.name"></label>


                                <p class="text-[11px] text-neutral-400 mt-0.5 truncate"
                                    x-text="
                                        doc.originalName
                                            ? doc.originalName + (doc.fileSize ? ' (' + doc.fileSize + ')' : '')
                                            : 'No file chosen'
                                    ">
                                </p>

                            </div>


                            {{-- STATUS --}}
                            <span
                                class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-[11px] font-semibold whitespace-nowrap"
                                :class="{
                                    'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400': doc
                                        .status === 'ready',
                                
                                    'bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400': doc
                                        .status === 'in_review',
                                
                                    'bg-neutral-200 text-neutral-700 dark:bg-neutral-700 dark:text-neutral-300': doc
                                        .status === 'pending'
                                }">

                                <iconify-icon
                                    :icon="doc.status === 'ready' ?
                                        'lucide:check-circle' :
                                        (
                                            doc.status === 'pending' ?
                                            'lucide:alert-circle' :
                                            'lucide:clock'
                                        )"
                                    class="text-xs"></iconify-icon>


                                <span
                                    x-text="
                                        doc.status === 'ready'
                                            ? 'Ready'
                                            : (
                                                doc.status === 'in_review'
                                                    ? 'In Review'
                                                    : 'Pending Upload'
                                            )
                                    "></span>

                            </span>

                        </div>


                        {{-- EXISTING FILE — shows saved DB file OR a local image preview --}}
                        <template x-if="doc.filePath || doc.savedFilePath">

                            <div>

                                <a
                                    :href="doc.filePath ? '/' + doc.filePath : '/' + doc.savedFilePath"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium text-blue-600 hover:text-blue-800">

                                    <iconify-icon icon="lucide:external-link" class="text-sm"></iconify-icon>

                                    View Document

                                </a>

                            </div>

                        </template>


                        {{-- UPLOAD --}}
                        <div
                            class="flex items-center justify-between pt-2 border-t border-neutral-200/60 dark:border-neutral-700/60">

                            <label
                                class="cursor-pointer inline-flex items-center gap-1.5 text-xs font-medium text-neutral-600 dark:text-neutral-400 hover:text-emerald-700 dark:hover:text-emerald-400 transition">

                                <iconify-icon icon="lucide:upload-cloud"
                                    class="text-sm text-neutral-400"></iconify-icon>


                                <span
                                    x-text="
                                        doc.originalName
                                            ? 'Replace File'
                                            : 'Upload Document'
                                    "></span>


                                <input type="file" :name="`documents[${doc.key}]`"
                                    accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="hidden"
                                    @change="handleUpload($event, doc)">

                            </label>


                            {{-- REMOVE --}}
                            <template x-if="doc.originalName">

                                <button type="button" @click="clearFile(doc)"
                                    class="text-xs text-rose-500 hover:text-rose-700 flex items-center gap-1 font-medium transition-colors">

                                    <iconify-icon icon="lucide:trash-2" class="text-xs"></iconify-icon>

                                    Remove

                                </button>

                            </template>

                        </div>

                    </div>

                </template>

            </div>


            {{-- FOOTER --}}
            <div
                class="flex items-center justify-between gap-3 pt-4 border-t border-neutral-100 dark:border-neutral-800">

                <button type="button" @click="$dispatch('go-to-step', 5)"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-neutral-600 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 transition-colors">

                    <iconify-icon icon="lucide:arrow-left" class="text-sm"></iconify-icon>

                    Back

                </button>


                <div class="flex items-center gap-3">

                    <button type="button" onclick="window.location.reload()"
                        class="px-4 py-2 text-xs font-medium text-neutral-600 dark:text-neutral-400 rounded-xl border border-neutral-200 dark:border-neutral-700 hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors">
                        Cancel
                    </button>


                    <button type="submit"
                        class="px-5 py-2 text-xs font-semibold text-white rounded-xl bg-emerald-600 hover:bg-emerald-700 transition-colors shadow-xs flex items-center gap-1.5">

                        <iconify-icon icon="lucide:check" class="text-sm"></iconify-icon>

                        Save Checklist Progress

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


@push('scripts')
    <script>
        function docsChecklist(initial) {

            return {

                documents: initial,


                get completedCount() {

                    return this.documents.filter(
                        d => d.status === 'ready'
                    ).length;

                },


                get totalCount() {

                    return this.documents.length;

                },


                get percentage() {

                    return this.totalCount ?
                        Math.round(
                            (this.completedCount / this.totalCount) * 100
                        ) :
                        0;

                },


                handleUpload(event, doc) {

                    const file = event.target.files[0];

                    if (!file) {
                        return;
                    }

                    doc.originalName = file.name;

                    doc.fileSize =
                        file.size >= 1048576 ?
                        (file.size / 1048576).toFixed(1) + ' MB' :
                        Math.max(1, Math.round(file.size / 1024)) + ' KB';

                    doc.status = 'ready';

                    /*
                    |------------------------------------------------------------------
                    | Show local image preview for image files.
                    | For non-images (PDF, DOC etc.) keep showing the saved DB link.
                    | NEVER clear savedFilePath — it belongs to the backend.
                    |------------------------------------------------------------------
                    */
                    if (file.type.startsWith('image/')) {
                        doc.filePath = URL.createObjectURL(file);
                    } else {
                        // Keep filePath pointing to the saved DB file so
                        // "View Document" still works after a new pick.
                        doc.filePath = doc.savedFilePath;
                    }

                },


                clearFile(doc) {

                    /*
                    |------------------------------------------------------------------
                    | Reset the newly-picked file from the browser input.
                    | Restore UI to show the previously saved DB document if any.
                    | savedFilePath is NEVER changed here — only the backend can do that.
                    |------------------------------------------------------------------
                    */

                    doc.originalName = doc.savedOriginalName ?? '';
                    doc.fileSize     = doc.savedFileSize     ?? '';
                    doc.status       = doc.savedFilePath ? 'ready' : 'pending';
                    doc.filePath     = doc.savedFilePath;

                    this.$nextTick(() => {

                        const input = this.$el.querySelector(
                            `input[name="documents[${doc.key}]"]`
                        );

                        if (input) {
                            input.value = '';
                        }

                    });

                }

            };

        }
    </script>
@endpush