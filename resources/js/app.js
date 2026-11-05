import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

let homeSwiperLoadPromise = null;
let flatpickrLoadPromise = null;

window.loadFlatpickr = function () {
    if (!flatpickrLoadPromise) {
        flatpickrLoadPromise = Promise.all([
            import('flatpickr'),
            import('flatpickr/dist/flatpickr.min.css'),
        ]).then(([flatpickrModule]) => flatpickrModule.default);
    }

    return flatpickrLoadPromise;
};

async function initHomepageSwipers() {
    if (homeSwiperLoadPromise) {
        return homeSwiperLoadPromise;
    }

    homeSwiperLoadPromise = Promise.all([
        import('swiper'),
        import('swiper/modules'),
        import('swiper/css'),
    ]).then(([swiperModule, modulesModule]) => {
        const Swiper = swiperModule.default;
        const { Autoplay } = modulesModule;

        const configs = [
            ['.myCounsellerSwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 24,
                speed: 600,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 1, spaceBetween: 24 },
                    768: { slidesPerView: 2, spaceBetween: 24 },
                    1024: { slidesPerView: 3, spaceBetween: 24 },
                },
            }],
            ['.testimonialSwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 24,
                speed: 600,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 1, spaceBetween: 24 },
                    768: { slidesPerView: 2, spaceBetween: 24 },
                    1024: { slidesPerView: 2, spaceBetween: 24 },
                },
            }],
        ];

        configs.forEach(([selector, options]) => {
            document.querySelectorAll(selector).forEach((el) => {
                if (el.dataset.swiperReady === 'true') {
                    return;
                }

                el.dataset.swiperReady = 'true';
                new Swiper(el, {
                    modules: [Autoplay],
                    ...options,
                });
            });
        });
    });

    return homeSwiperLoadPromise;
}

window.initHomepageSwipers = initHomepageSwipers;

document.addEventListener('DOMContentLoaded', function () {
    const swiperTargets = document.querySelectorAll('.myCounsellerSwiper, .testimonialSwiper');

    if (!swiperTargets.length) {
        return;
    }

    const startSwipers = () => {
        void initHomepageSwipers();
    };

    if (!('IntersectionObserver' in window)) {
        startSwipers();
        return;
    }

    const observer = new IntersectionObserver((entries, io) => {
        if (entries.some((entry) => entry.isIntersecting)) {
            io.disconnect();
            startSwipers();
        }
    }, {
        rootMargin: '250px 0px',
        threshold: 0.01,
    });

    swiperTargets.forEach((el) => observer.observe(el));
});
