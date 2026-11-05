

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($courses as $course)
        <div
            class="group bg-white rounded-3xl overflow-hidden border border-neutral-100 hover:border-transparent hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-2">

            {{-- Image --}}
            <div class="relative h-56 overflow-hidden bg-neutral-100">

                <img src="{{ asset($course->thumbnail) }}" alt="{{ $course['name'] }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent">
                </div>
            </div>

            {{-- Content --}}
            <div class="p-6">
                <h3 class="text-base md:text-lg font-bold text-neutral-900 mb-2 line-clamp-2 text-center">
                    {{ $course['name'] }}
                </h3>
                <div class="flex items-center justify-between mt-4 gap-6">
                    <a href="{{ route('single-course', $course['slug']) }}"
                        class="group/btn text-sm flex items-center gap-2 px-5 py-2.5 bg-white border border-secondary-500 hover:bg-secondary-500 text-black hover:text-white rounded-xl font-medium transition-all">

                        <span>View Details</span>
                    </a>
                    <a href="{{ route('enroll-course', $course['slug']) }}"
                        class="group/btn text-sm flex items-center gap-2 px-5 py-2.5 bg-brand-500 text-white hover:bg-brand-500  hover:text-white rounded-xl font-medium transition-all">

                        <span>Enroll Course</span>
                    </a>

                </div>

            </div>
        </div>
    @endforeach
</div>
