    @php
        $categories = json_decode(file_get_contents(resource_path('data/categories.json')), true);
        // @dd($categories);
    @endphp
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
                <div class=" p-1.5">
                    <a href="/" class="flex items-center gap-2 font-semibold">
                        Career Skills Institute
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-4 md:gap-6 lg:gap-8 text-sm font-medium uppercase">
                    {{-- about --}}
                    <a href="{{ route('about') }}"
                        class="relative font-medium transition-all duration-300
                            {{ request()->routeIs('about') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                            after:absolute after:left-0 after:-bottom-1.5
                            after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        About Us
                    </a>

                    {{-- Courses --}}
                    <a href="#" id="dropdownHoverButton" data-dropdown-toggle="dropdownHover"
                        data-dropdown-trigger="hover"
                        class="flex items-center relative font-medium transition-all duration-300
                        {{ request()->routeIs('courses.*') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300"
                        type="button">

                        Our Courses

                        <svg class="w-4 h-4 ms-1.5 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">

                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />

                        </svg>
                    </a>


                    {{-- Courses Dropdown --}}
                    <div id="dropdownHover" class="z-10 hidden top-full left-0 w-full bg-white shadow-xl capitalize ">

                        <div class="max-w-7xl mx-auto px-4 md:px-6 py-5 md:py-6 text-[#1C2826] font-sans antialiased">

                            <div class="grid gap-x-6 lg:gap-x-8 grid-cols-1 md:grid-cols-3 border-t border-brand-300 pt-4">

                                @foreach ($categories as $category)
                                    <a href="{{ route('category-courses', ['categoryslug' => $category['slug']]) }}"
                                        class="group/item relative flex items-start gap-3.5 p-3 rounded-xl border border-transparent bg-slate-50/50 hover:bg-brand-50/40 hover:border-brand-200/60 transition-all duration-200">

                                        <!-- Category Icon -->
                                        <div
                                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white shadow-sm border border-slate-200/60 text-brand-600 group-hover/item:bg-brand-600 group-hover/item:text-white group-hover/item:border-brand-600 transition-colors duration-200">
                                            <iconify-icon icon="lucide:{{ $category['icon'] }}"
                                                class="text-xl"></iconify-icon>
                                        </div>

                                        <!-- Category Content -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between">
                                                <h4
                                                    class="text-sm font-bold text-slate-900 group-hover/item:text-brand-600 transition-colors duration-200 truncate">
                                                    {{ $category['name'] }}
                                                </h4>
                                                <iconify-icon icon="lucide:arrow-up-right"
                                                    class="text-slate-400 group-hover/item:text-brand-600 text-sm shrink-0 transition-transform duration-200 group-hover/item:translate-x-0.5 group-hover/item:-translate-y-0.5"></iconify-icon>
                                            </div>
                                            <p class="text-xs text-slate-500 mt-1 line-clamp-1 leading-relaxed">
                                                {{ $category['short_description'] }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- how-we-works --}}
                    <a href=""
                        class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('how-we-works') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        How It Works
                    </a>
                    {{-- patners --}}
                    <a href=""
                        class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('patners') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Our Partners
                    </a>

                    {{-- contact --}}
                    <a href="{{ route('contact') }}"
                        class="relative font-medium transition-all duration-300
                            {{ request()->routeIs('contact') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                            after:absolute after:left-0 after:-bottom-1.5
                            after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        Contact Us
                    </a>


                </div>

                <div class="flex items-center gap-4 lg:gap-6">
                    <!-- Right Side -->
                    <a href="{{ route('eligibility') }}"
                        class="hidden md:flex text-sm uppercase bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-medium hover:bg-brand-600 transition">
                        Check Your Eligibility
                    </a>
                </div>
            </div>

        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-200 shadow-lg">

            <div class="flex flex-col px-6 py-5 space-y-3 text-base font-medium">
                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">About
                    Us</a>
                <a href="#"
                    class="{{ request()->routeIs('courses') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Courses</a>
                <a href="#"
                    class="{{ request()->routeIs('how-we-works') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">How
                    It Works</a>
                <a href="#"
                    class="{{ request()->routeIs('patners') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Our
                    Partners</a>
                <a href="{{ route('contact') }}"
                    class="{{ request()->routeIs('contact') ? 'text-neutral-600 font-medium' : 'text-neutral-600' }}">Contact
                    Us</a>


                <div class="flex items-center justify-between mt-6">

                    <a href="{{ route('eligibility') }}"
                        class="text-sm uppercase bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-medium hover:bg-brand-600 transition">
                        Check Your Eligibility
                    </a>

                </div>
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
