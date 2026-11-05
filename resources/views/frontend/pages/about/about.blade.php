@extends('frontend.layouts.app')

@section('content')
    <!-- Main Container -->

    <!-- About Us Section -->
@include('frontend.pages.about.section')
  {{-- @include('frontend.pages.about.why') --}}

  <!-- OUR MISSION ,Vision AND VALUES -->
    <section class="relative overflow-hidden bg-neutral-50 py-12 sm:py-16 lg:py-20">
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Section Heading --}}
            <div class="mx-auto mb-10 max-w-2xl text-center sm:mb-14 reveal">
                <div
                    class="mb-4 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white px-3.5 py-1.5 text-xs font-semibold uppercase tracking-widest text-brand-600 shadow-sm">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                    Our Mission & Vision
                </div>

                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    What We Stand For
                </h2>

                <p class="mx-auto mt-4 max-w-xl text-sm leading-7 text-slate-500 sm:text-base">
                    Everything we do is guided by a clear purpose, a shared vision,
                    and values that put our learners first.
                </p>

            </div>

            {{-- Foundation Cards --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3 lg:gap-6 stagger">
                {{-- Mission --}}
                <article
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-xl sm:p-8 reveal-scale">

                    {{-- Background Glow --}}
                    <div
                        class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-brand-50 opacity-0 blur-3xl transition-opacity duration-300 group-hover:opacity-100">
                    </div>

                    <div class="relative">

                        {{-- Card Header --}}
                        <div class="flex items-start justify-between">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition-all duration-300 group-hover:scale-105 group-hover:bg-brand-600 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-7 w-7">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <circle cx="12" cy="12" r="6"></circle>
                                    <circle cx="12" cy="12" r="2"></circle>
                                </svg>
                            </div>

                            <span
                                class="font-mono text-4xl font-black text-slate-100 transition-colors duration-300 group-hover:text-brand-50">
                                01
                            </span>

                        </div>

                        {{-- Content --}}
                        <div class="mt-8">

                            <p class="text-xs font-bold uppercase tracking-widest text-brand-600">
                                Our Purpose
                            </p>

                            <h3 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                                Mission
                            </h3>

                            <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                                Equip every student with practical skills,
                                confidence and pathways into meaningful Australian work.
                            </p>

                        </div>


                        {{-- Bottom Line --}}
                        <div class="mt-8 flex items-center gap-2 text-xs font-semibold text-slate-400">
                            <span
                                class="h-px w-8 bg-brand-200 transition-all duration-300 group-hover:w-12 group-hover:bg-brand-500"></span>
                            Purpose driven
                        </div>

                    </div>
                </article>


                {{-- Vision --}}
                <article
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-sky-200 hover:shadow-xl sm:p-8 reveal-scale">
                    {{-- Background Glow --}}
                    <div
                        class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-sky-50 opacity-0 blur-3xl transition-opacity duration-300 group-hover:opacity-100">
                    </div>

                    <div class="relative">

                        {{-- Card Header --}}
                        <div class="flex items-start justify-between">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-50 text-sky-600 ring-1 ring-sky-100 transition-all duration-300 group-hover:scale-105 group-hover:bg-sky-600 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-7 w-7">
                                    <path
                                        d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z">
                                    </path>
                                    <path d="M20 2v4"></path>
                                    <path d="M22 4h-4"></path>
                                    <circle cx="4" cy="20" r="2"></circle>
                                </svg>
                            </div>

                            <span
                                class="font-mono text-4xl font-black text-slate-100 transition-colors duration-300 group-hover:text-sky-50">
                                02
                            </span>

                        </div>

                        {{-- Content --}}
                        <div class="mt-8">

                            <p class="text-xs font-bold uppercase tracking-widest text-sky-600">
                                Where We're Going
                            </p>

                            <h3 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                                Vision
                            </h3>

                            <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                                Be the most trusted vocational institute for
                                international and domestic learners across Australia.
                            </p>

                        </div>


                        {{-- Bottom Line --}}
                        <div class="mt-8 flex items-center gap-2 text-xs font-semibold text-slate-400">
                            <span
                                class="h-px w-8 bg-sky-200 transition-all duration-300 group-hover:w-12 group-hover:bg-sky-500"></span>
                            Future focused
                        </div>

                    </div>
                </article>


                {{-- Values --}}
                <article
                    class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl sm:p-8 reveal-scale">
                    {{-- Background Glow --}}
                    <div
                        class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-emerald-50 opacity-0 blur-3xl transition-opacity duration-300 group-hover:opacity-100">
                    </div>

                    <div class="relative">

                        {{-- Card Header --}}
                        <div class="flex items-start justify-between">

                            <div
                                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 ring-1 ring-emerald-100 transition-all duration-300 group-hover:scale-105 group-hover:bg-emerald-600 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"
                                    class="h-7 w-7">
                                    <path
                                        d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526">
                                    </path>
                                    <circle cx="12" cy="8" r="6"></circle>
                                </svg>
                            </div>

                            <span
                                class="font-mono text-4xl font-black text-slate-100 transition-colors duration-300 group-hover:text-emerald-50">
                                03
                            </span>

                        </div>


                        {{-- Content --}}
                        <div class="mt-8">

                            <p class="text-xs font-bold uppercase tracking-widest text-emerald-600">
                                What Guides Us
                            </p>

                            <h3 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                                Values
                            </h3>

                            <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                                Integrity, inclusion, industry-relevance and care
                                for every learner who walks through our doors.
                            </p>

                        </div>


                        {{-- Bottom Line --}}
                        <div class="mt-8 flex items-center gap-2 text-xs font-semibold text-slate-400">
                            <span
                                class="h-px w-8 bg-emerald-200 transition-all duration-300 group-hover:w-12 group-hover:bg-emerald-500"></span>
                            Learner first
                        </div>

                    </div>
                </article>

            </div>

        </div>

    </section>



@endsection
