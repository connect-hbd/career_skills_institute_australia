    <header class="fixed top-0 left-0 w-full z-50 border-0 md:border-b bg-white backdrop-blur-md dark:bg-neutral-900/95">

        <nav class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="flex justify-between items-center h-18 md:h-20">
                <!-- Mobile Menu Button -->
                <button id="menuBtn" class="md:hidden">

                    <!-- Hamburger -->
                    <svg id="menuOpenIcon" class="w-7 h-7 text-neutral-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>

                    <!-- Close -->
                    <svg id="menuCloseIcon" class="hidden w-7 h-7 text-neutral-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>

                </button>
                <!-- Logo -->
                <div class="w-28 p-1.5">
                    <a href="/">
                        <img src="{{ asset('logo.webp') }}" alt="logo" class="w-auto h-auto">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-4 md:gap-6 lg:gap-8 text-sm font-medium uppercase">
                    {{-- Services --}}
                    <a href="{{ route('services') }}"
                        class="relative font-medium transition-all duration-300
                            {{ request()->routeIs('services') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                            after:absolute after:left-0 after:-bottom-1.5
                            after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Services
                    </a>

                    {{-- Courses --}}
                    {{-- <a href="{{ route('courses') }}"
                        class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('courses') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Courses
                    </a> --}}

                    {{-- Counsellors --}}
                    <a href="{{ route('counsellors') }}"
                        class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('counsellors') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Counsellors
                    </a>
                    {{-- Events --}}
                    <a href="{{ route('events') }}"
                        class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('events') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Events
                    </a>

                    {{-- Destinations --}}
                    <a href="{{ route('destinations') }}"
                        class="relative font-medium transition-all duration-300
                            {{ request()->routeIs('destinations') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                            after:absolute after:left-0 after:-bottom-1.5
                            after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Destinations
                    </a>
                    

                </div>

                <div class="flex items-center gap-4 lg:gap-6">
                    @include("student.layouts.user-dropdown")
                </div>
            </div>

        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-200 shadow-lg">

            <div class="flex flex-col px-6 py-5 space-y-3 text-base font-medium">
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Services</a>
                {{-- <a href="{{ route('courses') }}" class="{{ request()->routeIs('courses') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Courses</a> --}}
                <a href="{{ route('counsellors') }}" class="{{ request()->routeIs('counsellors') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Counsellors</a>
                <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Events</a>
                <a href="{{ route('destinations') }}" class="{{ request()->routeIs('destinations') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Destinations</a>
                               
            </div>
        </div>
    </header>
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        const openIcon = document.getElementById('menuOpenIcon');
        const closeIcon = document.getElementById('menuCloseIcon');

        menuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

            if (mobileMenu.classList.contains('hidden')) {
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            } else {
                openIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }

        });
    </script>
