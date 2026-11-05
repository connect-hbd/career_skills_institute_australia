@props([
    'id' => 'datepicker-' . uniqid(),
    'name',
    'label' => null,
    'placeholder' => null,
    'mode' => 'single',
    'defaultDate' => null,
    'dateFormat' => 'm/d/Y',
])

<div
    x-data="{
        fp: null,
        loading: null,
        init() {
            this.$nextTick(() => {
                const createPicker = (flatpickr) => {
                    this.fp = flatpickr(this.$refs.input, {
                        mode: '{{ $mode }}',
                        static: true,
                        monthSelectorType: 'static',
                        dateFormat: '{{ $dateFormat }}',
                        defaultDate: @js(old($name, $defaultDate)),
                        allowInput: true,
                        clickOpens: true,
                    });
                };

                if (window.loadFlatpickr) {
                    this.loading = window.loadFlatpickr()
                        .then(createPicker)
                        .catch(() => {
                            this.fp = null;
                        });
                    return;
                }

                if (window.flatpickr) {
                    createPicker(window.flatpickr);
                }
            });
        },
        destroy() {
            if (this.fp) {
                this.fp.destroy();
                this.fp = null;
            }
        }
    }"
    x-init="init()"
    x-on:destroy.window="destroy()"
>
    @if($label)
        <label
            for="{{ $id }}"
            class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400"
        >
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input
            x-ref="input"
            id="{{ $id }}"
            name="{{ $name }}"
            type="text"
            placeholder="{{ $placeholder ?? strtoupper($dateFormat) }}"
            autocomplete="off"
            {{ $attributes->merge([
                'class' => 'h-11 w-full rounded-lg border border-neutral-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-neutral-800 placeholder:text-neutral-400 shadow-theme-xs focus:border-brand-300 focus:ring-1 focus:ring-brand-500/20 focus:outline-hidden dark:border-neutral-700 dark:bg-neutral-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800'
            ]) }}
        />

        <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-neutral-500 dark:text-neutral-400">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none">
                <path
                    fill="currentColor"
                    d="M7 2a1 1 0 0 1 1 1v1h8V3a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1V3a1 1 0 0 1 1-1Zm12 8H5v9h14v-9Z"/>
            </svg>
        </span>
    </div>

    @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
