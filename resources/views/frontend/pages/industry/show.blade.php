@extends('frontend.layouts.app')

@php
    /*
    |--------------------------------------------------------------------------
    | Qualification JSON Data
    |--------------------------------------------------------------------------
    | $qualification must be the selected qualification JSON object.
    */

    $qualification = is_array($qualification ?? null) ? $qualification : [];

    $keyInformation = is_array($qualification['key_information'] ?? null) ? $qualification['key_information'] : [];

    $overview = is_array($qualification['overview'] ?? null) ? $qualification['overview'] : [];

    $whyChoose = is_array($qualification['why_choose'] ?? null) ? $qualification['why_choose'] : [];

    $entryRequirements = is_array($qualification['entry_requirements'] ?? null)
        ? $qualification['entry_requirements']
        : [];

    $qualificationRequirements = is_array($entryRequirements['qualification_requirements'] ?? null)
        ? $entryRequirements['qualification_requirements']
        : [];

    $coreSkills = is_array($entryRequirements['core_skills'] ?? null) ? $entryRequirements['core_skills'] : [];

    $courseStructure = is_array($qualification['course_structure'] ?? null) ? $qualification['course_structure'] : [];

    $groups = is_array($courseStructure['groups'] ?? null) ? $courseStructure['groups'] : [];

    $skills = is_array($qualification['skills_you_will_develop'] ?? null)
        ? $qualification['skills_you_will_develop']
        : [];

    $careerPathways = is_array($qualification['career_pathways'] ?? null) ? $qualification['career_pathways'] : [];

    $fastFacts = is_array($qualification['fast_facts'] ?? null) ? $qualification['fast_facts'] : [];

    $benefits = is_array($whyChoose['benefits'] ?? null) ? $whyChoose['benefits'] : [];

    $overviewContent = is_array($overview['content'] ?? null) ? $overview['content'] : [];

    $requirementItems = is_array($qualificationRequirements['items'] ?? null)
        ? $qualificationRequirements['items']
        : [];

    $coreSkillItems = is_array($coreSkills['items'] ?? null) ? $coreSkills['items'] : [];

    $hasHero =
        filled($qualification['name'] ?? null) ||
        filled($qualification['code'] ?? null) ||
        filled($qualification['short_description'] ?? null);

    $hasOverview =
        filled($overview['heading'] ?? null) ||
        filled($overview['description'] ?? null) ||
        !empty(array_filter($overviewContent, fn($item) => is_string($item) && filled($item)));

    $hasFastFacts = !empty(
        array_filter(
            $fastFacts,
            fn($item) => is_array($item) && filled($item['label'] ?? null) && filled($item['value'] ?? null),
        )
    );

    $hasBenefits = !empty(
        array_filter(
            $benefits,
            fn($item) => is_array($item) && (filled($item['title'] ?? null) || filled($item['description'] ?? null)),
        )
    );

    $hasRequirements =
        filled($qualificationRequirements['title'] ?? null) ||
        filled($qualificationRequirements['description'] ?? null) ||
        !empty(array_filter($requirementItems, fn($item) => is_string($item) && filled($item))) ||
        filled($qualificationRequirements['note'] ?? null);

    $hasCoreSkills =
        filled($coreSkills['title'] ?? null) ||
        filled($coreSkills['description'] ?? null) ||
        !empty(
            array_filter(
                $coreSkillItems,
                fn($item) => is_array($item) && (filled($item['name'] ?? null) || filled($item['description'] ?? null)),
            )
        );

    $hasEntryRequirements = filled($entryRequirements['heading'] ?? null) && ($hasRequirements || $hasCoreSkills);

    $hasCourseGroups = !empty(
        array_filter(
            $groups,
            fn($group) => is_array($group) &&
                !empty(
                    array_filter(
                        $group['units'] ?? [],
                        fn($unit) => is_array($unit) &&
                            (filled($unit['code'] ?? null) || filled($unit['title'] ?? null)),
                    )
                ),
        )
    );

    $hasCourseStructure =
        $hasCourseGroups ||
        filled($courseStructure['heading'] ?? null) ||
        filled($courseStructure['description'] ?? null) ||
        filled($courseStructure['note'] ?? null) ||
        !empty($groups);

    $hasSkills = !empty(
        array_filter(
            $skills['items'] ?? [],
            fn($item) => is_array($item) && (filled($item['title'] ?? null) || filled($item['description'] ?? null)),
        )
    );

    $hasCareerPathways = !empty(
        array_filter(
            $careerPathways['items'] ?? [],
            fn($item) => is_array($item) && (filled($item['title'] ?? null) || filled($item['description'] ?? null)),
        )
    );

    $hasKeyInformation = collect($keyInformation)->filter(fn($value) => filled($value))->isNotEmpty();
@endphp

{{-- @section('title', $name ?: 'Qualification Details') --}}

@section('content')

    {{-- HERO SECTION --}}

    @if ($hasHero)
        <section
            class="relative overflow-hidden bg-gradient-to-br from-brand-50 via-white to-secondary-50/40 py-12 sm:py-16 lg:py-20">

            <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-secondary-200/30 blur-3xl">
            </div>
            <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-brand-200/30 blur-3xl">
            </div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-14">

                    {{-- Qualification Information --}}
                    <div class="space-y-6 lg:col-span-7">

                        @if (filled($qualification['code'] ?? null))
                            <div>
                                <span
                                    class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white px-4 py-2 text-xs font-bold uppercase tracking-wider text-brand-700 shadow-sm">
                                    <iconify-icon icon="lucide:award" class="text-base"></iconify-icon>
                                    Qualification Code: {{ $qualification['code'] }}
                                </span>
                            </div>
                        @endif

                        @if (filled($qualification['name'] ?? null))
                            <h1
                                class="max-w-3xl text-3xl font-black leading-tight tracking-tight text-brand-950 sm:text-4xl lg:text-5xl">
                                {{ $qualification['name'] }}
                            </h1>
                        @endif

                        @if (filled($qualification['short_description'] ?? null))
                            <p class="max-w-2xl text-base leading-relaxed text-slate-600 sm:text-lg">
                                {{ $qualification['short_description'] }}
                            </p>
                        @elseif (filled($qualification['description'] ?? null))
                            <p class="max-w-2xl text-base leading-relaxed text-slate-600 sm:text-lg">
                                {{ $qualification['description'] }}
                            </p>
                        @endif

                       

                        <div class="grid grid-cols-2 gap-6 sm:grid-cols-2 w-full md:w-[60%]">
                            <div
                                class="group flex items-center justify-center rounded-2xl p-3  bg-white border border-neutral-300 transition-all duration-300 ">
                                <img src="{{ asset('/patner_2.png') }}" alt="Brand 1"
                                    class="h-20 w-auto object-contain  transition-all duration-300  group-hover:grayscale-0">
                            </div>
                            <div
                                class="group flex items-center justify-center rounded-2xl p-3 bg-white border border-neutral-300 transition-all duration-300 ">
                                <img src="{{ asset('/patner_1.png') }}" alt="Brand 2"
                                    class="h-20 w-auto object-contain  transition-all duration-300  group-hover:grayscale-0">
                            </div>
                        </div>

                        @if (filled($keyInformation['extent'] ?? null))
                            <div
                                class="flex items-start gap-3 rounded-2xl border border-brand-100 bg-white p-4 shadow-sm sm:col-span-2">
                                <div
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                    <iconify-icon icon="lucide:layers" class="text-xl"></iconify-icon>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                                        Qualification Structure</p>
                                    <p class="mt-1 text-sm font-semibold leading-relaxed text-slate-800">
                                        {{ $keyInformation['extent'] }}
                                    </p>
                                </div>
                            </div>
                        @endif

                     



                    </div>

                    {{-- Contact Form --}}
                    <div id="assessment-form" class="lg:col-span-5">

                        <div class="rounded-3xl border border-brand-100 bg-white p-6 shadow-xl shadow-brand-950/5 sm:p-8">

                            <div class="mb-6">

                                <h2 class="mt-4 text-2xl font-black text-brand-950">
                                    Talk to Experts
                                </h2>

                                <p class="mt-2 text-sm leading-relaxed text-slate-500">
                                    Complete the form and our team will help you understand your qualification options.
                                </p>
                            </div>

                            <form action="{{ url()->current() }}" method="POST" class="space-y-4">

                                @csrf

                                <input type="hidden" name="qualification_code" value="{{ $qualification['code'] ?? '' }}">

                                <input type="hidden" name="qualification_slug" value="{{ $qualification['slug'] ?? '' }}">

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                                    <div>
                                        <label for="full_name" class="mb-1.5 block text-sm font-semibold text-slate-700">
                                            Full Name *
                                        </label>

                                        <input id="full_name" type="text" name="name" value="{{ old('name') }}"
                                            placeholder="Your full name" autocomplete="name" required
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-500/10">

                                        @error('name')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="mb-1.5 block text-sm font-semibold text-slate-700">
                                            Email Address *
                                        </label>

                                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                                            placeholder="name@example.com" autocomplete="email" required
                                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-500/10">

                                        @error('email')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div>
                                    <label for="phone" class="mb-1.5 block text-sm font-semibold text-slate-700">
                                        Phone Number *
                                    </label>

                                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                        placeholder="Your phone number" autocomplete="tel" required
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-500/10">

                                    @error('phone')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="message" class="mb-1.5 block text-sm font-semibold text-slate-700">
                                        Message <span class="font-normal text-slate-400">(Optional)</span>
                                    </label>

                                    <textarea id="message" name="message" rows="3" placeholder="Tell us how we can help..."
                                        class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-2 focus:ring-brand-500/10">{{ old('message') }}</textarea>

                                    @error('message')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-600/20 transition hover:bg-brand-700 active:scale-[0.99]">
                                    Submit Enquiry
                                    <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                                </button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif


    {{-- QUALIFICATION OVERVIEW + FAST FACTS + BENEFITS --}}

    @if ($hasOverview || $hasFastFacts || $hasBenefits)

        <section id="qualification-overview" class="border-y border-slate-100 bg-white py-14 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 items-start gap-10 lg:grid-cols-12 lg:gap-14">

                    {{-- Overview --}}
                    @if ($hasOverview)

                        <div class="{{ $hasFastFacts || $hasBenefits ? 'lg:col-span-7' : 'lg:col-span-12' }} space-y-6">

                            <div>
                                <span
                                    class="inline-flex items-center gap-2 rounded-full border border-secondary-200 bg-secondary-50 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-secondary-700">
                                    <iconify-icon icon="lucide:book-open" class="text-base"></iconify-icon>
                                    Qualification Overview
                                </span>
                            </div>

                            @if (filled($overview['heading'] ?? null))
                                <h2
                                    class="text-2xl font-black leading-tight tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                                    {{ $overview['heading'] }}
                                </h2>
                            @endif

                            @if (filled($overview['description'] ?? null))
                                <p class="text-base leading-relaxed text-slate-600">
                                    {{ $overview['description'] }}
                                </p>
                            @endif

                            @if (!empty($overviewContent))
                                <div class="space-y-4">
                                    @foreach ($overviewContent as $paragraph)
                                        @if (is_string($paragraph) && filled($paragraph))
                                            <p class="text-sm leading-7 text-slate-600 sm:text-base">
                                                {{ $paragraph }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            @if (filled($qualification['name'] ?? null))
                                <div
                                    class="flex items-center gap-4 rounded-2xl border border-secondary-100 bg-secondary-50/60 p-5">

                                    <div
                                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-secondary-600 shadow-sm">
                                        <iconify-icon icon="lucide:award" class="text-2xl"></iconify-icon>
                                    </div>

                                    <div>
                                        <p class="text-xs font-bold uppercase tracking-wider text-secondary-700">
                                            Qualification
                                        </p>
                                        <p class="mt-1 text-sm font-bold text-slate-900 sm:text-base">
                                            {{ $qualification['name'] }}
                                        </p>
                                    </div>

                                </div>
                            @endif

                        </div>

                    @endif


                    {{-- Right Column --}}
                    @if ($hasFastFacts || $hasBenefits)

                        <div class="{{ $hasOverview ? 'lg:col-span-5' : 'lg:col-span-12' }} space-y-6">

                            {{-- Fast Facts --}}
                            @if ($hasFastFacts)
                                <div class="rounded-3xl border border-brand-100 bg-brand-50/60 p-6 sm:p-7">

                                    <div class="mb-5 flex items-center gap-3">
                                        <span
                                            class="flex h-11 w-11 items-center justify-center rounded-xl bg-white text-brand-600 shadow-sm">
                                            <iconify-icon icon="lucide:info" class="text-xl"></iconify-icon>
                                        </span>

                                        <h3 class="text-lg font-extrabold text-brand-950">
                                            Fast Facts
                                        </h3>
                                    </div>

                                    <dl class="divide-y divide-brand-100">

                                        @foreach ($fastFacts as $fact)
                                            @if (is_array($fact) && filled($fact['label'] ?? null) && filled($fact['value'] ?? null))
                                                <div class="flex items-start justify-between gap-4 py-3">
                                                    <dt class="text-sm text-slate-500">
                                                        {{ $fact['label'] }}
                                                    </dt>

                                                    <dd class="max-w-[60%] text-right text-sm font-bold text-brand-950">
                                                        {{ $fact['value'] }}
                                                    </dd>
                                                </div>
                                            @endif
                                        @endforeach

                                    </dl>
                                </div>
                            @endif

<div data-reveal="up"
                                class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-slate-50/70 p-6 shadow-xl shadow-slate-200/50 backdrop-blur-xl sm:p-8 is-visible"
                                style="--reveal-delay: 0ms;">



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
                                            <p class="text-xs font-medium text-slate-500">Fully aligned with AQF standards
                                                for
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
                                            <iconify-icon icon="lucide:briefcase"
                                                class="text-base font-bold"></iconify-icon>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-bold text-slate-900">Industry-Ready Practical Skills
                                            </h4>
                                            <p class="text-xs font-medium text-slate-500">Tailored directly for immediate
                                                workplace application.</p>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                         

                        </div>

                    @endif

                </div>

            </div>
        </section>

    @endif


    @if (!empty($benefits))
<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

    {{-- Header Section --}}
    <div class="text-center max-w-3xl mx-auto mb-14">

        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider text-brand-500 bg-brand-50 border border-brand-100 mb-4">
            <iconify-icon icon="lucide:award" class="text-base"></iconify-icon>
            Course Benefits
        </span>

        @if (filled($whyChoose['heading'] ?? null))
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                {{ $whyChoose['heading'] }}
            </h2>
        @endif

        @if (filled($whyChoose['description'] ?? null))
            <p class="mt-3 text-base sm:text-lg text-slate-600">
                {{ $whyChoose['description'] }}
            </p>
        @endif

    </div>

    {{-- Benefits Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        @foreach ($benefits as $benefit)

            <div class="group relative bg-white rounded-2xl p-7 border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden">
             
                <div>

                    {{-- Icon --}}
                    <div class="w-14 h-14 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center mb-6 group-hover:bg-brand-500 group-hover:text-white transition-colors duration-300 shadow-sm">

                        <iconify-icon
                            icon="lucide:{{ $benefit['icon'] ?? 'award' }}"
                            width="28"
                            height="28">
                        </iconify-icon>

                    </div>

                    {{-- Benefit Number --}}
                    <span class="text-xs font-bold text-brand-500 uppercase tracking-wider">
                        Benefit {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </span>

                    {{-- Title --}}
                    @if (filled($benefit['title'] ?? null))
                        <h3 class="text-sm sm:text-base font-bold text-slate-900 mt-1 mb-3 group-hover:text-brand-500 transition-colors">
                            {{ $benefit['title'] }}
                        </h3>
                    @endif

                    {{-- Description --}}
                    @if (filled($benefit['description'] ?? null))
                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ $benefit['description'] }}
                        </p>
                    @endif

                </div>

                {{-- Optional Footer (only if JSON contains footer) --}}
                @if (filled($benefit['footer'] ?? null))
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-semibold text-brand-500 gap-1 group-hover:gap-2 transition-all">
                        <span>{{ $benefit['footer'] }}</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-sm"></iconify-icon>
                    </div>
                @endif

            </div>

        @endforeach

    </div>

</section>
@endif


    {{-- ENTRY REQUIREMENTS + CORE SKILLS --}}



    @if ($hasEntryRequirements)

        <section id="entry-requirements" class="bg-slate-50 py-14 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mx-auto mb-10 max-w-3xl text-center">

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-secondary-500/10 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-secondary-700">
                        <iconify-icon icon="lucide:clipboard-check" class="text-base"></iconify-icon>
                        Before You Apply
                    </span>

                    <h2 class="mt-4 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                        {{ $entryRequirements['heading'] }}
                    </h2>

                </div>


                <div
                    class="grid grid-cols-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-900/5 sm:rounded-3xl lg:grid-cols-12">

                 
                    <div
                        class="relative flex flex-col justify-between gap-6 overflow-hidden bg-white p-5 sm:gap-8 sm:p-8 md:p-10 lg:col-span-6">

                        {{-- Decorative Accent --}}
                        <div
                            class="pointer-events-none absolute -right-20 -top-20 h-56 w-56 rounded-full bg-brand-50 blur-3xl sm:-right-24 sm:-top-24 sm:h-72 sm:w-72">
                        </div>
                        <div
                            class="pointer-events-none absolute -bottom-16 -left-16 h-48 w-48 rounded-full bg-secondary-50 blur-3xl sm:-bottom-20 sm:-left-20 sm:h-64 sm:w-64">
                        </div>
                        @if ($hasRequirements)

                            <div class="">

                                @if (filled($qualificationRequirements['title'] ?? null))
                                    <div class="flex items-center gap-4">

                                        <span
                                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-secondary-50 text-secondary-600">
                                            <iconify-icon icon="lucide:clipboard-list" class="text-2xl"></iconify-icon>
                                        </span>

                                        <h3 class="text-xl font-extrabold text-slate-900">
                                            {{ $qualificationRequirements['title'] }}
                                        </h3>

                                    </div>
                                @endif

                                @if (filled($qualificationRequirements['description'] ?? null))
                                    <p class="mt-5 text-sm leading-7 text-slate-600">
                                        {{ $qualificationRequirements['description'] }}
                                    </p>
                                @endif

                                @if (!empty($requirementItems))
                                    <ul class="mt-6 space-y-4">

                                        @foreach ($requirementItems as $requirement)
                                            @if (is_string($requirement) && filled($requirement))
                                                <li class="flex items-start gap-3 text-sm leading-relaxed text-slate-700">

                                                    <span
                                                        class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-secondary-50 text-secondary-600">
                                                        <iconify-icon icon="lucide:check" class="text-xs"></iconify-icon>
                                                    </span>

                                                    <span>{{ $requirement }}</span>

                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                @endif

                                @if (filled($qualificationRequirements['note'] ?? null))
                                    <p class="mt-5 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm leading-relaxed text-amber-900">
                                        {{ $qualificationRequirements['note'] }}
                                    </p>
                                @endif

                            </div>

                        @endif

                    </div>

                   
                    <div
                        class="relative flex flex-col justify-center overflow-hidden bg-brand-950 p-5 sm:p-8 md:p-10 lg:col-span-6">

                        {{-- Form Background Decorations --}}
                        <div
                            class="pointer-events-none absolute -right-20 -top-20 h-56 w-56 rounded-full bg-brand-500/20 blur-[80px] sm:-right-24 sm:-top-24 sm:h-72 sm:w-72 sm:blur-[100px]">
                        </div>
                        <div
                            class="pointer-events-none absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-secondary-500/10 blur-[80px] sm:-bottom-24 sm:-left-24 sm:h-64 sm:w-64 sm:blur-[100px]">
                        </div>
                        @if ($hasCoreSkills)

                            <div class="">

                                @if (filled($coreSkills['title'] ?? null))
                                    <div class="flex items-center gap-4">

                                        <span
                                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-brand-50 text-brand-600">
                                            <iconify-icon icon="lucide:brain-circuit" class="text-2xl"></iconify-icon>
                                        </span>

                                        <h3 class="text-xl font-extrabold text-white">
                                            {{ $coreSkills['title'] }}
                                        </h3>

                                    </div>
                                @endif

                                @if (filled($coreSkills['description'] ?? null))
                                    <p class="mt-5 text-sm leading-7 text-white">
                                        {{ $coreSkills['description'] }}
                                    </p>
                                @endif

                                @if (!empty($coreSkillItems))
                                    <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">

                                        @foreach ($coreSkillItems as $skill)
                                            @if (is_array($skill) && (filled($skill['name'] ?? null) || filled($skill['description'] ?? null)))
                                                <div class="rounded-2xl border border-bg-brand-50 bg-brand-50 p-4">

                                                    @if (filled($skill['name'] ?? null))
                                                        <h4 class="text-sm font-bold text-brand-950">
                                                            {{ $skill['name'] }}
                                                        </h4>
                                                    @endif

                                                    @if (filled($skill['description'] ?? null))
                                                        <p class="mt-2 text-xs leading-relaxed text-slate-600">
                                                            {{ $skill['description'] }}
                                                        </p>
                                                    @endif

                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                @endif

                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endif


    {{--  COURSE STRUCTURE--}}

    @if ($hasCourseStructure)

        <section id="course-units" class="bg-white py-14 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mx-auto mb-12 max-w-3xl text-center">

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-secondary-50 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-secondary-700">
                        <iconify-icon icon="lucide:book-open-check" class="text-base"></iconify-icon>
                        Course Curriculum
                    </span>

                    @if (filled($courseStructure['heading'] ?? null))
                        <h2 class="mt-4 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                            {{ $courseStructure['heading'] }}
                        </h2>
                    @endif

                    @if (filled($courseStructure['description'] ?? null))
                        <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                            {{ $courseStructure['description'] }}
                        </p>
                    @endif

                    {{-- Unit Summary --}}
                    @if (filled($courseStructure['total_units'] ?? null) ||
                            filled($courseStructure['core_units_count'] ?? null) ||
                            filled($courseStructure['elective_units_count'] ?? null))
                        <div
                            class="mt-6 inline-flex flex-wrap items-center justify-center gap-3 rounded-2xl border border-brand-100 bg-brand-50/70 px-5 py-3">

                            @if (filled($courseStructure['total_units'] ?? null))
                                <span class="text-sm font-bold text-brand-900">
                                    Total Units: {{ $courseStructure['total_units'] }}
                                </span>
                            @endif

                            @if (filled($courseStructure['core_units_count'] ?? null))
                                <span class="h-4 w-px bg-brand-200"></span>
                                <span class="text-sm font-semibold text-slate-600">
                                    {{ $courseStructure['core_units_count'] }} Core
                                </span>
                            @endif

                            @if (filled($courseStructure['elective_units_count'] ?? null))
                                <span class="h-4 w-px bg-brand-200"></span>
                                <span class="text-sm font-semibold text-slate-600">
                                    {{ $courseStructure['elective_units_count'] }} Electives
                                </span>
                            @endif

                        </div>
                    @endif

                </div>


                @if ($hasCourseGroups)
                    <div class="grid grid-cols-1  gap-6">

                        @foreach ($groups as $group)
                            @php
                                $groupUnits = is_array($group['units'] ?? null) ? $group['units'] : [];

                                $validUnits = array_filter(
                                    $groupUnits,
                                    fn($unit) => is_array($unit) &&
                                        (filled($unit['code'] ?? null) || filled($unit['title'] ?? null)),
                                );

                                $isCore = ($group['type'] ?? '') === 'core';
                            @endphp

                            @if (!empty($validUnits))
                                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                                    <div class="mb-6 flex items-start gap-4 border-b border-slate-100 pb-5">

                                        <span
                                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl {{ $isCore ? 'bg-brand-50 text-brand-600' : 'bg-amber-50 text-amber-600' }}">
                                            <iconify-icon icon="lucide:{{ $isCore ? 'bookmark-check' : 'book-marked' }}"
                                                class="text-2xl"></iconify-icon>
                                        </span>

                                        <div class="min-w-0 flex-1">

                                            @if (filled($group['title'] ?? null))
                                                <h3 class="text-lg font-extrabold text-slate-900 sm:text-xl">
                                                    {{ $group['title'] }}
                                                </h3>
                                            @endif

                                            @if (filled($group['description'] ?? null))
                                                <p class="mt-1 text-xs leading-relaxed text-slate-500 sm:text-sm">
                                                    {{ $group['description'] }}
                                                </p>
                                            @endif

                                            <span
                                                class="mt-2 inline-flex rounded-full {{ $isCore ? 'bg-brand-50 text-brand-700' : 'bg-amber-50 text-amber-700' }} px-3 py-1 text-xs font-bold">
                                                {{ count($validUnits) }} Units
                                            </span>

                                        </div>

                                    </div>


                                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                                        @foreach ($validUnits as $unit)
                                            <div
                                                class="flex items-start gap-3 rounded-xl border border-slate-100 bg-slate-50/70 p-3.5 transition hover:border-brand-200 hover:bg-white sm:p-4">

                                                <span
                                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg {{ $isCore ? 'bg-brand-100 text-brand-700' : 'bg-amber-100 text-amber-700' }} text-xs font-extrabold">
                                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                                </span>

                                                <div class="min-w-0 flex-1">

                                                    @if (filled($unit['code'] ?? null))
                                                        <span class="text-xs font-extrabold tracking-wide text-brand-700">
                                                            {{ $unit['code'] }}
                                                        </span>
                                                    @endif

                                                    @if (filled($unit['title'] ?? null))
                                                        <p class="mt-1 text-sm leading-relaxed text-slate-700">
                                                            {{ $unit['title'] }}
                                                        </p>
                                                    @endif

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                    @if (!empty($group['subgroups']) && is_array($group['subgroups']))
                                        <div class="mt-6 space-y-4">
                                            @foreach ($group['subgroups'] as $subgroup)
                                                @if (is_array($subgroup) && (filled($subgroup['title'] ?? null) || filled($subgroup['description'] ?? null) || !empty($subgroup['units'])))
                                                    <div class="rounded-2xl border border-amber-100 bg-amber-50/40 p-4">
                                                        @if (filled($subgroup['title'] ?? null))
                                                            <h4 class="text-sm font-bold text-slate-900">
                                                                {{ $subgroup['title'] }}
                                                            </h4>
                                                        @endif
                                                        @if (filled($subgroup['description'] ?? null))
                                                            <p class="mt-1 text-sm leading-relaxed text-slate-600">
                                                                {{ $subgroup['description'] }}
                                                            </p>
                                                        @endif
                                                        @if (!empty($subgroup['units']) && is_array($subgroup['units']))
                                                            <ul class="mt-3 space-y-2">
                                                                @foreach ($subgroup['units'] as $subgroupUnit)
                                                                    @if (is_array($subgroupUnit) && (filled($subgroupUnit['code'] ?? null) || filled($subgroupUnit['title'] ?? null)))
                                                                        <li class="text-sm text-slate-700">
                                                                            @if (filled($subgroupUnit['code'] ?? null))
                                                                                <span class="font-bold text-brand-700">{{ $subgroupUnit['code'] }}</span>
                                                                            @endif
                                                                            {{ $subgroupUnit['title'] ?? '' }}
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (filled($group['note'] ?? null))
                                        <p class="mt-5 rounded-xl border border-amber-200 bg-amber-50 p-4 text-sm leading-relaxed text-amber-900">
                                            {{ $group['note'] }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        @endforeach

                    </div>
                @endif
                @if (filled($courseStructure['note'] ?? null))
                    <p class="mt-6 rounded-2xl border border-amber-200 bg-amber-50 p-5 text-sm leading-relaxed text-amber-900">
                        {{ $courseStructure['note'] }}
                    </p>
                @endif

            </div>
        </section>

    @endif


    {{-- SKILLS YOU WILL DEVELOP --}}

    @if ($hasSkills)
        <section id="skills-you-will-develop" class="bg-slate-50 py-14 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mx-auto mb-12 max-w-3xl text-center">

                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-50 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-brand-700">
                        <iconify-icon icon="lucide:graduation-cap" class="text-base"></iconify-icon>
                        Skills Development
                    </span>

                    @if (filled($skills['heading'] ?? null))
                        <h2 class="mt-4 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                            {{ $skills['heading'] }}
                        </h2>
                    @endif

                </div>


                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($skills['items'] ?? [] as $skill)
                        @if (is_array($skill) && (filled($skill['title'] ?? null) || filled($skill['description'] ?? null)))
                            <article
                                class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-300 hover:shadow-lg">

                                <div class="flex items-center justify-between">

                                    <span
                                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-sm font-black text-brand-700 transition group-hover:bg-brand-600 group-hover:text-white">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                    <iconify-icon icon="lucide:arrow-up-right"
                                        class="text-xl text-slate-300 transition group-hover:text-brand-600"></iconify-icon>

                                </div>

                                @if (filled($skill['title'] ?? null))
                                    <h3 class="mt-5 text-base font-extrabold leading-snug text-slate-900">
                                        {{ $skill['title'] }}
                                    </h3>
                                @endif

                                @if (filled($skill['description'] ?? null))
                                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                                        {{ $skill['description'] }}
                                    </p>
                                @endif

                            </article>
                        @endif
                    @endforeach

                </div>

            </div>
        </section>
    @endif


    {{--  CAREER PATHWAYS --}}

    @if ($hasCareerPathways)
        <section id="career-pathways" class="bg-white py-14 sm:py-20">

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <div class="mx-auto mb-12 max-w-3xl text-center">

                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-secondary-50 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-secondary-700">
                        <iconify-icon icon="lucide:briefcase-business" class="text-base"></iconify-icon>
                        Career Pathways
                    </span>

                    @if (filled($careerPathways['heading'] ?? null))
                        <h2 class="mt-4 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                            {{ $careerPathways['heading'] }}
                        </h2>
                    @endif

                    @if (filled($careerPathways['description'] ?? null))
                        <p class="mt-4 text-sm leading-relaxed text-slate-600 sm:text-base">
                            {{ $careerPathways['description'] }}
                        </p>
                    @endif

                </div>


                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($careerPathways['items'] ?? [] as $career)
                        @if (is_array($career) && (filled($career['title'] ?? null) || filled($career['description'] ?? null)))
                            <article
                                class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-300 hover:shadow-lg">

                                <div class="flex items-center justify-between">

                                    <span
                                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition group-hover:bg-brand-600 group-hover:text-white">
                                        <iconify-icon icon="lucide:briefcase-business" class="text-xl"></iconify-icon>
                                    </span>

                                    <span class="text-2xl font-black text-slate-200 transition group-hover:text-brand-200">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                </div>

                                @if (filled($career['title'] ?? null))
                                    <h3 class="mt-5 text-lg font-extrabold text-slate-900">
                                        {{ $career['title'] }}
                                    </h3>
                                @endif

                                @if (filled($career['description'] ?? null))
                                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                                        {{ $career['description'] }}
                                    </p>
                                @endif

                            </article>
                        @endif
                    @endforeach

                </div>

            </div>
        </section>
    @endif


    



@endsection
