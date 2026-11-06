{{-- =========================================================
    HERO SECTION
========================================================= --}}
<section class="relative overflow-hidden bg-secondary-25 py-16 text-slate-900 lg:py-24">

    {{-- Ambient Glows --}}
    <div class="pointer-events-none absolute -left-24 -top-24 h-[30rem] w-[30rem] rounded-full bg-[#3f8919]/10 blur-[140px]"></div>
    <div class="pointer-events-none absolute -right-24 top-1/2 h-[28rem] w-[28rem] -translate-y-1/2 rounded-full bg-[#9ece1b]/10 blur-[130px]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12">

            {{-- Left Content --}}
            <div class="space-y-6 lg:col-span-8">

                {{-- Pill Badge --}}
                <div class="inline-flex items-center gap-2.5 rounded-full border border-brand-200 bg-brand-50 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-brand-700 backdrop-blur-md">

                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-500 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-600"></span>
                    </span>

                    <span>01 Disciplines & Sectors</span>

                </div>

                {{-- Heading --}}
                <h1 class="text-4xl font-extrabold leading-[1.1] tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                    {{ $industry['name'] ?? 'All Qualifications' }}
                </h1>

                {{-- Description --}}
                <p class="max-w-2xl text-base font-normal leading-relaxed text-slate-600 sm:text-lg">
                    {{ $industry['description'] ?? 'Explore nationally recognised qualifications and develop practical skills tailored for immediate industry application and RPL credit pathways.' }}
                </p>

                {{-- Action Area --}}
                <div class="flex flex-wrap items-center gap-4 pt-4">

                    {{-- CTA Button --}}
                    <a href="#courses"
                        class="group inline-flex items-center justify-center gap-2.5 rounded-xl bg-[#3f8919] px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-[#3f8919]/30 transition-all duration-300 hover:scale-[1.02] hover:bg-[#347416] hover:shadow-[#3f8919]/50 active:scale-95">

                        <span>Explore Qualifications</span>

                        <iconify-icon
                            icon="lucide:arrow-down"
                            class="text-lg transition-transform duration-300 group-hover:translate-y-0.5">
                        </iconify-icon>

                    </a>

                    {{-- Badges Container --}}
                    <div class="flex flex-wrap items-center gap-4 rounded-xl border border-secondary-200 bg-white/80 px-5 py-3 text-xs font-medium text-slate-700 shadow-sm backdrop-blur-md sm:gap-6">

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