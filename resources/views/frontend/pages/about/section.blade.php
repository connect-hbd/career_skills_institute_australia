<section id="about" class=" py-12 sm:py-16 lg:py-24">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-16">

            {{-- Image --}}
            <div class="order-1 lg:col-span-6 lg:order-none">
                <div class="relative overflow-hidden rounded-2xl bg-slate-100 sm:rounded-3xl">

                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxkwcEdlCoRsjFLoTLA03kn1AnpfE8152dyNbSRlmMqdVILqgdDPl7rpiEw3YaMGpWFLp0Pht3hMmkrRE8NdvH5WWJ0d-hwLmpqONwn4Cy1c-8XJEa2-Voq985mbHZuZxHo2LGnZrLoMeMb-a7wezGLeLDqHP8Lu82nAqfa8o-F9rUxncQslCeThHMGq9OOsGMRUCIHih53hoioIL4POOjBvX3wEu22n1e2lhhit5p1lTtAuTmxQP8EA"
                         alt="Students studying together in modern campus library"
                         class="h-64 w-full object-cover sm:h-80 lg:h-[420px]">

                    {{-- Floating Badge --}}
                    <div class="absolute inset-x-4 bottom-4 rounded-xl border border-white/30 bg-white/95 p-4 shadow-xl sm:inset-x-5 sm:bottom-5 sm:rounded-2xl sm:p-5">
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
            <div class="order-2 lg:col-span-6 lg:order-none">

                <span class="text-xs font-bold uppercase tracking-[0.2em] text-brand-500">
                    About Us
                </span>

                <h2 class="mt-3 text-2xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                    Welcome to Get Career Skills Institute Australia 
                </h2>

                <div class="mt-4 h-1 w-12 rounded-full bg-brand-500 sm:mt-5 sm:w-14"></div>

                <p class="mt-5 text-sm font-semibold leading-7 text-slate-700 sm:mt-6 sm:text-base sm:leading-8">
                    <strong class="text-slate-900">
                        Empowering Your Career Through Recognition:
                    </strong>
                   Career Skills Institute Australia  (RTO 45685) is committed to delivering quality vocational education and industry-relevant training that empowers individuals to achieve their career goals. We offer nationally recognised qualifications across community services, construction, plumbing, engineering, automotive, business and real estate. Through flexible learning options, experienced trainers and practical learning approaches, we help students develop the knowledge, skills and confidence needed to succeed in today's workforce.
                
                </p>
            </div>
        </div>

        {{-- Value Cards --}}
        <div class="mt-12 grid gap-6 sm:mt-14 md:grid-cols-2 lg:mt-16">

    {{-- Card 1: Qualification Info --}}
    <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-brand-300 hover:shadow-md hover:shadow-brand-500/5 sm:p-7">
        <div class="flex items-start gap-4 sm:gap-5">
            {{-- Icon Container --}}
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors duration-300 group-hover:bg-brand-500 group-hover:text-white sm:h-14 sm:w-14">
                <svg class="h-6 w-6 stroke-[1.75]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            {{-- Text Content --}}
            <div class="space-y-1.5">
                <h3 class="text-base font-bold tracking-tight text-slate-900 sm:text-lg">
                    Earn Nationally Accredited Qualifications
                </h3>
                <p class="text-xs leading-relaxed text-slate-600 sm:text-sm">
                    Let your genuine experience earn you an official Australian qualification without study. Give your career and immigration points a much-needed boost today.
                </p>
            </div>
        </div>
    </div>

    {{-- Card 2: Partner Accreditation Logos --}}
    <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-secondary-300 hover:shadow-md hover:shadow-secondary-500/5 sm:p-7">
        <div class="flex flex-col justify-center space-y-4">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                Official Accreditation
            </span>

            <div class="flex flex-wrap items-center gap-4">
                {{-- Logo 1 --}}
                <div class="flex h-20 flex-1 min-w-[120px] items-center justify-center rounded-xl border border-slate-100 bg-slate-50/50 p-4 transition-all duration-300 group-hover:border-secondary-100 group-hover:bg-white">
                    <img
                        src="{{ asset('patner_2.png') }}"
                        alt="Educational accreditation logo"
                        loading="lazy"
                        class="max-h-12 w-auto object-contain transition-transform duration-300 hover:scale-105"
                    >
                </div>

                {{-- Logo 2 --}}
                <div class="flex h-20 flex-1 min-w-[120px] items-center justify-center rounded-xl border border-slate-100 bg-slate-50/50 p-4 transition-all duration-300 group-hover:border-secondary-100 group-hover:bg-white">
                    <img
                        src="{{ asset('patner_1.png') }}"
                        alt="Educational accreditation logo"
                        loading="lazy"
                        class="max-h-12 w-auto object-contain transition-transform duration-300 hover:scale-105"
                    >
                </div>
            </div>
        </div>
    </div>

</div>
    </div>
</section>