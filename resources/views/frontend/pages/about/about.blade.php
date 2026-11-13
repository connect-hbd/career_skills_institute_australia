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

{{-- RTO Summary Card Component --}}
<section class="max-w-7xl mx-auto my-8 px-4 sm:px-6">
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">
        
        {{-- Card Header --}}
        <div class="px-6 py-5 border-b border-slate-200/80 bg-slate-50/60 flex items-center justify-between">
            <div>
                <h2 class="text-lg sm:text-xl md:text-3xl font-semibold text-slate-900 tracking-tight">Summary</h2>
                <p class="text-xs text-slate-500 mt-0.5">Registered Training Organisation (RTO) registration details</p>
            </div>
            
            {{-- Status Badge in Header (Optional quick-glance) --}}
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                {{ $rto->status ?? 'Current' }}
            </span>
        </div>

        {{-- Definition List Grid --}}
        <dl class="divide-y divide-slate-100">
            
            {{-- Code --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">Code</dt>
                <dd class="mt-1 text-sm font-semibold text-slate-900 sm:col-span-2 sm:mt-0 font-mono">
                    {{ $rto->code ?? '45685' }}
                </dd>
            </div>

            {{-- Legal Name --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">Legal name</dt>
                <dd class="mt-1 text-sm font-medium text-slate-900 sm:col-span-2 sm:mt-0">
                    {{ $rto->legal_name ?? 'Career Skills Institute Australia' }}
                </dd>
            </div>

            {{-- Business Name(s) --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">Business name(s)</dt>
                <dd class="mt-1 text-sm text-slate-800 sm:col-span-2 sm:mt-0">
                    {{ $rto->business_name ?? 'CAREER SKILLS INSTITUTE AUSTRALIA' }}
                </dd>
            </div>

            {{-- Status --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">Status</dt>
                <dd class="mt-1 sm:col-span-2 sm:mt-0">
                    @php
                        $isCurrent = strtolower($rto->status ?? 'current') === 'current';
                    @endphp
                    <span @class([
                        'inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium ring-1 ring-inset',
                        'bg-emerald-50 text-emerald-700 ring-emerald-600/20' => $isCurrent,
                        'bg-amber-50 text-amber-700 ring-amber-600/20' => !$isCurrent,
                    ])>
                        <span @class([
                            'w-1.5 h-1.5 rounded-full',
                            'bg-emerald-500' => $isCurrent,
                            'bg-amber-500' => !$isCurrent,
                        ])></span>
                        {{ $rto->status ?? 'Current' }}
                    </span>
                </dd>
            </div>

            {{-- ABN --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">ABN</dt>
                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">
                    <a href="https://abr.business.gov.au/ABN/View?id={{ str_replace(' ', '', $rto->abn ?? '31626754069') }}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-1 font-medium text-[#1968b2] hover:text-[#155b9d] hover:underline transition-colors">
                        <span>{{ $rto->abn ?? '31 626 754 069' }}</span>
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </dd>
            </div>

            {{-- ACN --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">ACN</dt>
                <dd class="mt-1 text-sm text-slate-800 sm:col-span-2 sm:mt-0 font-mono">
                    {{ $rto->acn ?? '626 754 069' }}
                </dd>
            </div>

            {{-- RTO Type --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">RTO type</dt>
                <dd class="mt-1 text-sm text-slate-800 sm:col-span-2 sm:mt-0 leading-relaxed">
                    {{ $rto->rto_type ?? 'Education/training Business Or Centre: Privately Operated Registered Training Organisation' }}
                </dd>
            </div>

            {{-- Web Address --}}
            <div class="px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center hover:bg-slate-50/70 transition-colors">
                <dt class="text-sm font-medium text-slate-500">Web address</dt>
                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">
                    @php
                        $website = $rto->web_address ?? 'http://www.csia.com.au';
                    @endphp
                    <a href="{{ $website }}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-1 font-medium text-[#1968b2] hover:text-[#155b9d] hover:underline break-all transition-colors">
                        <span>{{ $website }}</span>
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </dd>
            </div>

        </dl>
    </div>
</section>

@endsection
