<section x-data="{ consultationModal: {{ $errors->any() ? 'true' : 'false' }} }"
    @keydown.escape.window="consultationModal = false"
    class="relative flex items-center justify-center overflow-hidden bg-brand-50 py-10 text-slate-900 sm:py-12 lg:py-16">

    {{-- Ambient Radial Glows --}}
    <div
        class="pointer-events-none absolute -left-16 -top-16 h-64 w-64 rounded-full bg-brand-500/10 blur-[80px] sm:-left-20 sm:-top-20 sm:h-80 sm:w-80 sm:blur-[100px]">
    </div>
    <div
        class="pointer-events-none absolute -bottom-16 -right-16 h-64 w-64 rounded-full bg-secondary-500/15 blur-[80px] sm:-bottom-20 sm:-right-20 sm:h-80 sm:w-80 sm:blur-[100px]">
    </div>

    {{-- Container --}}
    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 items-center gap-8 sm:gap-10 lg:grid-cols-12 lg:gap-12 xl:gap-16">

            {{-- Left Side Content --}}
            <div class="animate-fade-in-left order-1 space-y-4 sm:space-y-5 lg:col-span-6 lg:order-none">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                    {{-- Status Badge --}}
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-brand-700 shadow-sm sm:px-3.5 sm:text-xs">
                        <span class="flex h-1.5 w-1.5 animate-pulse rounded-full bg-brand-500 sm:h-2 sm:w-2"></span>
                        <span>Nationally Recognised Training</span>
                    </div>
                    <span class="text-[11px]">RTO CODE: 45685</span>
                </div>

                {{-- Main Heading --}}
                <h1
                    class="text-[1.75rem] font-extrabold leading-[1.2] tracking-tight text-brand-950 xs:text-3xl sm:text-4xl lg:text-[2.75rem] xl:text-5xl">
                    Build Your Future with
                    <span
                        class="bg-gradient-to-r from-brand-600 via-brand-500 to-secondary-600 bg-clip-text text-transparent">
                        Expert Certification
                    </span>
                </h1>

                {{-- Subtitle --}}
                <p class="max-w-xl text-sm font-normal leading-relaxed text-slate-600 sm:text-base">
                    Develop practical, industry-relevant skills in construction, trades, and engineering through
                    flexible, career-focused training designed to build your knowledge, enhance your expertise, and
                    prepare you for real-world opportunities.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col gap-3 pt-1 sm:flex-row sm:flex-wrap sm:items-center sm:gap-3 sm:pt-2">

                    {{-- Primary CTA --}}
                    <a href="{{ route('qualifications.index') }}"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-brand-500/20 transition-all duration-300 hover:scale-[1.02] hover:bg-brand-600 hover:shadow-brand-500/30 active:scale-95 sm:w-auto sm:px-6">
                        <span>View Qualifications</span>
                        <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                    </a>

                    {{-- Secondary CTA (Triggers Modal) --}}
                    <button type="button" @click="consultationModal = true"
                        class="inline-flex w-full cursor-pointer items-center justify-center gap-2 rounded-xl border border-brand-200 bg-white/80 px-5 py-3 text-sm font-medium text-brand-800 shadow-sm backdrop-blur-sm transition-all duration-300 hover:border-brand-400 hover:bg-brand-50 hover:text-brand-900 active:scale-95 sm:w-auto">
                        <iconify-icon icon="lucide:phone-call" class="text-base text-brand-600"></iconify-icon>
                        <span>Book Consultation</span>
                    </button>
                </div>
            </div>

            {{-- Right Side Bento Grid --}}
            <div class="animate-fade-in-right order-2 lg:col-span-6 lg:order-none">
                <div
                    class="relative mx-auto grid h-[280px] max-w-md grid-cols-12 grid-rows-2 gap-2.5 xs:h-[300px] sm:h-[340px] sm:max-w-lg sm:gap-3 lg:mx-0 lg:h-[360px] lg:max-w-none xl:h-[400px]">

                    {{-- Decorative Gradient Glow --}}
                    <div
                        class="pointer-events-none absolute -inset-2 rounded-3xl bg-gradient-to-tr from-brand-500/20 via-secondary-500/15 to-transparent blur-xl">
                    </div>

                    {{-- Image 1: Main Featured Tile --}}
                    <div
                        class="group relative col-span-7 row-span-2 overflow-hidden rounded-xl border border-brand-200 bg-brand-100 shadow-xl shadow-brand-900/10 transition-all duration-500 hover:border-brand-400 sm:rounded-2xl sm:shadow-2xl">
                        <img src="{{ asset('images/courses/trade-vocational.webp') }}"
                            alt="Construction engineering project"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />

                        <div class="absolute inset-0 bg-gradient-to-t from-brand-950/85 via-brand-950/5 to-transparent">
                        </div>

                        <div
                            class="absolute bottom-2 left-2 right-2 flex items-center justify-between rounded-lg border border-white/20 bg-brand-950/85 p-2 shadow-lg backdrop-blur-md sm:bottom-3 sm:left-3 sm:right-3 sm:rounded-xl sm:p-2.5">
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                <iconify-icon icon="lucide:check-circle-2"
                                    class="text-base text-secondary-400 sm:text-lg"></iconify-icon>
                                <span class="text-[11px] font-medium text-white sm:text-xs">
                                    RPL Pathways
                                </span>
                            </div>
                            <span
                                class="text-[9px] font-bold uppercase tracking-wider text-secondary-300 sm:text-[10px]">
                                Accredited
                            </span>
                        </div>
                    </div>

                    {{-- Image 2: Top Right Tile --}}
                    <div
                        class="group relative col-span-5 row-span-1 overflow-hidden rounded-xl border border-brand-200 bg-brand-100 shadow-lg shadow-brand-900/10 transition-all duration-500 hover:border-brand-400 sm:rounded-2xl sm:shadow-xl">
                        <img src="{{ asset('images/courses/two.avif') }}" alt="On-site technical training"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    </div>

                    {{-- Image 3: Bottom Right Tile --}}
                    <div
                        class="group relative col-span-5 row-span-1 overflow-hidden rounded-xl border border-brand-200 bg-brand-100 shadow-lg shadow-brand-900/10 transition-all duration-500 hover:border-brand-400 sm:rounded-2xl sm:shadow-xl">
                        <img src="{{ asset('images/courses/one.avif') }}" alt="Hands-on skills application"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    </div>

                    {{-- Floating Badge Chip --}}
                    <div
                        class="animate-bounce-subtle absolute -right-2 -top-2 z-30 flex items-center gap-2 rounded-lg border border-brand-100 bg-white/95 px-2.5 py-1.5 shadow-lg shadow-brand-900/10 backdrop-blur-md sm:-right-3 sm:-top-3 sm:gap-2.5 sm:rounded-xl sm:px-3 sm:py-2 sm:shadow-xl">
                        <div
                            class="flex h-7 w-7 items-center justify-center rounded-md bg-secondary-100 text-brand-700 sm:h-8 sm:w-8 sm:rounded-lg">
                            <iconify-icon icon="lucide:award" class="text-base sm:text-lg"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-brand-950 sm:text-xs">
                                ISO Certified
                            </p>
                            <p class="text-[9px] text-slate-500 sm:text-[10px]">
                                100% Recognized
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================== --}}
    {{-- BOOK CONSULTATION MODAL                                        --}}
    {{-- ============================================================== --}}
    <template x-teleport="body">
        <div x-show="consultationModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto p-4 sm:p-6"
            role="dialog" aria-modal="true" aria-labelledby="modal-title">

            {{-- Backdrop --}}
            <div x-show="consultationModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="consultationModal = false"
                class="fixed inset-0 bg-brand-950/60 backdrop-blur-sm transition-opacity">
            </div>

            {{-- Modal Card --}}
            <div x-show="consultationModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative z-10 w-full max-w-lg overflow-hidden rounded-2xl border border-brand-200 bg-white shadow-2xl shadow-brand-950/20">

                {{-- Modal Header --}}
                <div class="relative border-b border-brand-100 bg-gradient-to-r from-brand-50 via-white to-secondary-50/50 px-6 py-5">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-500 text-white shadow-md shadow-brand-500/25">
                                <iconify-icon icon="lucide:calendar-check" class="text-xl"></iconify-icon>
                            </div>
                            <div>
                                <h3 id="modal-title" class="text-lg font-bold text-brand-950">
                                    Book a Free Consultation
                                </h3>
                                <p class="text-xs text-slate-500">
                                    Speak with an advisor about RPL &amp; training pathways
                                </p>
                            </div>
                        </div>

                        <button type="button" @click="consultationModal = false"
                            class="rounded-lg p-1.5 text-slate-400 transition-colors hover:bg-brand-100/60 hover:text-brand-800">
                            <span class="sr-only">Close modal</span>
                            <iconify-icon icon="lucide:x" class="text-xl"></iconify-icon>
                        </button>
                    </div>
                </div>

                {{-- Modal Form --}}
                <form action="" method="POST" class="space-y-4 p-6">
                    @csrf

                    {{-- Full Name --}}
                    <div>
                        <label for="full_name" class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-slate-700">
                            Full Name <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <iconify-icon icon="lucide:user" class="text-base"></iconify-icon>
                            </span>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required
                                placeholder="e.g. John Doe"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2.5 pl-10 pr-4 text-sm text-slate-900 placeholder-slate-400 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10">
                        </div>
                        @error('full_name')
                            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email & Phone Grid --}}
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Email Address <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <iconify-icon icon="lucide:mail" class="text-base"></iconify-icon>
                                </span>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    placeholder="you@example.com"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2.5 pl-10 pr-3.5 text-sm text-slate-900 placeholder-slate-400 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10">
                            </div>
                            @error('email')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Phone Number <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <iconify-icon icon="lucide:phone" class="text-base"></iconify-icon>
                                </span>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                    placeholder="0400 000 000"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2.5 pl-10 pr-3.5 text-sm text-slate-900 placeholder-slate-400 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10">
                            </div>
                            @error('phone')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Booking Date & Time --}}
                        {{-- Booking Date --}}
                        <div>
                            <label for="booking_date" class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-slate-700">
                                Preferred Date <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <iconify-icon icon="lucide:calendar" class="text-base"></iconify-icon>
                                </span>
                                <input type="date" name="booking_date" id="booking_date"
                                    value="{{ old('booking_date') }}"
                                    min="{{ now()->format('Y-m-d') }}" required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 py-2.5 pl-10 pr-3.5 text-sm text-slate-900 transition-all focus:border-brand-500 focus:bg-white focus:outline-none focus:ring-4 focus:ring-brand-500/10">
                            </div>
                            @error('booking_date')
                                <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>                   

                    {{-- Modal Footer Actions --}}
                    <div class="flex flex-col-reverse gap-2.5 border-t border-slate-100 pt-4 sm:flex-row sm:justify-end">
                        <button type="button" @click="consultationModal = false"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition-colors hover:bg-slate-50 sm:w-auto">
                            Cancel
                        </button>
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-brand-500/25 transition-all hover:bg-brand-600 active:scale-95 sm:w-auto">
                            <iconify-icon icon="lucide:check-circle" class="text-base"></iconify-icon>
                            <span>Confirm Booking</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </template>
</section>