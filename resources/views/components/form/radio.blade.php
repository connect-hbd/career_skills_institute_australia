{{-- 
@props(['id', 'name', 'value', 'label', 'checked' => false])

<div x-data="{ 
    selected: @js($checked),
    groupName: '{{ $name }}',
    value: '{{ $value }}',
    init() {
        // Listen for changes from other radios in the same group
        document.addEventListener('radio-changed', (e) => {
            if (e.detail.name === this.groupName && e.detail.value !== this.value) {
                this.selected = false;
            }
        });
        
        // Check if this radio should be selected on init (e.g., old input)
        const current = document.querySelector(`input[name='${this.groupName}']:checked`);
        if (current) {
            this.selected = current.value === this.value;
        }
    },
    toggle() {
        this.selected = true;
        // Dispatch to sync other radios in same group
        document.dispatchEvent(new CustomEvent('radio-changed', {
            detail: { name: this.groupName, value: this.value }
        }));
    }
}" class="inline-block">
    <label :for="'{{ $id }}'" class="flex cursor-pointer items-center gap-3 select-none">
        <div class="relative">
            <input 
                type="radio" 
                id="{{ $id }}" 
                name="{{ $name }}" 
                value="{{ $value }}"
                class="sr-only"
                :checked="selected"
                @change="toggle()"
            />
            <div :class="selected 
                ? 'border-brand-500 bg-brand-500' 
                : 'bg-transparent border-neutral-300 dark:border-neutral-700'"
                class="flex h-5 w-5 items-center justify-center rounded-full border-[1.25px] transition-colors duration-200 hover:border-brand-500 dark:hover:border-brand-500">
                
                <span class="h-2 w-2 rounded-full transition-colors duration-200"
                    :class="selected ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'">
                </span>
            </div>
        </div>
        
        <span class="text-sm font-medium text-neutral-700 dark:text-neutral-400">
            {{ $label }}
        </span>
    </label>
</div> --}}

<!-- resources/views/components/form/radio.blade.php -->
@props([
    'id', 
    'name', 
    'value', 
    'label', 
    'checked' => false,
    'required' => false
])

<div x-data="{ 
    selected: @js($checked),
    groupName: '{{ $name }}',
    value: '{{ $value }}',
    init() {
        const current = document.querySelector(`input[name='${this.groupName}']:checked`);
        if (current) {
            this.selected = current.value === this.value;
        }
        
        document.addEventListener('radio-changed', (e) => {
            if (e.detail.name === this.groupName && e.detail.value !== this.value) {
                this.selected = false;
            }
        });
    },
    toggle() {
        this.selected = true;
        document.dispatchEvent(new CustomEvent('radio-changed', {
            detail: { name: this.groupName, value: this.value }
        }));
    }
}" class="inline-block">
    <label :for="'{{ $id }}'" class="flex cursor-pointer items-center gap-3 select-none">
        <div class="relative">
            <input 
                type="radio" 
                id="{{ $id }}" 
                name="{{ $name }}" 
                value="{{ $value }}"
                class="sr-only"
                :checked="selected"
                @change="toggle()"
                {{ $required ? 'required' : '' }}
            />
            
            <div :class="selected 
                ? 'border-brand-500 bg-brand-500' 
                : 'bg-transparent border-neutral-300 dark:border-neutral-700'"
                class="flex h-5 w-5 items-center justify-center rounded-full border-[1.25px] transition-colors duration-200 hover:border-brand-500 dark:hover:border-brand-500">
                
                <span class="h-2 w-2 rounded-full transition-colors duration-200"
                    :class="selected ? 'bg-white' : 'bg-white dark:bg-[#171f2e]'">
                </span>
            </div>
        </div>
        
        <span class="text-sm font-medium text-neutral-700 dark:text-neutral-400">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </span>
    </label>
</div>