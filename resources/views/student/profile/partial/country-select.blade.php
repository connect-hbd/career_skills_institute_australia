@php
    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | current   => current_country_id / current_city_id / current_post_code
    | permanent => permanent_country_id / permanent_city_id / permanent_post_code
    |
    */

    $prefix = $prefix ?? 'current';

    $countryField = "{$prefix}_country_id";
    $cityField = "{$prefix}_city_id";
    $postCodeField = "{$prefix}_post_code";

    $selectedCountry = old($countryField, $selectedCountry ?? null);

    $selectedCity = old($cityField, $selectedCity ?? null);

    $selectedPostCode = old($postCodeField, $selectedPostCode ?? null);
@endphp

<div x-data="{
    selectedCountry: @js($selectedCountry),
    selectedCity: @js($selectedCity),
    cities: @js($cities),

    get filteredCities() {
        return this.cities.filter(
            city => String(city.country_id) === String(this.selectedCountry)
        );
    },

    countryChanged() {
        const cityExists = this.filteredCities.some(
            city => String(city.id) === String(this.selectedCity)
        );

        if (!cityExists) {
            this.selectedCity = '';
        }
    }
}" x-init="countryChanged()" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

    {{-- Country --}}
    <div>
        <label for="{{ $countryField }}"
            class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
            Country
            <span class="text-rose-500">*</span>
        </label>

        <div class="relative">

            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-neutral-400">
                <iconify-icon icon="lucide:globe" class="text-sm"></iconify-icon>
            </div>

            <select id="{{ $countryField }}" name="{{ $countryField }}" x-model="selectedCountry"
                @change="countryChanged()"
                class="w-full appearance-none rounded-lg border border-neutral-200 bg-neutral-50/30 py-2.5 pl-10 pr-4 text-xs font-medium text-neutral-800 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-neutral-700 dark:bg-neutral-800/40 dark:text-neutral-200 dark:focus:bg-neutral-900">
                <option value="">
                    Select Country
                </option>

                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>

        </div>

        @error($countryField)
            <p class="mt-1.5 text-xs font-medium text-rose-600">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- City --}}
    <div>
        <label for="{{ $cityField }}"
            class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
            City
            <span class="text-rose-500">*</span>
        </label>

        <div class="relative">

            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-neutral-400">
                <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
            </div>

            <select id="{{ $cityField }}" name="{{ $cityField }}" x-model="selectedCity"
                :disabled="!selectedCountry"
                class="w-full appearance-none rounded-lg border border-neutral-200 bg-neutral-50/30 py-2.5 pl-10 pr-4 text-xs font-medium text-neutral-800 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 disabled:cursor-not-allowed disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800/40 dark:text-neutral-200 dark:focus:bg-neutral-900">

                <option value="">
                    Select City
                </option>

                <template x-for="city in filteredCities" :key="city.id">
                    <option :value="city.id" x-text="city.name"></option>
                </template>

            </select>

        </div>

        @error($cityField)
            <p class="mt-1.5 text-xs font-medium text-rose-600">
                {{ $message }}
            </p>
        @enderror
    </div>


    {{-- Post Code --}}
    <div>
        <label for="{{ $postCodeField }}"
            class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
            Post Code
            <span class="text-rose-500">*</span>
        </label>

        <div class="relative">

            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-neutral-400">
                <iconify-icon icon="lucide:mail" class="text-sm"></iconify-icon>
            </div>

            <input type="text" id="{{ $postCodeField }}" name="{{ $postCodeField }}"
                value="{{ $selectedPostCode }}"
                class="w-full rounded-lg border border-neutral-200 bg-neutral-50/30 py-2.5 pl-10 pr-4 text-xs font-medium text-neutral-800 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20 dark:border-neutral-700 dark:bg-neutral-800/40 dark:text-neutral-200 dark:focus:bg-neutral-900"
                placeholder="1213">

        </div>

        @error($postCodeField)
            <p class="mt-1.5 text-xs font-medium text-rose-600">
                {{ $message }}
            </p>
        @enderror
    </div>

</div>