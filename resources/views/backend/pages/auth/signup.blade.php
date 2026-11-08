@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div
        class="relative min-h-screen overflow-y-auto bg-neutral-100 bg-cover bg-center dark:bg-neutral-950"
        style="background-image: url('{{ asset('frontend-img/reg-bg.webp') }}');"
    >

        <!-- Background Overlay -->
        <div class="absolute inset-0 z-0 bg-black/78  dark:bg-neutral-950/80"></div>

        <!-- Main Content -->
        <div class="relative z-10 flex min-h-screen w-full items-center justify-center px-3 py-4 sm:px-6 sm:py-6">


            <!-- Form Card -->
            <div
                class="w-full max-w-xl rounded-xl border border-neutral-200 bg-white p-4 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 sm:p-6 md:p-7">

                <!-- Header -->
                <div class="mb-8 text-center sm:mb-10">
                    <h1
                        class="text-xl font-bold uppercase tracking-tight text-neutral-800 dark:text-white sm:text-2xl md:text-3xl">
                        Register for Career Skills Institute Australia
                    </h1>

                    <p class="mt-1.5 text-xs text-neutral-500 dark:text-neutral-400 sm:text-sm">
                        Enter your information to get started!
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

                    <!-- Google -->
                    <a href="#"
                        class="flex h-11 items-center justify-center gap-2.5 rounded-lg border border-neutral-300 bg-white px-4 text-sm font-medium text-neutral-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21.805 10.041H12v3.917h5.638c-.605 2.0-2.298 3.492-5.638 3.492-3.395 0-6.155-2.81-6.155-6.275S8.605 8.9 12 8.9c1.56 0 2.613.66 3.213 1.217l2.63-2.56C16.15 6.13 14.29 5.2 12 5.2c-4.99 0-9.03 4.04-9.03 9.02s4.04 9.03 9.03 9.03c5.21 0 8.67-3.66 8.67-8.8 0-.59-.065-1.04-.145-1.41Z"
                                fill="#4285F4" />
                            <path
                                d="M12 23.25c2.29 0 4.21-.755 5.61-2.05l-2.63-2.56c-.73.49-1.67.81-2.98.81-3.34 0-5.03-2.02-5.64-4.73H3.64v2.63C5.04 20.43 8.21 23.25 12 23.25Z"
                                fill="#34A853" />
                            <path d="M6.36 14.72a5.43 5.43 0 0 1 0-3.45V8.64H3.64a9.02 9.02 0 0 0 0 8.72l2.72-2.64Z"
                                fill="#FBBC05" />
                            <path
                                d="M12 8.9c1.47 0 2.78.51 3.81 1.51l2.85-2.85C16.2 6.04 14.28 5.2 12 5.2c-3.79 0-6.96 2.82-8.36 6.56l2.72 2.63C6.97 11.68 8.66 8.9 12 8.9Z"
                                fill="#EA4335" />
                        </svg>

                        Continue with Google
                    </a>

                    <!-- Facebook -->
                    <a href="#"
                        class="flex h-11 items-center justify-center gap-2.5 rounded-lg border border-neutral-300 bg-white px-4 text-sm font-medium text-neutral-700 transition hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M24 12C24 5.373 18.627 0 12 0S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.356c0-3.008 1.792-4.669 4.533-4.669 1.312 0 2.686.234 2.686.234v2.953h-1.513c-1.49 0-1.955.925-1.955 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 22.954 24 17.99 24 12Z" />
                        </svg>

                        Continue with Facebook
                    </a>

                </div>

                <!-- Divider -->
                <div class="mt-8 md:mt-10 mb-6 flex items-center gap-3">
                    <div class="h-px flex-1 bg-neutral-200 dark:bg-neutral-800"></div>

                    <span class="text-xs text-neutral-400">
                        OR CONTINUE WITH EMAIL
                    </span>

                    <div class="h-px flex-1 bg-neutral-200 dark:bg-neutral-800"></div>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="space-y-4">

                        <!-- Name -->
                        <x-form.input-text name="name" label="Full Name" placeholder="Enter Full Name..." required />

                        <!-- Email -->
                        <x-form.input-text name="email" label="Email Address" placeholder="Enter Email..." required />

                        <!-- Phone -->
                        <x-form.input-text name="phone" label="Phone No" placeholder="Enter Phone No..." required />

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                            <!-- Password -->
                            <x-form.input-text id="password" type="password" name="password" label="Password"
                                placeholder="Enter Password..." required />

                            <!-- Confirm Password -->
                            <x-form.input-text id="password_confirmation" type="password" name="password_confirmation"
                                label="Confirm Password" placeholder="Enter Confirm Password..." required />

                        </div>
                        {{-- <div class="flex flex-col gap-1">
                            <!-- Google reCAPTCHA -->
                            <div class="flex justify-center overflow-hidden">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                    data-theme="light">
                                </div>
                            </div>

                            @error('g-recaptcha-response')
                                <p class="mt-2 text-center text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div> --}}

                        <!-- Terms -->
                        <div>
                            <div x-data="{ checkboxToggle: false }">
                                <label for="checkboxLabelOne"
                                    class="flex cursor-pointer items-start text-xs text-neutral-500 select-none dark:text-neutral-400 sm:text-sm">

                                    <div class="relative shrink-0">
                                        <input type="checkbox" id="checkboxLabelOne" class="sr-only"
                                            @change="checkboxToggle = !checkboxToggle" />

                                        <div :class="checkboxToggle
                                            ?
                                            'border-brand-500 bg-brand-500' :
                                            'border-neutral-300 bg-transparent dark:border-neutral-700'"
                                            class="mr-2.5 flex h-5 w-5 items-center justify-center rounded-md border">

                                            <span :class="checkboxToggle ? '' : 'opacity-0'">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white"
                                                        stroke-width="1.94437" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <p class="leading-5">
                                        By creating an account means you agree to the
                                        <span class="text-neutral-800 dark:text-white/90">
                                            Terms and Conditions,
                                        </span>
                                        and our
                                        <span class="text-neutral-800 dark:text-white">
                                            Privacy Policy
                                        </span>
                                    </p>
                                </label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="flex h-11 w-full items-center justify-center rounded-lg bg-brand-500 px-4 text-sm font-medium text-white shadow-sm transition hover:bg-brand-600 sm:h-12">
                            Sign Up
                        </button>

                    </div>
                </form>

                <!-- Login -->
                <div class="mt-5 border-t border-neutral-200 pt-4 dark:border-neutral-800 sm:mt-6 sm:pt-5">
                    <p class="text-center text-xs text-neutral-600 dark:text-neutral-400 sm:text-sm">
                        Already have an account?

                        <a href="{{ route('login') }}"
                            class="ml-1 font-medium text-brand-500 hover:text-brand-600 dark:text-brand-400">
                            Sign In
                        </a>
                    </p>
                </div>

            </div>
        </div>

        <!-- Theme Toggle -->
        <div class="fixed bottom-4 right-4 z-50 sm:bottom-6 sm:right-6 hidden md:block">
            <button
                class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-brand-500 text-white shadow-md transition hover:bg-brand-600 sm:h-14 sm:w-14"
                @click.prevent="$store.theme.toggle()">

                <svg class="hidden fill-current dark:block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6885 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z" />
                </svg>

                <svg class="fill-current dark:hidden" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z" />
                </svg>
            </button>
        </div>

    </div>
    {{-- @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush --}}
@endsection
