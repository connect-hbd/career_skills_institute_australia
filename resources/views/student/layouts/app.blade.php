<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{-- <title>{{ $title }}</title> --}}
    <x-frontend.seo-meta />
    <link rel="stylesheet" href="{{ asset('css/front-end-custom.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Theme Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('theme', {
                init() {
                    const savedTheme = localStorage.getItem('theme');
                    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' :
                        'light';
                    this.theme = savedTheme || systemTheme;
                    this.updateTheme();
                },
                theme: 'light',
                toggle() {
                    this.theme = this.theme === 'light' ? 'dark' : 'light';
                    localStorage.setItem('theme', this.theme);
                    this.updateTheme();
                },
                updateTheme() {
                    const html = document.documentElement;
                    const body = document.body;
                    if (this.theme === 'dark') {
                        html.classList.add('dark');
                        body.classList.add('dark', 'bg-neutral-900');
                    } else {
                        html.classList.remove('dark');
                        body.classList.remove('dark', 'bg-neutral-900');
                    }
                }
            });

            Alpine.store('sidebar', {
                // Initialize based on screen size
                isExpanded: window.innerWidth >= 1140, // true for desktop, false for mobile
                isMobileOpen: false,
                isHovered: false,

                toggleExpanded() {
                    this.isExpanded = !this.isExpanded;
                    // When toggling desktop sidebar, ensure mobile menu is closed
                    this.isMobileOpen = false;
                },

                toggleMobileOpen() {
                    this.isMobileOpen = !this.isMobileOpen;
                    // Don't modify isExpanded when toggling mobile menu
                },

                setMobileOpen(val) {
                    this.isMobileOpen = val;
                },

                setHovered(val) {
                    // Only allow hover effects on desktop when sidebar is collapsed
                    if (window.innerWidth >= 1140 && !this.isExpanded) {
                        this.isHovered = val;
                    }
                }
            });
        });
    </script>

    <!-- Apply dark mode immediately to prevent flash -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            const theme = savedTheme || systemTheme;
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                document.body.classList.add('dark', 'bg-neutral-900');
            } else {
                document.documentElement.classList.remove('dark');
                // document.body.classList.remove('dark', 'bg-neutral-900');
            }
        })();
    </script>
</head>

<body class="min-h-screen flex flex-col">

    @include('student.layouts.navbar')

    <main class="grow">
        <div class="pt-18 md:pt-20 pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 lg:gap-6">

                    <aside class="hidden lg:col-span-3 lg:block">

                        @include('student.layouts.sidebar')

                    </aside>

                    <main class="lg:col-span-9">
                        <div class="">
                            @yield('content')
                        </div>
                    </main>

                </div>
            </div>

        </div>
    </main>

    @include('student.layouts.footer')
    @include('frontend.layouts.mobile-navigation')

    @stack('scripts')
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>

</body>

</html>
