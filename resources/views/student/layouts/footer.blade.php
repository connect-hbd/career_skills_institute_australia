 <!-- FOOTER -->
  <footer class="bg-slate-900 text-slate-400 pt-8 md:pt-16 pb-8 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-12">
        <div class="col-span-2">
          <div class="flex items-center space-x-2 mb-4 -mt-5">
            <div class="w-40 p-1.5">
                    <a href="/">
                        <img src="{{ asset('logo.png') }}" alt="logo" class="w-auto h-auto">
                    </a>
                </div>
          </div>
          <p class="text-[15px] text-slate-400 max-w-sm leading-relaxed mb-6">
            Connecting international students with premier educational institutions across Australia.
          </p>
          <div class="flex space-x-3">
            <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i class="fa-brands fa-facebook-f text-base"></i></a>
            <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i class="fa-brands fa-twitter text-base"></i></a>
            <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i class="fa-brands fa-instagram text-base"></i></a>
            <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i class="fa-brands fa-linkedin-in text-base"></i></a>
          </div>
        </div>

        <div>
          <h4 class="text-white text-base font-bold uppercase tracking-wider mb-4">About us</h4>
          <ul class="space-y-2 text-[15px]">
            <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition">About Us</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Book Your Appointment</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">IELTS/PTE Registration</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Claims</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Referral Program</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-white text-base font-bold uppercase tracking-wider mb-4">Quick Links</h4>
          <ul class="space-y-2 text-[15px]">
            <li><a href="{{ route('courses') }}" class="hover:text-brand-400 transition">Courses</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Scholarships</a></li>
            <li><a href="{{ route('providers') }}" class="hover:text-brand-400 transition">Universities</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Counsellors</a></li>
            <li><a href="{{ route('events')}}" class="hover:text-brand-400 transition">Events</a></li>
          </ul>
        </div>

        <div>
          <h4 class="text-white text-base font-bold uppercase tracking-wider mb-4">Resources</h4>
          <ul class="space-y-2 text-[15px]">
            <li><a href="#" class="hover:text-brand-400 transition">Australian Visa Guide</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">PR Pathway Courses</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Cost of Living Calculator</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Student Accommodation</a></li>
            <li><a href="#" class="hover:text-brand-400 transition">Careers</a></li>

          </ul>
        </div>
      </div>

      <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center text-[15px] text-slate-500 gap-4">
        <p class="text-center text-sm md:text-sm">© 2024 Career Skills Institute Australia. All rights reserved. Registered CRICOS Advisory Partner.</p>
        <div class="flex space-x-6 text-sm">
          <a href="{{ route('privacy-policy')}}" class="hover:text-slate-300">Privacy Policy</a>
          <a href="{{ route('terms-conditions')}}" class="hover:text-slate-300">Terms of Service</a>
          <a href="{{ route('contact')}}" class="hover:text-slate-300">Contact Us</a>
        </div>
      </div>
    </div>
  </footer>

      <script>
        (function() {
            const html = document.documentElement;
            html.classList.add('scroll-smooth');

            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const revealBaseClasses = ['opacity-0', 'translate-y-10', 'translate-x-10', '-translate-x-10',
                'scale-95'
            ];
            const revealShownClasses = ['opacity-100', 'translate-y-0', 'translate-x-0', 'scale-100'];

            const revealElement = (el) => {
                el.classList.remove(...revealBaseClasses);
                el.classList.add(...revealShownClasses);
            };

            const isElementInView = (el, offset = 0.12) => {
                const rect = el.getBoundingClientRect();
                const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
                return rect.top <= viewportHeight * (1 - offset) && rect.bottom >= 0;
            };

            const initRevealAnimations = () => {
                const revealEls = document.querySelectorAll('.reveal-on-scroll');
                if (!revealEls.length) return;

                if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                    revealEls.forEach(revealElement);
                    return;
                }

                revealEls.forEach((el) => {
                    if (isElementInView(el, 0.08)) {
                        revealElement(el);
                    }
                });

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        revealElement(entry.target);
                        observer.unobserve(entry.target);
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -10% 0px'
                });

                revealEls.forEach((el) => {
                    if (el.classList.contains('opacity-100')) return;
                    observer.observe(el);
                });
            };

            const onReady = () => {
                html.classList.add('scroll-smooth');
                initRevealAnimations();
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', onReady, {
                    once: true
                });
            } else {
                onReady();
            }

            window.addEventListener('pageshow', function(event) {
                if (!event.persisted) return;
                document.querySelectorAll('.reveal-on-scroll').forEach((el) => {
                    if (isElementInView(el, 0.1) || prefersReducedMotion) {
                        revealElement(el);
                    }
                });
            });
        })();
    </script>
