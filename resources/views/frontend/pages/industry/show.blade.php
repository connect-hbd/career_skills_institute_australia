
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

    $description = $hasValue($heroDescription)
        ? $heroDescription
        : $shortDescription;

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

    $availableInformation = collect($informationLabels)
        ->filter(function ($label, $key) use ($keyInformation, $hasValue) {
            return $hasValue(data_get($keyInformation, $key));
        });

    // Providers
    $providers = $get('providers', []);
    $providers = is_array($providers) ? $providers : [];

    $providers = collect($providers)
        ->filter(function ($provider) use ($hasValue) {
            return is_array($provider)
                && $hasValue(data_get($provider, 'name'));
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
            return is_array($item)
                && (
                    $hasValue(data_get($item, 'title'))
                    || $hasValue(data_get($item, 'description'))
                );
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
                return collect($answer)->contains(
                    fn($value) => is_string($value) && trim($value) !== ''
                );
            }

            return is_string($answer) && trim($answer) !== '';
        })
        ->values();

    // Image
    $image = $get('image');

    $imageUrl = $hasValue($image)
        ? (
            filter_var($image, FILTER_VALIDATE_URL)
                ? $image
                : asset(ltrim($image, '/'))
        )
        : null;

    // Official course URL
    $courseUrl = $get('course_url');

    $validCourseUrl = $hasValue($courseUrl)
        && filter_var($courseUrl, FILTER_VALIDATE_URL)
        && in_array(parse_url($courseUrl, PHP_URL_SCHEME), ['http', 'https']);

    $hasHeroContent = $hasValue($code)
        || $hasValue($name)
        || $hasValue($level)
        || $hasValue($description);

    $hasKeyInformation = $availableInformation->isNotEmpty()
        || $hasValue($code)
        || $hasValue($level);

@endphp

@section('title', $name ?: 'Qualification Details')

@section('content')

{{-- =========================================================
    HERO SECTION
========================================================= --}}

<section class="relative overflow-hidden bg-brand-50">

    {{-- Background Decorations --}}
    <div class="pointer-events-none absolute right-0 top-0 h-72 w-72 rounded-full bg-secondary-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 left-0 h-64 w-64 rounded-full bg-brand-100/70 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">

        <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-14">

            {{-- LEFT CONTENT --}}
            <div class="lg:col-span-7">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white px-4 py-2 shadow-sm">

                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-brand-100">
                        <iconify-icon icon="lucide:award" class="text-sm text-brand-600"></iconify-icon>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.18em] text-brand-700">
                        Nationally Recognised Qualification
                    </span>

                </div>

                {{-- Heading --}}
                @if($hasValue($name) || $hasValue($code))

                    <h1 class="mt-5 max-w-3xl text-2xl font-black leading-tight tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">

                        @if($hasValue($code))
                            <span>{{ $code }} – </span>
                        @endif

                        @if($hasValue($name))
                            <span class="text-brand-600">{{ $name }}</span>
                        @endif

                    </h1>

                @endif

                {{-- Level --}}
                @if($hasValue($level))

                    <div class="mt-4">
                        <span class="inline-flex items-center gap-2 rounded-lg bg-brand-100 px-3 py-2 text-xs font-bold text-brand-800">

                            <iconify-icon icon="lucide:graduation-cap" class="text-base"></iconify-icon>

                            {{ $level }}

                        </span>
                    </div>

                @endif

                {{-- Description --}}
                @if($hasValue($description))

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                        {{ $description }}
                    </p>

                @endif

                {{-- CTA --}}
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">

                    <a href="#assessment-form"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-500 px-6 py-3.5 text-sm font-extrabold text-white shadow-md shadow-brand-500/20 transition hover:bg-brand-600 hover:shadow-lg">

                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>

                        Price Match Guarantee - Inquire Now

                    </a>

                    @if($hasValue($overview))

                        <a href="#qualification-overview"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-secondary-200 bg-white px-6 py-3.5 text-sm font-bold text-secondary-700 transition hover:border-secondary-300 hover:bg-secondary-50">

                            <iconify-icon icon="lucide:circle-help" class="text-lg"></iconify-icon>

                            Learn More

                        </a>

                    @elseif($validCourseUrl)

                        <a href="{{ $courseUrl }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-secondary-200 bg-white px-6 py-3.5 text-sm font-bold text-secondary-700 transition hover:border-secondary-300 hover:bg-secondary-50">

                            <iconify-icon icon="lucide:external-link" class="text-lg"></iconify-icon>

                            Official Details

                        </a>

                    @endif

                </div>

                {{-- INFORMATION CARDS --}}
                @if($hasKeyInformation || $providers->isNotEmpty())

                    <div class="mt-9 grid grid-cols-1 gap-4 sm:grid-cols-2">

                        {{-- Qualification Information --}}
                        @if($hasKeyInformation)

                            <div class="rounded-2xl border border-secondary-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-secondary-100 text-secondary-700">
                                        <iconify-icon icon="lucide:book-open" class="text-xl"></iconify-icon>
                                    </div>

                                    <h3 class="text-sm font-extrabold text-secondary-950">
                                        Key Information
                                    </h3>

                                </div>

                                <div class="mt-5 space-y-3 text-sm">

                                    @if($hasValue($code))
                                        <div class="flex items-start justify-between gap-4">
                                            <span class="shrink-0 text-slate-500">Qualification Code</span>
                                            <strong class="text-right text-slate-900">{{ $code }}</strong>
                                        </div>
                                    @endif

                                    @foreach($availableInformation as $key => $label)

                                        <div class="flex items-start justify-between gap-4">
                                            <span class="shrink-0 text-slate-500">{{ $label }}</span>

                                            <strong class="max-w-[65%] break-words text-right text-slate-900">
                                                {{ data_get($keyInformation, $key) }}
                                            </strong>
                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif

                        {{-- RTO Providers --}}
                        @if($providers->isNotEmpty())

                            <div class="rounded-2xl border border-secondary-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-secondary-100 text-secondary-600">
                                        <iconify-icon icon="lucide:shield-check" class="text-xl"></iconify-icon>
                                    </div>

                                    <h3 class="text-sm font-extrabold text-secondary-950">
                                        Offered By
                                    </h3>

                                </div>

                                <div class="mt-5 space-y-3">

                                    @foreach($providers as $provider)

                                        <div class="rounded-lg border border-slate-100 bg-slate-50 p-3">

                                            <p class="break-words text-sm font-bold text-slate-900">
                                                {{ data_get($provider, 'name') }}
                                            </p>

                                            @if($hasValue(data_get($provider, 'rto_code')))
                                                <p class="mt-1 text-xs text-slate-500">
                                                    RTO: {{ data_get($provider, 'rto_code') }}
                                                </p>
                                            @endif

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif

                    </div>

                @endif

            </div>

            {{-- RIGHT ASSESSMENT FORM --}}
            <div class="lg:col-span-5" id="assessment-form">

                <div class="relative rounded-2xl border border-brand-100 bg-white p-6 text-slate-900 shadow-2xl sm:p-8">

                    <div class="absolute -top-3 right-6 rounded-full bg-secondary-500 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-white shadow-md">
                        Fast & Free
                    </div>

                    <h2 class="text-xl font-extrabold leading-snug text-brand-700">
                        Start Your Free Assessment Today!
                    </h2>

                    <p class="mb-6 mt-1 text-xs text-slate-500">
                        Find out if you qualify for RPL in 60 seconds.
                    </p>

                    <form action="{{ url()->current() }}" method="POST" class="space-y-4">

                        @csrf

                        @if($hasValue($code))
                            <input type="hidden" name="qualification_code" value="{{ $code }}">
                        @endif

                        @if($hasValue($slug = $get('slug')))
                            <input type="hidden" name="qualification_slug" value="{{ $slug }}">
                        @endif

                        <div>

                            <label for="full_name" class="mb-1 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                Full Name *
                            </label>

                            <input
                                id="full_name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Full Name *"
                                autocomplete="name"
                                required
                                class="w-full rounded-lg border border-brand-200 bg-brand-25 px-4 py-3 text-sm transition placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-secondary-500">

                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>

                            <label for="email" class="mb-1 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                Your Email *
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Your Email *"
                                autocomplete="email"
                                required
                                class="w-full rounded-lg border border-brand-200 bg-brand-25 px-4 py-3 text-sm transition placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-secondary-500">

                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>

                            <label for="phone" class="mb-1 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                Phone Number *
                            </label>

                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Phone Number *"
                                autocomplete="tel"
                                required
                                class="w-full rounded-lg border border-brand-200 bg-brand-25 px-4 py-3 text-sm transition placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-secondary-500">

                            @error('phone')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>

                            <label for="message" class="mb-1 block text-xs font-bold uppercase tracking-wider text-brand-900">
                                Message (Optional)
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="3"
                                placeholder="Message (Optional)"
                                class="w-full rounded-lg border border-brand-200 bg-brand-25 px-4 py-3 text-sm transition placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-secondary-500">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <button type="submit"
                            class="w-full rounded-lg bg-brand-500 px-6 py-3.5 text-sm font-extrabold uppercase tracking-wider text-white shadow-lg shadow-brand-500/25 transition duration-200 hover:bg-brand-600">

                            Submit

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    QUALIFICATION OVERVIEW
========================================================= --}}

@if($hasValue($overview))

    <section id="qualification-overview" class="border-b border-slate-100 bg-white py-16 sm:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="max-w-4xl">

                <span class="text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                    Qualification Overview
                </span>

                <h2 class="mt-3 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                    Certify Your Skills and Advance Your Career
                </h2>

                <p class="mt-5 whitespace-pre-line text-sm leading-8 text-slate-600 sm:text-base">
                    {{ $overview }}
                </p>

                @if($hasValue($level) || $hasValue($name))

                    <p class="mt-4 text-sm leading-7 text-slate-600">

                        @if($hasValue($level))
                            <strong class="font-bold text-brand-800">{{ $level }}</strong>
                        @endif

                        @if($hasValue($level) && $hasValue($name))
                            -
                        @endif

                        @if($hasValue($name))
                            <strong class="font-bold text-brand-800">{{ $name }}</strong>
                        @endif

                    </p>

                @endif

            </div>

        </div>

    </section>

@endif


{{-- =========================================================
    GRADUATE OUTCOMES
    JSON: ARRAY OF STRINGS
========================================================= --}}

@if($graduateOutcomes->isNotEmpty())

    <section class="bg-brand-950 py-16 text-white sm:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">

                <span class="text-xs font-black uppercase tracking-[0.18em] text-secondary-400">
                    Graduate Outcomes
                </span>

                <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-white sm:text-3xl lg:text-4xl">
                    Skills You Can Develop
                </h2>

                @if($hasValue($name))
                    <p class="mt-4 text-sm leading-7 text-brand-100 sm:text-base">
                        Explore the practical skills and competencies associated with
                        <strong class="text-secondary-400">{{ $name }}</strong>.
                    </p>
                @endif

            </div>

            <div class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($graduateOutcomes as $index => $outcome)

                    <div class="flex items-start gap-4 rounded-2xl border border-brand-800 bg-brand-900 p-5 transition hover:-translate-y-1 hover:border-brand-700">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary-500/15 text-secondary-400">

                            <iconify-icon icon="lucide:check-circle-2" class="text-xl"></iconify-icon>

                        </div>

                        <div class="min-w-0 flex-1">

                            <span class="text-[10px] font-black uppercase tracking-wider text-brand-400">
                                Skill {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <p class="mt-1 text-sm leading-7 text-brand-100">
                                {{ $outcome }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

@endif


{{-- =========================================================
    CAREER PATHWAYS
    JSON: ARRAY OF OBJECTS
========================================================= --}}

@if($careerPathways->isNotEmpty())

    <section class="bg-white py-16 sm:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto mb-10 max-w-3xl text-center">

                <span class="text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                    Career Pathways
                </span>

                <h2 class="mt-3 text-2xl font-black tracking-tight text-slate-900 sm:text-3xl">
                    Explore Your Career Opportunities
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                    Discover potential career opportunities associated with this qualification.
                </p>

            </div>

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">

                @foreach($careerPathways as $index => $career)

                    <div class="group rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition duration-200 hover:-translate-y-1 hover:border-brand-200 hover:bg-white hover:shadow-lg">

                        <div class="flex items-center justify-between">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-700 transition group-hover:bg-brand-600 group-hover:text-white">

                                <iconify-icon icon="lucide:briefcase-business" class="text-xl"></iconify-icon>

                            </div>

                            <span class="text-3xl font-black text-brand-100">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                        </div>

                        @if($hasValue(data_get($career, 'title')))

                            <h3 class="mt-5 text-base font-black text-brand-950">
                                {{ data_get($career, 'title') }}
                            </h3>

                        @endif

                        @if($hasValue(data_get($career, 'description')))

                            <p class="mt-2 text-sm leading-7 text-slate-500">
                                {{ data_get($career, 'description') }}
                            </p>

                        @endif

                    </div>

                @endforeach

            </div>

        </div>

    </section>

@endif


{{-- =========================================================
    FAQ SECTION
========================================================= --}}

@if($faqs->isNotEmpty())

    <section id="faq" class="bg-slate-50 py-16 sm:py-20 lg:py-24">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mx-auto max-w-3xl text-center">

                <span class="text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                    Frequently Asked Questions
                </span>

                <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight text-brand-950 sm:text-4xl">
                    Everything You Need
                    <span class="text-secondary-600">To Know</span>
                </h2>

                <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                    Find answers to the most common questions about this qualification.
                </p>

            </div>

            {{-- FAQ GRID --}}
            <div class="mt-12 grid grid-cols-1 items-start gap-8 lg:grid-cols-12 lg:gap-10">

                {{-- SIDEBAR --}}
                <div class="lg:col-span-4">

                    <div class="lg:sticky lg:top-28">

                        {{-- Contact --}}
                        <div class="rounded-2xl border border-brand-100 bg-white p-6 shadow-sm sm:p-7">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-500">
                                <iconify-icon icon="lucide:messages-square" class="text-xl"></iconify-icon>
                            </div>

                            <h3 class="mt-5 text-xl font-black text-brand-950">
                                Have more questions?
                            </h3>

                            <p class="mt-3 text-sm leading-6 text-slate-500">
                                Our team can help you understand the qualification, requirements and available assessment options.
                            </p>

                            <a href="#assessment-form"
                                class="group mt-6 flex items-center justify-between rounded-xl border border-brand-100 bg-brand-50 p-3.5 transition hover:border-brand-200 hover:bg-brand-100">

                                <span class="flex items-center gap-3">

                                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-secondary-600">
                                        <iconify-icon icon="lucide:message-circle" class="text-lg"></iconify-icon>
                                    </span>

                                    <span>
                                        <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                            Contact Us
                                        </span>

                                        <span class="mt-0.5 block text-sm font-extrabold text-brand-900">
                                            Our Team
                                        </span>
                                    </span>

                                </span>

                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-brand-600 transition group-hover:translate-x-0.5">
                                    <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                                </span>

                            </a>

                        </div>

                        {{-- Help Card --}}
                        <div class="mt-4 rounded-2xl bg-brand-900 p-6 text-white">

                            <div class="flex items-start gap-3">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary-500/15">
                                    <iconify-icon icon="lucide:headphones" class="text-lg text-secondary-400"></iconify-icon>
                                </div>

                                <div>

                                    <p class="text-sm font-extrabold">
                                        Need personal guidance?
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-brand-200">
                                        Speak with our team about your qualification and next steps.
                                    </p>

                                </div>

                            </div>

                            <a href="#assessment-form"
                                class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-wider text-secondary-400 transition hover:text-secondary-300">

                                Start Your Assessment

                                <iconify-icon icon="lucide:arrow-right" class="text-base"></iconify-icon>

                            </a>

                        </div>

                    </div>

                </div>

                {{-- FAQ LIST --}}
                <div class="lg:col-span-8"
                    x-data="{ active: 0 }">

                    <div class="space-y-3">

                        @foreach($faqs as $index => $faq)

                            @php
                                $answer = data_get($faq, 'answer');

                                $answerPoints = is_array($answer)
                                    ? collect($answer)->filter(
                                        fn($point) => is_string($point) && trim($point) !== ''
                                    )->values()
                                    : collect();
                            @endphp

                            <div class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                                :class="active === {{ $index }} ? 'border-secondary-300 shadow-sm' : 'border-slate-200 hover:border-brand-200'">

                                <button type="button"
                                    class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                                    @click="active = active === {{ $index }} ? null : {{ $index }}"
                                    :aria-expanded="active === {{ $index }}">

                                    {{-- Icon --}}
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                        :class="active === {{ $index }} ? 'bg-secondary-500 text-white' : 'bg-brand-50 text-brand-500'">

                                        <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>

                                    </div>

                                    {{-- Question --}}
                                    <span class="min-w-0 flex-1">

                                        <span class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                            :class="active === {{ $index }} ? 'text-secondary-600' : 'text-slate-400'">

                                            Question {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                                        </span>

                                        <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                            {{ data_get($faq, 'question') }}
                                        </span>

                                    </span>

                                    {{-- Toggle --}}
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                        :class="active === {{ $index }} ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600' : 'border-slate-200 bg-white text-slate-500'">

                                        <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>

                                    </span>

                                </button>

                                {{-- Answer --}}
                                <div x-cloak
                                    x-show="active === {{ $index }}"
                                    x-collapse>

                                    <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                        <div class="flex gap-4">

                                            <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                            <div class="min-w-0 flex-1">

                                                {{-- Array Answer --}}
                                                @if(is_array($answer))

                                                    <ul class="list-disc space-y-2 pl-5 text-sm leading-7 text-slate-600 sm:text-[15px]">

                                                        @foreach($answerPoints as $point)

                                                            <li>{{ $point }}</li>

                                                        @endforeach

                                                    </ul>

                                                {{-- String Answer --}}
                                                @elseif(is_string($answer) && trim($answer) !== '')

                                                    <p class="whitespace-pre-line text-sm leading-7 text-slate-600 sm:text-[15px]">
                                                        {{ $answer }}
                                                    </p>

                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </section>

@endif


{{-- =========================================================
    HOW IT WORKS
========================================================= --}}

<section class="bg-white py-16 sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto max-w-3xl text-center">

            <span class="text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                Simple 4-Step Process
            </span>

            <h2 class="mt-3 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                How Career Skills Institute Works
            </h2>

            <p class="mt-3 text-sm font-semibold text-slate-700">
                Explore the assessment process for your qualification.
            </p>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Understand how your existing skills and experience can be assessed against qualification requirements.
            </p>

        </div>

        {{-- Steps --}}
        <div class="mt-12 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            {{-- Step 1 --}}
            <div class="relative rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-brand-100">01</span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500 text-sm font-black text-white">
                    1
                </div>

                <h3 class="mt-5 text-base font-black text-brand-500">
                    Free Skill Assessment
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Share your experience and existing skills to explore your qualification options.
                </p>

            </div>

            {{-- Step 2 --}}
            <div class="relative rounded-2xl border border-secondary-100 bg-secondary-50/50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-secondary-100">02</span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary-500 text-sm font-black text-white">
                    2
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Build Experience Portfolio
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Prepare relevant documents and evidence of your professional experience.
                </p>

            </div>

            {{-- Step 3 --}}
            <div class="relative rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-brand-100">03</span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500 text-sm font-black text-white">
                    3
                </div>

                <h3 class="mt-5 text-base font-black text-brand-500">
                    Review By The RTO
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Your evidence and competencies are reviewed against the relevant assessment requirements.
                </p>

            </div>

            {{-- Step 4 --}}
            <div class="relative rounded-2xl border border-secondary-200 bg-secondary-50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-secondary-100">04</span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary-500 text-white">
                    <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Assessment Outcome
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Receive your assessment outcome and guidance on the next steps.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    FINAL CTA
========================================================= --}}

<section class="bg-brand-50 py-16 sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="relative overflow-hidden rounded-3xl bg-brand-900 px-6 py-12 text-center sm:px-10 lg:px-16 lg:py-16">

            {{-- Decorations --}}
            <div class="pointer-events-none absolute right-0 top-0 h-40 w-40 rounded-full bg-secondary-500/10"></div>
            <div class="pointer-events-none absolute bottom-0 left-0 h-32 w-32 rounded-full bg-brand-500/20"></div>

            <div class="relative z-10">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-secondary-400/20 bg-white/5 px-4 py-2">

                    <span class="flex h-5 w-5 items-center justify-center rounded-full bg-secondary-500/15 text-secondary-400">
                        <iconify-icon icon="lucide:sparkles" class="text-xs"></iconify-icon>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.18em] text-secondary-300">
                        Ready To Get Started?
                    </span>

                </div>

                {{-- Heading --}}
                <h2 class="mx-auto mt-6 max-w-3xl text-3xl font-black leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">

                    @if($hasValue($name))
                        Explore Your
                        <span class="text-secondary-400">Qualification.</span>
                    @else
                        Take the Next Step in Your Career.
                    @endif

                </h2>

                {{-- Description --}}
                <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-brand-100 sm:text-base lg:text-lg">

                    @if($hasValue($shortDescription))
                        {{ $shortDescription }}
                    @elseif($hasValue($description))
                        {{ $description }}
                    @else
                        Find out more about your qualification and available assessment options.
                    @endif

                </p>

                {{-- Buttons --}}
                <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

                    <a href="#assessment-form"
                        class="inline-flex items-center justify-center gap-2.5 rounded-xl bg-secondary-500 px-7 py-3.5 text-sm font-black text-white shadow-lg shadow-secondary-950/20 transition hover:bg-secondary-600">

                        Check My Eligibility

                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>

                    </a>

                    @if($validCourseUrl)

                        <a href="{{ $courseUrl }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center gap-2.5 rounded-xl border border-white/10 bg-white/5 px-7 py-3.5 text-sm font-bold text-white transition hover:border-secondary-400/30 hover:bg-white/10">

                            <iconify-icon icon="lucide:external-link" class="text-lg text-secondary-400"></iconify-icon>

                            Official Qualification Details

                        </a>

                    @endif

                </div>

                {{-- Trust --}}
                <div class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-3">

                    <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-200">
                        <iconify-icon icon="lucide:shield-check" class="text-base text-secondary-400"></iconify-icon>
                        Personalised guidance
                    </span>

                    <span class="hidden h-4 w-px bg-white/10 sm:block"></span>

                    <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-200">
                        <iconify-icon icon="lucide:message-circle" class="text-base text-secondary-400"></iconify-icon>
                        Expert assistance
                    </span>

                    <span class="hidden h-4 w-px bg-white/10 sm:block"></span>

                    <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-200">
                        <iconify-icon icon="lucide:graduation-cap" class="text-base text-secondary-400"></iconify-icon>
                        Qualification guidance
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
