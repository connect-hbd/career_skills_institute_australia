<section class="py-10 text-slate-900 antialiased sm:py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="mb-8 max-w-2xl sm:mb-10">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-600">
                Explore Industries
            </span>

            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                Nationally Recognised Training Pathways
            </h2>

            <p class="mt-2 text-sm leading-relaxed text-slate-600 sm:mt-3 sm:text-base">
                Choose your industry to discover professional qualifications and RPL assessment pathways tailored for your career.
            </p>
        </div>

        {{-- Categories Grid --}}
        <div class="grid grid-cols-1 gap-4 sm:gap-5 md:grid-cols-2 lg:grid-cols-3 lg:gap-6">
            @foreach ($industries as $category)

                <a href="{{ route('industry', ['industrySlug' => $category['slug']]) }}"
                   class="group relative flex flex-col justify-between rounded-xl border border-slate-200 bg-white p-5 transition-all duration-300
                          hover:border-brand-500 hover:shadow-md
                          sm:rounded-2xl sm:p-6">

                    <div>
                        {{-- Top Bar: Icon & Hover Accent --}}
                        <div class="mb-4 flex items-center justify-between sm:mb-5">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-50 text-brand-700 transition-colors duration-300
                                        group-hover:bg-brand-500 group-hover:text-white
                                        sm:h-11 sm:w-11">
                                <iconify-icon 
                                    icon="lucide:{{ $category['icon'] }}" 
                                    class="text-lg sm:text-xl">
                                </iconify-icon>
                            </div>

                            <div class="flex h-7 w-7 items-center justify-center rounded-full text-slate-400 transition-colors duration-200
                                        group-hover:bg-brand-50 group-hover:text-brand-600
                                        sm:h-8 sm:w-8">
                                <iconify-icon 
                                    icon="lucide:arrow-up-right" 
                                    class="text-base transition-transform duration-200 group-hover:-translate-y-0.5 group-hover:translate-x-0.5 sm:text-lg">
                                </iconify-icon>
                            </div>
                        </div>

                        {{-- Card Title & Body --}}
                        <h3 class="text-sm font-semibold text-slate-900 transition-colors duration-200 group-hover:text-brand-700 sm:text-base">
                            {{ $category['name'] }}
                        </h3>

                        <p class="mt-1.5 line-clamp-2 text-xs leading-relaxed text-slate-500 sm:mt-2 sm:text-sm">
                            {{ $category['short_description'] ?? ($category['description'] ?? '') }}
                        </p>
                    </div>

                    {{-- Footer Status Bar --}}
                    <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-3.5 text-xs font-medium sm:mt-6 sm:pt-4">
                        <span class="inline-flex items-center gap-1.5 text-slate-500">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                            RPL & Courses Available
                        </span>

                        <span class="inline-flex items-center gap-1 font-semibold text-brand-700 group-hover:underline">
                            Explore
                        </span>
                    </div>

                </a>

            @endforeach
        </div>

    </div>
</section>