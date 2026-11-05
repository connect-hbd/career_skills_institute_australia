@props([
    'id' => 'datepicker-' . uniqid(),
    'name',
    'label' => null,
    'placeholder' => null,
    'mode' => 'single',
    'defaultDate' => null,
    'dateFormat' => 'Y-m-d',
    'required' => false,
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
                        static: false,
                        monthSelectorType: 'static',
                        dateFormat: '{{ $dateFormat }}',
                        defaultDate: @js(old($name, $defaultDate)),
                        allowInput: true,
                        clickOpens: true,
                        appendTo: document.body,
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
    class="relative"
>
    @if($label)
        <label for="{{ $id }}" class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
            {{ $label }}
            @if($required)
                <span class="text-rose-500"> * </span>
            @endif
        </label>
    @endif

    <div class="relative flex items-center">
        <!-- Left Calendar Icon -->
        <div class="absolute left-3.5 z-10 flex items-center pointer-events-none text-neutral-400 dark:text-neutral-500">
            <iconify-icon icon="lucide:calendar" class="text-sm"></iconify-icon>
        </div>

        <input
            x-ref="input"
            id="{{ $id }}"
            name="{{ $name }}"
            type="text"
            placeholder="{{ $placeholder ?? strtoupper($dateFormat) }}"
            autocomplete="off"
            {{ $attributes->merge([
                'class' => 'w-full pl-10 pr-10 py-2.5 rounded-lg border border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700 text-xs font-medium text-neutral-800 dark:text-neutral-200 focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all placeholder:text-neutral-400 dark:placeholder:text-neutral-500'
            ]) }}
        />

        <!-- Right Dropdown Arrow Icon -->
        <div class="absolute right-3.5 z-10 flex items-center pointer-events-none text-neutral-400 dark:text-neutral-500">
            <iconify-icon icon="lucide:chevron-down" class="text-sm"></iconify-icon>
        </div>
    </div>

    @error($name)
        <p class="mt-1 text-xs text-rose-500 font-medium">{{ $message }}</p>
    @enderror
</div>