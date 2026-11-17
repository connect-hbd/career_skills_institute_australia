@extends('frontend.layouts.app')

@section('content')
   <section class="py-10 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 lg:p-10 shadow-sm hover:shadow-md transition-shadow">

                <!-- Section Header -->
                <div class="flex items-start gap-4 border-b border-slate-100 pb-6 mb-6">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 shadow-sm border border-brand-100/50">
                        <iconify-icon icon="lucide:shield-check" class="text-2xl"></iconify-icon>
                    </span>
                    <div>
                        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                            NDIS Check Link for all states
                        </h3>
                        <p class="mt-1 text-sm text-slate-500 leading-relaxed">
                            Access official worker screening check portals and application links across each Australian
                            state and territory.
                        </p>
                    </div>
                </div>

                <!-- State Links Grid / List -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                            <a href="https://www.service.nsw.gov.au/guide/ndis-worker-check" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                </span>
                                <span class="text-sm font-bold text-slate-700 group-hover:text-brand-600 transition-colors truncate">
                                    New South Wales
                                </span>
                            </div>
                            <iconify-icon icon="lucide:external-link" class="text-slate-400 group-hover:text-brand-600 transition-colors text-sm shrink-0 ml-2"></iconify-icon>
                        </a>
                                            <a href="https://www.service.vic.gov.au/services/national-disability-insurance-scheme/home" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                </span>
                                <span class="text-sm font-bold text-slate-700 group-hover:text-brand-600 transition-colors truncate">
                                    Victoria
                                </span>
                            </div>
                            <iconify-icon icon="lucide:external-link" class="text-slate-400 group-hover:text-brand-600 transition-colors text-sm shrink-0 ml-2"></iconify-icon>
                        </a>
                                            <a href="https://www.workerscreening.qld.gov.au/" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                </span>
                                <span class="text-sm font-bold text-slate-700 group-hover:text-brand-600 transition-colors truncate">
                                    Queensland
                                </span>
                            </div>
                            <iconify-icon icon="lucide:external-link" class="text-slate-400 group-hover:text-brand-600 transition-colors text-sm shrink-0 ml-2"></iconify-icon>
                        </a>
                                            <a href="https://www.sa.gov.au/topics/rights-and-law/rights-and-responsibilities/screening-checks/apply-for-a-screening-check" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                </span>
                                <span class="text-sm font-bold text-slate-700 group-hover:text-brand-600 transition-colors truncate">
                                    South Australia
                                </span>
                            </div>
                            <iconify-icon icon="lucide:external-link" class="text-slate-400 group-hover:text-brand-600 transition-colors text-sm shrink-0 ml-2"></iconify-icon>
                        </a>
                                            <a href="https://www.justice.tas.gov.au/rwvp/apply/ndis-worker-check" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                </span>
                                <span class="text-sm font-bold text-slate-700 group-hover:text-brand-600 transition-colors truncate">
                                    Tasmania
                                </span>
                            </div>
                            <iconify-icon icon="lucide:external-link" class="text-slate-400 group-hover:text-brand-600 transition-colors text-sm shrink-0 ml-2"></iconify-icon>
                        </a>
                                            <a href="https://www.accesscanberra.act.gov.au/business-and-work/working-with-vulnerable-people/apply-for-or-renew-a-wwvp-registration" class="group flex items-center justify-between p-4 rounded-2xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-colors">
                                    <iconify-icon icon="lucide:map-pin" class="text-sm"></iconify-icon>
                                </span>
                                <span class="text-sm font-bold text-slate-700 group-hover:text-brand-600 transition-colors truncate">
                                    Australian Capital Territory
                                </span>
                            </div>
                            <iconify-icon icon="lucide:external-link" class="text-slate-400 group-hover:text-brand-600 transition-colors text-sm shrink-0 ml-2"></iconify-icon>
                        </a>
                                    </div>

            </div>
        </div>
    </section>
@endsection
