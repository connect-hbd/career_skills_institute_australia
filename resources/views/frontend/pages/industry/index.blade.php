@extends('frontend.layouts.app')

@section('title', $industry['name'] ?? 'Courses')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden bg-[#0A0F1D] py-14 lg:py-20 text-white">
        <!-- Ambient Background Radial Glows -->
        <div class="pointer-events-none absolute -top-20 -left-20 h-96 w-96 rounded-full bg-[#1968b2]/20 blur-[120px]"></div>
        <div
            class="pointer-events-none absolute top-1/2 -right-20 h-96 w-96 -translate-y-1/2 rounded-full bg-cyan-500/10 blur-[120px]">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

                <!-- Left Text Content -->
                <div class="lg:col-span-8 space-y-4 animate-fade-in-left">
                    <div
                        class="inline-flex items-center gap-2 rounded-full bg-[#1968b2]/10 border border-[#1968b2]/30 px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-[#1968b2]">
                        <span class="flex h-2 w-2 rounded-full bg-[#1968b2] animate-pulse"></span>
                        <span>01 Disciplines & Sectors</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.12]">
                        {{ $industry['name'] ?? '' }}
                    </h1>

                    <p class="max-w-2xl text-sm sm:text-base lg:text-lg text-slate-300 font-normal leading-relaxed">
                        {{ $industry['description'] ?? 'Explore nationally recognised qualifications and develop practical skills tailored for immediate industry application and RPL credit pathways.' }}
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#courses"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1968b2] hover:bg-[#155b9d] text-white font-semibold px-6 py-3 text-sm shadow-lg shadow-[#1968b2]/30 transition-all duration-300 hover:scale-[1.02] active:scale-95">
                            <span>Explore Courses</span>
                            <iconify-icon icon="lucide:arrow-down" class="text-lg"></iconify-icon>
                        </a>

                        <div
                            class="flex items-center gap-6 px-4 py-2 rounded-xl bg-slate-900/60 border border-slate-800 text-xs text-slate-300 backdrop-blur-md">
                            <div class="flex items-center gap-2">
                                <iconify-icon icon="lucide:award" class="text-[#1968b2] text-base"></iconify-icon>
                                <span>AQF Accredited</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <iconify-icon icon="lucide:shield-check" class="text-emerald-400 text-base"></iconify-icon>
                                <span>ASQA Verified</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- MAIN COURSES SECTION WITH FILTER BAR --}}
    <section id="courses" class="py-12 md:py-16 bg-slate-50/50 min-h-[60vh]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- SECTION HEADER & DYNAMIC FILTER TABS --}}
            <div class="mb-10 space-y-6">
                <!-- Section Header (Optional Context) -->
                <div class="mb-8 flex flex-col gap-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#1968b2]">Explore Industries</span>
                    <div class="flex gap-2 flex-col">
                        <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-slate-900 mt-1">
                            Nationally Recognised Training Pathways
                        </h2>
                        <p class="text-sm text-slate-600 ">
                            Filter by qualification tier to find the right entry-level or advanced training path for your
                            career goals.
                        </p>
                    </div>

                </div>

                <!-- Interactive Filter Tabs -->
                <div x-data="{ activeFilter: 'all' }" class="space-y-6">
                    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
                        <button @click="activeFilter = 'all'"
                            :class="activeFilter === 'all' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 whitespace-nowrap">
                            All Qualifications
                        </button>

                        <button @click="activeFilter = 'cert1'"
                            :class="activeFilter === 'cert1' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 whitespace-nowrap">
                            Certificate I
                        </button>

                        <button @click="activeFilter = 'cert2'"
                            :class="activeFilter === 'cert2' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 whitespace-nowrap">
                            Certificate II
                        </button>

                        <button @click="activeFilter = 'cert3'"
                            :class="activeFilter === 'cert3' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 whitespace-nowrap">
                            Certificate III
                        </button>

                        <button @click="activeFilter = 'cert4'"
                            :class="activeFilter === 'cert4' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 whitespace-nowrap">
                            Certificate IV
                        </button>

                        <button @click="activeFilter = 'diploma'"
                            :class="activeFilter === 'diploma' ? 'bg-[#1968b2] text-white shadow-md shadow-[#1968b2]/20' :
                                'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-2 rounded-xl text-xs font-bold tracking-wide transition-all duration-200 whitespace-nowrap">
                            Diploma 
                        </button>
                    </div>

                    {{-- COURSES GRID --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                        @forelse ($courses as $course)
                            @php
                                // Normalize level string for Alpine filter matching
                                $levelStr = strtolower($course['level'] ?? ($course['name'] ?? ''));
                                $filterKey = 'all';
                                if (str_contains($levelStr, 'certificate i') || str_contains($levelStr, 'cert i ')) {
                                    $filterKey = 'cert1';
                                } elseif (
                                    str_contains($levelStr, 'certificate ii') ||
                                    str_contains($levelStr, 'cert ii ')
                                ) {
                                    $filterKey = 'cert2';
                                } elseif (
                                    str_contains($levelStr, 'certificate iii') ||
                                    str_contains($levelStr, 'cert iii ')
                                ) {
                                    $filterKey = 'cert3';
                                } elseif (
                                    str_contains($levelStr, 'certificate iv') ||
                                    str_contains($levelStr, 'cert iv ')
                                ) {
                                    $filterKey = 'cert4';
                                } elseif (str_contains($levelStr, 'diploma')) {
                                    $filterKey = 'diploma';
                                }
                            @endphp

                            <article x-show="activeFilter === 'all' || activeFilter === '{{ $filterKey }}'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-[#1968b2]/40">

                                <!-- Top Image Container -->
                                <div>
                                    <div class="relative h-52 overflow-hidden bg-slate-900">
                                        <img src="{{ !empty($course['image']) ? asset($course['image']) : asset('images/course-placeholder.webp') }}"
                                            alt="{{ $course['name'] ?? 'Course' }}" loading="lazy"
                                            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" />

                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent">
                                        </div>

                                        <!-- Qualification Level Badge -->
                                        <div
                                            class="absolute top-3 left-3 flex items-center gap-1.5 rounded-lg bg-slate-900/90 border border-slate-700/80 px-2.5 py-1 backdrop-blur-md">
                                            <span class="h-2 w-2 rounded-full bg-[#1968b2] animate-pulse"></span>
                                            <span class="text-[11px] font-bold text-white uppercase tracking-wider">
                                                {{ $course['level'] ?? 'Nationally Recognised' }}
                                            </span>
                                        </div>

                                        <!-- Course Code Tag (Top Right) -->
                                        @if (!empty($course['code']))
                                            <div
                                                class="absolute top-3 right-3 rounded-lg bg-white/90 border border-white/40 px-2.5 py-1 text-[11px] font-mono font-bold text-slate-900 shadow-sm backdrop-blur-md">
                                                {{ $course['code'] }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Content Body -->
                                    <div class="p-6 space-y-3">
                                        <h3
                                            class="text-lg font-bold tracking-tight text-slate-900 group-hover:text-[#1968b2] transition-colors duration-200 line-clamp-2">
                                            <a href="">
                                                {{ $course['name'] ?? 'Untitled Qualification' }}
                                            </a>
                                        </h3>

                                        <p class="text-xs sm:text-sm text-slate-600 line-clamp-2 leading-relaxed">
                                            {{ $course['hero']['description'] ?? ($course['short_description'] ?? 'Gain industry-standard technical competencies and certified RPL pathways.') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Card Footer -->
                                <div class="px-6 pb-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                                        <iconify-icon icon="lucide:clock" class="text-base text-[#1968b2]"></iconify-icon>
                                        <span>{{ $course['key_information']['duration'] ?? 'Flexible Duration' }}</span>
                                    </div>
{{-- {{ route('course.show', ['courseslug' => $course['slug']]) }} --}}
                                    <a href=""
                                        class="inline-flex items-center gap-1.5 rounded-xl bg-[#1968b2] hover:bg-[#155b9d] px-4 py-2 text-xs font-bold text-white shadow-sm transition-all duration-200 hover:scale-105">
                                        <span>View Details</span>
                                        <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                                    </a>
                                </div>

                            </article>

                        @empty

                            <div
                                class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
                                <div
                                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-400 mb-4">
                                    <iconify-icon icon="lucide:book-open" class="text-2xl"></iconify-icon>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900">No Courses Listed Yet</h3>
                                <p class="mt-1 text-sm text-slate-500 max-w-sm mx-auto">
                                    There are currently no active courses available under this discipline filter.
                                </p>
                                <a href="{{ url('/industries') }}"
                                    class="mt-4 inline-flex items-center gap-2 rounded-xl bg-[#1968b2] px-5 py-2.5 text-xs font-bold text-white transition hover:bg-[#155b9d]">
                                    <span>Browse All Sectors</span>
                                    <iconify-icon icon="lucide:arrow-right" class="text-sm"></iconify-icon>
                                </a>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
