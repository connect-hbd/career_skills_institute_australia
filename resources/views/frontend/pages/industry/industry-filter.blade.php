@if (count($courses) > 0)
    <div x-data="{
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
    }" class="space-y-6">

        {{-- FILTER TABS --}}
        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
            <button type="button" @click="activeFilter = 'all'"
                :class="activeFilter === 'all' ? 'bg-[#3f8919] text-white shadow-md shadow-[#3f8919]/25' :
                    'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200">All
                Qualifications</button>
            @foreach ($courseLevels as $level)
                @php
                    $levelKey = \Illuminate\Support\Str::slug($level);
                @endphp
                <button type="button" @click="activeFilter = '{{ $levelKey }}'"
                    :class="activeFilter === '{{ $levelKey }}' ?
                        'bg-[#3f8919] text-white shadow-md shadow-[#3f8919]/25' :
                        'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                    class="whitespace-nowrap rounded-xl px-4 py-2 text-xs font-bold tracking-wide transition-all duration-200">{{ $level }}</button>
            @endforeach
        </div>

        {{-- QUALIFICATIONS GRID --}}
        <div x-ref="courseGrid" class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($courses as $course)
                @php
                    $filterKey = \Illuminate\Support\Str::slug($course['level'] ?? 'other');
                @endphp

                @include('frontend.pages.industry.qualificationCard', [
                    'course' => $course,
                    'filterKey' => $filterKey,
                ])
            @endforeach

        </div>

    </div>
@else
    @include('frontend.pages.industry.empty-state')
@endif