<div class="bg-white dark:bg-neutral-900 sm:rounded-2xl shadow-xs border-0 sm:border border-neutral-200/80 dark:border-neutral-800 overflow-hidden">

    {{-- Card Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-neutral-100 dark:border-neutral-800 py-5 mb-5 px-4 sm:px-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-950/50 dark:text-brand-400">
                <iconify-icon icon="lucide:id-card" class="text-xl"></iconify-icon>
            </div>
            <div>
                <h3 class="text-lg font-bold text-neutral-900 dark:text-white">Personal & Passport Details</h3>
                <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-0.5">Update identity parameters, contact details, and document validation info.</p>
            </div>
        </div>
    </div>

    <form action="{{ route('student.account.personal-information.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="px-5 sm:px-8 dark:bg-neutral-900 space-y-8 mb-6">

            {{-- ── Personal Information ────────────────────────────────────────── --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <iconify-icon icon="lucide:user" class="text-brand-500 text-base"></iconify-icon>
                    <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">Personal Information</h4>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- Date of Birth --}}
                    <div>
                        <x-form.form-date id="date_of_birth" name="date_of_birth" label="Date of Birth"
                            placeholder="YYYY-MM-DD"
                            :value="old('date_of_birth', $student->date_of_birth?->format('Y-m-d'))"
                            required />                        
                    </div>

                    {{-- Gender --}}
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Gender <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:users" class="text-sm"></iconify-icon>
                            </div>
                            <select name="gender"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border appearance-none
                                    {{ $errors->has('gender') ? 'border-rose-400 bg-rose-50/30 dark:bg-rose-950/20' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                <option value="">Select Gender</option>
                                <option value="Female"  @selected(old('gender', $student->gender) === 'Female')>Female</option>
                                <option value="Male"    @selected(old('gender', $student->gender) === 'Male')>Male</option>
                                <option value="Other"   @selected(old('gender', $student->gender) === 'Other')>Other</option>
                            </select>
                        </div>
                        @error('gender')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nationality --}}
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Nationality <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:globe" class="text-sm"></iconify-icon>
                            </div>
                            <input type="text" name="nationality"
                                value="{{ old('nationality', $student->nationality) }}"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                    {{ $errors->has('nationality') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                placeholder="Enter nationality">
                        </div>
                        @error('nationality')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Place of Birth --}}
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Place of Birth <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                            </div>
                            <input type="text" name="place_of_birth"
                                value="{{ old('place_of_birth', $student->place_of_birth) }}"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                    {{ $errors->has('place_of_birth') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                placeholder="City, Country">
                        </div>
                        @error('place_of_birth')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Marital Status --}}
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Marital Status <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:heart" class="text-sm"></iconify-icon>
                            </div>
                            <select name="marital_status"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border appearance-none
                                    {{ $errors->has('marital_status') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
                                <option value="">Select Marital Status</option>
                                <option value="Single"   @selected(old('marital_status', $student->marital_status) === 'Single')>Single</option>
                                <option value="Married"  @selected(old('marital_status', $student->marital_status) === 'Married')>Married</option>
                                <option value="Divorced" @selected(old('marital_status', $student->marital_status) === 'Divorced')>Divorced</option>
                                <option value="Widowed"  @selected(old('marital_status', $student->marital_status) === 'Widowed')>Widowed</option>
                            </select>
                        </div>
                        @error('marital_status')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- ── Passport Details ────────────────────────────────────────────── --}}
            <div class="space-y-4">
                <div class="flex items-center gap-2 border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <iconify-icon icon="lucide:file-text" class="text-brand-500 text-base"></iconify-icon>
                    <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">Passport Document Details</h4>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">

                    {{-- Passport Number --}}
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Passport Number
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:hash" class="text-sm"></iconify-icon>
                            </div>
                            <input type="text" name="passport_number"
                                value="{{ old('passport_number', $student->passport_number) }}"
                                class="w-full pl-10 pr-4 py-2.5 placeholder:text-neutral-400 rounded-lg border uppercase
                                    {{ $errors->has('passport_number') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                placeholder="e.g. A08923411">
                        </div>
                        @error('passport_number')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Issue Date --}}
                    <div>
                        <x-form.form-date id="passport_issue_date" name="passport_issue_date" label="Issue Date"
                            :value="old('passport_issue_date', $student->passport_issue_date?->format('Y-m-d'))"
                            required />                     
                    </div>

                    {{-- Expiry Date --}}
                    <div>
                        <x-form.form-date id="passport_expiry_date" name="passport_expiry_date" label="Expiry Date"
                            :value="old('passport_expiry_date', $student->passport_expiry_date?->format('Y-m-d'))"
                            required />                     
                    </div>

                </div>
            </div>

            {{-- ── Address Details ─────────────────────────────────────────────── --}}
            <div class="space-y-4" x-data="{
                sameAddress: @js((bool) old('same_address', $sameAddress))
            }">

                <div class="flex items-center justify-between border-b border-neutral-100 pb-3 dark:border-neutral-800">
                    <div class="flex items-center gap-2">
                        <iconify-icon icon="lucide:home" class="text-brand-500 text-base"></iconify-icon>
                        <h4 class="text-xs font-bold text-neutral-900 uppercase tracking-wider dark:text-white">Address Information</h4>
                    </div>
                </div>

                @include('student.profile.partial.country-select', [
                    'prefix'          => 'current',
                    'selectedCountry' => old('current_country_id', $currentAddress?->country_id),
                    'selectedCity'    => old('current_city_id',    $currentAddress?->city_id),
                ])

                <div class="grid grid-cols-1 gap-5">

                    {{-- Current Address --}}
                    <div>
                        <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                            Current Residential Address <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-0 pl-3.5 flex items-start pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                            </div>
                            <textarea name="current_address" rows="2"
                                class="w-full pl-10 pr-4 py-2.5 placeholder:text-neutral-400 rounded-lg border
                                    {{ $errors->has('current_address') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                placeholder="Street, City, Postal Code">{{ old('current_address', $currentAddress?->address) }}</textarea>
                        </div>
                        @error('current_address')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Same Address Checkbox --}}
                    <div class="flex items-center gap-2.5">
                        <input type="checkbox" id="same_address" name="same_address" value="1"
                            x-model="sameAddress"
                            class="h-4 w-4 rounded-md border-neutral-300 text-brand-600 focus:ring-brand-500 dark:border-neutral-700 dark:bg-neutral-800">
                        <label for="same_address"
                            class="text-xs font-medium text-neutral-700 dark:text-neutral-300 cursor-pointer select-none">
                            Permanent address is the same as current residential address
                        </label>
                    </div>

                    {{-- Permanent Address (hidden when same) --}}
                    <div x-show="!sameAddress" x-transition class="space-y-1.5">
                        @include('student.profile.partial.country-select', [
                            'prefix'          => 'permanent',
                            'selectedCountry' => old('permanent_country_id', $permanentAddress?->country_id),
                            'selectedCity'    => old('permanent_city_id',    $permanentAddress?->city_id),
                        ])

                        <div class="relative mt-6">
                            <div class="absolute top-3 left-0 pl-3.5 flex items-start pointer-events-none text-neutral-400">
                                <iconify-icon icon="lucide:building-2" class="text-sm"></iconify-icon>
                            </div>
                            <textarea name="permanent_address" rows="2"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border placeholder:text-neutral-400
                                    {{ $errors->has('permanent_address') ? 'border-rose-400 bg-rose-50/30' : 'border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700' }}
                                    text-xs font-medium text-neutral-800 dark:text-neutral-200
                                    focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                placeholder="Street, City, Postal Code">{{ old('permanent_address', $permanentAddress?->address) }}</textarea>
                        </div>
                        @error('permanent_address')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- ── Action Buttons ──────────────────────────────────────────────── --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-neutral-100 dark:border-neutral-800">
                <button type="button" onclick="window.location.reload()"
                    class="px-4 py-2.5 rounded-xl text-xs font-semibold text-neutral-600 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors">
                    Discard
                </button>
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-600 text-white text-xs font-bold shadow-xs hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 active:scale-[0.98] transition-all">
                    <iconify-icon icon="lucide:check" class="text-base"></iconify-icon>
                    Save & Continue
                </button>
            </div>

        </div>
    </form>
</div>
