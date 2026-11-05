    @php
    $categories = json_decode(
        file_get_contents(resource_path('data/categories.json')),
        true
    );
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
                            {{ request()->routeIs('') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
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
                   

                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-10 hidden top-full left-0 w-210 rounded-md bg-white shadow-lg">

                        <ul class="grid grid-cols-2   px-3 py-5 text-sm font-medium normal-case"
                            aria-labelledby="dropdownHoverButton">

                            @foreach ($categories as $category)
                                <li class="max-w-[90%]">
                                    <a href="{{ route('industries.index', $category['slug']) }}"
                                        class="block w-full rounded-md p-2 normal-case text-gray-700
                           transition-colors hover:bg-gray-100 hover:text-brand-600">

                                        {{ $category['name'] }}

                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    {{-- how-we-works --}}
                    <a href="{{ route('how-we-works') }}"
                        class="relative font-medium transition-all duration-300
                        {{ request()->routeIs('how-we-works') ? 'text-brand-600 font-medium after:w-full' : 'text-neutral-600 hover:text-brand-600 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-600 after:transition-all after:duration-300">
                        How It Works
                    </a>
                    {{-- patners --}}
                    <a href="{{ route('patners') }}"
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
