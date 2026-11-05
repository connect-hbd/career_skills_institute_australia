@extends('frontend.layouts.app')

@section('content')

<section class="relative min-h-[60vh] max-h-[70vh] flex items-center justify-center overflow-hidden bg-[#0A0F1D] py-10 text-white">
    <!-- Ambient Radial Glows -->
    <div class="pointer-events-none absolute -top-20 -left-20 h-80 w-80 rounded-full bg-[#1968b2]/20 blur-[100px]"></div>
    <div class="pointer-events-none absolute -bottom-20 -right-20 h-80 w-80 rounded-full bg-cyan-500/15 blur-[100px]"></div>

    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left Side Content (Animates from Left) -->
            <div class="lg:col-span-6 space-y-4 sm:space-y-5 animate-fade-in-left">
                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2 rounded-full bg-[#1968b2]/10 border border-[#1968b2]/30 px-3.5 py-1 text-xs font-semibold tracking-wider text-[#1968b2] uppercase">
                    <span class="flex h-2 w-2 rounded-full bg-[#1968b2] animate-pulse"></span>
                    <span>Nationally Recognised Training</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15]">
                    Build Your Future with <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-[#1968b2] to-cyan-400">Expert Certification</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base text-slate-300 max-w-xl font-normal leading-relaxed">
                    Gain real-world construction, trade, and engineering skills through flexible training and accredited RPL pathways tailored to fast-track your career.
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="#courses" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#1968b2] hover:bg-[#155b9d] text-white font-semibold px-6 py-3 text-sm shadow-lg shadow-[#1968b2]/30 transition-all duration-300 hover:scale-[1.02] active:scale-95">
                        <span>View Courses</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                    </a>

                    <a href="#consultation" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-slate-700/60 text-slate-200 hover:text-white font-medium px-5 py-3 text-sm backdrop-blur-sm transition-all duration-300 hover:border-slate-600">
                        <iconify-icon icon="lucide:phone-call" class="text-base text-[#1968b2]"></iconify-icon>
                        <span>Book Consultation</span>
                    </a>
                </div>
            </div>

            <!-- Right Side Bento Grid (Animates from Right) -->
            <div class="lg:col-span-6 animate-fade-in-right">
                <div class="relative grid grid-cols-12 grid-rows-2 gap-3 h-[320px] sm:h-[360px] max-w-lg lg:max-w-none mx-auto">
                    
                    <!-- Decorative Gradient Glow Behind Grid -->
                    <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-[#1968b2]/30 via-cyan-500/10 to-transparent blur-xl pointer-events-none"></div>

                    <!-- Image 1: Main Featured Tile (Left Column, Full Height) -->
                    <div class="col-span-7 row-span-2 relative group overflow-hidden rounded-2xl border border-slate-700/60 bg-slate-900 shadow-2xl transition-all duration-500 hover:border-[#1968b2]/60">
                        <img 
                            src="https://images.unsplash.com/photo-1541888946425-d0fbb18f764c?q=80&w=800&auto=format&fit=crop" 
                            alt="Construction engineering project" 
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                        
                        <!-- Floating Glass Pill inside Image 1 -->
                        <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between rounded-xl bg-slate-900/80 backdrop-blur-md p-2.5 border border-slate-700/50">
                            <div class="flex items-center gap-2">
                                <iconify-icon icon="lucide:check-circle-2" class="text-[#1968b2] text-lg"></iconify-icon>
                                <span class="text-xs font-medium text-slate-200">RPL Pathways</span>
                            </div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Accredited</span>
                        </div>
                    </div>

                    <!-- Image 2: Top Right Small Tile -->
                    <div class="col-span-5 row-span-1 relative group overflow-hidden rounded-2xl border border-slate-700/60 bg-slate-900 shadow-xl transition-all duration-500 hover:border-[#1968b2]/60">
                        <img 
                            src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=600&auto=format&fit=crop" 
                            alt="On-site technical training" 
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                        />
                    </div>

                    <!-- Image 3: Bottom Right Small Tile -->
                    <div class="col-span-5 row-span-1 relative group overflow-hidden rounded-2xl border border-slate-700/60 bg-slate-900 shadow-xl transition-all duration-500 hover:border-[#1968b2]/60">
                        <img 
                            src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?q=80&w=600&auto=format&fit=crop" 
                            alt="Hands-on skills application" 
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                        />
                    </div>

                    <!-- Floating Badge Chip (Top Right Corner Overlay) -->
                    <div class="absolute -top-3 -right-3 z-30 flex items-center gap-2.5 rounded-xl bg-slate-900/95 border border-slate-700/80 px-3 py-2 shadow-2xl backdrop-blur-md animate-bounce-subtle">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#1968b2]/20 text-[#1968b2]">
                            <iconify-icon icon="lucide:award" class="text-lg"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white">ISO Certified</p>
                            <p class="text-[10px] text-slate-400">100% Recognized</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

  


    <section aria-label="Google Customer Reviews" class=" bg-slate-50 py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12">

                {{-- Rating --}}
                <div
                    class="border-b border-slate-200 pb-7 text-center lg:col-span-3 lg:border-b-0 lg:border-r lg:pb-0 lg:pr-8 lg:text-left">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">
                        Reviews &amp; Feedback
                    </span>

                    <div class="mt-1 text-3xl font-black text-slate-900">
                        EXCELLENT
                    </div>

                    <div class="my-2 text-lg tracking-wide text-amber-400">
                        ★★★★★
                    </div>

                    <p class="text-xs text-slate-500">
                        Based on
                        <strong class="text-slate-800">70+ authentic reviews</strong>
                    </p>

                    <div class="mt-3 text-sm font-bold">
                        <span class="text-blue-600">G</span><span class="text-red-500">o</span><span
                            class="text-yellow-500">o</span><span class="text-blue-500">g</span><span
                            class="text-green-500">l</span><span class="text-red-500">e</span>
                        <span class="text-slate-600">Reviews</span>
                    </div>
                </div>

                {{-- Reviews --}}
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3 lg:col-span-9">

                    @foreach ([
            [
                'initial' => 'I',
                'name' => 'Istika Sapkota',
                'color' => 'bg-emerald-600',
                'text' => 'She was really nice and made us understand every detail about first aid and CPR, and all the required practical units.',
            ],
            [
                'initial' => 'K',
                'name' => 'Kalpana Tamang',
                'color' => 'bg-amber-600',
                'text' => 'I feel so comfortable and very knowledgeable and experienced. Training was well organized, practical and easy to follow.',
            ],
            [
                'initial' => 'T',
                'name' => 'Tabsum Chhetri',
                'color' => 'bg-indigo-600',
                'text' => 'Fatima literally she is the sweetest assessor. She gave me confidence and assisted through every single compliance check!',
            ],
        ] as $review)
                        <div
                            class="group relative rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:border-brand-200 hover:shadow-xl">

                            <div class="mb-3 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="{{ $review['color'] }} flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold text-white shadow-sm transition duration-300 group-hover:scale-110">
                                        {{ $review['initial'] }}
                                    </div>

                                    <div>
                                        <h5 class="text-xs font-bold text-slate-800">
                                            {{ $review['name'] }}
                                        </h5>
                                        <span class="text-[10px] text-slate-400">
                                            7 months ago
                                        </span>
                                    </div>
                                </div>

                                <span class="font-bold text-blue-500">G</span>
                            </div>

                            <div class="mb-2 text-xs tracking-wide text-amber-400">
                                ★★★★★
                            </div>

                            <p class="line-clamp-3 text-xs leading-5 text-slate-600">
                                {{ $review['text'] }}
                            </p>

                            <button type="button"
                                class="mt-3 text-[11px] font-bold text-brand-500 transition hover:text-brand-700 hover:underline">
                                Read more
                            </button>
                        </div>
                    @endforeach

                </div>
            </div>

            <div
                class="mt-7 flex flex-col justify-between gap-3 border-t border-slate-200 pt-5 text-[11px] text-slate-400 sm:flex-row sm:items-center">
                <span>Showing our latest verified learner reviews</span>

                <span class="inline-flex items-center gap-1 font-semibold text-slate-600">
                    <svg class="h-4 w-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            fill-rule="evenodd" />
                    </svg>
                    Verified by Trustindex
                </span>
            </div>

        </div>
    </section>

@include('frontend.pages.about.section')


    <section id="courses" class=" bg-slate-50 py-20 lg:py-24">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mx-auto mb-12 max-w-3xl text-center">

                <span
                    class="inline-flex rounded-full bg-brand-50 px-4 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-brand-600">
                    Explore Your Path
                </span>

                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Qualification
                    <span class="text-brand-500">
                        Industries
                    </span>
                </h2>

                <div class="mx-auto mt-4 h-1 w-14 rounded-full bg-brand-500"></div>

                <p class="mt-5 text-sm leading-7 text-slate-600">
                    Select your industry below to convert your verifiable Australian and overseas workplace skills into
                    official accredited certificates.
                </p>

            </div>

            {{-- Industry grid --}}
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($industries as $industry)
                    <article
                        class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">

                        {{-- Image --}}
                        <div class="relative h-52 overflow-hidden">

                            <img src="{{ $industry['image'] }}" alt="{{ $industry['name'] }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent">
                            </div>

                            <span
                                class="absolute left-4 top-4 flex h-8 w-8 items-center justify-center rounded-lg bg-slate-950/70 text-[10px] font-bold text-white backdrop-blur-sm">
                                {{ sprintf('%02d', $loop->iteration) }}
                            </span>

                        </div>


                        {{-- Content --}}
                        <div class="p-5">

                            <h3
                                class="min-h-[48px] text-base font-extrabold leading-6 text-slate-900 transition group-hover:text-brand-600">
                                {{ $industry['name'] }}
                            </h3>

                            <a href="{{ route('industries.index', $industry['slug']) }}"
                                class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-xs font-bold text-slate-700 transition hover:border-brand-500 hover:bg-brand-500 hover:text-white">
                                Explore Industry

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                </svg>

                            </a>

                        </div>

                    </article>
                @endforeach

            </div>

        </div>
    </section>


    <section aria-label="Quick Application Callout" class=" bg-white text-white py-16  lg:py-20">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="relative overflow-hidden rounded-3xl bg-brand-600 px-6 py-10 sm:px-10 lg:px-12">

                {{-- Subtle background image --}}
                <div class="absolute inset-0 opacity-10">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD73VTZPW1GD8oymxYSkKHoyNSM2quckKcvPe2LERChkVToRk746QL_glBYdDIhhMc4ko5Kzz3y89rVJ0FYW9hWUo2FEa7YtexPW0JfsHhMI4-nyGb3S5lwO_fY_12MtdOBC1N0KVbsuUdsn2I4hfNPe3-eRYmHozShCZ_7CXSL9LPhP69pvjFwFETcCTqlczcVS6QRXsJ1vfStGL9mysBmxFL6EEjxeXi0rSA0Q8AcdJjnd-Jsb9A0Uw"
                        alt="" class="h-full w-full object-cover">
                </div>

                <div class="relative flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                    <div class="max-w-2xl">

                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-secondary-200">
                            Start Your Journey
                        </span>

                        <h2 class="mt-2 text-2xl font-extrabold tracking-tight sm:text-3xl lg:text-4xl">
                            Build a Better Future With
                            <span class="text-secondary-200">
                                Career Skills Institute
                            </span>
                        </h2>

                        <p class="mt-4 text-sm leading-7 text-blue-100 sm:text-base">
                            You deserve better career growth and industry recognition.
                            Start with our quick Free Eligibility Assessment and our senior consultant will contact you
                            directly.
                        </p>

                    </div>

                    <a href="#eligibility-form"
                        class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-slate-900 transition hover:bg-slate-100">
                        Check Your Eligibility

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>

                    </a>

                </div>

            </div>

        </div>
    </section>


@include('frontend.pages.about.why')
@endsection
