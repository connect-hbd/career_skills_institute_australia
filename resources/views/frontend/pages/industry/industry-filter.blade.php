
@if (count($courses) > 0)

    <div
        x-data="{
            activeFilter: 'all',

            get hasVisibleCourses() {
                if (!this.$refs.courseGrid) {
                    return false;
                }

                const cards = this.$refs.courseGrid.querySelectorAll('[data-filter-key]');

                return Array.from(cards).some(card => {
                    return this.activeFilter === 'all' ||
                        card.dataset.filterKey === this.activeFilter;
                });
            }
        }"
        class="space-y-5 sm:space-y-6"
    >

        {{-- FILTER TABS --}}
        <div
            class="sticky top-0 z-50 -mx-4 bg-white px-4 py-3 h-16 sm:h-auto shadow-sm sm:static sm:mx-0 sm:bg-transparent sm:px-0 sm:py-0 sm:shadow-none"
        >
            <div class="flex items-center gap-2 overflow-x-auto whitespace-nowrap scrollbar-none">

                {{-- ALL QUALIFICATIONS --}}
                <button
                    type="button"
                    @click="activeFilter = 'all'"
                    :class="activeFilter === 'all'
                        ? 'bg-brand-500 text-white border-brand-500 shadow-sm'
                        : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'"
                    class="shrink-0 rounded-lg border px-3.5 py-2 text-xs font-bold tracking-wide transition-all duration-200 sm:px-4"
                >
                    All Qualifications
                </button>

                {{-- LEVEL FILTERS --}}
                @foreach ($courseLevels as $level)
                    @php
                        $levelKey = \Illuminate\Support\Str::slug($level);
                    @endphp

                    <button
                        type="button"
                        @click="activeFilter = '{{ $levelKey }}'"
                        :class="activeFilter === '{{ $levelKey }}'
                            ? 'bg-brand-500 text-white border-brand-500 shadow-sm'
                            : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'"
                        class="shrink-0 rounded-lg border px-3.5 py-2 text-xs font-bold tracking-wide transition-all duration-200 sm:px-4"
                    >
                        {{ $level }}
                    </button>
                @endforeach

            </div>
        </div>


        {{-- QUALIFICATIONS GRID --}}
        <div
            x-ref="courseGrid"
            class="grid grid-cols-1 gap-4 sm:gap-5 md:grid-cols-2 lg:grid-cols-3 lg:gap-6"
        >

            @foreach ($courses as $course)
                @php
                    $filterKey = \Illuminate\Support\Str::slug($course['level'] ?? 'other');
                @endphp

                <div
                    data-filter-key="{{ $filterKey }}"
                    x-show="activeFilter === 'all' || activeFilter === '{{ $filterKey }}'"
                    x-transition.opacity.duration.200ms
                >
                    @include('frontend.pages.industry.qualificationCard', [
                        'course' => $course,
                        'filterKey' => $filterKey,
                    ])
                </div>
            @endforeach

        </div>

        {{-- NO FILTER RESULT --}}
        <div
            x-show="!hasVisibleCourses"
            x-cloak
            class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-12 text-center"
        >
            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-400">
                <iconify-icon icon="lucide:book-open" class="text-2xl"></iconify-icon>
            </div>

            <h3 class="text-base font-bold text-slate-800">
                No Qualifications Found
            </h3>

            <p class="mt-1 text-sm text-slate-500">
                No qualifications are available under this category.
            </p>

            <button
                type="button"
                @click="activeFilter = 'all'"
                class="mt-4 inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-2 text-xs font-bold text-white transition hover:bg-brand-600"
            >
                View All Qualifications
            </button>
        </div>

    </div>

@else

    @include('frontend.pages.industry.empty-state')

@endif
