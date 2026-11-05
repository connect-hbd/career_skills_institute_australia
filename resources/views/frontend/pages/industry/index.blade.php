
@extends('frontend.layouts.app')

@section('title', $industry['name'] ?? 'Qualifications')

@section('content')

    {{-- EMPTY STATE CSS --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden bg-[#0A0F1D] py-14 lg:py-20 text-white">

        {{-- Ambient Background --}}
        <div class="pointer-events-none absolute -top-20 -left-20 h-96 w-96 rounded-full bg-[#1968b2]/20 blur-[120px]"></div>

        <div class="pointer-events-none absolute top-1/2 -right-20 h-96 w-96 -translate-y-1/2 rounded-full bg-cyan-500/10 blur-[120px]"></div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12">

                {{-- Left Content --}}
                <div class="space-y-4 lg:col-span-8">

                    <div class="inline-flex items-center gap-2 rounded-full border border-[#1968b2]/30 bg-[#1968b2]/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-[#1968b2]">

                        <span class="flex h-2 w-2 animate-pulse rounded-full bg-[#1968b2]"></span>

                        <span>01 Disciplines & Sectors</span>

                    </div>

                    <h1 class="text-3xl font-extrabold leading-[1.12] tracking-tight text-white sm:text-5xl lg:text-6xl">
                        {{ $industry['name'] ?? '' }}
                    </h1>

                    <p class="max-w-2xl text-sm font-normal leading-relaxed text-slate-300 sm:text-base lg:text-lg">
                        {{ $industry['description'] ?? 'Explore nationally recognised qualifications and develop practical skills tailored for immediate industry application and RPL credit pathways.' }}
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">

                        <a href="#courses"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1968b2] px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-[#1968b2]/30 transition-all duration-300 hover:scale-[1.02] hover:bg-[#155b9d] active:scale-95">

                            <span>Explore Qualifications</span>

                            <iconify-icon icon="lucide:arrow-down" class="text-lg"></iconify-icon>

                        </a>

                        <div class="flex items-center gap-6 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-2 text-xs text-slate-300 backdrop-blur-md">

                            <div class="flex items-center gap-2">
                                <iconify-icon icon="lucide:award" class="text-base text-[#1968b2]"></iconify-icon>
                                <span>AQF Accredited</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <iconify-icon icon="lucide:shield-check" class="text-base text-emerald-400"></iconify-icon>
                                <span>ASQA Verified</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- MAIN QUALIFICATIONS SECTION --}}
    <section id="courses" class="min-h-[60vh] bg-slate-50/50 py-12 md:py-16">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- SECTION HEADER --}}
            <div class="mb-10 space-y-6">

                <div class="mb-8 flex flex-col gap-3">

                    <span class="text-xs font-semibold uppercase tracking-wider text-[#1968b2]">
                        Explore Industries
                    </span>

                    <div class="flex flex-col gap-2">

                        <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 md:text-3xl">
                            Nationally Recognised Training Pathways
                        </h2>

                        <p class="text-sm text-slate-600">
                            Filter by qualification tier to find the right entry-level or advanced training path for your career goals.
                        </p>

                    </div>

                </div>


                {{-- FILTER + QUALIFICATIONS --}}
                <div
                    x-data="{
                        activeFilter: 'all',

                        get hasVisibleCourses() {
                            if (!this.$refs.courseGrid) {
                                return false;
                            }

                            const cards = this.$refs.courseGrid.querySelectorAll('[data-filter-key]');

                            return Array.from(cards).some(card => {
                                return this.activeFilter === 'all' ||
                                    card.dataset.filterKey === this.activeFilter;
                            });
                        }
                    }"
                    class="space-y-6"
                >

                    {{-- FILTER TABS --}}
                    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">

                        {{-- ALL --}}
                        <button
                            type="button"
                            @click="activeFilter = 'all'"
                            :class="activeFilter === 'all'
                                ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200"
                        >
                            All Qualifications
                        </button>


                        {{-- CERTIFICATE I --}}
                        <button
                            type="button"
                            @click="activeFilter = 'cert1'"
                            :class="activeFilter === 'cert1'
                                ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200"
                        >
                            Certificate I
                        </button>


                        {{-- CERTIFICATE II --}}
                        <button
                            type="button"
                            @click="activeFilter = 'cert2'"
                            :class="activeFilter === 'cert2'
                                ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200"
                        >
                            Certificate II
                        </button>


                        {{-- CERTIFICATE III --}}
                        <button
                            type="button"
                            @click="activeFilter = 'cert3'"
                            :class="activeFilter === 'cert3'
                                ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200"
                        >
                            Certificate III
                        </button>


                        {{-- CERTIFICATE IV --}}
                        <button
                            type="button"
                            @click="activeFilter = 'cert4'"
                            :class="activeFilter === 'cert4'
                                ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200"
                        >
                            Certificate IV
                        </button>


                        {{-- DIPLOMA --}}
                        <button
                            type="button"
                            @click="activeFilter = 'diploma'"
                            :class="activeFilter === 'diploma'
                                ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20'
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200"
                        >
                            Diploma
                        </button>

                    </div>


                    {{-- QUALIFICATIONS GRID --}}
                    <div
                        x-ref="courseGrid"
                        class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3"
                    >

                        @forelse ($courses as $course)

                            @php

                                /*
                                 * Qualification Level Matching
                                 * Check IV, III, II before I
                                 * to avoid incorrect matching.
                                 */

                                $levelStr = strtolower(trim(
                                    $course['level'] ?? ($course['name'] ?? '')
                                ));

                                $filterKey = 'other';

                                if (
                                    str_contains($levelStr, 'certificate iv') ||
                                    str_contains($levelStr, 'cert iv')
                                ) {
                                    $filterKey = 'cert4';

                                } elseif (
                                    str_contains($levelStr, 'certificate iii') ||
                                    str_contains($levelStr, 'cert iii')
                                ) {
                                    $filterKey = 'cert3';

                                } elseif (
                                    str_contains($levelStr, 'certificate ii') ||
                                    str_contains($levelStr, 'cert ii')
                                ) {
                                    $filterKey = 'cert2';

                                } elseif (
                                    str_contains($levelStr, 'certificate i') ||
                                    str_contains($levelStr, 'cert i')
                                ) {
                                    $filterKey = 'cert1';

                                } elseif (
                                    str_contains($levelStr, 'diploma')
                                ) {
                                    $filterKey = 'diploma';
                                }

                            @endphp


                            {{-- QUALIFICATION CARD --}}
                            <article
                                data-filter-key="{{ $filterKey }}"
                                x-show="activeFilter === 'all' || activeFilter === '{{ $filterKey }}'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#1968b2]/40 hover:shadow-xl"
                            >

                                {{-- CARD IMAGE --}}
                                <div>

                                    <div class="relative h-52 overflow-hidden bg-slate-900">

                                        <img
                                            src="{{ !empty($course['image'])
                                                ? asset($course['image'])
                                                : asset('images/course-placeholder.webp') }}"
                                            alt="{{ $course['name'] ?? 'Course' }}"
                                            loading="lazy"
                                            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                        />

                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>


                                        {{-- QUALIFICATION LEVEL --}}
                                        <div class="absolute left-3 top-3 flex items-center gap-1.5 rounded-lg border border-slate-700/80 bg-slate-900/90 px-2.5 py-1 backdrop-blur-md">

                                            <span class="h-2 w-2 animate-pulse rounded-full bg-[#1968b2]"></span>

                                            <span class="text-[11px] font-bold uppercase tracking-wider text-white">
                                                {{ $course['level'] ?? 'Nationally Recognised' }}
                                            </span>

                                        </div>


                                        {{-- COURSE CODE --}}
                                        @if (!empty($course['code']))

                                            <div class="absolute right-3 top-3 rounded-lg border border-white/40 bg-white/90 px-2.5 py-1 text-[11px] font-mono font-bold text-slate-900 shadow-sm backdrop-blur-md">
                                                {{ $course['code'] }}
                                            </div>

                                        @endif

                                    </div>


                                    {{-- CARD CONTENT --}}
                                    <div class="space-y-3 p-6">

                                        <h3 class="line-clamp-2 text-lg font-bold tracking-tight text-slate-900 transition-colors duration-200 group-hover:text-[#1968b2]">

                                            <a href="{{ !empty($course['slug'])
                                                ? route('course.show', ['courseslug' => $course['slug']])
                                                : '#' }}">

                                                {{ $course['name'] ?? 'Untitled Qualification' }}

                                            </a>

                                        </h3>


                                        <p class="line-clamp-2 text-xs leading-relaxed text-slate-600 sm:text-sm">

                                            {{ $course['hero_description']
                                                ?? $course['short_description']
                                                ?? 'Gain industry-standard technical competencies and certified RPL pathways.' }}

                                        </p>

                                    </div>

                                </div>


                                {{-- CARD FOOTER --}}
                                <div class="flex items-center justify-between border-t border-slate-100 px-6 pb-6 pt-4">

                                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">

                                        <iconify-icon
                                            icon="lucide:clock"
                                            class="text-base text-[#1968b2]"
                                        ></iconify-icon>

                                        <span>
                                            {{ $course['key_information']['duration'] ?? 'Flexible Duration' }}
                                        </span>

                                    </div>


                                    <a
                                        href="{{ !empty($course['slug'])
                                            ? route('course.show', ['courseslug' => $course['slug']])
                                            : '#' }}"
                                        class="inline-flex items-center gap-1.5 rounded-xl bg-[#1968b2] px-4 py-2 text-xs font-bold text-white shadow-sm transition-all duration-200 hover:scale-105 hover:bg-[#155b9d]"
                                    >

                                        <span>View Details</span>

                                        <iconify-icon
                                            icon="lucide:arrow-up-right"
                                            class="text-sm"
                                        ></iconify-icon>

                                    </a>

                                </div>

                            </article>


                        @empty

                            {{-- PHP EMPTY STATE: NO QUALIFICATIONS IN INDUSTRY --}}
                            <div
                                class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center"
                            >

                                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                    <iconify-icon
                                        icon="lucide:book-open"
                                        class="text-2xl"
                                    ></iconify-icon>

                                </div>

                                <h3 class="text-lg font-bold text-slate-900">
                                    No Qualifications Listed Yet
                                </h3>

                                <p class="mx-auto mt-1 max-w-sm text-sm text-slate-500">
                                    There are currently no active Qualifications available under this discipline filter.
                                </p>

                                <a
                                    href="{{ url('/industries') }}"
                                    class="mt-4 inline-flex items-center gap-2 rounded-xl bg-[#1968b2] px-5 py-2.5 text-xs font-bold text-white transition hover:bg-[#155b9d]"
                                >

                                    <span>Browse All Sectors</span>

                                    <iconify-icon
                                        icon="lucide:arrow-right"
                                        class="text-sm"
                                    ></iconify-icon>

                                </a>

                            </div>

                        @endforelse


                        {{-- ALPINE EMPTY STATE: NO QUALIFICATION IN SELECTED LEVEL --}}
                        <div
                            x-cloak
                            x-show="!hasVisibleCourses"
                            x-transition
                            class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center"
                        >

                            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                <iconify-icon
                                    icon="lucide:book-open"
                                    class="text-2xl"
                                ></iconify-icon>

                            </div>


                            <h3 class="text-lg font-bold text-slate-900">
                                No Qualifications Listed Yet
                            </h3>


                            <p class="mx-auto mt-1 max-w-sm text-sm text-slate-500">
                                There are currently no active Qualifications available under this discipline filter.
                            </p>


                            <a
                                href="{{ url('/industries') }}"
                                class="mt-4 inline-flex items-center gap-2 rounded-xl bg-[#1968b2] px-5 py-2.5 text-xs font-bold text-white transition hover:bg-[#155b9d]"
                            >

                                <span>Browse All Sectors</span>

                                <iconify-icon
                                    icon="lucide:arrow-right"
                                    class="text-sm"
                                ></iconify-icon>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
