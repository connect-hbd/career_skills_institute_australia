
<footer class="relative overflow-hidden bg-brand-950 text-brand-100">

    {{-- Background Decoration --}}
    <div class="pointer-events-none absolute -top-40 -right-40 h-96 w-96 rounded-full bg-brand-500/10 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-0 -left-40 h-80 w-80 rounded-full bg-secondary-500/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Main Footer --}}
        <div class="grid grid-cols-1 gap-10 border-b border-brand-800/80 py-6 sm:py-8 md:grid-cols-2 lg:grid-cols-12 lg:gap-12">

            {{-- Brand Information --}}
            <div class="lg:col-span-4">

                <a href="/" class="inline-flex items-center">
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="Career Skills Institute"
                        class="h-16 w-auto object-contain brightness-0 invert"
                    >
                </a>

                <p class="mt-6 max-w-sm text-sm leading-7 text-brand-200/80">
                    Career Skills Institute is a registered training organisation delivering nationally recognised
                    vocational education and compliant training across Australia.
                </p>

             
                 {{-- Action Buttons --}}
                <div class="mt-5 flex flex-col gap-3 sm:flex-row">

                    <a href="https://wa.me/61400000000"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-[#25D366] px-4 py-3 text-sm font-bold text-white shadow-lg shadow-black/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#20ba59]">

                        <iconify-icon icon="lucide:message-circle" class="text-lg"></iconify-icon>
                        WhatsApp Us
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-secondary-400 px-4 py-3 text-sm font-bold text-brand-950 shadow-lg shadow-black/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-secondary-300">

                        <iconify-icon icon="lucide:calendar-check" class="text-lg"></iconify-icon>
                        Book a Meeting
                    </a>

                </div>

            </div>


            {{-- Quick Links --}}
            <div class="lg:col-span-3">

                <div class="mb-6">

                    <h3 class="text-lg font-bold text-white">
                        Quick Links
                    </h3>

                    <div class="mt-3 h-1 w-10 rounded-full bg-secondary-400"></div>
                </div>

                <ul class="space-y-4">

                    <li>
                        <a href="https://www.usi.gov.au/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm text-brand-200/80 transition-colors duration-200 hover:text-secondary-300">

                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-brand-900 text-brand-300 transition-all group-hover:bg-secondary-400 group-hover:text-brand-950">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            Create USI
                        </a>
                    </li>

                    <li>
                        <a href="https://www.advancecollege.edu.au/ndis-worker-screening-check/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm text-brand-200/80 transition-colors duration-200 hover:text-secondary-300">

                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-brand-900 text-brand-300 transition-all group-hover:bg-secondary-400 group-hover:text-brand-950">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            NDIS Check
                        </a>
                    </li>

                    <li>
                        <a href="https://www.checked.com.au/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm text-brand-200/80 transition-colors duration-200 hover:text-secondary-300">

                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-brand-900 text-brand-300 transition-all group-hover:bg-secondary-400 group-hover:text-brand-950">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            Create Police Report
                        </a>
                    </li>

                    <li>
                        <a href="https://www.service.nsw.gov.au/transaction/apply-working-children-check"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm text-brand-200/80 transition-colors duration-200 hover:text-secondary-300">

                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-brand-900 text-brand-300 transition-all group-hover:bg-secondary-400 group-hover:text-brand-950">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            Working With Children Check
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Contact Information --}}
            <div class="lg:col-span-5">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Admissions --}}
                    <div class="rounded-xl border border-brand-800 bg-brand-900/50 p-4 transition-all duration-300 hover:border-brand-600 hover:bg-brand-900">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-secondary-400/10 text-secondary-400">
                            <iconify-icon icon="lucide:graduation-cap" class="text-xl"></iconify-icon>
                        </div>

                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-brand-300">
                            Admissions Enquiries
                        </span>

                        <a href="mailto:admissions@csi.edu.au"
                            class="break-all text-sm font-semibold text-white transition-colors hover:text-secondary-300">
                            admissions@csi.edu.au
                        </a>

                    </div>


                    {{-- General Enquiries --}}
                    <div class="rounded-xl border border-brand-800 bg-brand-900/50 p-4 transition-all duration-300 hover:border-brand-600 hover:bg-brand-900">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-lg bg-secondary-400/10 text-secondary-400">
                            <iconify-icon icon="lucide:mail" class="text-xl"></iconify-icon>
                        </div>

                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-brand-300">
                            General Enquiries
                        </span>

                        <a href="mailto:info@csi.edu.au"
                            class="break-all text-sm font-semibold text-white transition-colors hover:text-secondary-300">
                            info@csi.edu.au
                        </a>

                    </div>

                </div>


                {{-- Address --}}
                <div class="mt-4 flex items-start gap-4 rounded-xl border border-brand-800 bg-brand-900/50 p-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary-400/10 text-secondary-400">
                        <iconify-icon icon="lucide:map-pin" class="text-xl"></iconify-icon>
                    </div>

                    <div class="min-w-0">

                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-brand-300">
                            Our Location
                        </span>

                        <p class="text-sm font-medium leading-6 text-white">
                            30 Campbell Street, Blacktown NSW 2148
                        </p>

                        <a href="tel:+61286773600"
                            class="mt-1 inline-flex items-center gap-2 text-sm font-semibold text-secondary-300 transition-colors hover:text-secondary-200">
                            <iconify-icon icon="lucide:phone" class="text-sm"></iconify-icon>
                            +61 2 8677 3600
                        </a>

                    </div>

                </div>


               

            </div>

        </div>


        {{-- Accreditation & Policies --}}
        <div class="flex flex-col gap-8 py-6 lg:flex-row lg:items-center lg:justify-between">

            {{-- Accreditation --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                <div class="flex h-20 w-fit min-w-28 items-center justify-center rounded-xl border border-brand-800 bg-white p-3 shadow-sm">
                    <img
                        src="{{ asset('patner_2.png') }}"
                        alt="Educational accreditation logo"
                        loading="lazy"
                        class="max-h-14 w-auto object-contain"
                    >
                </div>

                <div class="flex flex-col gap-2">

                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-secondary-400">
                        Official Registration
                    </span>

                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-xs font-semibold text-brand-200">

                        <span class="inline-flex items-center gap-2">
                            <iconify-icon icon="lucide:badge-check" class="text-secondary-400"></iconify-icon>
                            RTO CODE: 45156
                        </span>

                        <span class="inline-flex items-center gap-2">
                            <iconify-icon icon="lucide:building-2" class="text-secondary-400"></iconify-icon>
                            ABN: 00 000 000 000
                        </span>

                    </div>

                </div>

            </div>


            {{-- Legal Links --}}
            <div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-xs font-medium text-brand-200/80">

                <a href="{{ route('privacy-policy') }}"
                    class="transition-colors hover:text-secondary-300">
                    Privacy Policy
                </a>

                <a href="{{ route('terms-conditions') }}"
                    class="transition-colors hover:text-secondary-300">
                    Refund Policy
                </a>

                <a href="#"
                    class="transition-colors hover:text-secondary-300">
                    Terms of Conditions
                </a>

            </div>

        </div>


        {{-- Copyright --}}
        <div class="border-t border-brand-800/80 py-6">

            <div class="flex flex-col items-center justify-between gap-3 text-center sm:flex-row sm:text-left">

                <p class="text-xs leading-5 text-brand-300">
                    &copy; {{ date('Y') }} CSI. All rights reserved.
                </p>

                <p class="inline-flex items-center gap-2 text-xs text-brand-300">
                    <span class="h-2 w-2 rounded-full bg-secondary-400"></span>
                    Delivering Quality Education Across Australia
                </p>

            </div>

        </div>

    </div>

</footer>
