{{-- ── Mobile Navigation Container & Side Drawer ───────────────────── --}}
<div x-data="{ drawerOpen: false, activeTab: 'dashboard' }" class="lg:hidden">

    {{-- ── Slide-Over Side Drawer (Dashboard Sidebar Menu) ────────────── --}}
    {{-- Backdrop Overlay --}}
    <div 
        x-show="drawerOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="drawerOpen = false"
        class="fixed inset-0 z-50 bg-neutral-900/60 backdrop-blur-sm"
    ></div>

    {{-- Drawer Panel --}}
    <aside 
        x-show="drawerOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 z-50 w-4/5 max-w-xs bg-white p-5 shadow-2xl dark:bg-neutral-900 dark:border-r dark:border-neutral-800 flex flex-col justify-between"
    >
        {{-- Drawer Header --}}
        <div>
            <div class="flex items-center justify-between pb-4 border-b border-neutral-100 dark:border-neutral-800 mb-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-950/60 dark:text-brand-400">
                        <iconify-icon icon="lucide:layout-dashboard" class="text-lg"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-neutral-900 dark:text-neutral-100">Dashboard Menu</h3>
                        <p class="text-[11px] text-neutral-400">Quick Access</p>
                    </div>
                </div>
                <button type="button" @click="drawerOpen = false" class="rounded-lg p-1 text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-800">
                    <iconify-icon icon="lucide:x" class="text-lg block"></iconify-icon>
                </button>
            </div>

            {{-- Sidebar Menu Links --}}
            {{-- Sidebar Menu Links --}}


            @include('student.layouts.sidebar')


        </div>

        {{-- Drawer Footer --}}
        <div class="pt-4 border-t border-neutral-100 dark:border-neutral-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3.5 py-2.5 text-xs font-semibold text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/30 transition-colors">
                    <iconify-icon icon="lucide:log-out" class="text-base"></iconify-icon>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ── Full-Width Edge-to-Edge Bottom Navigation Bar ────────────── --}}
    <nav class="fixed inset-x-0 bottom-0 z-40 border-t border-neutral-200/80 bg-white pb-[env(safe-area-inset-bottom)] backdrop-blur-xl dark:border-neutral-800 dark:bg-neutral-900/90 dark:shadow-neutral-950/50">
        <div class="grid grid-cols-3 gap-1 px-3 py-1.5 max-w-lg mx-auto">

            {{-- Dashboard Menu Toggle Button --}}
            <button
                type="button"
                @click="drawerOpen = true; activeTab = 'dashboard'"
                class="group relative flex flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-300 focus:outline-none"
                :class="activeTab === 'dashboard' ? 'text-brand-600 dark:text-brand-400' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
            >
           
                {{-- Icon --}}
                <div class="relative flex items-center justify-center transition-transform duration-300 group-active:scale-90"
                     :class="activeTab === 'dashboard' ? '-translate-y-0.5' : ''">
                    <iconify-icon icon="lucide:layout-dashboard" class="text-xl transition-all duration-300"></iconify-icon>
                    {{-- <iconify-icon icon="lucide:home" class="text-base"></iconify-icon> --}}
                </div>

                {{-- Label --}}
                <span class="relative text-[11px] transition-all duration-300"
                      :class="activeTab === 'dashboard' ? 'font-bold tracking-tight' : 'font-medium'">
                    Dashboard
                </span>
            </button>

            {{-- Courses Button --}}
            <a
                href="{{ url('/courses') }}"
                @click="activeTab = 'courses'"
                class="group relative flex flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-300 focus:outline-none"
                :class="activeTab === 'courses' ? 'text-brand-600 dark:text-brand-400' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
            >
                {{-- Active Indicator Pill --}}
                <div 
                    class="absolute inset-x-2 inset-y-0.5 rounded-xl transition-all duration-300"
                    :class="activeTab === 'courses' ? 'bg-brand-50/80 dark:bg-brand-950/50 scale-100 opacity-100' : 'scale-95 opacity-0'"
                ></div>

                {{-- Icon --}}
                <div class="relative flex items-center justify-center transition-transform duration-300 group-active:scale-90"
                     :class="activeTab === 'courses' ? '-translate-y-0.5' : ''">
                    <iconify-icon icon="lucide:graduation-cap" class="text-xl transition-all duration-300"></iconify-icon>
                </div>

                {{-- Label --}}
                <span class="relative text-[11px] transition-all duration-300"
                      :class="activeTab === 'courses' ? 'font-bold tracking-tight' : 'font-medium'">
                    Courses
                </span>

                {{-- Active Indicator Dot --}}
                <span class="absolute bottom-0.5 h-1 w-1 rounded-full bg-brand-600 dark:bg-brand-400 transition-all duration-300"
                      :class="activeTab === 'courses' ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></span>
            </a>

            {{-- Destination Button --}}
            <a
                href="{{ url('/destinations') }}"
                @click="activeTab = 'destinations'"
                class="group relative flex flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-300 focus:outline-none"
                :class="activeTab === 'destinations' ? 'text-brand-600 dark:text-brand-400' : 'text-neutral-400 hover:text-neutral-600 dark:text-neutral-500 dark:hover:text-neutral-300'"
            >
                {{-- Active Indicator Pill --}}
                <div 
                    class="absolute inset-x-2 inset-y-0.5 rounded-xl transition-all duration-300"
                    :class="activeTab === 'destinations' ? 'bg-brand-50/80 dark:bg-brand-950/50 scale-100 opacity-100' : 'scale-95 opacity-0'"
                ></div>

                {{-- Icon --}}
                <div class="relative flex items-center justify-center transition-transform duration-300 group-active:scale-90"
                     :class="activeTab === 'destinations' ? '-translate-y-0.5' : ''">
                    <iconify-icon icon="lucide:globe" class="text-xl transition-all duration-300"></iconify-icon>
                </div>

                {{-- Label --}}
                <span class="relative text-[11px] transition-all duration-300"
                      :class="activeTab === 'destinations' ? 'font-bold tracking-tight' : 'font-medium'">
                    Destinations
                </span>

                {{-- Active Indicator Dot --}}
                <span class="absolute bottom-0.5 h-1 w-1 rounded-full bg-brand-600 dark:bg-brand-400 transition-all duration-300"
                      :class="activeTab === 'destinations' ? 'scale-100 opacity-100' : 'scale-0 opacity-0'"></span>
            </a>

        </div>
    </nav>
</div>