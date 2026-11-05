@extends('student.layouts.app')

@section('content')
    {{-- ── Toast Notification ────────────────────────────────────────────────── --}}
    @if (session('success'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 4000)"
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-8"
             x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95" 
             class="fixed bottom-4 right-4 sm:bottom-auto sm:top-5 z-[9999] max-w-sm w-[calc(100%-2rem)] sm:w-full">

            <div class="flex items-start gap-3 rounded-2xl border border-emerald-500/20 bg-white/90 dark:bg-neutral-900/90 backdrop-blur-md p-4 shadow-xl shadow-emerald-500/5 dark:border-emerald-500/30">
                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400">
                    <iconify-icon icon="lucide:check-circle-2" class="text-lg"></iconify-icon>
                </div>

                <div class="flex-1 min-w-0 pt-0.5">
                    <p class="text-xs font-semibold text-neutral-900 dark:text-neutral-100">Changes Saved</p>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-0.5 truncate">{{ session('success') }}</p>
                </div>

                <button type="button" @click="show = false" class="text-neutral-400 hover:text-neutral-600 dark:hover:text-neutral-200 transition-colors p-1 rounded-lg">
                    <iconify-icon icon="lucide:x" class="text-sm block"></iconify-icon>
                </button>
            </div>
        </div>
    @endif

    {{-- ── Main Profile Wizard Section ─────────────────────────────────────── --}}
    @php
        $stepsMeta = [
            1 => ['icon' => 'lucide:id-card', 'label' => 'Personal Info'],
            2 => ['icon' => 'lucide:graduation-cap', 'label' => 'Academic'],
            3 => ['icon' => 'lucide:compass', 'label' => 'Study Plan'],
            4 => ['icon' => 'lucide:briefcase', 'label' => 'Experience'],
            5 => ['icon' => 'lucide:shield-alert', 'label' => 'Immigration'],
            6 => ['icon' => 'lucide:folder-check', 'label' => 'Documents'],
        ];
    @endphp

    <div class="py-6 space-y-6" x-data="stepWizard({{ $activeStep }}, {{ $student->profile_step ?? 1 }})" x-init="init()" @go-to-step.window="goTo($event.detail)">

        {{-- ── Responsive Modern Tab Card Container ───────────────────────── --}}
        <div class="bg-white dark:bg-neutral-900 sm:rounded-2xl border-0 sm:border border-neutral-200/80 dark:border-neutral-800 shadow-sm overflow-hidden">
            
            {{-- Scroll Container with Edge Visual Indicators --}}
            <div class="relative group">
                
                {{-- Left Fade Cue --}}
                <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-white dark:from-neutral-900 to-transparent z-10 transition-opacity duration-200"
                     :class="canScrollLeft ? 'opacity-100' : 'opacity-0'"></div>

                {{-- Right Fade Cue --}}
                <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-white dark:from-neutral-900 to-transparent z-10 transition-opacity duration-200"
                     :class="canScrollRight ? 'opacity-100' : 'opacity-0'"></div>

                {{-- Tab Navigation Strip --}}
                <div class="overflow-x-auto scrollbar-none touch-pan-x border-b border-neutral-200/80 dark:border-neutral-800 select-none cursor-grab active:cursor-grabbing"
                     x-ref="tabContainer"
                     @scroll="updateScrollIndicators()"
                     @wheel="handleDesktopWheel($event)">
                    
                    <nav class="flex items-center min-w-max px-3 sm:px-5 py-1" aria-label="Profile navigation tabs">
                        @foreach ($stepsMeta as $num => $info)
                            <button type="button" 
                                    x-ref="tab_{{ $num }}"
                                    @click="maxStep >= {{ $num }} && goTo({{ $num }})"
                                    :disabled="maxStep < {{ $num }}"
                                    class="group relative flex items-center gap-2.5 px-4 py-3.5 my-1 rounded-xl text-xs sm:text-sm font-semibold whitespace-nowrap transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500"
                                    :class="{
                                        'text-brand-600 dark:text-brand-400 bg-brand-50/70 dark:bg-brand-950/40': currentStep === {{ $num }},
                                        'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100/70 dark:text-neutral-400 dark:hover:text-neutral-200 dark:hover:bg-neutral-800/60': currentStep !== {{ $num }} && maxStep >= {{ $num }},
                                        'text-neutral-300 dark:text-neutral-700 cursor-not-allowed opacity-60': maxStep < {{ $num }}
                                    }">
                                
                                {{-- Tab Icon Container --}}
                                <div class="flex h-6 w-6 items-center justify-center rounded-lg transition-all duration-200 flex-shrink-0"
                                     :class="{
                                         'bg-brand-600 text-white dark:bg-brand-500 dark:text-neutral-950 shadow-sm shadow-brand-500/30': currentStep === {{ $num }},
                                         'bg-neutral-100 dark:bg-neutral-800 text-neutral-500 dark:text-neutral-400 group-hover:scale-105': currentStep !== {{ $num }} && maxStep >= {{ $num }},
                                         'bg-transparent text-neutral-300 dark:text-neutral-700': maxStep < {{ $num }}
                                     }">
                                    <iconify-icon icon="{{ $info['icon'] }}" class="text-sm"></iconify-icon>
                                </div>

                                {{-- Step Label & Indicator --}}
                                <div class="flex items-center gap-2">
                                    <span>{{ $info['label'] }}</span>
                                </div>

                                {{-- Active Bottom Accent Indicator --}}
                                <span class="absolute inset-x-3 bottom-0 h-0.5 rounded-full transition-all duration-300"
                                      :class="currentStep === {{ $num }} ? 'bg-brand-600 dark:bg-brand-400 scale-x-100' : 'bg-transparent scale-x-0'"></span>
                            </button>
                        @endforeach
                    </nav>
                </div>
            </div>

            {{-- Compact Dynamic Status Header Strip --}}
            <div class="px-4 sm:px-6 py-2.5 bg-neutral-50/70 dark:bg-neutral-900/40 flex items-center justify-between text-xs text-neutral-500 dark:text-neutral-400">
                <div class="flex items-center gap-2">
                    <span class="font-medium">Step <span class="text-neutral-900 dark:text-neutral-100 font-bold" x-text="currentStep"></span> of 6</span>
                    <span class="text-neutral-300 dark:text-neutral-700">•</span>
                    <span class="font-semibold text-brand-600 dark:text-brand-400" x-text="stepLabel()"></span>
                </div>
            </div>

        </div>

        {{-- ── Step Form Content Panels ───────────────────────────────────────── --}}
        <div class="mt-6">
            <div x-show="currentStep === 1" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @include('student.profile.step-form.personal-information')
            </div>

            <div x-show="currentStep === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @include('student.profile.step-form.academic-information')
            </div>

            <div x-show="currentStep === 3" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @include('student.profile.step-form.study-plan')
            </div>

            <div x-show="currentStep === 4" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @include('student.profile.step-form.work-experience')
            </div>

            <div x-show="currentStep === 5" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @include('student.profile.step-form.immigration-history')
            </div>

            <div x-show="currentStep === 6" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                @include('student.profile.step-form.visa-documents-checklist')
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function stepWizard(initialStep, maxStepFromServer) {
            const labels = {
                1: 'Personal Information',
                2: 'Academic Background',
                3: 'Study Plan',
                4: 'Work Experience',
                5: 'Immigration History',
                6: 'Visa Documents',
            };

            return {
                currentStep: initialStep,
                maxStep: maxStepFromServer,
                canScrollLeft: false,
                canScrollRight: false,

                init() {
                    this.$nextTick(() => {
                        this.scrollToActiveTab();
                        this.updateScrollIndicators();
                    });

                    // Update scroll indicators on resize
                    window.addEventListener('resize', () => this.updateScrollIndicators());

                    this.$watch('currentStep', (step) => {
                        const url = new URL(window.location.href);
                        url.searchParams.set('step', step);
                        history.replaceState(null, '', url.toString());

                        this.scrollToActiveTab();

                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
                },

                goTo(step) {
                    if (step < 1 || step > 6 || step > this.maxStep) return;
                    this.currentStep = step;
                },

                stepLabel() {
                    return labels[this.currentStep] ?? '';
                },

                handleDesktopWheel(e) {
                    // Converts vertical mouse wheel scroll into horizontal tab scrolling
                    if (e.deltaY !== 0) {
                        e.preventDefault();
                        this.$refs.tabContainer.scrollLeft += e.deltaY;
                        this.updateScrollIndicators();
                    }
                },

                updateScrollIndicators() {
                    const el = this.$refs.tabContainer;
                    if (!el) return;
                    this.canScrollLeft = el.scrollLeft > 5;
                    this.canScrollRight = el.scrollLeft < (el.scrollWidth - el.clientWidth - 5);
                },

                scrollToActiveTab() {
                    const container = this.$refs.tabContainer;
                    const activeTab = this.$refs[`tab_${this.currentStep}`];

                    if (container && activeTab) {
                        const containerWidth = container.offsetWidth;
                        const tabOffsetLeft = activeTab.offsetLeft;
                        const tabWidth = activeTab.offsetWidth;

                        container.scrollTo({
                            left: tabOffsetLeft - (containerWidth / 2) + (tabWidth / 2),
                            behavior: 'smooth'
                        });

                        setTimeout(() => this.updateScrollIndicators(), 300);
                    }
                }
            };
        }
    </script>
@endpush