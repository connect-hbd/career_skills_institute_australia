
<footer class="relative overflow-hidden bg-brand-25 text-slate-700">

    {{-- Subtle Background Decoration --}}
    <div class="pointer-events-none absolute -top-32 right-0 h-80 w-80 rounded-full bg-brand-100/60 blur-3xl"></div>
    <div class="pointer-events-none absolute bottom-20 -left-32 h-72 w-72 rounded-full bg-secondary-100/50 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Main Footer --}}
        <div class="grid grid-cols-1 gap-10 border-b border-brand-200/70 py-12 sm:py-14 md:grid-cols-2 lg:grid-cols-12 lg:gap-12">

            {{-- Brand Information --}}
            <div class="lg:col-span-4">

                <a href="/" class="inline-flex items-center">
                    <img
                        src="{{ asset('logo.png') }}"
                        alt="Career Skills Institute Australia"
                        class="h-16 w-auto object-contain"
                    >
                </a>

                <p class="mt-5 max-w-sm text-sm leading-7 text-slate-600">
                    Career Skills Institute Australia is a registered training organisation delivering nationally recognised
                    vocational education and compliant training across Australia.
                </p>

              

                {{-- Action Buttons --}}
                <div class="mt-6 flex flex-col gap-3 sm:flex-row">

                    <a href="https://wa.me/0434 299 291"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-[#25D366] px-4 py-3 text-sm font-bold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#20ba59] hover:shadow-md">

                         <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        WhatsApp Us
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-brand-950 px-4 py-3 text-sm font-bold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-brand-800 hover:shadow-md">

                        <iconify-icon icon="lucide:calendar-check" class="text-lg"></iconify-icon>
                        Book a Meeting
                    </a>

                </div>

            </div>


            {{-- Quick Links --}}
            <div class="lg:col-span-3">

                <div class="mb-6">

                    <h3 class="text-lg font-extrabold text-brand-950">
                        Quick Links
                    </h3>

                    <div class="mt-3 h-1 w-10 rounded-full bg-secondary-500"></div>
                </div>

                <ul class="space-y-4">

                    <li>
                        <a href="https://www.usi.gov.au/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm font-medium text-slate-600 transition-colors duration-200 hover:text-brand-700">

                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-brand-600 shadow-sm ring-1 ring-brand-100 transition-all group-hover:bg-brand-600 group-hover:text-white">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            Create USI
                        </a>
                    </li>

                    <li>
                        <a href="https://www.advancecollege.edu.au/ndis-worker-screening-check/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm font-medium text-slate-600 transition-colors duration-200 hover:text-brand-700">

                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-brand-600 shadow-sm ring-1 ring-brand-100 transition-all group-hover:bg-brand-600 group-hover:text-white">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            NDIS Check
                        </a>
                    </li>

                    <li>
                        <a href="https://www.checked.com.au/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm font-medium text-slate-600 transition-colors duration-200 hover:text-brand-700">

                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-brand-600 shadow-sm ring-1 ring-brand-100 transition-all group-hover:bg-brand-600 group-hover:text-white">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            Create Police Report
                        </a>
                    </li>

                    <li>
                        <a href="https://www.service.nsw.gov.au/transaction/apply-working-children-check"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex items-center gap-3 text-sm font-medium text-slate-600 transition-colors duration-200 hover:text-brand-700">

                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white text-brand-600 shadow-sm ring-1 ring-brand-100 transition-all group-hover:bg-brand-600 group-hover:text-white">
                                <iconify-icon icon="lucide:arrow-up-right" class="text-sm"></iconify-icon>
                            </span>

                            Working With Children Check
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Contact Information --}}
            <div class="lg:col-span-5">

                {{-- Contact Cards --}}
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Admissions --}}
                    <div class="group rounded-xl border border-brand-100 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:shadow-md">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors group-hover:bg-brand-600 group-hover:text-white">
                            <iconify-icon icon="lucide:graduation-cap" class="text-xl"></iconify-icon>
                        </div>

                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Admissions Enquiries
                        </span>

                        <a href="mailto:enrol@@csia.edu.au"
                            class="break-all text-sm font-bold text-brand-950 transition-colors hover:text-brand-600">
                            enrol@@csia.edu.au
                        </a>

                    </div>


                    {{-- General Enquiries --}}
                    <div class="group rounded-xl border border-brand-100 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-300 hover:shadow-md">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors group-hover:bg-brand-600 group-hover:text-white">
                            <iconify-icon icon="lucide:mail" class="text-xl"></iconify-icon>
                        </div>

                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            General Enquiries
                        </span>

                        <a href="mailto:admin@csia.edu.au"
                            class="break-all text-sm font-bold text-brand-950 transition-colors hover:text-brand-600">
                            admin@csia.edu.au
                        </a>

                    </div>

                </div>


                {{-- Address Card --}}
                <div class="mt-4 flex items-start gap-4 rounded-xl border border-brand-100 bg-white p-4 shadow-sm">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600">
                        <iconify-icon icon="lucide:map-pin" class="text-xl"></iconify-icon>
                    </div>

                    <div class="min-w-0">

                        <span class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Our Location
                        </span>

                        <p class="text-sm font-semibold leading-6 text-brand-950">
                           17 Chuter St, MCMAHONS POINT, NSW, 2060
                        </p>

                        <a href="tel:+61286773600"
                            class="mt-1 inline-flex items-center gap-2 text-sm font-bold text-brand-600 transition-colors hover:text-brand-800">

                            <iconify-icon icon="lucide:phone" class="text-sm"></iconify-icon>
                           0434 299 291
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- Accreditation & Policies --}}
        <div class="flex flex-col gap-6 py-6 lg:flex-row lg:items-center lg:justify-between">

            {{-- Accreditation --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                <div class="flex h-20 w-fit min-w-28 items-center justify-center rounded-xl border border-brand-100 bg-white p-3 shadow-sm">
                    <img
                        src="{{ asset('patner_2.png') }}"
                        alt="Educational accreditation logo"
                        loading="lazy"
                        class="max-h-14 w-auto object-contain"
                    >
                </div>

                <div class="flex flex-col gap-2">

                    <span class="text-[10px] font-bold uppercase tracking-[0.18em] text-brand-600">
                        Official Registration
                    </span>

                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-xs font-semibold text-slate-700">

                        <span class="inline-flex items-center gap-2">
                            <iconify-icon icon="lucide:badge-check" class="text-brand-600"></iconify-icon>
                            RTO CODE: 45685
                        </span>

                        <span class="inline-flex items-center gap-2">
                            <iconify-icon icon="lucide:building-2" class="text-brand-600"></iconify-icon>
                            ABN: 31 626 754 069
                        </span>

                    </div>

                </div>

            </div>


            {{-- Legal Links --}}
            <div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-xs font-semibold text-slate-600">

                <a href="{{ route('privacy-policy') }}"
                    class="transition-colors hover:text-brand-700">
                    Privacy Policy
                </a>

                <a href="{{ route('terms-conditions') }}"
                    class="transition-colors hover:text-brand-700">
                    Refund Policy
                </a>

                <a href="#"
                    class="transition-colors hover:text-brand-700">
                    Terms of Conditions
                </a>

            </div>

        </div>

    </div>


    {{-- Copyright Bar --}}
    <div class="bg-brand-950">

        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-4 py-5 text-center sm:flex-row sm:px-6 sm:text-left lg:px-8">

            <p class="text-xs font-medium leading-5 text-brand-100/80">
                &copy; {{ date('Y') }} Career Skills Institute Australia Australia. All rights reserved.
            </p>

            <p class="inline-flex items-center gap-2 text-xs font-medium text-brand-100/80">
                <span class="h-2 w-2 rounded-full bg-secondary-400"></span>
                Delivering Quality Education Across Australia
            </p>

        </div>

    </div>

</footer>
