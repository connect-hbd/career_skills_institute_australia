<section class="relative flex items-center justify-center overflow-hidden bg-brand-50 py-10 text-slate-900 sm:py-12 lg:py-16">

    {{-- Ambient Radial Glows --}}
    <div class="pointer-events-none absolute -left-16 -top-16 h-64 w-64 rounded-full bg-brand-500/10 blur-[80px] sm:-left-20 sm:-top-20 sm:h-80 sm:w-80 sm:blur-[100px]"></div>
    <div class="pointer-events-none absolute -bottom-16 -right-16 h-64 w-64 rounded-full bg-secondary-500/15 blur-[80px] sm:-bottom-20 sm:-right-20 sm:h-80 sm:w-80 sm:blur-[100px]"></div>

    {{-- Container --}}
    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 items-center gap-8 sm:gap-10 lg:grid-cols-12 lg:gap-12 xl:gap-16">

            {{-- Left Side Content --}}
            <div class="animate-fade-in-left order-1 space-y-4 sm:space-y-5 lg:col-span-6 lg:order-none">

                {{-- Status Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-brand-700 shadow-sm sm:px-3.5 sm:text-xs">
                    <span class="flex h-1.5 w-1.5 animate-pulse rounded-full bg-brand-500 sm:h-2 sm:w-2"></span>
                    <span>Nationally Recognised Training</span>
                </div>

                {{-- Main Heading --}}
                <h1 class="text-[1.75rem] font-extrabold leading-[1.2] tracking-tight text-brand-950 xs:text-3xl sm:text-4xl lg:text-[2.75rem] xl:text-5xl">
                    Build Your Future with
                    <span class="bg-gradient-to-r from-brand-600 via-brand-500 to-secondary-600 bg-clip-text text-transparent">
                        Expert Certification
                    </span>
                </h1>

                {{-- Subtitle --}}
                <p class="max-w-xl text-sm font-normal leading-relaxed text-slate-600 sm:text-base">
                    Gain real-world construction, trade, and engineering skills through flexible training and accredited
                    RPL pathways tailored to fast-track your career.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col gap-3 pt-1 sm:flex-row sm:flex-wrap sm:items-center sm:gap-3 sm:pt-2">

                    {{-- Primary CTA --}}
                    <a href="#courses"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/20 transition-all duration-300 hover:scale-[1.02] hover:bg-brand-600 hover:shadow-brand-500/30 active:scale-95 sm:w-auto sm:px-6">
                        <span>View Courses</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                    </a>

                    {{-- Secondary CTA --}}
                    <a href="#consultation"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-brand-200 bg-white/80 px-5 py-3 text-sm font-medium text-brand-800 shadow-sm backdrop-blur-sm transition-all duration-300 hover:border-brand-400 hover:bg-brand-50 hover:text-brand-900 sm:w-auto">
                        <iconify-icon icon="lucide:phone-call" class="text-base text-brand-600"></iconify-icon>
                        <span>Book Consultation</span>
                    </a>
                </div>
            </div>

            {{-- Right Side Bento Grid --}}
            <div class="animate-fade-in-right order-2 lg:col-span-6 lg:order-none">

                <div class="relative mx-auto grid h-[280px] max-w-md grid-cols-12 grid-rows-2 gap-2.5 xs:h-[300px] sm:h-[340px] sm:max-w-lg sm:gap-3 lg:mx-0 lg:h-[360px] lg:max-w-none xl:h-[400px]">

                    {{-- Decorative Gradient Glow --}}
                    <div class="pointer-events-none absolute -inset-2 rounded-3xl bg-gradient-to-tr from-brand-500/20 via-secondary-500/15 to-transparent blur-xl"></div>

                    {{-- Image 1: Main Featured Tile --}}
                    <div class="group relative col-span-7 row-span-2 overflow-hidden rounded-xl border border-brand-200 bg-brand-100 shadow-xl shadow-brand-900/10 transition-all duration-500 hover:border-brand-400 sm:rounded-2xl sm:shadow-2xl">
                        <img src="{{ asset('images/courses/trade-vocational.webp') }}"
                             alt="Construction engineering project"
                             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />

                        {{-- Image Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-950/85 via-brand-950/5 to-transparent"></div>

                        {{-- Floating Glass Pill --}}
                        <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between rounded-lg border border-white/20 bg-brand-950/85 p-2 shadow-lg backdrop-blur-md sm:bottom-3 sm:left-3 sm:right-3 sm:rounded-xl sm:p-2.5">
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                <iconify-icon icon="lucide:check-circle-2" class="text-base text-secondary-400 sm:text-lg"></iconify-icon>
                                <span class="text-[11px] font-medium text-white sm:text-xs">
                                    RPL Pathways
                                </span>
                            </div>
                            <span class="text-[9px] font-bold uppercase tracking-wider text-secondary-300 sm:text-[10px]">
                                Accredited
                            </span>
                        </div>
                    </div>

                    {{-- Image 2: Top Right Tile --}}
                    <div class="group relative col-span-5 row-span-1 overflow-hidden rounded-xl border border-brand-200 bg-brand-100 shadow-lg shadow-brand-900/10 transition-all duration-500 hover:border-brand-400 sm:rounded-2xl sm:shadow-xl">
                        <img src="{{ asset('images/courses/two.avif') }}"
                             alt="On-site technical training"
                             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    </div>

                    {{-- Image 3: Bottom Right Tile --}}
                    <div class="group relative col-span-5 row-span-1 overflow-hidden rounded-xl border border-brand-200 bg-brand-100 shadow-lg shadow-brand-900/10 transition-all duration-500 hover:border-brand-400 sm:rounded-2xl sm:shadow-xl">
                        <img src="{{ asset('images/courses/one.avif') }}"
                             alt="Hands-on skills application"
                             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    </div>

                    {{-- Floating Badge Chip --}}
                    <div class="animate-bounce-subtle absolute -right-2 -top-2 z-30 flex items-center gap-2 rounded-lg border border-brand-100 bg-white/95 px-2.5 py-1.5 shadow-lg shadow-brand-900/10 backdrop-blur-md sm:-right-3 sm:-top-3 sm:gap-2.5 sm:rounded-xl sm:px-3 sm:py-2 sm:shadow-xl">
                        <div class="flex h-7 w-7 items-center justify-center rounded-md bg-secondary-100 text-brand-700 sm:h-8 sm:w-8 sm:rounded-lg">
                            <iconify-icon icon="lucide:award" class="text-base sm:text-lg"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-brand-950 sm:text-xs">
                                ISO Certified
                            </p>
                            <p class="text-[9px] text-slate-500 sm:text-[10px]">
                                100% Recognized
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>