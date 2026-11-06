<footer class="bg-brand-950 text-slate-300 antialiased pt-16 pb-12 border-t border-brand-900">
    <div class="mx-auto max-w-7xl px-4 md:px-6">

        {{-- Top Grid Section --}}
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4 pb-12 border-b border-brand-900/80">

            {{-- Column 1: Offered Courses --}}
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-2">
                    {{-- brightness-0 invert --}}
                    <a href="/" class="flex brightness-0 invert items-center gap-3 group font-semibold">
                        <img src="{{ asset('logo.png') }}" alt="CSI Logo" class="h-16 w-auto">
                    </a>
                </div>
                <p class="text-sm text-neutral-500 max-w-md leading-relaxed">
                    Career Skills Institute is a registered training organisation delivering nationally recognised
                    vocational education and compliant training across Australia.
                </p>

            </div>

            {{-- Column 2: Links --}}
            <div class="flex flex-col gap-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-white">
                    Quick Links
                </h3>
                <ul class="flex flex-col gap-2.5 text-[13px] text-slate-600">

                    <li>
                        <a href="https://www.usi.gov.au/"
                            class="group inline-flex items-center gap-1.5 text-slate-600 hover:text-[#1968b2] transition-colors duration-200">
                            <iconify-icon icon="lucide:chevron-right"
                                class="text-sm text-slate-400 group-hover:text-[#1968b2] group-hover:translate-x-0.5 transition-transform duration-200"></iconify-icon>
                            <span>Create USI</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.advancecollege.edu.au/ndis-worker-screening-check/"
                            class="group inline-flex items-center gap-1.5 text-slate-600 hover:text-[#1968b2] transition-colors duration-200">
                            <iconify-icon icon="lucide:chevron-right"
                                class="text-sm text-slate-400 group-hover:text-[#1968b2] group-hover:translate-x-0.5 transition-transform duration-200"></iconify-icon>
                            <span>NDIS Check</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.checked.com.au/"
                            class="group inline-flex items-center gap-1.5 text-slate-600 hover:text-[#1968b2] transition-colors duration-200">
                            <iconify-icon icon="lucide:chevron-right"
                                class="text-sm text-slate-400 group-hover:text-[#1968b2] group-hover:translate-x-0.5 transition-transform duration-200"></iconify-icon>
                            <span>Create Police Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.service.nsw.gov.au/transaction/apply-working-children-check"
                            class="group inline-flex items-center gap-1.5 text-slate-600 hover:text-[#1968b2] transition-colors duration-200">
                            <iconify-icon icon="lucide:chevron-right"
                                class="text-sm text-slate-400 group-hover:text-[#1968b2] group-hover:translate-x-0.5 transition-transform duration-200"></iconify-icon>
                            <span>Check (WWCC)</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Column 3 & 4 (Span 2): Contact Us & Locations --}}
            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8">

                {{-- Contact Channels --}}
                <div class="flex flex-col gap-6">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-white">
                        Contact Us
                    </h3>

                    <div class="flex items-start gap-3">
                        <iconify-icon icon="lucide:mail"
                            class="text-secondary-400 text-base mt-0.5 shrink-0"></iconify-icon>
                        <div class="">
                            <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">Admissions
                                Enquiries</span>
                            <a href="mailto:admissions@csi.edu.au"
                                class="text-xs text-white hover:text-secondary-400 transition-colors">admissions@csi.edu.au</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <iconify-icon icon="lucide:mail"
                            class="text-secondary-400 text-base mt-0.5 shrink-0"></iconify-icon>
                        <div class="">
                            <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">General
                                Enquiries</span>
                            <a href="mailto:info@csi.edu.au"
                                class="text-xs text-white hover:text-secondary-400 transition-colors">info@csi.edu.au</a>
                        </div>
                    </div>
                </div>

                {{-- Campus Locations --}}
                <div class="flex flex-col gap-6">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-opacity-0 sr-only lg:not-sr-only">
                        &nbsp;
                    </h3>

                    <div class="flex items-start gap-3">
                        <iconify-icon icon="lucide:map-pin"
                            class="text-secondary-400 text-base mt-0.5 shrink-0"></iconify-icon>
                        <div class="flex flex-col gap-1 text-sm text-neutral-500 mt-2">
                            <p><strong class="text-brand-600">Address:</strong> 30 Campbell Street, Blacktown NSW 2148
                            </p>
                            <p><strong class="text-brand-600">Phone:</strong> +61 2 8677 3600</p>
                        </div>
                    </div>

                    <!-- Quick Action Card -->
                    <div class="flex  gap-4 pt-2 ">
                        <a class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-lg bg-[#25D366] hover:bg-[#20ba59] text-white text-xs font-semibold transition-all shadow-sm"
                            href="https://wa.me/61400000000" rel="noopener noreferrer" target="_blank">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                            <span>WhatsApp Us</span>

                        </a>
                        <a class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 rounded-lg bg-brand-600 hover:bg-brand-700 text-white text-xs font-semibold transition-all shadow-sm"
                            href="{{ route('contact') }}">
                            <iconify-icon icon="lucide:calendar" class="text-base"></iconify-icon>
                            <span>Book a Meeting</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        {{-- Bottom Compliance & Licensing Bar --}}
        <div
            class="mt-8 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 text-[11px] text-slate-400 font-medium tracking-wide">

            {{-- Logo / Accreditation Mark --}}
            <div class="flex items-center gap-4">
                <div
                    class="group flex items-center justify-center rounded-xl bg-slate-50 p-2.5 border border-slate-200/60 shadow-sm transition-all duration-300 hover:bg-white hover:border-slate-300 hover:shadow-md">
                    <img class="h-14 w-auto object-contain  transition-all duration-300 opacity-100 group-hover:opacity-100"
                        src="{{ asset('patner_2.png') }}" alt="Educational accreditation logo" loading="lazy" />
                </div>
                <div class="flex flex-col sm:flex-row sm:gap-6 gap-1">
                    <span>RTO CODE: 45156</span>
                    <span>ABN: 00 000 000 000</span>
                </div>
            </div>

           <div class="flex items-center gap-6">
                <a class="hover:text-slate-900 transition-colors" href="{{ route('privacy-policy') }}">Privacy
                    Policy</a>
                <a class="hover:text-slate-900 transition-colors" href="{{ route('terms-conditions') }}">Refund
                    Policy</a>
                <a class="hover:text-slate-900 transition-colors" href="#">Terms of Conditions</a>
            </div>

        </div>

       

    </div>
       <!-- Bottom Legal Bar -->
        <div class="pt-6 flex items-center justify-center text-xs text-slate-500 gap-4">
           <p> &copy; 2026 Nubex College Pty Ltd. All rights reserved.</p>
            
        </div>
  
</footer>
