@extends('frontend.layouts.app')

@section('content')
    {{-- HERO SECTION --}}
    <section class="relative overflow-hidden bg-[#0A0F1D] py-14 lg:py-20 text-white">

        {{-- Ambient Background --}}
        <div class="pointer-events-none absolute -top-20 -left-20 h-96 w-96 rounded-full bg-[#1968b2]/20 blur-[120px]"></div>

        <div
            class="pointer-events-none absolute top-1/2 -right-20 h-96 w-96 -translate-y-1/2 rounded-full bg-cyan-500/10 blur-[120px]">
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12">

                {{-- Left Content --}}
                <div class="space-y-4 lg:col-span-8">

                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-[#1968b2]/30 bg-[#1968b2]/10 px-3.5 py-1 text-xs font-semibold uppercase tracking-wider text-[#1968b2]">

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

                        <div
                            class="flex items-center gap-6 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-2 text-xs text-slate-300 backdrop-blur-md">

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
    <section id="courses" class=" bg-slate-50/50 py-12 md:py-16">

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
                            Filter by qualification tier to find the right entry-level or advanced training path for your
                            career goals.
                        </p>

                    </div>

                </div>




                {{-- FILTER + QUALIFICATIONS --}}
              @include('frontend.pages.industry.industry-filter')

            </div>

        </div>

    </section>
@endsection