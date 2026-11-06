
@extends('frontend.layouts.app')


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
                        {{ $industry['name'] ?? 'All Qualifications' }}
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
                        Explore Qualifications
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
                        <button type="button" @click="activeFilter = 'all'" :class="activeFilter === 'all' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'" class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200">All Qualifications</button>
                        @foreach ($courseLevels as $level)
                            @php
                                $levelKey = \Illuminate\Support\Str::slug($level);
                            @endphp
                            <button type="button" @click="activeFilter = '{{ $levelKey }}'" :class="activeFilter === '{{ $levelKey }}' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'" class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200">{{ $level }}</button>
                        @endforeach
                    </div>
                    {{-- QUALIFICATIONS GRID --}}
                    <div
                        x-ref="courseGrid"
                        class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3"
                    >

                        @forelse ($courses as $course)

                            @php

                                $filterKey = \Illuminate\Support\Str::slug($course['level'] ?? 'other');

                            @endphp


                           @include('frontend.pages.industry.qualificationCard', ['course' => $course, 'filterKey' => $filterKey])


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
