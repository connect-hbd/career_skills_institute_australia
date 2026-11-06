<section id="prospectus" class="mx-auto w-full max-w-7xl px-4 py-10 sm:px-6 sm:py-12 md:py-14 lg:px-8 lg:py-20">

    <div class="grid grid-cols-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-900/5 sm:rounded-3xl lg:grid-cols-12">

        {{-- LEFT CONTENT --}}
        <div class="relative flex flex-col justify-between gap-6 overflow-hidden bg-white p-5 sm:gap-8 sm:p-8 md:p-10 lg:col-span-7">

            {{-- Decorative Accent --}}
            <div class="pointer-events-none absolute -right-20 -top-20 h-56 w-56 rounded-full bg-brand-50 blur-3xl sm:-right-24 sm:-top-24 sm:h-72 sm:w-72"></div>
            <div class="pointer-events-none absolute -bottom-16 -left-16 h-48 w-48 rounded-full bg-secondary-50 blur-3xl sm:-bottom-20 sm:-left-20 sm:h-64 sm:w-64"></div>

            <div class="relative z-10 flex flex-col gap-4 sm:gap-5">

                {{-- Category / Breadcrumb --}}
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-brand-700">
                        Documentation & Intakes
                    </span>
                    <span class="text-slate-300">/</span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-500">
                        2025 Calendar
                    </span>
                </div>

                {{-- Main Heading --}}
                <h3 class="max-w-2xl text-lg font-extrabold leading-tight tracking-tight text-slate-900 sm:text-xl md:text-2xl lg:text-3xl">
                    Download the Official 2025 Course Booklet & Fee Schedule
                </h3>

                {{-- Subtitle --}}
                <p class="max-w-2xl text-sm leading-6 text-slate-600 sm:leading-7 md:text-base">
                    Receive the official institutional prospectus detailing competency unit descriptions,
                    articulation pathways, tuition breakdowns and Department of Home Affairs student visa
                    requirements.
                </p>

                {{-- Checklist Features --}}
                <div class="flex flex-col gap-3.5 pt-1 sm:gap-4 sm:pt-2">

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 flex shrink-0 items-center text-lg text-brand-600 sm:text-xl">
                            <iconify-icon icon="lucide:check-circle-2"></iconify-icon>
                        </span>
                        <span class="text-sm leading-5 text-slate-600 sm:leading-6">
                            <strong class="font-semibold text-slate-900">Transparent Fee Schedules:</strong>
                            Material costs, uniform fees and flexible quarterly instalment timetables.
                        </span>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 flex shrink-0 items-center text-lg text-brand-600 sm:text-xl">
                            <iconify-icon icon="lucide:check-circle-2"></iconify-icon>
                        </span>
                        <span class="text-sm leading-5 text-slate-600 sm:leading-6">
                            <strong class="font-semibold text-slate-900">CRICOS & ESOS Standards:</strong>
                            Mandatory hours, attendance compliance tracking and English proficiency thresholds.
                        </span>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="mt-0.5 flex shrink-0 items-center text-lg text-brand-600 sm:text-xl">
                            <iconify-icon icon="lucide:check-circle-2"></iconify-icon>
                        </span>
                        <span class="text-sm leading-5 text-slate-600 sm:leading-6">
                            <strong class="font-semibold text-slate-900">Work Placement Agreements:</strong>
                            Approved employer networks in Western Sydney and regional NSW.
                        </span>
                    </div>
                </div>
            </div>

            {{-- Footer Meta Info --}}
            <div class="relative z-10 flex flex-wrap items-center gap-x-3 gap-y-2 border-t border-slate-200 pt-4 text-[9px] font-bold uppercase tracking-wide text-slate-500 sm:pt-5">
                <div class="flex items-center gap-1.5">
                    <iconify-icon icon="lucide:file-text" class="text-base text-brand-600"></iconify-icon>
                    <span>PDF (3.8 MB)</span>
                </div>
                <span class="text-slate-300">•</span>
                <span>Updated: January 2025</span>
                <span class="text-slate-300">•</span>
                <span>Verified ASQA VET</span>
            </div>
        </div>

        {{-- RIGHT FORM --}}
        <div class="relative flex flex-col justify-center overflow-hidden bg-brand-950 p-5 sm:p-8 md:p-10 lg:col-span-5">

            {{-- Form Background Decorations --}}
            <div class="pointer-events-none absolute -right-20 -top-20 h-56 w-56 rounded-full bg-brand-500/20 blur-[80px] sm:-right-24 sm:-top-24 sm:h-72 sm:w-72 sm:blur-[100px]"></div>
            <div class="pointer-events-none absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-secondary-500/10 blur-[80px] sm:-bottom-24 sm:-left-24 sm:h-64 sm:w-64 sm:blur-[100px]"></div>

            <form class="relative z-10 flex flex-col gap-4 sm:gap-5"
                  onsubmit="event.preventDefault(); alert('Course prospectus PDF has been dispatched to your email address.');">

                {{-- Form Heading --}}
                <div class="border-b border-white/15 pb-3.5 sm:pb-4">
                    <div class="mb-2 inline-flex items-center gap-2 rounded-full border border-secondary-400/20 bg-secondary-400/10 px-2.5 py-1 sm:px-3">
                        <span class="h-1.5 w-1.5 rounded-full bg-secondary-400"></span>
                        <span class="text-[9px] font-bold uppercase tracking-widest text-secondary-300">
                            Quick & Easy Access
                        </span>
                    </div>

                    <h4 class="text-lg font-extrabold uppercase tracking-tight text-white sm:text-xl">
                        Instant Access
                    </h4>

                    <p class="mt-1 text-[10px] font-medium uppercase tracking-wide text-slate-400">
                        Direct dispatch to your primary inbox
                    </p>
                </div>

                {{-- Name --}}
                <div class="flex flex-col gap-1.5 sm:gap-2">
                    <label for="full-name" class="text-[10px] font-bold uppercase tracking-wider text-slate-200">
                        Full Legal Name *
                    </label>
                    <input id="full-name" type="text" required placeholder="e.g. Alex Henderson"
                           class="h-11 w-full rounded-xl border border-white/10 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition-all duration-200 focus:border-secondary-400 focus:ring-4 focus:ring-secondary-400/15 sm:h-12" />
                </div>

                {{-- Email --}}
                <div class="flex flex-col gap-1.5 sm:gap-2">
                    <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-slate-200">
                        Email Address *
                    </label>
                    <input id="email" type="email" required placeholder="name@example.com"
                           class="h-11 w-full rounded-xl border border-white/10 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 outline-none transition-all duration-200 focus:border-secondary-400 focus:ring-4 focus:ring-secondary-400/15 sm:h-12" />
                </div>

                {{-- Interest --}}
                <div class="flex flex-col gap-1.5 sm:gap-2">
                    <label for="area-interest" class="text-[10px] font-bold uppercase tracking-wider text-slate-200">
                        Area of Interest *
                    </label>
                    <select id="area-interest" required
                            class="h-11 w-full rounded-xl border border-white/10 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition-all duration-200 focus:border-secondary-400 focus:ring-4 focus:ring-secondary-400/15 sm:h-12">
                        <option value="">Select study stream...</option>
                        <option value="trade">Trade: Carpentry & Building Construction</option>
                        <option value="health">Health: Aged Care & Mental Health Support</option>
                        <option value="business">Business: Leadership & Operational Management</option>
                        <option value="all">Full Comprehensive Multi-Discipline Guide</option>
                    </select>
                </div>

                {{-- Visa Checkbox --}}
                <div class="flex items-start gap-2.5 pt-0.5 sm:pt-1">
                    <input id="student-visa" type="checkbox"
                           class="mt-0.5 h-4 w-4 shrink-0 rounded border-white/30 accent-secondary-500" />
                    <label for="student-visa" class="cursor-pointer select-none text-xs leading-5 text-slate-300">
                        I require Australian Subclass 500 Student Visa guidance.
                    </label>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                        class="mt-1 inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-xl bg-secondary-400 px-4 py-3 text-xs font-extrabold uppercase tracking-wide text-brand-950 shadow-lg shadow-secondary-500/15 transition-all duration-300
                               hover:-translate-y-0.5 hover:bg-secondary-300 hover:shadow-secondary-500/25
                               focus:outline-none focus:ring-4 focus:ring-secondary-400/20
                               sm:min-h-12">
                    <span>Download Course Booklet (PDF)</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-base"></iconify-icon>
                </button>

                {{-- Privacy Note --}}
                <p class="flex items-center justify-center gap-1.5 text-[10px] text-slate-400">
                    <iconify-icon icon="lucide:shield-check" class="text-secondary-400"></iconify-icon>
                    Your information will be handled securely.
                </p>
            </form>
        </div>
    </div>
</section>