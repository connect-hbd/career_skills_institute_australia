@extends('frontend.layouts.app')

@section('content')
    <section class="relative py-16 lg:py-24 bg-gradient-to-b from-slate-50/50 via-white to-slate-50/50 overflow-hidden">

        <!-- Subtle Background Grid Pattern -->
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="space-y-3 max-w-3xl mx-auto flex items-center flex-col text-center justify-center mb-8">
                <div
                    class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 border border-brand-200/60 text-brand-700 text-xs font-semibold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-brand-600 animate-pulse"></span>
                    How RPL Works
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                    4 Simple Steps to Your <span class="text-brand-600">Qualification</span>
                </h2>
                <p class="text-base sm:text-lg text-slate-600 max-w-2xl font-normal leading-relaxed">
                    Turn your real-world work experience into a nationally recognized qualification through our streamlined
                    process.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Left Column: Content & Step-by-Step Timeline -->
                <div class="lg:col-span-7 space-y-10">
                    <!-- Vertical Connected Steps Timeline -->
                    <div
                        class="relative pl-3 space-y-6 sm:space-y-8 before:absolute before:left-[27px] sm:before:left-[31px] before:top-4 before:bottom-4 before:w-[2px] before:bg-slate-200">

                        <!-- Step 1 -->
                        <div class="relative flex items-start gap-4 sm:gap-6 group">
                            <div
                                class="relative z-10 flex-shrink-0 flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-white border-2 border-slate-200 text-slate-700 font-bold text-base sm:text-lg shadow-sm group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                                01
                            </div>
                            <div
                                class="flex-1 bg-white p-5 sm:p-6 rounded-2xl border border-slate-200/80 shadow-sm group-hover:shadow-md group-hover:border-brand-200 transition-all duration-300">
                                <h3
                                    class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-brand-600 transition-colors">
                                    Initial Consultation
                                </h3>
                                <p class="mt-1.5 text-sm text-slate-600 leading-relaxed">
                                    Contact us to discuss your experiences and career goals. Our RPL experts will guide you
                                    through the eligibility process.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative flex items-start gap-4 sm:gap-6 group">
                            <div
                                class="relative z-10 flex-shrink-0 flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-white border-2 border-slate-200 text-slate-700 font-bold text-base sm:text-lg shadow-sm group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                                02
                            </div>
                            <div
                                class="flex-1 bg-white p-5 sm:p-6 rounded-2xl border border-slate-200/80 shadow-sm group-hover:shadow-md group-hover:border-brand-200 transition-all duration-300">
                                <h3
                                    class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-brand-600 transition-colors">
                                    Evidence Submission
                                </h3>
                                <p class="mt-1.5 text-sm text-slate-600 leading-relaxed">
                                    Compile and submit evidence of your work and skills. This may include job descriptions,
                                    references, work samples, and professional development certificates.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative flex items-start gap-4 sm:gap-6 group">
                            <div
                                class="relative z-10 flex-shrink-0 flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-white border-2 border-slate-200 text-slate-700 font-bold text-base sm:text-lg shadow-sm group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                                03
                            </div>
                            <div
                                class="flex-1 bg-white p-5 sm:p-6 rounded-2xl border border-slate-200/80 shadow-sm group-hover:shadow-md group-hover:border-brand-200 transition-all duration-300">
                                <h3
                                    class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-brand-600 transition-colors">
                                    Skills Assessment
                                </h3>
                                <p class="mt-1.5 text-sm text-slate-600 leading-relaxed">
                                    An RPL assessor will review your submitted evidence and may conduct interviews or
                                    practical assessments to confirm your competencies.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="relative flex items-start gap-4 sm:gap-6 group">
                            <div
                                class="relative z-10 flex-shrink-0 flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-white border-2 border-slate-200 text-slate-700 font-bold text-base sm:text-lg shadow-sm group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                                04
                            </div>
                            <div
                                class="flex-1 bg-white p-5 sm:p-6 rounded-2xl border border-slate-200/80 shadow-sm group-hover:shadow-md group-hover:border-brand-200 transition-all duration-300">
                                <h3
                                    class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-brand-600 transition-colors">
                                    Qualification Award
                                </h3>
                                <p class="mt-1.5 text-sm text-slate-600 leading-relaxed">
                                    Once your skills are verified, we facilitate the award of your nationally recognized
                                    qualification and ongoing support for continuous professional development.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Right Column: Visual Feature with Floating Elements -->
                <div class="lg:col-span-5 relative flex justify-center flex-col gap-12">

                    <!-- Glowing Gradient Backdrops -->
                    <div
                        class="absolute -top-10 -right-10 w-80 h-80 bg-brand-400/20 rounded-full blur-3xl pointer-events-none">
                    </div>
                    <div
                        class="absolute -bottom-10 -left-10 w-80 h-80 bg-amber-400/20 rounded-full blur-3xl pointer-events-none">
                    </div>

                    <!-- Image Wrapper with Framed Shadow -->
                    <div class="relative w-full max-w-md lg:max-w-none">
                        <div
                            class="relative z-10 rounded-3xl overflow-hidden bg-slate-100 p-2 border border-slate-200/80 shadow-2xl">
                            <img src="{{ asset('company.jpg') }}" alt="RPL Candidate Working"
                                class="w-full h-auto object-cover rounded-2xl" />
                        </div>

                        <!-- Top-Left Floating Metric Card -->
                        <div
                            class="hidden sm:flex absolute -top-6 -left-6 z-20 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-slate-100 items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                                <iconify-icon icon="lucide:trending-up" class="text-xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-slate-500">Assessment Rate</p>
                                <p class="text-base font-extrabold text-slate-900">98.5% Success</p>
                            </div>
                        </div>

                        <!-- Bottom-Right Floating Recognition Card -->
                        <div
                            class="absolute -bottom-6 -right-2 sm:-right-6 z-20 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center">
                                <iconify-icon icon="lucide:award" class="text-2xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-slate-500">Official Recognition</p>
                                <p class="text-sm font-bold text-slate-900">Nationally Accredited</p>
                            </div>
                        </div>

                    </div>

                    <!-- Action Callout -->
                    <div class="pt-2 flex flex-col items-stretch sm:items-center gap-4">
                        <a href="{{ route('eligibility') }}"
                            class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl shadow-lg shadow-brand-600/25 transition-all duration-200 group">
                            <span>Start Free Eligibility Check</span>
                            <iconify-icon icon="lucide:arrow-right"
                                class="text-lg group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </a>
                        <p class="text-xs text-slate-500 self-center flex items-center">
                            <iconify-icon icon="lucide:shield-check"
                                class="inline text-emerald-500 mr-1 text-sm"></iconify-icon>
                            No upfront fees required
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </section>

    
@endsection
