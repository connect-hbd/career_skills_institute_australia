@extends('frontend.layouts.app')

@section('content')
{{-- =========================================================
    HERO SECTION
========================================================== --}}
<section class="relative overflow-hidden bg-brand-50">

    {{-- Small decorative color accents --}}
    <div class="pointer-events-none absolute right-0 top-0 h-72 w-72 rounded-full bg-secondary-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 left-0 h-64 w-64 rounded-full bg-brand-100/70 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">

        <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-14">

            {{-- LEFT CONTENT --}}
            <div class="lg:col-span-7">

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white px-4 py-2 shadow-sm">

                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-brand-100">
                        <iconify-icon icon="lucide:award" class="text-sm text-brand-600"></iconify-icon>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.18em] text-brand-700">
                        Nationally Recognised Qualification
                    </span>

                </div>


                {{-- Heading --}}
                <h1
                    class="mt-5 max-w-3xl text-2xl font-black leading-tight tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">

                    AUR30320 – Certificate III in
                    <span class="text-brand-600">
                        Automotive Electrical Technology
                    </span>

                </h1>


                {{-- Description --}}
                <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                    Are you working 20+ hours per week performing automotive electrical services in vehicles?
                    With Recognition of Prior Learning (RPL), you can use your existing skills and work experience
                    to gain this qualification without classroom study.
                </p>


                {{-- CTA --}}
                <div class="mt-7 flex flex-col gap-3 sm:flex-row">

                    <a href="#assessment-form"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-500 px-6 py-3.5 text-sm font-extrabold text-white shadow-md shadow-brand-500/20 transition hover:bg-brand-600 hover:shadow-lg">

                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>

                        Price Match Guarantee - Inquire Now

                    </a>

                    <a href="#faq"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-secondary-200 bg-white px-6 py-3.5 text-sm font-bold text-secondary-700 transition hover:border-secondary-300 hover:bg-secondary-50">

                        <iconify-icon icon="lucide:circle-help" class="text-lg"></iconify-icon>

                        Learn More

                    </a>

                </div>


                {{-- INFORMATION CARDS --}}
                <div class="mt-9 grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Course Info --}}
                    <div
                        class="rounded-2xl border border-secondary-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-secondary-100 text-secondary-700">
                                <iconify-icon icon="lucide:book-open" class="text-xl"></iconify-icon>
                            </div>

                            <h3 class="text-sm font-extrabold text-secondary-950">
                                Key Information
                            </h3>

                        </div>

                        <div class="mt-5 space-y-3 text-sm">

                            <div class="flex items-center justify-between gap-4">
                                <span class="text-slate-500">Course Code</span>
                                <strong class="text-slate-900">AUR30320</strong>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <span class="text-slate-500">Duration</span>
                                <strong class="text-slate-900">4–12 weeks</strong>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <span class="text-slate-500">Delivery</span>
                                <strong class="text-slate-900">RPL</strong>
                            </div>

                        </div>

                    </div>


                    {{-- RTO Info --}}
                    <div
                        class="rounded-2xl border border-secondary-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-secondary-100 text-secondary-600">
                                <iconify-icon icon="lucide:shield-check" class="text-xl"></iconify-icon>
                            </div>

                            <h3 class="text-sm font-extrabold text-secondary-950">
                                Offered By
                            </h3>

                        </div>

                        <div class="mt-5 space-y-3">

                            <div class="flex items-center justify-between gap-4">
                                <p class="text-sm font-bold text-slate-900">
                                    Australis College
                                </p>

                                <p class="mt-0.5 text-xs text-slate-500">
                                    RTO: 31518
                                </p>
                            </div>

                            <div class="flex items-center justify-between gap-4">
                                <p class="text-sm font-bold text-slate-900">
                                    NOMI COLLEGE
                                </p>

                                <p class="mt-0.5 text-xs text-slate-500">
                                    RTO: 31518
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

             <div class="lg:col-span-5" id="assessment-form">
                    <div class="bg-white text-slate-900 rounded-2xl p-6 sm:p-8 shadow-2xl border border-brand-100 relative">
                        <div
                            class="absolute -top-3 right-6 bg-secondary-500 text-white text-[10px] font-extrabold uppercase tracking-wider px-3 py-1 rounded-full shadow-md">
                            Fast & Free
                        </div>

                        <h2 class="text-xl font-extrabold text-brand-700 leading-snug">Start Your Free Assessment Today!
                        </h2>
                        <p class="text-xs text-slate-500 mt-1 mb-6">Find out if you qualify for RPL in 60 seconds.</p>

                        <form class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-brand-900 uppercase tracking-wider mb-1">Full
                                    Name *</label>
                                <input type="text" placeholder="Full Name *"
                                    class="w-full px-4 py-3 rounded-lg bg-brand-25 border border-brand-200 focus:outline-none focus:ring-1 focus:ring-secondary-500 focus:bg-white text-sm transition placeholder-slate-400"
                                    required />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-brand-900 uppercase tracking-wider mb-1">Your
                                    Email *</label>
                                <input type="email" placeholder="Your Email *"
                                    class="w-full px-4 py-3 rounded-lg bg-brand-25 border border-brand-200 focus:outline-none focus:ring-1 focus:ring-secondary-500 focus:bg-white text-sm transition placeholder-slate-400"
                                    required />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-brand-900 uppercase tracking-wider mb-1">Phone
                                    Number *</label>
                                <input type="tel" placeholder="Phone Number *"
                                    class="w-full px-4 py-3 rounded-lg bg-brand-25 border border-brand-200 focus:outline-none focus:ring-1 focus:ring-secondary-500 focus:bg-white text-sm transition placeholder-slate-400"
                                    required />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-brand-900 uppercase tracking-wider mb-1">Message
                                    (Optional)</label>
                                <textarea rows="3" placeholder="Message (Optional)"
                                    class="w-full px-4 py-3 rounded-lg bg-brand-25 border border-brand-200 focus:outline-none focus:ring-1 focus:ring-secondary-500 focus:bg-white text-sm transition placeholder-slate-400"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full py-3.5 px-6 rounded-lg bg-brand-500 hover:bg-brand-600 text-white font-extrabold text-sm uppercase tracking-wider transition duration-200 shadow-lg shadow-brand-500/25">
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
========================================================== --}}
<section class="border-b border-slate-100 bg-white py-16 sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto max-w-3xl text-center">

            <span class="text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                Qualification Overview
            </span>

            <h2 class="mt-3 text-2xl font-black tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                Certify Your Skills and Advance Your Career
            </h2>

            <p class="mt-5 text-sm leading-7 text-slate-600 sm:text-base">
                If your daily work involves diagnosing, servicing, installing, and repairing electrical wiring,
                electronic modules, ignition systems, and auxiliary electronics in modern motor vehicles,
                certifying your capability with an official
                <strong class="font-bold text-brand-800">AUR30320 Certificate III</strong>
                can help formalise your existing skills and experience.
            </p>

        </div>


        {{-- BENEFIT CARDS --}}
        <div class="mt-12 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            {{-- Card 1 --}}
            <div
                class="group rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition duration-200 hover:-translate-y-1 hover:border-brand-200 hover:bg-white hover:shadow-lg">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-700 transition group-hover:bg-brand-700 group-hover:text-white">
                    <iconify-icon icon="lucide:school" class="text-xl"></iconify-icon>
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    No Classroom Sitting
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Convert your existing on-the-job vehicle service experience into recognised
                    units of competency without interrupting your paid job.
                </p>

            </div>


            {{-- Card 2 --}}
            <div
                class="group rounded-2xl border border-secondary-100 bg-secondary-50/50 p-6 transition duration-200 hover:-translate-y-1 hover:border-secondary-200 hover:bg-white hover:shadow-lg">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-secondary-100 text-secondary-600 transition group-hover:bg-secondary-500 group-hover:text-white">
                    <iconify-icon icon="lucide:zap" class="text-xl"></iconify-icon>
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Fast-Track Timeline
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Achieve your certificate in an estimated 4 to 12 weeks once your workplace
                    evidence, videos, and referee reports are compiled.
                </p>

            </div>


            {{-- Card 3 --}}
            <div
                class="group rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition duration-200 hover:-translate-y-1 hover:border-brand-200 hover:bg-white hover:shadow-lg">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-700 transition group-hover:bg-brand-700 group-hover:text-white">
                    <iconify-icon icon="lucide:file-check-2" class="text-xl"></iconify-icon>
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Trade Licensing Ready
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    AUR30320 provides the foundational technical qualification relevant to trade
                    licensing and motor vehicle repair requirements.
                </p>

            </div>


            {{-- Card 4 --}}
            <div
                class="group rounded-2xl border border-secondary-100 bg-secondary-50/50 p-6 transition duration-200 hover:-translate-y-1 hover:border-secondary-200 hover:bg-white hover:shadow-lg">

                <div
                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-secondary-100 text-secondary-600 transition group-hover:bg-secondary-500 group-hover:text-white">
                    <iconify-icon icon="lucide:trending-up" class="text-xl"></iconify-icon>
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Higher Earning Potential
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Formal trade credentials can help position experienced automotive electricians
                    for higher-level roles and specialist opportunities.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    STATISTICS
========================================================== --}}
<section class="bg-brand-950 py-16 text-white sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mx-auto max-w-3xl text-center">

            <span class="text-xs font-black uppercase tracking-[0.18em] text-secondary-400">
                Graduate Outcomes
            </span>

            <h2 class="mt-3 text-2xl font-black leading-tight tracking-tight text-white sm:text-3xl lg:text-4xl">
                Career Outcomes That Show the Value of Qualification
            </h2>

            <p class="mt-4 text-sm leading-7 text-brand-100 sm:text-base">
                Did you know that
                <strong class="font-black text-secondary-400">88.1%</strong>
                of Certificate III in Automotive Electrical Technology graduates
                secured a new job, earned a promotion, or received higher pay after obtaining their qualification?
            </p>

            <p class="mt-2 text-xs text-brand-300">
                Verified Australian Vocational Education and Training (NCVER) industry graduate outcome benchmarks.
            </p>

        </div>


        {{-- Stats --}}
        <div class="mt-12 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Stat 1 --}}
            <div
                class="rounded-2xl border border-brand-800 bg-brand-900 p-6 text-center transition hover:-translate-y-1 hover:border-brand-700">

                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-800 text-brand-200">
                    <iconify-icon icon="lucide:briefcase-business" class="text-xl"></iconify-icon>
                </div>

                <p class="mt-5 text-[10px] font-black uppercase tracking-wider text-brand-300">
                    Top Occupation Outcome
                </p>

                <p class="mt-2 text-4xl font-black text-white">
                    41.3%
                </p>

                <p class="mt-2 text-sm leading-6 text-brand-200">
                    Community, Mining & Automotive Technicians
                </p>

            </div>


            {{-- Stat 2 --}}
            <div
                class="rounded-2xl border border-brand-800 bg-brand-900 p-6 text-center transition hover:-translate-y-1 hover:border-brand-700">

                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-secondary-500/15 text-secondary-400">
                    <iconify-icon icon="lucide:building-2" class="text-xl"></iconify-icon>
                </div>

                <p class="mt-5 text-[10px] font-black uppercase tracking-wider text-brand-300">
                    Automotive & Heavy Industry
                </p>

                <p class="mt-2 text-4xl font-black text-secondary-400">
                    86%
                </p>

                <p class="mt-2 text-sm leading-6 text-brand-200">
                    Fleet Repair, Dealerships & Field Service
                </p>

            </div>


            {{-- Stat 3 --}}
            <div
                class="rounded-2xl border border-brand-800 bg-brand-900 p-6 text-center transition hover:-translate-y-1 hover:border-brand-700">

                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-800 text-brand-200">
                    <iconify-icon icon="lucide:graduation-cap" class="text-xl"></iconify-icon>
                </div>

                <p class="mt-5 text-[10px] font-black uppercase tracking-wider text-brand-300">
                    Training & Technical Roles
                </p>

                <p class="mt-2 text-4xl font-black text-white">
                    8%
                </p>

                <p class="mt-2 text-sm leading-6 text-brand-200">
                    Supervisory, Mentorship & Training
                </p>

            </div>


            {{-- Stat 4 --}}
            <div
                class="rounded-2xl border border-brand-800 bg-brand-900 p-6 text-center transition hover:-translate-y-1 hover:border-brand-700">

                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-secondary-500/15 text-secondary-400">
                    <iconify-icon icon="lucide:package-search" class="text-xl"></iconify-icon>
                </div>

                <p class="mt-5 text-[10px] font-black uppercase tracking-wider text-brand-300">
                    Retail & Aftermarket Parts
                </p>

                <p class="mt-2 text-4xl font-black text-secondary-400">
                    3%
                </p>

                <p class="mt-2 text-sm leading-6 text-brand-200">
                    Automotive Parts & Supply Consultancies
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    RPL GUIDE
========================================================== --}}
<section class="bg-white py-16 sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden rounded-3xl bg-brand-50">

            <div class="grid grid-cols-1 lg:grid-cols-12">

                {{-- Guide Preview --}}
                <div class="p-6 sm:p-10 lg:col-span-5 lg:p-12">

                    <div
                        class="rounded-2xl border border-brand-200 bg-white p-7 shadow-sm">

                        <div
                            class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-500 text-white shadow-sm">
                            <iconify-icon icon="lucide:book-open-check" class="text-2xl"></iconify-icon>
                        </div>

                        <span
                            class="mt-6 block text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                            Free Comprehensive Guide
                        </span>

                        <h3 class="mt-2 text-xl font-black leading-tight text-brand-950">
                            Master Recognition of Prior Learning
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Learn how to document vehicle electrical competencies,
                            work experience, evidence and assessor requirements.
                        </p>

                        <div class="mt-5 flex items-center gap-2 text-xs font-semibold text-slate-500">

                            <iconify-icon
                                icon="lucide:download"
                                class="text-base text-secondary-500">
                            </iconify-icon>

                            Over 5,000+ trade guides downloaded

                        </div>

                    </div>

                </div>


                {{-- Content --}}
                <div class="flex flex-col justify-center p-6 sm:p-10 lg:col-span-7 lg:p-12">

                    <span class="text-xs font-black uppercase tracking-[0.18em] text-secondary-600">
                        Unlock Your Trade Potential
                    </span>

                    <h2 class="mt-3 max-w-2xl text-2xl font-black leading-tight tracking-tight text-brand-950 sm:text-3xl lg:text-4xl">
                        Discover the Full Potential of Career Skills Institute
                    </h2>

                    <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                        Master Recognition of Prior Learning with our comprehensive guide.
                        Learn how your existing skills and experience can contribute toward
                        nationally recognised qualifications.
                    </p>

                    <div class="mt-7">

                        <a href="#inquiry-form"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-500 px-6 py-3.5 text-sm font-extrabold text-white transition hover:bg-brand-800">

                            <iconify-icon icon="lucide:download" class="text-lg"></iconify-icon>

                            Download Free Assessment Guide

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    FAQ SECTION
========================================================== --}}
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
                Find answers to the most common questions about Recognition of Prior Learning,
                eligibility, evidence and the qualification process.
            </p>

        </div>


        {{-- FAQ GRID --}}
        <div class="mt-12 grid grid-cols-1 items-start gap-8 lg:grid-cols-12 lg:gap-10">

            {{-- SIDEBAR --}}
            <div class="lg:col-span-4">

                <div class="lg:sticky lg:top-28">

                    {{-- Contact --}}
                    <div
                        class="rounded-2xl border border-brand-100 bg-white p-6 shadow-sm sm:p-7">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-500">
                            <iconify-icon icon="lucide:messages-square" class="text-xl"></iconify-icon>
                        </div>

                        <h3 class="mt-5 text-xl font-black text-brand-950">
                            Have more questions?
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Our RPL specialists can help you understand the assessment process,
                            required evidence, eligibility and next steps.
                        </p>

                        <a href="mailto:info@csi.com"
                            class="group mt-6 flex items-center justify-between rounded-xl border border-brand-100 bg-brand-50 p-3.5 transition hover:border-brand-200 hover:bg-brand-100">

                            <span class="flex items-center gap-3">

                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-secondary-600">
                                    <iconify-icon icon="lucide:mail" class="text-lg"></iconify-icon>
                                </span>

                                <span>
                                    <span
                                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                        Email Us
                                    </span>

                                    <span class="mt-0.5 block text-sm font-extrabold text-brand-900">
                                        Our RPL Team
                                    </span>
                                </span>

                            </span>

                            <span
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-brand-600 transition group-hover:translate-x-0.5">

                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>

                            </span>

                        </a>

                    </div>


                    {{-- Help Card --}}
                    <div class="mt-4 rounded-2xl bg-brand-900 p-6 text-white">

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary-500/15">
                                <iconify-icon icon="lucide:headphones"
                                    class="text-lg text-secondary-400"></iconify-icon>
                            </div>

                            <div>

                                <p class="text-sm font-extrabold">
                                    Need personal guidance?
                                </p>

                                <p class="mt-1 text-xs leading-5 text-brand-200">
                                    Speak with our team about your experience and eligibility.
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
            <div
                class="lg:col-span-8"
                x-data="{
                    active: 0,
                    faqs: [
                        {
                            question: 'Am I eligible for RPL recognition?',
                            answer: 'If you have relevant work experience, informal training, or existing skills in automotive electrical systems — such as working 20+ hours per week on vehicle electrical services — you may be eligible. A free preliminary assessment will help determine your suitability.'
                        },
                        {
                            question: 'What evidence is required to qualify?',
                            answer: 'Standard evidence typically includes work logs, photos or videos of completed work, employer references, a resume detailing relevant experience, payslips, or previous transcripts and certificates. An assessor confirms the exact requirements for your situation.'
                        },
                        {
                            question: 'How long does the RPL process take?',
                            answer: 'The estimated duration is around 4–12 weeks depending on your existing experience, the quality of your evidence and any outstanding assessment requirements.'
                        },
                        {
                            question: 'Is this qualification nationally recognised?',
                            answer: 'Yes. AUR30320 – Certificate III in Automotive Electrical Technology is a nationally recognised qualification under the Australian Qualifications Framework, issued by our partner Registered Training Organisations (RTO 31518).'
                        },
                        {
                            question: 'Do I need to attend any classes?',
                            answer: 'No classroom attendance is required. RPL assesses the skills you already have. If small gaps are identified, targeted gap training may be recommended so you can complete the remaining units.'
                        }
                    ]
                }">

                <div class="space-y-3">

                    <template x-for="(faq, index) in faqs" :key="index">

                        <div
                            class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                            :class="active === index
                                ? 'border-secondary-300 shadow-sm'
                                : 'border-slate-200 hover:border-brand-200'">

                            <button
                                type="button"
                                class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                                @click="active = active === index ? null : index"
                                :aria-expanded="active === index">

                                {{-- Icon --}}
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                    :class="active === index
                                        ? 'bg-secondary-500 text-white'
                                        : 'bg-brand-50 text-brand-500'">

                                    <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>

                                </div>


                                {{-- Question --}}
                                <span class="min-w-0 flex-1">

                                    <span
                                        class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                        :class="active === index
                                            ? 'text-secondary-600'
                                            : 'text-slate-400'">

                                        Question
                                        <span x-text="String(index + 1).padStart(2, '0')"></span>

                                    </span>

                                    <span
                                        class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base"
                                        x-text="faq.question">
                                    </span>

                                </span>


                                {{-- Toggle --}}
                                <span
                                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                    :class="active === index
                                        ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                        : 'border-slate-200 bg-white text-slate-500'">

                                    <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>

                                </span>

                            </button>


                            {{-- Answer --}}
                            <div x-show="active === index" x-collapse.duration.300ms>

                                <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                    <div class="flex gap-4">

                                        <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                        <p
                                            class="text-sm leading-7 text-slate-600 sm:text-[15px]"
                                            x-text="faq.answer">
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </template>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    HOW IT WORKS
========================================================== --}}
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
                All qualifications are awarded by Registered Training Organisations (RTOs) in Australia.
            </p>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Our process is designed to transform your professional experience and prior learning
                into a pathway toward formal certification.
            </p>

        </div>


        {{-- Steps --}}
        <div class="mt-12 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

            {{-- Step 1 --}}
            <div
                class="relative rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-brand-100">
                    01
                </span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500 text-sm font-black text-white">
                    1
                </div>

                <h3 class="mt-5 text-base font-black text-brand-500">
                    Free Skill Assessment
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Start your Career Skills Institute journey with a quick skills check
                    to establish RPL suitability.
                </p>

            </div>


            {{-- Step 2 --}}
            <div
                class="relative rounded-2xl border border-secondary-100 bg-secondary-50/50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-secondary-100">
                    02
                </span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary-500 text-sm font-black text-white">
                    2
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Build Experience Portfolio
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Document your professional achievements with dedicated assessors
                    assisting you with work proof and templates.
                </p>

            </div>


            {{-- Step 3 --}}
            <div
                class="relative rounded-2xl border border-brand-100 bg-brand-50/50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-brand-100">
                    03
                </span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-500 text-sm font-black text-white">
                    3
                </div>

                <h3 class="mt-5 text-base font-black text-brand-500">
                    Review By The RTO
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Validate your expertise through certified RTO technical assessors
                    via portfolio audit and competency verification.
                </p>

            </div>


            {{-- Step 4 --}}
            <div
                class="relative rounded-2xl border border-secondary-200 bg-secondary-50 p-6 transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                <span class="absolute right-5 top-5 text-3xl font-black text-secondary-100">
                    04
                </span>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-secondary-500 text-white">
                    <iconify-icon icon="lucide:check" class="text-xl"></iconify-icon>
                </div>

                <h3 class="mt-5 text-base font-black text-brand-950">
                    Achieve Certification
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Receive your nationally recognised Australian qualification
                    certificate and transcript.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    FINAL CTA
========================================================== --}}
<section class="bg-brand-50 py-16 sm:py-20">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div
            class="relative overflow-hidden rounded-3xl bg-brand-900 px-6 py-12 text-center sm:px-10 lg:px-16 lg:py-16">

            {{-- Simple Accent --}}
            <div class="pointer-events-none absolute right-0 top-0 h-40 w-40 rounded-full bg-secondary-500/10"></div>
            <div class="pointer-events-none absolute bottom-0 left-0 h-32 w-32 rounded-full bg-brand-500/20"></div>

            <div class="relative z-10">

                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 rounded-full border border-secondary-400/20 bg-white/5 px-4 py-2">

                    <span
                        class="flex h-5 w-5 items-center justify-center rounded-full bg-secondary-500/15 text-secondary-400">
                        <iconify-icon icon="lucide:sparkles" class="text-xs"></iconify-icon>
                    </span>

                    <span class="text-[10px] font-black uppercase tracking-[0.18em] text-secondary-300">
                        Ready To Get Started?
                    </span>

                </div>


                {{-- Heading --}}
                <h2 class="mx-auto mt-6 max-w-3xl text-3xl font-black leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">

                    Turn Your Experience Into a
                    <span class="text-secondary-400">
                        Qualification.
                    </span>

                </h2>


                {{-- Description --}}
                <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-brand-100 sm:text-base lg:text-lg">
                    Find out whether your existing automotive electrical skills can qualify you
                    for RPL. It takes less than a minute and costs nothing.
                </p>


                {{-- Buttons --}}
                <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

                    <a href="#assessment-form"
                        class="inline-flex items-center justify-center gap-2.5 rounded-xl bg-secondary-500 px-7 py-3.5 text-sm font-black text-white shadow-lg shadow-secondary-950/20 transition hover:bg-secondary-600">

                        Check My Eligibility

                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>

                    </a>


                    <a href="mailto:info@csi.com"
                        class="inline-flex items-center justify-center gap-2.5 rounded-xl border border-white/10 bg-white/5 px-7 py-3.5 text-sm font-bold text-white transition hover:border-secondary-400/30 hover:bg-white/10">

                        <iconify-icon icon="lucide:mail" class="text-lg text-secondary-400"></iconify-icon>

                        Email Our Team

                    </a>

                </div>


                {{-- Trust --}}
                <div class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-3">

                    <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-200">
                        <iconify-icon icon="lucide:shield-check"
                            class="text-base text-secondary-400"></iconify-icon>
                        Free assessment
                    </span>

                    <span class="hidden h-4 w-px bg-white/10 sm:block"></span>

                    <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-200">
                        <iconify-icon icon="lucide:clock-3"
                            class="text-base text-secondary-400"></iconify-icon>
                        60-second process
                    </span>

                    <span class="hidden h-4 w-px bg-white/10 sm:block"></span>

                    <span class="inline-flex items-center gap-2 text-xs font-bold text-brand-200">
                        <iconify-icon icon="lucide:badge-check"
                            class="text-base text-secondary-400"></iconify-icon>
                        Expert guidance
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
