@props([
    'name',
    'label' => 'Upload File',
    'multiple' => false,
    'accept' => '*',
    'existing' => null,
])

<div
    x-data="fileUploader({
        multiple: @js($multiple),
        existing: @js($existing)
    })"
    class="relative"
>
    <label class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400">
        {{ $label }}
    </label>

    <div
        @drop.prevent="handleDrop($event)"
        @dragover.prevent="isDragging=true"
        @dragleave.prevent="isDragging=false"
        @click="$refs.input.click()"
        class="border-2 border-dashed rounded-lg p-8 text-center cursor-pointer"
        :class="isDragging ? 'border-blue-500 bg-blue-50' : ''"
    >
        <input
            x-ref="input"
            type="file"
            class="hidden"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            accept="{{ $accept }}"
            {{ $multiple ? 'multiple' : '' }}
            @change="handleFiles(Array.from($event.target.files))"
        >

        <p>Drag & Drop or Click to Upload</p>
    </div>

    <div x-show="files.length" class="flex flex-wrap gap-4 mt-4">
        <template x-for="(file,index) in files" :key="index">
            <div class="relative border rounded p-2">
                <template x-if="file.type==='image'">
                    <img :src="file.url" class="h-16 w-16 object-cover rounded">
                </template>

                <template x-if="file.type!=='image'">
                    <div class="h-16 w-16 flex flex-col items-center justify-center">
                        <svg class="w-10 h-10 text-neutral-500"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M7 7V3h10v4m-10 0h10m-10 0v14h10V7"/>
                        </svg>

                        <p class="text-xs mt-2 truncate line-clamp-1 w-16"
                           x-text="file.name"></p>
                    </div>
                </template>

                <button
                    type="button"
                    @click.stop="removeFile(index)"
                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6"
                >
                    ×
                </button>
            </div>
        </template>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {

    Alpine.data('fileUploader', (config = {}) => ({

        isDragging: false,

        files: [],

        multiple: config.multiple || false,

        init() {

            if (!config.existing) return;

            if (Array.isArray(config.existing)) {

                config.existing.forEach(file => {
                    this.files.push({
                        name: file.name ?? '',
                        url: file.url,
                        type: this.getFileType(file.url),
                        existing: true
                    });
                });

            } else {

                this.files.push({
                    name: '',
                    url: config.existing,
                    type: this.getFileType(config.existing),
                    existing: true
                });

            }
        },

        handleDrop(event) {
            this.isDragging = false;
            this.handleFiles(
                Array.from(event.dataTransfer.files)
            );
        },

        handleFiles(selectedFiles) {

            let mapped = selectedFiles.map(file => ({
                file: file,
                name: file.name,
                url: URL.createObjectURL(file),
                type: this.detectType(file)
            }));

            if (!this.multiple) {

                this.files.forEach(item => {

                    if (!item.existing) {
                        URL.revokeObjectURL(item.url);
                    }

                });

                this.files = [mapped[0]];

            } else {

                this.files.push(...mapped);

            }
        },

        removeFile(index) {

            const file = this.files[index];

            if (!file.existing) {
                URL.revokeObjectURL(file.url);
            }

            this.files.splice(index, 1);
        },

        detectType(file) {

            if (file.type.startsWith('image/')) {
                return 'image';
            }

            if (file.type.startsWith('video/')) {
                return 'video';
            }

            if (file.type.startsWith('audio/')) {
                return 'audio';
            }

            return 'document';
        },

        getFileType(url) {

            const ext = url.split('.').pop().toLowerCase();

            if (
                ['jpg','jpeg','png','gif','svg','webp']
                .includes(ext)
            ) {
                return 'image';
            }

            if (
                ['mp4','avi','mov','webm','mkv']
                .includes(ext)
            ) {
                return 'video';
            }

            if (
                ['mp3','wav','ogg','m4a']
                .includes(ext)
            ) {
                return 'audio';
            }

            return 'document';
        }

    }));

});
</script>
@endpush
    