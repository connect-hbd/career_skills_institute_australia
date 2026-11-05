@extends('frontend.layouts.app')

@section('title', $industry['name'])

@section('content')
    {{-- Hero Section --}}
    <section class="relative isolate overflow-hidden bg-brand-950 text-white">

        {{-- Background Image --}}
        <div class="absolute inset-0 -z-20">
            <img src="{{ $industry['image'] }}" alt="{{ $industry['name'] }}" class="h-full w-full object-cover">
        </div>

        {{-- Brand Overlay --}}
        <div
            class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(2,17,38,0.88)_0%,rgba(4,25,59,0.65)_45%,rgba(13,82,181,0.35)_100%)]">
        </div>

        {{-- Bottom Fade --}}
        <div class="absolute inset-x-0 bottom-0 -z-10 h-32  bg-gradient-to-t from-brand-950/50 to-transparent">
        </div>


        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">

            {{-- Breadcrumb --}}
            <nav class="mb-6 flex items-center gap-2 text-xs font-semibold text-brand-200">

                <a href="{{ url('/') }}" class="transition hover:text-white">
                    Home
                </a>

                <span class="text-brand-400">/</span>

                <a href="{{ url('/industries') }}" class="transition hover:text-white">
                    Industries
                </a>

                <span class="text-brand-400">/</span>

                <span class="text-secondary-400">
                    {{ $industry['short_name'] }}
                </span>

            </nav>


            {{-- Hero Content --}}
            <div class="max-w-3xl">

                {{-- Badge --}}
                <span
                    class="inline-block rounded-full bg-brand-500/20   px-3 py-1 text-xs font-bold uppercase tracking-wider text-secondary-400 ring-1 ring-inset ring-brand-400/30">
                    Industry Qualifications Pathways
                </span>


                {{-- Heading --}}
                <h1 class="mt-4 text-2xl font-extrabold leading-tight tracking-tight  sm:text-3xl lg:text-4xl">
                    {{ $industry['name'] }}
                </h1>


                {{-- Description --}}
                <p class="mt-4 max-w-2xl text-base leading-relaxed text-brand-100">
                    {{ $industry['description'] }}
                </p>

            </div>

        </div>

    </section>


    {{-- INDUSTRY DETAILS & OVERVIEW --}}
    <section class="relative  bg-slate-50/50 pt-12 md:pt-16 lg:pt-20">

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 items-stretch gap-6 md:gap-8 lg:grid-cols-12 lg:gap-12">

                {{-- =================================================
                LEFT — INDUSTRY OVERVIEW
            ================================================== --}}
                <div class="flex flex-col justify-center lg:col-span-7">

                    {{-- Section Badge --}}
                    <div class="mb-6 flex items-center">
                        <span
                            class="inline-flex items-center gap-2 rounded-full border border-brand-200/60 bg-brand-50/80 px-3.5 py-1.5 text-xs font-semibold uppercase tracking-wider text-brand-700 shadow-sm backdrop-blur-md">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-600"></span>
                            Industry Background
                        </span>
                    </div>

                    {{-- Main Heading --}}
                    <h2
                        class="max-w-2xl text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-[44px] lg:leading-[1.15]">
                        Understanding the
                        <span
                            class="bg-gradient-to-r from-brand-600 via-brand-600 to-brand-700 bg-clip-text text-transparent">
                            Industry
                        </span>
                    </h2>

                    {{-- Subtitle / Intro --}}
                    <p class="mt-5 max-w-2xl text-sm font-medium leading-relaxed text-slate-600 sm:text-base">
                        Discover the skills, knowledge, and professional capabilities recognised across the
                        <span class="font-bold text-slate-900   ">
                            {{ $industry['name'] }}
                        </span>
                        sector.
                    </p>

                    {{-- Overview Content Block --}}
                    <div class="relative mt-4 ">
                        <p class="text-sm leading-8 text-slate-600 sm:text-base sm:leading-8">
                            {{ $industry['overview'] }}
                        </p>
                    </div>

                </div>


                {{-- =================================================
                RIGHT — SKILLS & PROFICIENCIES
            ================================================== --}}
                <div class="flex flex-col justify-center lg:col-span-5">

                    <div class="grid gap-4 sm:gap-5">

                        {{-- Card 1: Industry Skills --}}
                        <div
                            class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white/80 p-6 shadow-sm backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:shadow-xl hover:shadow-brand-500/5">
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-500/10 transition-all duration-300 group-hover:scale-110 group-hover:bg-brand-600 group-hover:text-white group-hover:shadow-md group-hover:shadow-brand-500/20">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <h3
                                        class="text-base font-bold text-slate-900 group-hover:text-brand-600 transition-colors">
                                        Industry Skills
                                    </h3>
                                    <p class="mt-1 text-sm leading-relaxed text-slate-500">
                                        Practical skills aligned directly with modern workplace requirements.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Card 2: Recognition --}}
                        <div
                            class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white/80 p-6 shadow-sm backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-500/5">
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-emerald-500/10 transition-all duration-300 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white group-hover:shadow-md group-hover:shadow-emerald-500/20">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3
                                        class="text-base font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                                        Formal Recognition
                                    </h3>
                                    <p class="mt-1 text-sm leading-relaxed text-slate-500">
                                        Official recognition pathways for your existing skills and prior experience.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Card 3: Career Growth --}}
                        <div
                            class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white/80 p-6 shadow-sm backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-violet-300 hover:shadow-xl hover:shadow-violet-500/5">
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-violet-50 text-violet-600 ring-1 ring-violet-500/10 transition-all duration-300 group-hover:scale-110 group-hover:bg-violet-600 group-hover:text-white group-hover:shadow-md group-hover:shadow-violet-500/20">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3
                                        class="text-base font-bold text-slate-900 group-hover:text-violet-600 transition-colors">
                                        Career Growth
                                    </h3>
                                    <p class="mt-1 text-sm leading-relaxed text-slate-500">
                                        Qualification pathways designed strategically to accelerate your career.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- COURSE SECTION --}}
    <section id="courses" x-data="{
        activeFilter: 'All',
    
        courses: {{ Illuminate\Support\Js::from($courses) }},
    
        get filteredCourses() {
            if (this.activeFilter === 'All') {
                return this.courses;
            }
    
            return this.courses.filter(
                course => course.level === this.activeFilter
            );
        }
    }" class="bg-slate-50 py-12 md:py-16 lg:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Section header --}}
            <div class="mb-10 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

                <div class="max-w-2xl mx-auto text-center">

                    <span
                        class="inline-flex rounded-full bg-brand-100 px-4 py-1.5 text-[10px] font-black uppercase tracking-[0.18em] text-brand-700">
                        Available Qualifications
                    </span>

                    <h2 class="mt-4 text-3xl font-black tracking-tight text-slate-900 sm:text-4xl">
                        Choose Your
                        <span class="text-brand-600">
                            Qualification
                        </span>
                    </h2>

                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Explore qualifications available within the
                        <span class="font-bold text-black"> {{ $industry['name'] }}</span>
                        industry and find the pathway that best matches your skills and experience.
                    </p>

                </div>

            </div>
            {{--  FILTER --}}
            <div class="mb-10 rounded-xl border border-slate-200 bg-white p-2">

                <div class="flex gap-2 overflow-x-auto p-1 scrollbar-hide">

                    @foreach ($courseLevels as $level)
                        <button type="button" @click="activeFilter = '{{ $level }}'"
                            :class="activeFilter === '{{ $level }}'
                                ?
                                'bg-brand-600 text-white shadow-lg shadow-brand-600/20' :
                                'bg-transparent text-slate-600 hover:bg-slate-100 hover:text-slate-900'"
                            class="group inline-flex shrink-0 items-center gap-2 rounded-2xl px-4 py-3 text-sm font-bold transition-all duration-300">

                            @if ($level === 'All')
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                </svg>
                            @else
                            @endif

                            {{ $level }}

                        </button>
                    @endforeach

                </div>

            </div>
            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-2">

                <template x-for="course in filteredCourses" :key="course.slug">
                    <article
                        class="group flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                        {{-- Image Header --}}
                        <div class="relative aspect-video w-full overflow-hidden bg-brand-50">
                            <img :src="course.image" :alt="course.name"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-brand-950/70 via-transparent to-transparent">
                            </div>

                            <span
                                class="absolute left-4 top-4 rounded-full bg-brand-600 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-white shadow-sm"
                                x-text="course.level"></span>

                            <div
                                class="absolute bottom-3 left-4 right-4 flex items-center gap-2 text-sm font-semibold text-brand-100">
                                <span class="rounded bg-brand-950/80 px-2 py-0.5 text-brand-300 backdrop-blur-sm"
                                    x-text="'CODE : ' + course.code"></span>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="flex flex-1 flex-col justify-between p-6">
                            <div>
                                <h3
                                    class="text-base md:text-lg font-bold leading-snug text-slate-900 group-hover:text-brand-600 transition-colors">
                                    <span x-text="course.level"></span>
                                    <span x-text="course.name"></span>
                                </h3>

                                <!-- FIXED: Changed course.description to course.short_description -->
                                <p class="mt-3 text-sm leading-relaxed text-slate-600 line-clamp-3"
                                    x-text="course.short_description"></p>

                                {{-- Provider & Assessment details --}}
                                <div class="mt-4 space-y-2 border-t border-slate-100 pt-4 text-sm text-slate-500">
                                    <div class="flex items-start gap-2">
                                        <svg class="h-4 w-4 shrink-0 text-brand-500 mt-0.5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <!-- FIXED: Mapped providers array to display names correctly -->
                                        <span class="line-clamp-1"><strong
                                                class="font-semibold text-slate-700 uppercase">Providers : </strong> <span
                                                x-text="course.providers.map(p => p.name).join(', ')"></span></span>
                                    </div>
                                </div>
                            </div>

                            {{-- Card Footer CTA --}}
                            <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">
                                <div class="flex items-center gap-2">
                                    <svg class="h-4 w-4 shrink-0 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <!-- FIXED: Mapped rto_codes from the providers array -->
                                    <span class="text-sm"><strong class="font-semibold text-slate-700 uppercase">RTO CODE :</strong>
                                        <span x-text="course.providers.map(p => p.rto_code).join(' & ')"></span></span>
                                </div>

                                <a :href="'{{ route('course.show', ['slug' => '__SLUG__']) }}'.replace('__SLUG__', course.slug)"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-brand-600 px-4 py-2 text-sm font-bold text-white shadow-sm transition-all hover:bg-brand-700 hover:shadow">
                                    Read More
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </article>
                </template>
            </div>

            {{-- Empty State --}}
            <div x-show="filteredCourses.length === 0" x-cloak class="mt-8 rounded-2xl  p-12 text-center">
                <h3 class="text-base font-bold text-slate-800">No qualifications found</h3>
                <p class="mt-1 text-xs text-slate-500">There are currently no active courses listed under this level.</p>
            </div>

        </div>

    </section>
@endsection
