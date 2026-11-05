@extends('frontend.layouts.app')

@section('content')

{{-- =========================================================
    HERO SECTION
========================================================= --}}
<section id="home" class="relative isolate overflow-hidden bg-slate-950 text-white">
    {{-- Background --}}
    <div class="absolute inset-0 -z-20">
        <img
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBEg6iqgSVx27x3YZFV5wlGCd-2TeYOVWh3tC7kLi3DTN3D6Err8OPppnGZQnp_de5eCWFdw8yhbVR9jAuCskT-NoEOlBUTTHmG5-ZGilA_VpvH71K2wCboY9P1zGAzyhlVnHY7Ppf5T-8fX7VuSX8ZFor3f4ZiIwYjBRhu7Qda-wrRUZ9NlJV97QW6_P_CtozfkgfIwrCDB4_wtvMGhI2GZagXP5i8Sv8fShS22_umXvektjZf01B2NQ"
            alt="Modern collaborative study space"
            class="h-full w-full object-cover object-center opacity-30 transition duration-[2000ms] ease-out hover:scale-105"
        >
    </div>

    {{-- Tailwind-only overlays --}}
     {{-- EXACT ORIGINAL GRADIENT --}}
    <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(13,82,181,0.94)_0%,rgba(9,52,117,0.88)_45%,rgba(15,23,42,0.78)_100%)]"></div>

    {{-- Bottom fade --}}
    <div class="absolute inset-x-0 bottom-0 -z-10 h-32 bg-gradient-to-t from-slate-950/40 to-transparent"></div>


    {{-- Decorative blobs --}}
    <div class="absolute -left-24 top-20 -z-10 h-72 w-72 rounded-full bg-brand-500/10 blur-3xl"></div>
    <div class="absolute -right-24 bottom-10 -z-10 h-96 w-96 rounded-full bg-secondary-400/10 blur-3xl"></div>

    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-10">

            {{-- Hero Content --}}
            <div class="space-y-7 lg:col-span-7">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-secondary-300 shadow-lg backdrop-blur-md transition duration-500 hover:border-secondary-400/40 hover:bg-white/15">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary-400 opacity-60"></span>
                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-secondary-400"></span>
                    </span>
                    Empower Your Future
                </div>

                {{-- Heading --}}
                <div class="space-y-3">
                    <h1 class="text-4xl font-black leading-[1.05] tracking-tight text-white sm:text-5xl lg:text-7xl">
                        Turn Your Ambition
                        <span class="block bg-gradient-to-r from-secondary-300 via-white to-brand-300 bg-clip-text text-transparent">
                            Into Achievement
                        </span>
                    </h1>

                    <div class="h-1 w-20 rounded-full bg-gradient-to-r from-secondary-400 to-brand-500"></div>
                </div>

                {{-- Description --}}
                <p class="max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">
                    Develop real-world skills, earn nationally recognized credentials,
                    and receive personalized guidance to prepare for a successful and
                    rewarding career in Australia.
                </p>

                {{-- Feature Cards --}}
                <div class="grid grid-cols-1 gap-4 pt-2 sm:grid-cols-2">
                    <div class="group rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur-md transition-all duration-500 hover:-translate-y-1 hover:border-white/20 hover:bg-white/15 hover:shadow-xl">
                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-500/80 shadow-lg transition duration-300 group-hover:scale-110 group-hover:rotate-3">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </div>

                            <div>
                                <h4 class="text-sm font-bold text-white">Anywhere Anytime</h4>
                                <p class="mt-1 text-xs leading-5 text-slate-300">
                                    Flexible remote submission and streamlined qualification pathways.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="group rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur-md transition-all duration-500 hover:-translate-y-1 hover:border-white/20 hover:bg-white/15 hover:shadow-xl">
                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-secondary-500/80 shadow-lg transition duration-300 group-hover:scale-110 group-hover:-rotate-3">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </div>

                            <div>
                                <h4 class="text-sm font-bold text-white">Online &amp; Offline Support</h4>
                                <p class="mt-1 text-xs leading-5 text-slate-300">
                                    Comprehensive assessor assistance every step of the journey.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div id="eligibility-form" class="lg:col-span-5">
                <div class="group rounded-3xl border border-white/20 bg-white p-6 text-slate-900 shadow-2xl shadow-black/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-black/40 sm:p-8">

                    <div class="mb-7 text-center">
                        <span class="inline-flex rounded-full bg-brand-50 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-brand-600">
                            Free Assessment
                        </span>

                        <h3 class="mt-3 text-2xl font-black text-slate-900">
                            Submit Your Query
                        </h3>

                        <p class="mt-1 text-xs leading-5 text-slate-500">
                            Have a Query? Send it to us &amp; get assessed in 24 hours.
                        </p>
                    </div>

                    <form
                        action="#"
                        method="POST"
                        class="space-y-4"
                        onsubmit="event.preventDefault(); alert('Query submitted successfully! An assessor will contact you shortly.');"
                    >
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="firstName" class="mb-1.5 block text-xs font-bold text-slate-700">
                                    First Name *
                                </label>
                                <input
                                    id="firstName"
                                    type="text"
                                    required
                                    placeholder="Enter Your First Name"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-900 outline-none transition-all duration-300 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                                >
                            </div>

                            <div>
                                <label for="lastName" class="mb-1.5 block text-xs font-bold text-slate-700">
                                    Last Name *
                                </label>
                                <input
                                    id="lastName"
                                    type="text"
                                    required
                                    placeholder="Enter Your Last Name"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-900 outline-none transition-all duration-300 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="email" class="mb-1.5 block text-xs font-bold text-slate-700">
                                Email *
                            </label>

                            <input
                                id="email"
                                type="email"
                                required
                                placeholder="Enter Your Email"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-900 outline-none transition-all duration-300 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                            >
                        </div>

                        <div>
                            <label for="subject" class="mb-1.5 block text-xs font-bold text-slate-700">
                                Industry / Subject *
                            </label>

                            <select
                                id="subject"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-700 outline-none transition-all duration-300 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                            >
                                <option disabled selected value="">Select Your Industry</option>
                                <option value="automotive">Automotive Retail, Service &amp; Repair</option>
                                <option value="business">Business Services</option>
                                <option value="community">Community Services</option>
                                <option value="construction">Construction, Plumbing &amp; Services</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="ict">Information &amp; Communications Tech</option>
                                <option value="resources">Resources &amp; Infrastructure</option>
                                <option value="hairdressing">Hairdressing &amp; Beauty Services</option>
                                <option value="tourism">Tourism, Travel &amp; Hospitality</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="mb-1.5 block text-xs font-bold text-slate-700">
                                Message <span class="font-normal text-slate-400">(optional)</span>
                            </label>

                            <textarea
                                id="message"
                                rows="3"
                                placeholder="Tell us about your work experience or desired qualification..."
                                class="w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-xs text-slate-900 outline-none transition-all duration-300 placeholder:text-slate-400 focus:border-brand-500 focus:bg-white focus:ring-4 focus:ring-brand-500/10"
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="group flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-500/20 transition-all duration-300 hover:-translate-y-1 hover:bg-brand-600 hover:shadow-xl hover:shadow-brand-500/30 active:translate-y-0"
                        >
                            Submit Now
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            </svg>
                        </button>

                        <p class="flex items-center justify-center gap-1.5 text-[10px] text-slate-400">
                            <svg class="h-3.5 w-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill-rule="evenodd"/>
                            </svg>
                            Your information is protected by our privacy commitment.
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- =========================================================
    REVIEWS
========================================================= --}}
<section aria-label="Google Customer Reviews" class=" bg-slate-50 py-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12">

            {{-- Rating --}}
            <div class="border-b border-slate-200 pb-7 text-center lg:col-span-3 lg:border-b-0 lg:border-r lg:pb-0 lg:pr-8 lg:text-left">
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
                    <span class="text-blue-600">G</span><span class="text-red-500">o</span><span class="text-yellow-500">o</span><span class="text-blue-500">g</span><span class="text-green-500">l</span><span class="text-red-500">e</span>
                    <span class="text-slate-600">Reviews</span>
                </div>
            </div>

            {{-- Reviews --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3 lg:col-span-9">

                @foreach([
                    [
                        'initial' => 'I',
                        'name' => 'Istika Sapkota',
                        'color' => 'bg-emerald-600',
                        'text' => 'She was really nice and made us understand every detail about first aid and CPR, and all the required practical units.'
                    ],
                    [
                        'initial' => 'K',
                        'name' => 'Kalpana Tamang',
                        'color' => 'bg-amber-600',
                        'text' => 'I feel so comfortable and very knowledgeable and experienced. Training was well organized, practical and easy to follow.'
                    ],
                    [
                        'initial' => 'T',
                        'name' => 'Tabsum Chhetri',
                        'color' => 'bg-indigo-600',
                        'text' => 'Fatima literally she is the sweetest assessor. She gave me confidence and assisted through every single compliance check!'
                    ]
                ] as $review)

                    <div class="group relative rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:border-brand-200 hover:shadow-xl">

                        <div class="mb-3 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="{{ $review['color'] }} flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold text-white shadow-sm transition duration-300 group-hover:scale-110">
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

                        <button
                            type="button"
                            class="mt-3 text-[11px] font-bold text-brand-500 transition hover:text-brand-700 hover:underline"
                        >
                            Read more
                        </button>
                    </div>

                @endforeach

            </div>
        </div>

        <div class="mt-7 flex flex-col justify-between gap-3 border-t border-slate-200 pt-5 text-[11px] text-slate-400 sm:flex-row sm:items-center">
            <span>Showing our latest verified learner reviews</span>

            <span class="inline-flex items-center gap-1 font-semibold text-slate-600">
                <svg class="h-4 w-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                    <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" fill-rule="evenodd"/>
                </svg>
                Verified by Trustindex
            </span>
        </div>

    </div>
</section>


<section id="about" class="bg-white py-20 lg:py-24">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-12 lg:grid-cols-12 lg:gap-16">

            {{-- Image --}}
            <div class="lg:col-span-6">

                <div class="relative overflow-hidden rounded-3xl bg-slate-100">

                    <img
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxkwcEdlCoRsjFLoTLA03kn1AnpfE8152dyNbSRlmMqdVILqgdDPl7rpiEw3YaMGpWFLp0Pht3hMmkrRE8NdvH5WWJ0d-hwLmpqONwn4Cy1c-8XJEa2-Voq985mbHZuZxHo2LGnZrLoMeMb-a7wezGLeLDqHP8Lu82nAqfa8o-F9rUxncQslCeThHMGq9OOsGMRUCIHih53hoioIL4POOjBvX3wEu22n1e2lhhit5p1lTtAuTmxQP8EA"
                        alt="Students studying together in modern campus library"
                        class="h-[420px] w-full object-cover"
                    >

                    <div class="absolute inset-x-5 bottom-5 rounded-2xl border border-white/30 bg-white/95 p-5 shadow-xl">

                        <p class="text-sm font-extrabold text-brand-600">
                            10+ Years of Excellence
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            Helping qualified professionals Australia-wide
                        </p>

                    </div>

                </div>

            </div>


            {{-- Content --}}
            <div class="lg:col-span-6">

                <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-500">
                    About Us
                </span>

                <h2 class="mt-3 text-3xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-4xl">
                    Welcome to Get Career Skills Institute
                </h2>

                <div class="mt-5 h-1 w-14 rounded-full bg-brand-500"></div>

                <p class="mt-6 text-base font-semibold leading-8 text-slate-700">
                    <strong class="text-slate-900">
                        Empowering Your Career Through Recognition:
                    </strong>
                    At Career Skills Institute, we specialize in transforming your real-world experience into nationally recognized qualifications.
                </p>

                <p class="mt-4 text-sm leading-7 text-slate-600">
                    With over a decade of dedicated service, we assist professionals across diverse industries—including IT, Business, Construction, Hairdressing, and Healthcare—accelerate their careers without the need for redundant traditional study.
                </p>

                <a
                    href="#courses"
                    class="mt-7 inline-flex items-center gap-2 rounded-xl bg-brand-500 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-brand-600"
                >
                    Read More

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M5 12h14M13 6l6 6-6 6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </svg>
                </a>

            </div>

        </div>


        {{-- Value cards --}}
        <div class="mt-16 grid gap-6 md:grid-cols-2">

            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 transition hover:border-brand-200 hover:bg-brand-50/40">

                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-500 text-white">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                            />
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-base font-extrabold text-slate-900">
                            Earn Nationally Accredited Qualifications
                        </h3>

                        <p class="mt-2 text-xs leading-6 text-slate-600">
                            Let your genuine experience earn you an official Australian qualification without study. Give your career and immigration points a much-needed boost today.
                        </p>

                    </div>

                </div>

            </div>


            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 transition hover:border-secondary-200 hover:bg-secondary-50/40">

                <div class="flex items-start gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-secondary-500 text-white">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M13 10V3L4 14h7v7l9-11h-7z"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                            />
                        </svg>

                    </div>

                    <div>

                        <h3 class="text-base font-extrabold text-slate-900">
                            Save Money & Effort
                        </h3>

                        <p class="mt-2 text-xs leading-6 text-slate-600">
                            Provide verifiable evidence of your knowledge and job experience in the relevant industry. We hold your hand and manage paperwork throughout the entire journey.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<section
    id="courses"
    class=" bg-slate-50 py-20 lg:py-24"
>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto mb-12 max-w-3xl text-center">

            <span class="inline-flex rounded-full bg-brand-50 px-4 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-brand-600">
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
                Select your industry below to convert your verifiable Australian and overseas workplace skills into official accredited certificates.
            </p>

        </div>


        @php
            $industries = [
                [
                    'title' => 'Automotive Retail, Service and Repair',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBHrIRwztn8gP4qEG1Y53JuPtlMDnrbzTPo6QMqfp8keKB3FF8GuVRpuZQgThSBrbRrTV4eiUfAK1eirVwtNbvIVCAfp17wMjhIhiF_kNibIQ-n_KPvVX6qlO-49yEe5tMCS5KozQG5m5w9s458Eqhh0BmQUKeW1Dc3XEbuxyIIPHiXkmIgFT23m3vDPYszWsNoP6F28a-G0RMULdseQtkThAribv07WcmFIpRCuFyqaivMchtl_zO9qg',
                    'alt' => 'Automotive technician working on vehicle'
                ],
                [
                    'title' => 'Business Services',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBbSQRyR3No3Vkfc3-TJN_lVBK781lSbSyhpJHI2xwmSc72hRzhVUxgN7QuXVxYqCk3n_k4qBFZQzJDqVt_c1a13IFUwzUcV2pPcgLOyhU2kY_dcB9Ci3Gwb2RPvzpk9iWSt0v_8kfuFsCJtxK8rcuvozMDI9N3vZgfbHFAREFBP2YmUwtcg8ZyyLUfH_Fj1pUWAm4_wgjo0rLr0HRltXpCzA8fjtSPNaDDzii5Xi0YZy8Iw1ETA9nIfw',
                    'alt' => 'Business team collaborating in office'
                ],
                [
                    'title' => 'Community Services',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuALVixIP_LGEeGztdT2_3KwixSGc3GeEkKqmNtQNHhkyjUs3YIFW374K4GyZdhd-yk8kW5U30BRWcK78CB5LgDieUcaXneofsKhBVoJUz5wzvr0VWeAjyzW_ZKItF6O-m5SyBF9ZxnKCHWjgL3mjYJeKMnI_vnmExTXeKsg-0IHKuSsV170kWlDLekDBvWedt_Pfchxz6FsCRuSjIGPWjJDdus6HFlbiga77GCWyJ2sm9G78cRxIIMlCg',
                    'alt' => 'Community caretakers and workers'
                ],
                [
                    'title' => 'Construction, Plumbing and Services',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHCkkYt-42xT5efi52csKdwDqHtJmm82sY1cQHgK92NsRh4MUEjYWwTTs187Ft6IgA73e7tmtYEkNhDqoehENqfHQi-yU4e0yOJRjgXEH4RUJTpEajsg2haSIEpgkfEOvrMQudJYMXh-AIAqrkb7KyPwkYEzK2YqWohQ7VaNJSpb7j6GH1wJ73i90mZz1BL_JzUAToZHjCwCrzKuvIYCIwbDlQ2UOnWf3esbxjJVItICVykps_KpRwwA',
                    'alt' => 'Construction and plumbing site'
                ],
                [
                    'title' => 'Manufacturing',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA21mSeYipxkCOlYYyUbEdLna2UUy1iYSzFWTDAjs3ylqpg-anAAmEiR-JZgFVf3ag4xbW4VH4VNusl0zu9A4GPRS36ox8IQLSWzhcRNHP405VoZ0vLiX8e5JiTBZyXUiRSSr2yLljrrNspdNBYE3H231ck5tfIMiQnBMYeBaEnfyJZGq0v3Wv8MKn2gU_jTd0w1z_eYML8kr7Ppz0ffsCIfQRgoE9Gpoiz5QKCV7vb5FGAu-jxRknurg',
                    'alt' => 'Engineers working in manufacturing plant'
                ],
                [
                    'title' => 'Information and Communications Technology',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC1PnwsW638l_pDSFb0KRrf2r_mk4IESN9DlOXm71mpptoKtwBj98pt3a4jSQwQ703OqNjCnRcIksa0gUbRnoMt_JyoQu6BrVQz0kChBSznNAFGeAf7x3806bLxmegwXOR9bnPS24U_1l7wsGdAqN0UAgz9bP9m3DbwKno58Z2la2l0CdsEYdKbPMI_HBnGvZPwUxRy7hSL6s102_6j2qDvUSApyQx__GFUfuD07NNE4W9bIch_JU_HoQ',
                    'alt' => 'IT technicians in modern server room'
                ],
                [
                    'title' => 'Resources and Infrastructure Industry',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDMCm0Y-WDyhsVfvnC8QhfGJg8jJka5_-i2-76fQiwNkpxHx_qCb0kpJGkMtdCEu8IbeQOMJ5mJLDiAUXzDrVegN-F_crqBgEqG82SvIAjiLGg2Q70oLrC7tQgUicCoJS-AgAE3fnPCIEdX5Yqhn1tGqT_3HGqZu_x4NP1jIdiHd61Ep26iayTPWVOUxufXPXYNr4Ccqn5FxEWuSGiBt_-C7q8LI6tYP6_P62Aa9Tb1gI01sOARiztdCA',
                    'alt' => 'Infrastructure engineers inspecting equipment'
                ],
                [
                    'title' => 'Hairdressing and Beauty Services',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBA-ERLZWr_vhoNNuaKTzbVW5NZ5bJc7nJqcao8c77gm-Lij8EbFVWZFjfmiqzJ7Pt_jt6NyRCUWgbrqD-O_msmkFGFDOHXCwpQZMFAXmfOtuuZjhhQS886R2FNNx-5D61tVheRS8RpV7A8V5f-hpdtTyIcclfscEdgRC5mLJMmHhE9K1wEe8DdGPrW5IWgUpBnUdlfLpmxCIYx-sAhy1K4pZLlsKEfoNavYGgsqLCA2_OqHK8ZIvHe5A',
                    'alt' => 'Salon stylist styling client hair'
                ],
                [
                    'title' => 'Tourism, Travel and Hospitality',
                    'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA4zyPSr8ckZLfcKOcyX3UjOzYq-8urUshQrSlvrg856Oih3WCw8koqDQlrHZAPtkk6EaoSeVy6_ubAoDVy-59uCaqRhXh7fjm3Gtgj8emo5wqkHb404GlLDpOQIY5dIuhWLl2_LDg4zg_dezryhkQu2jPY5oMh_nwUBLsGUw9AacfLo70aXIyoMfUstW-UZOSlUdR8lDYyxcuKzZXaXx0Mw-gkz2I8XYVEdMaQ0e2Cg4WaqhF-j3e6Rw',
                    'alt' => 'Hospitality team at hotel travel lounge'
                ]
            ];
        @endphp


        {{-- Industry grid --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach($industries as $industry)

                <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">

                    {{-- Image --}}
                    <div class="relative h-52 overflow-hidden">

                        <img
                            src="{{ $industry['image'] }}"
                            alt="{{ $industry['alt'] }}"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

                        <span class="absolute left-4 top-4 flex h-8 w-8 items-center justify-center rounded-lg bg-slate-950/70 text-[10px] font-bold text-white backdrop-blur-sm">
                            {{ sprintf('%02d', $loop->iteration) }}
                        </span>

                    </div>


                    {{-- Content --}}
                    <div class="p-5">

                        <h3 class="min-h-[48px] text-base font-extrabold leading-6 text-slate-900 transition group-hover:text-brand-600">
                            {{ $industry['title'] }}
                        </h3>

                        <a
                            href="#eligibility-form"
                            class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-xs font-bold text-slate-700 transition hover:border-brand-500 hover:bg-brand-500 hover:text-white"
                        >
                            Explore Industry

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M5 12h14M13 6l6 6-6 6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                            </svg>

                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </div>
</section>


{{-- =========================================================
    CTA
========================================================= --}}
<section
    aria-label="Quick Application Callout"
    class=" bg-white text-white py-16  lg:py-20"
>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="relative overflow-hidden rounded-3xl bg-brand-600 px-6 py-10 sm:px-10 lg:px-12">

            {{-- Subtle background image --}}
            <div class="absolute inset-0 opacity-10">
                <img
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD73VTZPW1GD8oymxYSkKHoyNSM2quckKcvPe2LERChkVToRk746QL_glBYdDIhhMc4ko5Kzz3y89rVJ0FYW9hWUo2FEa7YtexPW0JfsHhMI4-nyGb3S5lwO_fY_12MtdOBC1N0KVbsuUdsn2I4hfNPe3-eRYmHozShCZ_7CXSL9LPhP69pvjFwFETcCTqlczcVS6QRXsJ1vfStGL9mysBmxFL6EEjxeXi0rSA0Q8AcdJjnd-Jsb9A0Uw"
                    alt=""
                    class="h-full w-full object-cover"
                >
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
                        Start with our quick Free Eligibility Assessment and our senior consultant will contact you directly.
                    </p>

                </div>

                <a
                    href="#eligibility-form"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-slate-900 transition hover:bg-slate-100"
                >
                    Check Your Eligibility

                    <svg
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M5 12h14M13 6l6 6-6 6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        />
                    </svg>

                </a>

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    WHY CHOOSE US
========================================================= --}}
<section
    aria-label="Why Choose Us"
    class=" py-20 lg:py-24"
>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto mb-12 max-w-3xl text-center">

            <span class="inline-flex rounded-full bg-brand-50 px-4 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-brand-600">
                Why We're Different
            </span>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Why Choose
                <span class="text-brand-500">
                    Career Skills Institute?
                </span>
            </h2>

            <div class="mx-auto mt-4 h-1 w-14 rounded-full bg-brand-500"></div>

            <p class="mt-5 text-sm leading-7 text-slate-600">
                We deliver the quickest, most transparent, and fully accredited pathway to achieving your nationally recognized qualification.
            </p>

        </div>


        @php
            $benefits = [
                [
                    'title' => 'Swift and Stellar',
                    'text' => "Experience the galaxy's quickest Recognition of Prior Learning services with rapid turnaround.",
                    'icon' => '<path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'Convenience at Your Fingertips',
                    'text' => 'Simply submit and email your documents; our team handles the compliance and paperwork for you.',
                    'icon' => '<path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'No Classroom Required',
                    'text' => 'Forget the hassle of attending physical classes; our assessment process is conducted entirely remotely.',
                    'icon' => '<path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'Secure and Dependable',
                    'text' => 'Our process is rigorous, compliant, and backed by registered RTO partners across Australia.',
                    'icon' => '<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'Elite Expertise',
                    'text' => 'Our top-tier qualified assessors guide you through each piece of portfolio evidence smoothly.',
                    'icon' => '<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'Prestigious & Accredited',
                    'text' => 'Receive a genuine, nationally recognized qualification accepted by Australian employers and authorities.',
                    'icon' => '<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'Exceptional Value',
                    'text' => 'Achieve the best certifications at affordable and competitive pricing with flexible payment plans.',
                    'icon' => '<path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ],
                [
                    'title' => 'Career Catalyst',
                    'text' => 'Elevate your career prospects and licensing options. #Get_Certified for a brighter future.',
                    'icon' => '<path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>'
                ]
            ];
        @endphp


        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

            @foreach($benefits as $benefit)

                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-md">

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-500">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            {!! $benefit['icon'] !!}
                        </svg>

                    </div>

                    <h3 class="mt-5 text-base font-extrabold text-slate-900">
                        {{ $benefit['title'] }}
                    </h3>

                    <p class="mt-2 text-xs leading-6 text-slate-600">
                        {{ $benefit['text'] }}
                    </p>

                    <div class="mt-5 h-0.5 w-8 rounded-full bg-brand-500"></div>

                </article>

            @endforeach

        </div>

    </div>
</section>

@endsection