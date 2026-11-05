 <!-- FOOTER -->
 <footer class="bg-slate-900 text-slate-400 pt-8 md:pt-16 pb-8 border-t border-slate-800">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-12">
             <div class="col-span-2">
                 <div class="flex items-center space-x-2 mb-4 -mt-5">
                     <div class=" p-1.5">
                         <a href="/" class="text-white text-3xl">
                             Career Skills Institute
                         </a>
                     </div>
                 </div>
                 <p class="text-[15px] text-slate-400 max-w-sm leading-relaxed mb-6">
                     <span class="font-bold"> Empower Your Career Through Recognition</span><br>

                     Turn your valuable work experience into nationally recognized qualifications with Career Skills Institute
                     Education—no traditional study required. Get qualified, save time, and advance your career with
                     confidence.
                 </p>

             </div>

             <div>
                 <h4 class="text-white text-base font-bold uppercase tracking-wider mb-4">About us</h4>
                 <ul class="space-y-2 text-[15px]">
                     <li><a href="{{ route('about') }}" class="hover:text-brand-400 transition">About Us</a></li>
                     <li><a href="{{ route('faqs') }}" class="hover:text-brand-400 transition">FAQs</a></li>
                     <li><a href="{{ route('patners') }}" class="hover:text-brand-400 transition">Our Partners</a></li>
                     <li><a href="{{ route('terms-conditions')}}" class="hover:text-brand-400 transition">Terms and Conditions</a></li>
                     <li><a href="{{ route('privacy-policy') }}" class="hover:text-brand-400 transition">Privacy Policy</a></li>
                 </ul>
             </div>

             <div>
                 <h4 class="text-white text-base font-bold uppercase tracking-wider mb-4">Quick Links</h4>
                 <ul class="space-y-2 text-[15px]">
                     <li><a href="#" class="hover:text-brand-400 transition">Early Childhood
                             Care</a></li>
                     <li><a href="#" class="hover:text-brand-400 transition">Individual Support</a>
                     </li>
                     <li><a href="#" class="hover:text-brand-400 transition">Community Service</a>
                     </li>
                     <li><a href="#" class="hover:text-brand-400 transition">Construction &
                             Trade</a></li>
                     <li><a href="#" class="hover:text-brand-400 transition">Tourism, Travel and
                             Hospitality</a></li>
                 </ul>
             </div>

             <div>
                 <h4 class="text-white text-base font-bold uppercase tracking-wider mb-4">Get In Touch</h4>
                 <ul class="space-y-2 text-[15px]">
                     <li><a href="#" class="hover:text-brand-400 transition">Museum Tower, 603/267-277 Castlereagh
                             St, Sydney NSW 2000, Australia</a></li>
                     <li><a href="#" class="hover:text-brand-400 transition">+61 405 106 199</a></li>
                     <li><a href="#" class="hover:text-brand-400 transition">info@csi.com</a></li>

                 </ul>
                 <div class="flex space-x-3 mt-3">
                     <a href="#"
                         class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i
                             class="fa-brands fa-facebook-f text-base"></i></a>
                     <a href="#"
                         class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i
                             class="fa-brands fa-twitter text-base"></i></a>
                     <a href="#"
                         class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i
                             class="fa-brands fa-instagram text-base"></i></a>
                     <a href="#"
                         class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center text-slate-400 hover:bg-brand-600 hover:text-white transition"><i
                             class="fa-brands fa-linkedin-in text-base"></i></a>
                 </div>
             </div>
         </div>

         <div
             class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center text-[15px] text-slate-500 gap-4">
             <p class="text-center text-xs md:text-sm">© 2026 Career Skills Institute. All rights reserved. Registered
                 CRICOS Advisory Partner.</p>
             <div class="flex space-x-6 text-sm">
                 <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                 <a href="#" class="hover:text-slate-300">Terms of Service</a>
                 <a href="#" class="hover:text-slate-300">Contact Us</a>
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
