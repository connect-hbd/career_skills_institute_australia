{{-- =========================================================
    HERO SECTION
========================================================= --}}
<section class="relative overflow-hidden bg-secondary-25 py-10 text-slate-900 sm:py-14 lg:py-24">

    {{-- Ambient Glows --}}
    <div class="pointer-events-none absolute -left-16 -top-16 h-64 w-64 rounded-full bg-[#3f8919]/10 blur-[100px] sm:-left-24 sm:-top-24 sm:h-[30rem] sm:w-[30rem] sm:blur-[140px]"></div>
    <div class="pointer-events-none absolute -right-16 top-1/2 h-56 w-56 -translate-y-1/2 rounded-full bg-[#9ece1b]/10 blur-[90px] sm:-right-24 sm:h-[28rem] sm:w-[28rem] sm:blur-[130px]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12 lg:gap-10">

            {{-- Left Content --}}
            <div class="space-y-5 sm:space-y-6 lg:col-span-8">

                {{-- Pill Badge --}}
                <div class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1.5 text-[11px] font-bold uppercase tracking-wider text-brand-700 backdrop-blur-md sm:gap-2.5 sm:px-4 sm:text-xs">

                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-500 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-600"></span>
                    </span>

                    <span>01 Disciplines & Sectors</span>
                </div>

                {{-- Heading --}}
                <h1 class="text-3xl font-extrabold leading-[1.15] tracking-tight text-slate-900 sm:text-4xl md:text-5xl lg:text-6xl">
                    {{ $industry['name'] ?? 'All Qualifications' }}
                </h1>

                {{-- Description --}}
                <p class="max-w-2xl text-sm font-normal leading-relaxed text-slate-600 sm:text-base lg:text-lg">
                    {{ $industry['description'] ?? 'Explore nationally recognised qualifications and develop practical skills tailored for immediate industry application and RPL credit pathways.' }}
                </p>

                {{-- Action Area --}}
                <div class="flex flex-col gap-4 pt-2 sm:flex-row sm:flex-wrap sm:items-center sm:gap-4 sm:pt-4">

                    {{-- CTA Button --}}
                    <a href="#courses"
                       class="group inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#3f8919] px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#3f8919]/30 transition-all duration-300
                              hover:scale-[1.02] hover:bg-[#347416] hover:shadow-[#3f8919]/50 active:scale-95
                              sm:w-auto sm:gap-2.5 sm:px-7">

                        <span>Explore Qualifications</span>

                        <iconify-icon
                            icon="lucide:arrow-down"
                            class="text-lg transition-transform duration-300 group-hover:translate-y-0.5">
                        </iconify-icon>
                    </a>

                    {{-- Badges Container --}}
                    <div class="flex flex-wrap items-center gap-3 rounded-xl border border-secondary-200 bg-white/80 px-4 py-3 text-xs font-medium text-slate-700 shadow-sm backdrop-blur-md sm:gap-4 sm:px-5 sm:gap-6">

                        <div class="flex items-center gap-2">
                            <iconify-icon
                                icon="lucide:award"
                                class="text-base text-brand-600">
                            </iconify-icon>
                            <span>AQF Accredited</span>
                        </div>

                        <span class="hidden h-3.5 w-px bg-secondary-200 sm:inline-block"></span>

                        <div class="flex items-center gap-2">
                            <iconify-icon
                                icon="lucide:shield-check"
                                class="text-base text-emerald-600">
                            </iconify-icon>
                            <span>ASQA Verified</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>