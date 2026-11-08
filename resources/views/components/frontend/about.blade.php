<div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        <!-- Left Content -->
        <div class="flex flex-col items-center justify-center md:block">
            <div>
                <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-neutral-900 tracking-tight">About Us</h1>
            </div>

            <div class="text-sm lg:text-base text-neutral-600 leading-relaxed mt-3 md:mt-5 text-center md:text-left">
                <p class="">Career Skills Institute Australia is an Australia based, cutting – edge, accredited vocational education
                    provider. We offer courses in Leadership, Business and Information Technology with all our
                    qualifications focusing on workplace knowledge and practical skills that increase employability.
                    This work inspires the public to pay attention to social issues.Our students come from a diverse
                    background. Career Skills Institute Australia offers our students an opportunity to make great friends and learn from our
                    industry – expert trainers in an engaging classroom environment.</p>
            </div>

            <!-- Icons Section -->
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 mt-6 md:mt-10">
                <!-- Qualified Trainers -->
                <div class="flex flex-col items-center md:items-start justify-center md:justify-items-start">

                    <div class="flex gap-3 items-center mb-3">
                        <div
                            class="shrink-0 md:w-12 md:h-12 w-8 h-8 bg-brand-500 rounded-2xl flex items-center justify-center text-brand-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus-icon lucide-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                        </div>
                        <h3 class="font-semibold text-base lg:text-lg text-neutral-900">Qualified Trainers</h3>
                    </div>
                    <div>
                        <p class="text-sm lg:text-base text-neutral-600 text-center md:text-left">Career Skills Institute Australia work with world class trainers to help
                            students with their career aspirations & provide excellent environment to learn.</p>
                    </div>
                </div>

                <!-- CRICOS Registered -->
                <div class="flex flex-col items-center md:items-start justify-center md:justify-items-start">

                    <div class="flex gap-3 items-center mb-3">
                        <div
                            class="shrink-0 md:w-12 md:h-12 w-8 h-8 bg-brand-500 rounded-2xl flex items-center justify-center text-brand-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-gem-icon lucide-gem"><path d="M10.5 3 8 9l4 13 4-13-2.5-6"/><path d="M17 3a2 2 0 0 1 1.6.8l3 4a2 2 0 0 1 .013 2.382l-7.99 10.986a2 2 0 0 1-3.247 0l-7.99-10.986A2 2 0 0 1 2.4 7.8l2.998-3.997A2 2 0 0 1 7 3z"/><path d="M2 9h20"/></svg>
                        </div>
                        <h3 class="font-semibold text-base lg:text-lg text-neutral-900">CRICOS Registered</h3>
                    </div>
                    <div>
                        <p class="text-sm lg:text-base text-neutral-600 text-center md:text-left">Career Skills Institute Australia is registered on the Commonwealth
                            Register of Institutions and Courses for Overseas Students (CRICOS).</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('about') }}"
                class=" mt-8 lg:mt-10 inline-flex items-center justify-center bg-brand-600 text-white px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg  hover:bg-brand-500
                        transition duration-300">
                About Career Skills Institute Australia
            </a>
        </div>

        <!-- Right Image -->
        <div class="relative">
            <div class="rounded-3xl overflow-hidden shadow-2xl">
                <img src="{{ asset('penta-img/about.jpg') }}" alt="Career Skills Institute Australia students collaborating"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </div>

</div>
