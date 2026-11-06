{{-- =========================================================
    GOOGLE REVIEWS - INFINITE AUTO SLIDER
========================================================= --}}

<section aria-label="Google Customer Reviews" class="overflow-hidden bg-slate-50 py-14">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Section Header & Rating --}}
        <div class="grid grid-cols-1 items-center gap-8 lg:grid-cols-12">

            {{-- Rating --}}
            <div
                class="border-b border-slate-200 pb-7 text-center lg:col-span-3 lg:border-b-0 lg:border-r lg:pb-0 lg:pr-8 lg:text-left">

                <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-slate-500">
                    Reviews &amp; Feedback
                </span>

                <div class="mt-1 text-3xl font-black text-slate-900">
                    EXCELLENT
                </div>

                <div class="my-2 text-lg tracking-wide text-amber-400">
                    ★★★★★
                </div>

                <p class="text-xs text-slate-500">
                    Based on
                    <strong class="text-slate-800">70+ authentic reviews</strong>
                </p>

                <div class="mt-3 text-sm font-bold">
                    <span class="text-blue-600">G</span><span class="text-red-500">o</span><span
                        class="text-yellow-500">o</span><span class="text-blue-500">g</span><span
                        class="text-green-500">l</span><span class="text-red-500">e</span>
                    <span class="text-slate-600">Reviews</span>
                </div>

            </div>

            {{-- Reviews Slider --}}
            <div class="min-w-0 lg:col-span-9">

                @php
                    $reviews = [
                        [
                            'initial' => 'I',
                            'name' => 'Istika Sapkota',
                            'color' => 'bg-emerald-600',
                            'text' => 'She was really nice and made us understand every detail about first aid and CPR, and all the required practical units.',
                        ],
                        [
                            'initial' => 'K',
                            'name' => 'Kalpana Tamang',
                            'color' => 'bg-amber-600',
                            'text' => 'I feel so comfortable and very knowledgeable and experienced. Training was well organized, practical and easy to follow.',
                        ],
                        [
                            'initial' => 'T',
                            'name' => 'Tabsum Chhetri',
                            'color' => 'bg-indigo-600',
                            'text' => 'Fatima literally she is the sweetest assessor. She gave me confidence and assisted through every single compliance check!',
                        ],
                    ];
                @endphp

                <div class="reviews-slider">

                    {{-- Track --}}
                    <div class="reviews-track">

                        {{-- First Set --}}
                        @foreach ($reviews as $review)
                            <div class="review-slide">

                                <div
                                    class="group relative flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:border-brand-200 hover:shadow-xl">

                                    {{-- User Info --}}
                                    <div class="mb-3 flex items-center justify-between">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="{{ $review['color'] }} flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold text-white shadow-sm transition duration-300 group-hover:scale-110">

                                                {{ $review['initial'] }}

                                            </div>

                                            <div>
                                                <h5 class="text-xs font-bold text-slate-800">
                                                    {{ $review['name'] }}
                                                </h5>

                                                <span class="text-[10px] text-slate-400">
                                                    7 months ago
                                                </span>
                                            </div>

                                        </div>

                                        <span class="font-bold text-blue-500">G</span>

                                    </div>

                                    {{-- Stars --}}
                                    <div class="mb-2 text-xs tracking-wide text-amber-400">
                                        ★★★★★
                                    </div>

                                    {{-- Review Text --}}
                                    <p class="line-clamp-3 text-xs leading-5 text-slate-600">
                                        {{ $review['text'] }}
                                    </p>

                                    <div class="mt-auto pt-3">
                                        <span class="text-[10px] font-semibold text-brand-600">
                                            Google Review
                                        </span>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                        {{-- Duplicate Set for Seamless Loop --}}
                        @foreach ($reviews as $review)
                            <div class="review-slide" aria-hidden="true">

                                <div
                                    class="group relative flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition-all duration-300 hover:border-brand-200 hover:shadow-xl">

                                    <div class="mb-3 flex items-center justify-between">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="{{ $review['color'] }} flex h-9 w-9 items-center justify-center rounded-full text-xs font-bold text-white shadow-sm">

                                                {{ $review['initial'] }}

                                            </div>

                                            <div>
                                                <h5 class="text-xs font-bold text-slate-800">
                                                    {{ $review['name'] }}
                                                </h5>

                                                <span class="text-[10px] text-slate-400">
                                                    7 months ago
                                                </span>
                                            </div>

                                        </div>

                                        <span class="font-bold text-blue-500">G</span>

                                    </div>

                                    <div class="mb-2 text-xs tracking-wide text-amber-400">
                                        ★★★★★
                                    </div>

                                    <p class="line-clamp-3 text-xs leading-5 text-slate-600">
                                        {{ $review['text'] }}
                                    </p>

                                    <div class="mt-auto pt-3">
                                        <span class="text-[10px] font-semibold text-brand-600">
                                            Google Review
                                        </span>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

        {{-- Footer --}}
        <div
            class="mt-7 flex flex-col justify-between gap-3 border-t border-slate-200 pt-5 text-[11px] text-slate-400 sm:flex-row sm:items-center">

            <span>Showing our latest verified learner reviews</span>

            <span class="inline-flex items-center gap-1 font-semibold text-slate-600">

                <svg class="h-4 w-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                    <path clip-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        fill-rule="evenodd" />
                </svg>

                Verified by Trustindex

            </span>

        </div>

    </div>

</section>

{{-- =========================================================
    INFINITE SLIDER CSS
========================================================= --}}
<style>
    .reviews-slider {
        width: 100%;
        overflow: hidden;
        position: relative;
    }

    .reviews-track {
        display: flex;
        width: max-content;
        gap: 20px;
        animation: reviews-infinite-scroll 20s linear infinite;
        will-change: transform;
    }

    .review-slide {
        flex: 0 0 calc((100vw - 80px) / 1.2);
        max-width: 320px;
        min-width: 260px;
    }

    @media (min-width: 768px) {
        .review-slide {
            flex-basis: 280px;
        }
    }

    @media (min-width: 1024px) {
        .review-slide {
            flex-basis: 260px;
        }
    }

    @keyframes reviews-infinite-scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(calc(-50% - 10px));
        }
    }

    /* Pause when user hovers over slider */
    .reviews-slider:hover .reviews-track {
        animation-play-state: paused;
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        .reviews-track {
            animation: none;
        }
    }
</style>