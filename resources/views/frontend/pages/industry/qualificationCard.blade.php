{{-- QUALIFICATION CARD --}}
<article
    data-filter-key="{{ $filterKey }}"
    x-show="activeFilter === 'all' || activeFilter === '{{ $filterKey }}'"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-[#3f8919]/40 hover:shadow-xl"
>

    {{-- CARD IMAGE --}}
    <div>
        <div class="relative h-52 overflow-hidden bg-slate-900">
            <img
                src="{{ !empty($course['image'])
                    ? asset($course['image'])
                    : asset('images/course-placeholder.webp') }}"
                alt="{{ $course['name'] ?? 'Course' }}"
                loading="lazy"
                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
            />

            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>

            {{-- QUALIFICATION LEVEL --}}
            <div class="absolute left-3 top-3 flex items-center gap-1.5 rounded-lg border border-slate-700/80 bg-slate-900/90 px-2.5 py-1 backdrop-blur-md">
                <span class="h-2 w-2 animate-pulse rounded-full bg-[#9ece1b]"></span>
                <span class="text-[11px] font-bold uppercase tracking-wider text-white">
                    {{ $course['level'] ?? 'Nationally Recognised' }}
                </span>
            </div>

            {{-- COURSE CODE --}}
            @if (!empty($course['code']))
                <div class="absolute right-3 top-3 rounded-lg border border-white/40 bg-white/90 px-2.5 py-1 text-[11px] font-mono font-bold text-slate-900 shadow-sm backdrop-blur-md">
                    {{ $course['code'] }}
                </div>
            @endif
        </div>

        {{-- CARD CONTENT --}}
        <div class="space-y-3 p-6">
            <h3 class="line-clamp-2 text-lg font-bold tracking-tight text-slate-900 transition-colors duration-200 group-hover:text-[#3f8919]">
                <a href="{{ route('qualification.show', ['qualificationSlug' => $course['slug']]) }}">
                    {{ $course['name'] ?? 'Untitled Qualification' }}
                </a>
            </h3>

            <p class="line-clamp-2 text-xs leading-relaxed text-slate-600 sm:text-sm">
                {{ $course['hero_description']
                    ?? $course['short_description']
                    ?? 'Gain industry-standard technical competencies and certified RPL pathways.' }}
            </p>
        </div>
    </div>

    {{-- CARD FOOTER --}}
    <div class="flex items-center gap-4 justify-between border-t border-slate-100 px-6 pb-6 pt-4">
        {{-- Enroll Button (Primary Brand) --}}
        <a
            href="{{ route('qualification.show', ['qualificationSlug' => $course['slug']]) }}"
            class="w-1/2 inline-flex items-center justify-center gap-1.5 rounded-lg bg-brand-500 px-4 py-2 text-xs font-bold text-white transition-all duration-200 hover:scale-105 hover:bg-brand-600"
        >
            <span>Enroll Now</span>
        </a>

        {{-- View Details Button (Clean Outlined / Secondary Accent Hover) --}}
        <a
            href="{{ route('qualification.show', ['qualificationSlug' => $course['slug']]) }}"
            class="w-1/2 inline-flex items-center justify-center gap-1.5 rounded-lg border border-slate-200 bg-white px-4 py-2 text-xs font-bold text-slate-700 transition-all duration-200 hover:border-secondary-500 hover:bg-secondary-500 hover:text-white"
        >
            <span>View Details</span>
            <iconify-icon
                icon="lucide:arrow-up-right"
                class="text-sm"
            ></iconify-icon>
        </a>
    </div>

</article>