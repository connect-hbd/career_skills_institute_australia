<div>
    @if($label)
        <label
            for="{{ $name }}"
            class="mb-1.5 block text-sm font-medium text-neutral-700 dark:text-neutral-400"
        >
            {{ $label }}
        </label>
    @endif

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => '
                dark:bg-dark-900
                shadow-theme-xs
                focus:border-brand-300
                focus:ring-brand-500/10
                dark:focus:border-brand-800
                w-full
                rounded-lg
                border
                border-neutral-300
                bg-transparent
                px-4
                py-2.5
                text-sm
                text-neutral-800
                placeholder:text-neutral-400
                focus:ring-3
                focus:outline-hidden
                dark:border-neutral-700
                dark:bg-neutral-900
                dark:text-white/90
                dark:placeholder:text-white/30
            '
        ]) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="mt-1 text-sm text-red-500">
            {{ $message }}
        </p>
    @enderror
</div>