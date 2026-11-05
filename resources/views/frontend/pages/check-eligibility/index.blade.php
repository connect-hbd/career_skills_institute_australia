@extends('frontend.layouts.app')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 lg:py-12" x-data="eligibilityForm()">

        <!-- =========================================================
                 FORM CARD
            ========================================================== -->
        <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white/90 shadow-xl backdrop-blur-md">

            <!-- Header -->
            <div class="border-b border-slate-100 bg-slate-50/50 p-6 sm:p-8">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <span
                            class="inline-flex items-center rounded-full bg-brand-50 px-2.5 py-1 text-xs font-semibold text-brand-700 ring-1 ring-inset ring-brand-700/10">
                            Eligibility Assessment
                        </span>
                        <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                            Let's get started
                        </h2>
                    </div>

                    <div class="text-right">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Step</span>
                        <p class="text-lg font-bold text-slate-900" x-text="`${step} of 3`"></p>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="mt-6">
                    <div class="grid grid-cols-3 gap-2">
                        <template x-for="number in 3" :key="number">
                            <div class="h-1.5 rounded-full transition-all duration-500 ease-out"
                                :class="number <= step ? 'bg-brand-600 shadow-sm shadow-brand-500/30' : 'bg-slate-200/80'">
                            </div>
                        </template>
                    </div>

                    <div class="mt-2.5 flex justify-between text-xs font-medium text-slate-500">
                        <span :class="step >= 1 ? 'text-brand-600 font-semibold' : ''">About you</span>
                        <span :class="step >= 2 ? 'text-brand-600 font-semibold' : ''">Experience</span>
                        <span :class="step >= 3 ? 'text-brand-600 font-semibold' : ''">Confirm</span>
                    </div>
                </div>
            </div>

            <!-- =====================================================
                     FORM CONTENT
                ====================================================== -->
            <form class="p-6 sm:p-8" method="POST" action="{{ route('eligibility.submit') }}" @submit.prevent="submitForm">
                @csrf

                <!-- Global Error Alert -->
                <template x-if="formError">
                    <div class="mb-6 flex gap-3 rounded-2xl border border-rose-200 bg-rose-50/80 p-4 text-sm text-rose-800 shadow-sm"
                        role="alert">
                        <svg class="h-5 w-5 shrink-0 text-rose-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v4m0 4h.01M10.3 3.9l-8 14A2 2 0 004 21h16a2 2 0 001.7-3.1l-8-14a2 2 0 00-3.4 0z" />
                        </svg>
                        <span x-text="formError" class="font-medium"></span>
                    </div>
                </template>

                <!-- =================================================
                         STEP 1
                    ================================================== -->
                <div x-show="step === 1" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                    class="space-y-5">

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <!-- First Name -->
                        <div>
                            <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                                First Name <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" x-model="formData.first_name" autocomplete="given-name"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm font-medium text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                                placeholder="John">
                            <template x-if="errors.first_name">
                                <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.first_name[0]"></p>
                            </template>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                                Last Name <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" x-model="formData.last_name" autocomplete="family-name"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm font-medium text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                                placeholder="Doe">
                            <template x-if="errors.last_name">
                                <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.last_name[0]"></p>
                            </template>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            Email Address <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" x-model="formData.email" autocomplete="email"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm font-medium text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                            placeholder="john@example.com">
                        <template x-if="errors.email">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.email[0]"></p>
                        </template>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            Phone Number <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" x-model="formData.phone" autocomplete="tel"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm font-medium text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                            placeholder="0400 000 000">
                        <template x-if="errors.phone">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.phone[0]"></p>
                        </template>
                    </div>

                </div>

                <!-- =================================================
                         STEP 2
                    ================================================== -->
                <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                    class="space-y-5">

                    <!-- Industry -->
                    <div>
                        <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            Which Industry are you interested in? <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <select x-model="formData.industry" @change="formData.qualification = ''"
                                class="w-full appearance-none rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 pr-10 text-sm font-medium text-slate-900 outline-none transition-all duration-200 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10">
                                <option value="">Select Industry</option>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry['id'] }}">{{ $industry['name'] }}</option>
                                @endforeach
                            </select>
                         
                        </div>
                        <template x-if="errors.industry">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.industry[0]"></p>
                        </template>
                    </div>

                    <!-- Qualification -->
                    <div>
                        <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            What qualification are you looking for? <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <select x-model="formData.qualification" :disabled="!formData.industry"
                                class="w-full appearance-none rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 pr-10 text-sm font-medium text-slate-900 outline-none transition-all duration-200 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10 disabled:cursor-not-allowed disabled:bg-slate-100 disabled:text-slate-400">
                                <option value=""
                                    x-text="formData.industry ? 'Select a qualification' : 'Select an industry first'">
                                </option>
                                <template x-for="course in availableCourses" :key="course.code">
                                    <option :value="course.name" x-text="`${course.code} — ${course.name}`"></option>
                                </template>
                            </select>                         
                        </div>
                        <p x-show="formData.industry && !availableCourses.length" class="mt-1.5 text-xs text-slate-500">
                            No qualifications are currently available for this industry.
                        </p>
                        <template x-if="errors.qualification">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.qualification[0]"></p>
                        </template>
                    </div>

                    <!-- Experience Years -->
                    <div>
                        <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            Years of relevant work experience? <span class="text-rose-500">*</span>
                        </label>
                        <input type="number" min="0" max="50" x-model.number="formData.experience_years"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 text-sm font-medium text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                            placeholder="3">
                        <template x-if="errors.experience_years">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.experience_years[0]"></p>
                        </template>
                    </div>

                </div>

                <!-- =================================================
                         STEP 3
                    ================================================== -->
                <div x-show="step === 3" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                    class="space-y-5">

                    <!-- Formal Qualification Radio Group -->
                    <div>
                        <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            Do you have any formal qualifications? <span class="text-rose-500">*</span>
                        </label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 text-sm text-slate-700">
                                <input type="radio" :value="1"
                                    x-model.number="formData.has_formal_qualification" class="h-4 w-4">
                                <span>Yes</span>
                            </label>

                            <label class="flex items-center gap-2 text-sm text-slate-700">
                                <input type="radio" :value="0"
                                    x-model.number="formData.has_formal_qualification" class="h-4 w-4">
                                <span>No</span>
                            </label>
                        </div>
                        <template x-if="errors.has_formal_qualification">
                            <p class="mt-1.5 text-xs font-medium text-rose-500"
                                x-text="errors.has_formal_qualification[0]"></p>
                        </template>
                    </div>

                    <!-- State -->
                    <div>
                        <label class="mb-1.5 block text-xs font-bold uppercase tracking-wide text-slate-700">
                            What state do you live in? <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <select x-model="formData.state"
                                class="w-full appearance-none rounded-2xl border border-slate-200 bg-slate-50/50 px-4 py-3 pr-10 text-sm font-medium text-slate-900 outline-none transition-all duration-200 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10">
                                <option value="">Select State</option>
                                @foreach (\App\Models\EligibilityApplication::STATES as $code => $stateName)
                                    <option value="{{ $code }}">{{ $stateName }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                        <template x-if="errors.state">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.state[0]"></p>
                        </template>
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="pt-2">
                        <label
                            class="group flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200/80 bg-slate-50/50 p-4 transition-all duration-200 hover:bg-slate-100/50">
                            <input type="checkbox" x-model="formData.terms_accepted"
                                class="mt-1 h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                            <span class="text-xs leading-5 text-slate-600 group-hover:text-slate-900">
                                I agree to the privacy policy and consent to being contacted regarding my eligibility
                                assessment.
                            </span>
                        </label>
                        <template x-if="errors.terms_accepted">
                            <p class="mt-1.5 text-xs font-medium text-rose-500" x-text="errors.terms_accepted[0]"></p>
                        </template>
                    </div>

                </div>

                <!-- =================================================
                         ACTIONS
                    ================================================== -->
                <div class="mt-8 flex items-center justify-between border-t border-slate-100 pt-6">

                    <!-- Back Button -->
                    <button type="button" x-show="step > 1" x-cloak @click="previousStep()"
                        class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-600 transition-all duration-200 hover:bg-slate-100 hover:text-slate-900">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span>Back</span>
                    </button>

                    <div x-show="step === 1"></div>

                    <!-- Next / Submit Button -->
                    <button type="button" :disabled="loading" @click="step < 3 ? nextStep() : submitForm()"
                        class="ml-auto inline-flex items-center gap-2 rounded-2xl bg-brand-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-600/25 transition-all duration-200 hover:bg-brand-700 hover:shadow-brand-600/35 focus:outline-none focus:ring-4 focus:ring-brand-500/20 disabled:cursor-not-allowed disabled:opacity-50">

                        <!-- Spinner -->
                        <svg x-show="loading" class="h-4 w-4 animate-spin text-white" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>

                        <span x-text="loading ? 'Processing...' : (step === 3 ? 'Submit Assessment' : 'Next Step')"></span>

                        <!-- Next Arrow -->
                        <svg x-show="!loading && step < 3" class="h-4 w-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>

                        <!-- Submit Check Icon -->
                        <svg x-show="!loading && step === 3" class="h-4 w-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>

                </div>

            </form>
        </div>

    <!-- =========================================================
             SUCCESS MODAL
        ========================================================== -->
    <div x-cloak x-show="successModal" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/60 p-4 backdrop-blur-md" role="dialog"
        aria-modal="true" aria-labelledby="success-title" @keydown.escape.window="returnToStart()">

        <div x-show="successModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            class="w-full max-w-md transform overflow-hidden rounded-3xl bg-white p-8 text-center shadow-2xl transition-all">

            <div
                class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 ring-8 ring-emerald-50/50">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <p class="mt-6 text-xs font-bold uppercase tracking-wider text-emerald-600">
                Application Received
            </p>

            <h3 id="success-title" class="mt-1 text-2xl font-bold tracking-tight text-slate-900">
                Thank you for getting in touch.
            </h3>

            <p class="mt-3 text-sm leading-relaxed text-slate-600" x-text="successMessage"></p>

            <p class="mt-4 text-xs font-medium text-slate-400">
                Returning to the first step shortly…
            </p>

            <button type="button" @click="returnToStart()"
                class="mt-6 w-full rounded-2xl bg-brand-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-600/25 transition-all duration-200 hover:bg-brand-700">
                Start a new check
            </button>
        </div>
    </div>

    <!-- =============================================================
             ALPINE APPLICATION (UNCHANGED)
        ============================================================= -->
    <script>
        function eligibilityForm() {
            return {
                step: 1,
                loading: false,
                successModal: false,
                successMessage: '',
                errors: {},
                formError: '',
                coursesByIndustry: @js($coursesByIndustry),

                formData: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    industry: '',
                    qualification: '',
                    experience_years: '',
                    experience_location: '',
                    has_formal_qualification: null,
                    state: '',
                    terms_accepted: false
                },

                get availableCourses() {
                    return this.coursesByIndustry[this.formData.industry] || [];
                },

                nextStep() {
                    if (this.validateCurrentStep() && this.step < 3) {
                        this.step++;
                    }
                },

                previousStep() {
                    this.errors = {};
                    this.formError = '';

                    if (this.step > 1) {
                        this.step--;
                    }
                },

                validateCurrentStep() {
                    this.errors = {};
                    this.formError = '';

                    const required = (field, message) => {
                        if (this.formData[field] === '' || this.formData[field] === null || this.formData[field] === false) {
                            this.errors[field] = [message];
                        }
                    };

                    if (this.step === 1) {
                        required('first_name', 'Please enter your first name.');
                        required('last_name', 'Please enter your last name.');
                        required('email', 'Please enter your email address.');
                        required('phone', 'Please enter your phone number.');

                        if (this.formData.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.formData.email)) {
                            this.errors.email = ['Please enter a valid email address.'];
                        }
                    }

                    if (this.step === 2) {
                        required('industry', 'Please select an industry.');
                        required('qualification', 'Please select a qualification.');
                        required('experience_years', 'Please enter your years of experience.');

                        if (this.formData.experience_years !== '' &&
                            (!Number.isInteger(Number(this.formData.experience_years)) || Number(this.formData.experience_years) < 0 || Number(this.formData.experience_years) > 50)) {
                            this.errors.experience_years = ['Enter a whole number between 0 and 50.'];
                        }
                    }

                    if (this.step === 3) {
                        if (this.formData.has_formal_qualification === null) {
                            this.errors.has_formal_qualification = ['Please choose Yes or No.'];
                        }
                        required('state', 'Please select your state or territory.');
                        if (!this.formData.terms_accepted) {
                            this.errors.terms_accepted = ['You must accept the privacy policy to continue.'];
                        }
                    }

                    if (Object.keys(this.errors).length) {
                        this.formError = 'Please correct the highlighted fields before continuing.';
                        return false;
                    }

                    return true;
                },

                async submitForm() {
                    if (!this.validateCurrentStep()) {
                        return;
                    }

                    this.loading = true;

                    const csrfToken = document.querySelector(
                        'input[name="_token"]'
                    )?.value;

                    try {
                        const response = await fetch(
                            "{{ route('eligibility.submit') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken,
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: JSON.stringify(this.formData)
                            }
                        );

                        const isJson = response.headers.get('content-type')?.includes('application/json');
                        const data = isJson ? await response.json() : {};

                        if (response.ok && data.success) {
                            this.successMessage = data.message;
                            this.successModal = true;
                            window.setTimeout(() => this.resetForm(), 4000);
                            return;
                        }

                        if (response.status === 422) {
                            this.errors = data.errors || {};
                            this.formError = data.message || '';
                            return;
                        }

                        if (response.status === 419) {
                            this.formError =
                                'Your session has expired. Please refresh the page and try again.';
                            return;
                        }

                        this.formError =
                            data.message ||
                            'Something went wrong. Please try again.';

                    } catch (error) {
                        console.error(error);
                        this.formError =
                            'Unable to connect to the server. Please try again.';
                    } finally {
                        this.loading = false;
                    }
                },

                returnToStart() {
                    this.resetForm();
                },

                resetForm() {
                    this.step = 1;
                    this.loading = false;
                    this.successModal = false;
                    this.successMessage = '';
                    this.errors = {};
                    this.formError = '';
                    this.formData = {
                        first_name: '',
                        last_name: '',
                        email: '',
                        phone: '',
                        industry: '',
                        qualification: '',
                        experience_years: '',
                        experience_location: '',
                        has_formal_qualification: null,
                        state: '',
                        terms_accepted: false
                    };
                }
            }
        }
    </script>
</div>
@endsection
