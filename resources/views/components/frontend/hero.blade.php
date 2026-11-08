<div class="max-w-7xl mx-auto px-5 lg:px-8">
  
    <div class="flex flex-col md:flex-row items-center gap-10 lg:gap-16 pt-5 md:pt-0">

        <!-- Content -->
        <div class="w-full lg:w-1/2">
            <div class="relative overflow-hidden">

                <!-- Decorative Background -->
                <div
                    class="absolute top-0 right-0 w-20 h-20 lg:w-30 lg:h-30 bg-no-repeat opacity-10"
                    style="
                        background-image:url('https://pentagoncollege.edu.au/wp-content/uploads/2023/07/educator-img4.png');
                        background-size:contain;
                        background-position:center;
                    ">
                </div>

                <div class="relative z-10 flex flex-col items-center justify-center md:block">
                    <h1 class="text-white font-bold leading-tight
                        text-2xl md:text-3xl lg:text-5xl text-center md:text-left">
                        Unlock Your Potential,
                        <br>
                        Shape Your Future!
                    </h1>

                    <p class="text-white/90 text-sm sm:text-base lg:text-lg mt-5 mb-8 lg:mb-12 leading-relaxed text-center md:text-left">
                        Career Skills Institute Australia offers a range of
                        industry-relevant courses which includes Advanced Diploma
                        of Information Technology, Advanced Diploma of Leadership
                        and Management, Diploma of Information Technology,
                        Diploma of Leadership and Management, and Graduate
                        Diploma of Management (Learning).
                    </p>

                    <a href="{{ route('courses') }}"
                        class="inline-flex items-center justify-center
                        bg-brand-600 text-white
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500
                        transition duration-300">
                        Our Courses
                    </a>
                </div>
            </div>
        </div>

        <!-- Image -->
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
            <div class="relative max-w-md lg:max-w-xl">

                <!-- Background Shape -->
                <img
                    src="https://pentagoncollege.edu.au/wp-content/uploads/2023/07/educator-img2.png"
                    alt=""
                    class="absolute inset-0 w-full h-full object-contain opacity-30">

                <!-- Main Image -->
                <img
                    src="{{ asset('penta-img/educator-img33.png') }}"
                    alt="Educator"
                    class="relative z-10 w-full h-auto">
            </div>
        </div>

    </div>

</div>
