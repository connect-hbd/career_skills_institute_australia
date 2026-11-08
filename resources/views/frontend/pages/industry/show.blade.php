@extends('frontend.layouts.app')

@php
    /*
    |--------------------------------------------------------------------------
    | SAFE QUALIFICATION DATA
    |--------------------------------------------------------------------------
    */

    $qualification = is_array($qualification ?? null) ? $qualification : [];

    $get = fn($key, $default = null) => data_get($qualification, $key, $default);

    $hasValue = function ($value) {
        if (is_string($value)) {
            return trim($value) !== '';
        }

        if (is_array($value)) {
            return count($value) > 0;
        }

        return $value !== null;
    };

    $code = $get('code');
    $name = $get('name');
    $level = $get('level');
    $industry = $get('industry_slug');

    $heroDescription = $get('hero_description');
    $shortDescription = $get('short_description');

    $description = $hasValue($heroDescription) ? $heroDescription : $shortDescription;

    $overview = $get('overview');

    $keyInformation = $get('key_information', []);
    $keyInformation = is_array($keyInformation) ? $keyInformation : [];

    $informationLabels = [
        'duration' => 'Duration',
        'delivery' => 'Delivery',
        'usage_recommendation' => 'Usage Recommendation',
        'extent' => 'Qualification Structure',
        'start_date' => 'Start Date',
        'end_date' => 'End Date',
        'delivery_notification' => 'Delivery Information',
    ];

    $availableInformation = collect($informationLabels)->filter(function ($label, $key) use (
        $keyInformation,
        $hasValue,
    ) {
        return $hasValue(data_get($keyInformation, $key));
    });

    // Providers
    $providers = $get('providers', []);
    $providers = is_array($providers) ? $providers : [];

    $providers = collect($providers)
        ->filter(function ($provider) use ($hasValue) {
            return is_array($provider) && $hasValue(data_get($provider, 'name'));
        })
        ->values();

    // Graduate Outcomes: JSON contains an array of strings
    $graduateOutcomes = $get('graduate_outcomes', []);
    $graduateOutcomes = is_array($graduateOutcomes) ? $graduateOutcomes : [];

    $graduateOutcomes = collect($graduateOutcomes)
        ->filter(fn($item) => is_string($item) && trim($item) !== '')
        ->values();

    // Career Pathways: JSON contains objects with title and description
    $careerPathways = $get('career_pathways', []);
    $careerPathways = is_array($careerPathways) ? $careerPathways : [];

    $careerPathways = collect($careerPathways)
        ->filter(function ($item) use ($hasValue) {
            return is_array($item) &&
                ($hasValue(data_get($item, 'title')) || $hasValue(data_get($item, 'description')));
        })
        ->values();

    // FAQ: supports string and array answers
    $faqs = $get('faq', []);
    $faqs = is_array($faqs) ? $faqs : [];

    $faqs = collect($faqs)
        ->filter(function ($item) use ($hasValue) {
            if (!is_array($item) || !$hasValue(data_get($item, 'question'))) {
                return false;
            }

            $answer = data_get($item, 'answer');

            if (is_array($answer)) {
                return collect($answer)->contains(fn($value) => is_string($value) && trim($value) !== '');
            }

            return is_string($answer) && trim($answer) !== '';
        })
        ->values();

    // Image
    $image = $get('image');

    $imageUrl = $hasValue($image)
        ? (filter_var($image, FILTER_VALIDATE_URL)
            ? $image
            : asset(ltrim($image, '/')))
        : null;

    // Official course URL
    $courseUrl = $get('course_url');

    $validCourseUrl =
        $hasValue($courseUrl) &&
        filter_var($courseUrl, FILTER_VALIDATE_URL) &&
        in_array(parse_url($courseUrl, PHP_URL_SCHEME), ['http', 'https']);

    $hasHeroContent = $hasValue($code) || $hasValue($name) || $hasValue($level) || $hasValue($description);

    $hasKeyInformation = $availableInformation->isNotEmpty() || $hasValue($code) || $hasValue($level);
@endphp

@section('title', $name ?: 'Qualification Details')

@section('content')

    {{-- =========================================================
    HERO + ASSESSMENT FORM
========================================================= --}}
    <section
        class="relative overflow-hidden bg-gradient-to-b from-brand-50 via-white to-brand-50/30 py-10 sm:py-12 lg:py-20">

        {{-- Background Ambient Elements --}}
        <div
            class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-secondary-100/40 blur-[80px] sm:-right-20 sm:-top-20 sm:h-96 sm:w-96 sm:blur-[120px]">
        </div>
        <div
            class="pointer-events-none absolute -bottom-16 -left-16 h-64 w-64 rounded-full bg-brand-100/50 blur-[80px] sm:-bottom-20 sm:-left-20 sm:h-96 sm:w-96 sm:blur-[120px]">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-14">

                {{-- LEFT CONTENT --}}
                <div class="order-1 space-y-5 sm:space-y-6 lg:col-span-7 lg:order-none">

                    {{-- Badge --}}
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-brand-200/80 bg-white/90 px-3.5 py-1.5 shadow-sm backdrop-blur-md sm:gap-2.5 sm:px-4">
                        <span class="flex h-5 w-5 items-center justify-center rounded-full bg-brand-100 text-brand-600">
                            <iconify-icon icon="lucide:award" class="text-xs"></iconify-icon>
                        </span>
                        <span
                            class="text-[10px] font-extrabold uppercase tracking-[0.15em] text-brand-700 sm:tracking-[0.2em]">
                            Nationally Recognised Qualification
                        </span>
                    </div>

                    {{-- Heading --}}
                    @if ($hasValue($name) || $hasValue($code))
                        <h1
                            class="text-xl font-black leading-[1.2] tracking-tight text-brand-950 sm:text-2xl md:text-3xl lg:text-4xl">
                            @if ($hasValue($code))
                                <span class="text-slate-800">{{ $code }} – </span>
                            @endif
                            @if ($hasValue($name))
                                <span class="text-brand-600">{{ $name }}</span>
                            @endif
                        </h1>
                    @endif

                    {{-- Level --}}
                    @if ($hasValue($level))
                        <div>
                            <span
                                class="inline-flex items-center gap-2 rounded-xl border border-brand-200/60 bg-brand-100/70 px-3 py-1.5 text-xs font-bold text-brand-800 shadow-xs sm:px-3.5 sm:py-2">
                                <iconify-icon icon="lucide:graduation-cap" class="text-base text-brand-600"></iconify-icon>
                                {{ $level }}
                            </span>
                        </div>
                    @endif

                    {{-- Description --}}
                    @if ($hasValue($description))
                        <p class="max-w-2xl text-sm leading-relaxed text-slate-600 sm:text-base">
                            {{ $description }}
                        </p>
                    @endif

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col gap-3 pt-1 sm:flex-row sm:flex-wrap sm:items-center sm:gap-4 sm:pt-2">

                        <a href="#assessment-form"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-3.5 text-sm font-extrabold text-white shadow-lg shadow-brand-500/25 transition duration-300
                              hover:scale-[1.02] hover:bg-brand-600 active:scale-95
                              sm:w-auto sm:gap-2.5 sm:px-7 sm:py-4">
                            <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                            <span>Price Match Guarantee - Inquire Now</span>
                        </a>

                        @if ($hasValue($overview))
                            <a href="#qualification-overview" aria-label="Learn more about qualification overview"
                                class="group inline-flex w-full items-center justify-center gap-2 rounded-xl border-2 border-secondary-500 bg-transparent px-5 py-3.5 text-sm font-bold text-secondary-800 transition-all duration-300
                                  hover:bg-secondary-500 hover:text-white hover:shadow-lg hover:shadow-secondary-500/20 active:scale-95
                                  sm:w-auto sm:px-6">
                                <iconify-icon icon="lucide:circle-help"
                                    class="text-lg text-secondary-600 transition-colors duration-300 group-hover:text-white">
                                </iconify-icon>
                                <span>Learn More</span>
                            </a>
                        @elseif($validCourseUrl)
                            <a href="{{ $courseUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-secondary-200 bg-white px-5 py-3.5 text-sm font-bold text-secondary-800 shadow-sm transition duration-300
                                  hover:border-secondary-300 hover:bg-secondary-50 active:scale-95
                                  sm:w-auto sm:px-6 sm:py-4">
                                <iconify-icon icon="lucide:external-link" class="text-lg text-secondary-600"></iconify-icon>
                                <span>Official Details</span>
                            </a>
                        @endif
                    </div>
                </div>

                {{-- RIGHT ASSESSMENT FORM --}}
                <div class="order-2 lg:col-span-5 lg:order-none" id="assessment-form">

                    <div
                        class="relative rounded-2xl border border-brand-100 bg-white p-5 text-slate-900 shadow-xl shadow-brand-950/5 sm:rounded-3xl sm:p-6 md:p-8">



                        <h2 class="text-lg font-black leading-snug text-brand-950 sm:text-xl md:text-2xl">
                            Start Free Assessment Today!
                        </h2>

                        <p class="mb-5 mt-1.5 text-xs font-medium text-slate-500 sm:mb-6">
                            Find out if you qualify for RPL in 60 seconds.
                        </p>

                        <form action="{{ url()->current() }}" method="POST" class="space-y-4">

                            @csrf

                            @if ($hasValue($code))
                                <input type="hidden" name="qualification_code" value="{{ $code }}">
                            @endif

                            @if ($hasValue($slug = $get('slug')))
                                <input type="hidden" name="qualification_slug" value="{{ $slug }}">
                            @endif

                            <div>
                                <label for="full_name"
                                    class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                    Full Name *
                                </label>
                                <input id="full_name" type="text" name="name" value="{{ old('name') }}"
                                    placeholder="e.g. John Doe" autocomplete="name" required
                                    class="w-full rounded-xl border border-brand-200/80 bg-brand-25/50 px-4 py-3 text-sm text-slate-900 transition placeholder:text-slate-400 focus:border-secondary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-secondary-500/20">
                                @error('name')
                                    <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email"
                                    class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                    Your Email *
                                </label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    placeholder="name@example.com" autocomplete="email" required
                                    class="w-full rounded-xl border border-brand-200/80 bg-brand-25/50 px-4 py-3 text-sm text-slate-900 transition placeholder:text-slate-400 focus:border-secondary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-secondary-500/20">
                                @error('email')
                                    <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone"
                                    class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                    Phone Number *
                                </label>
                                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                    placeholder="e.g. +61 400 000 000" autocomplete="tel" required
                                    class="w-full rounded-xl border border-brand-200/80 bg-brand-25/50 px-4 py-3 text-sm text-slate-900 transition placeholder:text-slate-400 focus:border-secondary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-secondary-500/20">
                                @error('phone')
                                    <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message"
                                    class="mb-1.5 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                    Message (Optional)
                                </label>
                                <textarea id="message" name="message" rows="3" placeholder="Tell us about your experience..."
                                    class="w-full rounded-xl border border-brand-200/80 bg-brand-25/50 px-4 py-3 text-sm text-slate-900 transition placeholder:text-slate-400 focus:border-secondary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-secondary-500/20">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1.5 text-xs font-medium text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full rounded-xl bg-brand-500 px-6 py-3.5 text-xs font-extrabold uppercase tracking-widest text-white shadow-lg shadow-brand-500/20 transition duration-200
                                       hover:bg-brand-600 hover:shadow-brand-500/40 active:scale-[0.99]
                                       sm:py-4">
                                Submit Assessment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if ($hasValue($overview))
        {{-- =========================================================
        QUALIFICATION OVERVIEW
    ========================================================= --}}
        <section id="qualification-overview"
            class="relative overflow-hidden bg-white py-16 text-slate-900 sm:py-20 lg:py-28 border-y border-slate-100">

            {{-- Light Subtle Accent Glows --}}
            <div
                class="pointer-events-none absolute -left-20 top-1/2 h-80 w-80 -translate-y-1/2 rounded-full bg-secondary-500/5 blur-[100px] sm:h-96 sm:w-96">
            </div>
            <div
                class="pointer-events-none absolute -right-20 top-1/4 h-72 w-72 rounded-full bg-lime-500/5 blur-[90px] sm:h-80 sm:w-80">
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-center lg:gap-16">

                    {{-- Main Content Column --}}
                    <div class="space-y-5 lg:col-span-7">

                        {{-- Pill Badge --}}
                        <div
                            class="inline-flex items-center gap-2.5 rounded-full border border-secondary-200 bg-secondary-50 px-4 py-1.5 shadow-sm">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-emerald-800 sm:text-xs">
                                Qualification Overview
                            </span>
                        </div>

                        {{-- Heading --}}
                        <h2 class="text-2xl font-black tracking-tight text-slate-950 sm:text-3xl lg:text-[30px] ">
                            Certify Your Skills &amp; Advance Your Career
                        </h2>

                        {{-- Overview Text --}}
                        <div class=" text-slate-600">
                            <p class=" text-sm leading-relaxed sm:text-base">
                                {{ $overview }}
                            </p>
                        </div>

                        {{-- Target Qualification Banner --}}
                        @if ($hasValue($level) || $hasValue($name))
                            <div
                                class="group relative overflow-hidden rounded-2xl border border-secondary-100 bg-secondary-50/50 p-4 transition-all duration-300 hover:border-secondary-200 hover:shadow-md">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-secondary-200 bg-white text-secondary-700 shadow-sm transition-transform duration-300 group-hover:scale-105">
                                        <iconify-icon icon="lucide:award" class="text-2xl"></iconify-icon>
                                    </div>

                                    <div class="space-y-0.5">
                                        <span class="text-xs font-bold uppercase tracking-wider text-secondary-700">Target
                                            Qualification</span>
                                        @if ($hasValue($name))
                                            <p class="text-sm font-bold text-slate-900 sm:text-base">
                                                {{ $name }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Feature Sidebar Card --}}
                    <div class="lg:col-span-5">
                        <div class=" bg-brand-50 border border-brand-100 rounded-2xl p-6 mb-8">
                            <h3 class="text-base font-bold text-brand-navy mb-3 flex items-center">
                                <svg class="w-5 h-5 text-brand-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Fast Facts
                            </h3>
                            <ul class="space-y-2.5 text-xs text-slate-700">
                                <li class="flex justify-between py-1 border-b border-brand-100">
                                    <span class="text-slate-500">Code:</span>
                                    <span class="font-bold text-brand-navy">CHC33021</span>
                                </li>
                                <li class="flex justify-between py-1 border-b border-brand-100">
                                    <span class="text-slate-500">Provider:</span>
                                    <span class="font-bold text-brand-navy">Career Skills Institute Australia</span>
                                </li>
                                <li class="flex justify-between py-1 border-b border-brand-100">
                                    <span class="text-slate-500">Total Units:</span>
                                    <span class="font-bold text-brand-navy">12 Units (6 Core, 6 Elective)</span>
                                </li>
                                <li class="flex justify-between py-1">
                                    <span class="text-slate-500">Duration:</span>
                                    <span class="font-bold text-brand-navy">4-6 Weeks</span>
                                </li>
                                 <li class="flex justify-between py-1">
                                    <span class="text-slate-500">Delivery Mode:</span>
                                    <span class="font-bold text-brand-navy">Recognition of Prior Learning (RPL)</span>
                                </li>
                            </ul>
                        </div>

                        <div
                            class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-slate-50/70 p-6 shadow-xl shadow-slate-200/50 backdrop-blur-xl sm:p-8">

                          

                            <h3 class="text-xl font-extrabold text-slate-900 sm:text-2xl">
                                Why Choose This Pathway?
                            </h3>

                            <ul class="mt-6 space-y-4">
                                <li class="flex items-start gap-3.5">
                                    <div
                                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-100/70 text-brand-700 mt-0.5">
                                        <iconify-icon icon="lucide:check" class="text-base font-bold"></iconify-icon>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Nationally Recognised</h4>
                                        <p class="text-xs font-medium text-slate-500">Fully aligned with AQF standards for
                                            official certification.</p>
                                    </div>
                                </li>

                                <li class="flex items-start gap-3.5">
                                    <div
                                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-100/70 text-brand-700 mt-0.5">
                                        <iconify-icon icon="lucide:zap" class="text-base font-bold"></iconify-icon>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">RPL Credit Pathways</h4>
                                        <p class="text-xs font-medium text-slate-500">Fast-track certification using
                                            existing work experience.</p>
                                    </div>
                                </li>

                                <li class="flex items-start gap-3.5">
                                    <div
                                        class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg border border-brand-200 bg-brand-100/70 text-brand-700 mt-0.5">
                                        <iconify-icon icon="lucide:briefcase" class="text-base font-bold"></iconify-icon>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-900">Industry-Ready Practical Skills</h4>
                                        <p class="text-xs font-medium text-slate-500">Tailored directly for immediate
                                            workplace application.</p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

<section id="entry-requirements" class="relative overflow-hidden bg-slate-50/50 py-20 sm:py-28">
    <!-- Subtle Background Ambient Glows -->
    <div class="pointer-events-none absolute left-1/2 top-0 -z-10 h-[500px] w-full max-w-7xl -translate-x-1/2 opacity-40 blur-3xl" aria-hidden="true">
        <div class="h-full w-full bg-gradient-to-tr from-brand-500/10 via-secondary-500/10 to-transparent"></div>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="mx-auto max-w-2xl text-center">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-secondary-500/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-widest text-secondary-600 ring-1 ring-inset ring-secondary-500/20">
                Before you apply
            </span>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Entry <span class="text-brand-500">Requirements</span>
            </h2>
            <p class="mt-4 text-base leading-relaxed text-slate-600">
                Review the essential prerequisites and core competency expectations before initiating your enrolment.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="mt-14 grid gap-8 lg:grid-cols-2 lg:items-start">
            
            <!-- Left Card: Prerequisites -->
            <div class="group relative rounded-3xl border border-slate-200/80 bg-white/80 p-6 sm:p-10 shadow-xl shadow-slate-200/40 backdrop-blur-sm transition-all duration-300 hover:border-slate-300 hover:shadow-2xl hover:shadow-slate-200/60">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#30BAFA]/20 to-[#30BAFA]/5 text-secondary-600 ring-1 ring-inset ring-secondary-500/20 shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <iconify-icon icon="lucide:clipboard-check" class="text-2xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Recommended Prerequisites</h3>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400 mt-0.5">Applicant readiness checklist</p>
                    </div>
                </div>

                <p class="mt-6 text-sm leading-relaxed text-slate-600">
                    While no formal prerequisites exist within the qualification packaging rules, the college strongly recommends candidates satisfy the following criteria:
                </p>

                <ul class="mt-6 space-y-3.5">
                    <li class="flex items-start gap-3.5 text-sm text-slate-700">
                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-secondary-500/10 text-secondary-600 mt-0.5">
                            <iconify-icon icon="lucide:check" class="text-xs stroke-[3]"></iconify-icon>
                        </span>
                        <span class="leading-6">Be at least <strong>18 years of age</strong> at course commencement.</span>
                    </li>
                    <li class="flex items-start gap-3.5 text-sm text-slate-700">
                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-secondary-500/10 text-secondary-600 mt-0.5">
                            <iconify-icon icon="lucide:check" class="text-xs stroke-[3]"></iconify-icon>
                        </span>
                        <span class="leading-6">Possess a valid <strong>Unique Student Identifier (USI)</strong>.</span>
                    </li>
                    <li class="flex items-start gap-3.5 text-sm text-slate-700">
                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-secondary-500/10 text-secondary-600 mt-0.5">
                            <iconify-icon icon="lucide:check" class="text-xs stroke-[3]"></iconify-icon>
                        </span>
                        <span class="leading-6">Complete a Pre-Training Review course entry interview.</span>
                    </li>
                    <li class="flex items-start gap-3.5 text-sm text-slate-700">
                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-secondary-500/10 text-secondary-600 mt-0.5">
                            <iconify-icon icon="lucide:check" class="text-xs stroke-[3]"></iconify-icon>
                        </span>
                        <span class="leading-6">Maintain basic computer literacy and regular internet access.</span>
                    </li>
                    <li class="flex items-start gap-3.5 text-sm text-slate-700">
                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-secondary-500/10 text-secondary-600 mt-0.5">
                            <iconify-icon icon="lucide:check" class="text-xs stroke-[3]"></iconify-icon>
                        </span>
                        <span class="leading-6">Demonstrate suitable Language, Literacy, Numeracy & Digital (LLND) skills.</span>
                    </li>
                </ul>

                <!-- Modern Alert Box -->
                <div class="mt-8 relative overflow-hidden rounded-2xl border border-amber-200/80 bg-gradient-to-br from-amber-50 to-orange-50/40 p-4 sm:p-4.5">
                    <div class="flex gap-3">
                        <iconify-icon icon="lucide:alert-circle" class="text-amber-600 text-lg shrink-0 mt-0.5"></iconify-icon>
                        <p class="text-xs leading-relaxed text-amber-950">
                            <strong class="font-semibold text-amber-900">Enrolment Note:</strong> An LLND evaluation is administered during enrolment to map out your baseline skills and structure tailored learning support.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Card: Core Skills -->
            <div class="group relative rounded-3xl border border-slate-200/80 bg-white/80 p-6 sm:p-10 shadow-xl shadow-slate-200/40 backdrop-blur-sm transition-all duration-300 hover:border-slate-300 hover:shadow-2xl hover:shadow-slate-200/60">
                <div class="flex items-center gap-4">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500/20 to-brand-500/5 text-brand-500 ring-1 ring-inset ring-brand-500/20 shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <iconify-icon icon="lucide:brain-circuit" class="text-2xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-900">Core Skills — ACSF Level 3</h3>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400 mt-0.5">Expected learning capabilities</p>
                    </div>
                </div>

                <p class="mt-6 text-sm leading-relaxed text-slate-600">
                    Applicants should demonstrate functional competence equivalent to ACSF Level 3 across five foundational domains:
                </p>

                <!-- Skill Grid Badges -->
                <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 px-4 py-3.5 text-sm font-semibold text-slate-800 transition-colors hover:border-brand-500/30 hover:bg-white hover:shadow-sm">
                        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary-500 shadow-sm ring-1 ring-slate-200/60">
                            <iconify-icon icon="lucide:book-open" class="text-base"></iconify-icon>
                        </div>
                        Reading
                    </div>

                    <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 px-4 py-3.5 text-sm font-semibold text-slate-800 transition-colors hover:border-brand-500/30 hover:bg-white hover:shadow-sm">
                        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary-500 shadow-sm ring-1 ring-slate-200/60">
                            <iconify-icon icon="lucide:pen-line" class="text-base"></iconify-icon>
                        </div>
                        Writing
                    </div>

                    <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 px-4 py-3.5 text-sm font-semibold text-slate-800 transition-colors hover:border-brand-500/30 hover:bg-white hover:shadow-sm">
                        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary-500 shadow-sm ring-1 ring-slate-200/60">
                            <iconify-icon icon="lucide:calculator" class="text-base"></iconify-icon>
                        </div>
                        Numeracy
                    </div>

                    <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 px-4 py-3.5 text-sm font-semibold text-slate-800 transition-colors hover:border-brand-500/30 hover:bg-white hover:shadow-sm">
                        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary-500 shadow-sm ring-1 ring-slate-200/60">
                            <iconify-icon icon="lucide:messages-square" class="text-base"></iconify-icon>
                        </div>
                        Oral communication
                    </div>

                    <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 px-4 py-3.5 text-sm font-semibold text-slate-800 transition-colors hover:border-brand-500/30 hover:bg-white hover:shadow-sm sm:col-span-2">
                        <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-white text-secondary-500 shadow-sm ring-1 ring-slate-200/60">
                            <iconify-icon icon="lucide:laptop" class="text-base"></iconify-icon>
                        </div>
                        Digital skills
                    </div>
                </div>

                <!-- Mandatory Placement Requirements Footer -->
                <div class="mt-8 space-y-3.5 border-t border-slate-100 pt-6 text-xs leading-relaxed text-slate-500">
                    <div class="flex items-start gap-2.5">
                        <iconify-icon icon="lucide:info" class="text-slate-400 text-sm shrink-0 mt-0.5"></iconify-icon>
                        <p>Students must be eligible to participate in practical simulations and mandatory work placements at approved partner centers.</p>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <iconify-icon icon="lucide:shield-check" class="text-slate-400 text-sm shrink-0 mt-0.5"></iconify-icon>
                        <p>National Police Checks, NDIS Worker Screening, or Working with Children Checks may be required prior to placement (associated costs paid separately).</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    @if ($graduateOutcomes->isNotEmpty())
        {{-- =========================================================
        GRADUATE OUTCOMES
    ========================================================= --}}
        <section class="relative overflow-hidden bg-slate-50 py-12 sm:py-16 lg:py-24">

            {{-- Background Decorations --}}
            <div
                class="pointer-events-none absolute -left-20 top-16 h-56 w-56 rounded-full bg-brand-500/10 blur-[80px] sm:-left-32 sm:top-20 sm:h-80 sm:w-80 sm:blur-[100px]">
            </div>
            <div
                class="pointer-events-none absolute -right-20 bottom-8 h-56 w-56 rounded-full bg-secondary-500/10 blur-[80px] sm:-right-32 sm:bottom-10 sm:h-80 sm:w-80 sm:blur-[100px]">
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                {{-- Header --}}
                <div
                    class="flex flex-col justify-between gap-5 border-b border-slate-200 pb-6 sm:gap-6 sm:pb-8 md:flex-row md:items-end">

                    <div>
                        <div
                            class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3 py-1.5 text-xs font-bold text-brand-700 sm:px-3.5">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                            Graduate Outcomes
                        </div>

                        <h2
                            class="mt-4 text-2xl font-black tracking-tight text-slate-900 sm:mt-5 sm:text-3xl md:text-4xl lg:text-5xl">
                            Skills You Will
                            <span class="text-brand-600">Master</span>
                        </h2>

                        <p class="mt-2 max-w-xl text-sm leading-6 text-slate-600 sm:mt-3 sm:text-base sm:leading-7">
                            Explore the practical skills and competencies you can develop through this qualification.
                        </p>
                    </div>

                    @if ($hasValue($name))
                        <div
                            class="max-w-sm rounded-2xl border border-slate-200 bg-white px-4 py-3.5 shadow-sm sm:px-5 sm:py-4">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400">
                                <iconify-icon icon="lucide:graduation-cap"
                                    class="text-base text-brand-600"></iconify-icon>
                                Qualification
                            </div>
                            <p class="mt-1.5 text-sm font-bold leading-relaxed text-slate-800 sm:mt-2">
                                {{ $name }}
                            </p>
                        </div>
                    @endif
                </div>

                {{-- Bento Grid --}}
                <div class="mt-8 grid grid-cols-1 gap-4 sm:mt-10 sm:gap-5 md:grid-cols-2 lg:grid-cols-3">

                    @foreach ($graduateOutcomes as $index => $outcome)
                        @php
                            $isFeatured = $loop->first;
                        @endphp

                        <div
                            class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border transition-all duration-300 hover:-translate-y-1 hover:shadow-xl sm:rounded-3xl
                        {{ $isFeatured
                            ? 'border-brand-700 bg-gradient-to-br from-brand-700 to-brand-900 p-6 shadow-lg shadow-brand-900/10 sm:p-7 md:col-span-2 md:p-8 lg:col-span-2'
                            : 'border-slate-200 bg-white p-5 shadow-sm hover:border-brand-300 sm:p-6 md:p-7' }}">

                            {{-- Featured Decorations --}}
                            @if ($isFeatured)
                                <div
                                    class="pointer-events-none absolute -right-8 -top-8 h-36 w-36 rounded-full border-[24px] border-white/5 sm:-right-10 sm:-top-10 sm:h-48 sm:w-48 sm:border-[30px]">
                                </div>
                                <div
                                    class="pointer-events-none absolute -bottom-12 right-12 h-32 w-32 rounded-full bg-secondary-400/10 blur-3xl sm:-bottom-16 sm:right-20 sm:h-40 sm:w-40">
                                </div>
                            @endif

                            {{-- Top Meta Row --}}
                            <div class="relative flex items-center justify-between">
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-xl font-mono text-sm font-black sm:h-11 sm:w-11 sm:rounded-2xl
                                {{ $isFeatured
                                    ? 'bg-white text-brand-700'
                                    : 'bg-brand-50 text-brand-700 transition-colors group-hover:bg-brand-600 group-hover:text-white' }}">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                @if ($isFeatured)
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full border border-white/20 bg-white/10 px-2.5 py-1 text-[11px] font-bold text-white sm:gap-2 sm:px-3 sm:py-1.5 sm:text-xs">
                                        <iconify-icon icon="lucide:sparkles"></iconify-icon>
                                        Core Competency
                                    </span>
                                @else
                                    <iconify-icon icon="lucide:arrow-up-right"
                                        class="text-lg text-slate-300 transition-all duration-300 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-brand-600 sm:text-xl">
                                    </iconify-icon>
                                @endif
                            </div>

                            {{-- Main Content --}}
                            <div class="relative mt-6 sm:mt-8">
                                @if ($isFeatured)
                                    <p
                                        class="mb-2 text-[11px] font-bold uppercase tracking-[0.15em] text-brand-100 sm:mb-3 sm:text-xs">
                                        Key Learning Outcome
                                    </p>
                                    <p
                                        class="max-w-2xl text-base font-bold leading-relaxed text-white sm:text-lg md:text-xl lg:text-2xl">
                                        {{ $outcome }}
                                    </p>
                                @else
                                    <p class="text-sm font-semibold leading-relaxed text-slate-800 sm:text-base">
                                        {{ $outcome }}
                                    </p>
                                @endif
                            </div>

                            {{-- Bottom Accent --}}
                            <div
                                class="relative mt-6 h-1 w-10 rounded-full transition-all duration-300 group-hover:w-16 sm:mt-8 sm:w-12 sm:group-hover:w-20
                            {{ $isFeatured ? 'bg-secondary-400' : 'bg-brand-200 group-hover:bg-brand-500' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    @if ($careerPathways->isNotEmpty())
        {{-- =========================================================
        CAREER PATHWAYS
    ========================================================= --}}
        <section class="bg-slate-50/50 py-12 sm:py-16 lg:py-24">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mx-auto mb-8 max-w-3xl text-center sm:mb-10 lg:mb-12">

                    <span
                        class="inline-block rounded-lg bg-brand-100/60 px-3 py-1 text-xs font-black uppercase tracking-[0.18em] text-brand-700">
                        Career Pathways
                    </span>

                    <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-900 sm:mt-4 sm:text-3xl md:text-4xl">
                        Explore Your Career Opportunities
                    </h2>

                    <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:mt-4 sm:text-base">
                        Discover potential career opportunities associated with this qualification.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:gap-5 md:grid-cols-2 md:gap-6 lg:grid-cols-3">

                    @foreach ($careerPathways as $index => $career)
                        <div
                            class="group relative flex flex-col justify-between rounded-2xl border border-brand-100 bg-white p-5 shadow-sm transition duration-300
                                hover:-translate-y-1 hover:border-brand-300 hover:shadow-xl
                                sm:p-6 md:p-7">

                            <div>
                                <div class="flex items-center justify-between">
                                    <div
                                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition duration-300
                                            group-hover:bg-brand-500 group-hover:text-white
                                            sm:h-12 sm:w-12">
                                        <iconify-icon icon="lucide:briefcase-business"
                                            class="text-lg sm:text-xl"></iconify-icon>
                                    </div>

                                    <span
                                        class="text-xl font-black text-slate-300 transition duration-300 group-hover:text-brand-300 sm:text-2xl">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                @if ($hasValue(data_get($career, 'title')))
                                    <h3
                                        class="mt-5 text-base font-black text-brand-950 transition duration-300 group-hover:text-brand-600 sm:mt-6 sm:text-lg">
                                        {{ data_get($career, 'title') }}
                                    </h3>
                                @endif

                                @if ($hasValue(data_get($career, 'description')))
                                    <p class="mt-2 text-sm leading-relaxed text-slate-600">
                                        {{ data_get($career, 'description') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
