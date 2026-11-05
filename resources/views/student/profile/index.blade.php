@extends('student.layouts.app')

@section('content')
    <div class="py-5">

        {{-- Flash success --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="mb-6 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4">
                <svg class="mt-0.5 h-5 w-5 flex-shrink-0 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>

                <p class="text-sm text-green-800">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        <div class="bg-white dark:bg-neutral-900 rounded-2xl shadow-xs border border-neutral-200/80 dark:border-neutral-800 overflow-hidden">

            <div class="px-6 py-5 border-b border-neutral-100 dark:border-neutral-800 flex items-center gap-3.5">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600 dark:bg-brand-950/50 dark:text-brand-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-neutral-900 dark:text-white">Account Profile</h2>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 mt-0.5">Manage your personal settings, contact info, and security parameters</p>
                </div>
            </div>

            <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
                @csrf
                @method('PUT')

                <div class="grid lg:grid-cols-12 gap-8">

                    <div class="lg:col-span-4 flex flex-col items-center border-b lg:border-b-0 lg:border-r border-neutral-100 dark:border-neutral-800 pb-8 lg:pb-0 lg:pr-8">
                        <span class="block mb-4 text-xs font-bold tracking-wider text-neutral-400 dark:text-neutral-500 uppercase self-start sm:self-center lg:self-start">
                            Profile Picture
                        </span>
                        
                        <div class="flex flex-col items-center">
                            <label class="relative group cursor-pointer">
                                <div class="relative w-36 h-36 rounded-2xl overflow-hidden ring-4 ring-neutral-100 dark:ring-neutral-800 group-hover:ring-brand-500/20 transition-all duration-300 shadow-md">
                                    <img id="avatarPreview"
                                        src="{{ $user->avatar ? asset($user->avatar) : asset('images/user/owner.png') }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        alt="User Profile" />

                                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-neutral-900/60 backdrop-blur-xs opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <svg class="w-6 h-6 text-white mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="text-white text-xs font-semibold">Update Photo</span>
                                    </div>
                                </div>

                                <div class="absolute -bottom-1 -right-1 flex h-9 w-9 items-center justify-center rounded-xl bg-brand-600 text-white shadow-md ring-2 ring-white dark:ring-neutral-900 group-hover:bg-brand-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>

                                <input type="file" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(event)">
                            </label>

                            <p class="mt-4 text-center text-xs text-neutral-400 dark:text-neutral-500">
                                Accepted formats: <span class="font-medium text-neutral-600 dark:text-neutral-400">PNG, JPG, GIF</span><br>Max file size: <span class="font-medium text-neutral-600 dark:text-neutral-400">2MB</span>
                            </p>

                            @error('avatar')
                                <p class="text-rose-500 text-xs font-medium mt-2.5 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="lg:col-span-8 space-y-8">

                        <div>
                            <div class="flex items-center gap-2 border-b border-neutral-100 dark:border-neutral-800 pb-3 mb-5">
                                <svg class="w-4 h-4 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 012-2h2a2 2 0 012 2v1m-6 0h6" />
                                </svg>
                                <h3 class="text-xs font-bold text-neutral-900 dark:text-white uppercase tracking-wider">
                                    Personal Details
                                </h3>
                            </div>

                            <div class="grid md:grid-cols-2 gap-5">

                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                        Full Name
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700/80 text-xs font-medium text-neutral-800 dark:text-neutral-200 placeholder-neutral-400 focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                            placeholder="John Doe">
                                    </div>
                                    @error('name')
                                        <p class="text-rose-500 text-xs font-medium mt-1.5 flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                        Phone Number
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700/80 text-xs font-medium text-neutral-800 dark:text-neutral-200 placeholder-neutral-400 focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                            placeholder="+1 (555) 000-0000">
                                    </div>
                                    @error('phone')
                                        <p class="text-rose-500 text-xs font-medium mt-1.5 flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                        Email Address
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                            </svg>
                                        </div>
                                        <input type="email" value="{{ $user->email }}" readonly
                                            class="w-full pl-10 pr-24 py-2.5 rounded-xl border border-neutral-200/80 bg-neutral-100/60 dark:bg-neutral-800/80 dark:border-neutral-700 text-xs font-medium text-neutral-500 dark:text-neutral-400 cursor-not-allowed selection:bg-none"
                                            placeholder="student@example.com">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-semibold bg-neutral-200/60 text-neutral-600 dark:bg-neutral-700 dark:text-neutral-300">
                                                <svg class="w-3 h-3 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                                Locked
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-[11px] text-neutral-400">Email addresses are tied to authentication and cannot be changed manually.</p>
                                </div>

                            </div>
                        </div>

                        <div>
                            <div class="flex items-center gap-2 border-b border-neutral-100 dark:border-neutral-800 pb-3 mb-5">
                                <svg class="w-4 h-4 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <h3 class="text-xs font-bold text-neutral-900 dark:text-white uppercase tracking-wider">
                                    Security & Credentials
                                </h3>
                            </div>

                            <div class="grid md:grid-cols-2 gap-5">

                                <div class="md:col-span-2">
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                        Current Password
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="current_password"
                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700/80 text-xs font-medium text-neutral-800 dark:text-neutral-200 placeholder-neutral-400 focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                            placeholder="••••••••••••">
                                    </div>
                                    @error('current_password')
                                        <p class="text-rose-500 text-xs font-medium mt-1.5 flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                        New Password
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="password"
                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700/80 text-xs font-medium text-neutral-800 dark:text-neutral-200 placeholder-neutral-400 focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                            placeholder="Minimum 8 characters">
                                    </div>
                                    @error('password')
                                        <p class="text-rose-500 text-xs font-medium mt-1.5 flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block mb-1.5 text-xs font-semibold text-neutral-700 dark:text-neutral-300">
                                        Confirm New Password
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-neutral-400">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <input type="password" name="password_confirmation"
                                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-neutral-200 bg-neutral-50/30 dark:bg-neutral-800/40 dark:border-neutral-700/80 text-xs font-medium text-neutral-800 dark:text-neutral-200 placeholder-neutral-400 focus:bg-white dark:focus:bg-neutral-900 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all"
                                            placeholder="Re-enter new password">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-neutral-100 dark:border-neutral-800">
                            <button type="button" onclick="window.location.reload()"
                                class="px-4 py-2.5 rounded-xl text-xs font-semibold text-neutral-600 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors">
                                Reset Form
                            </button>
                            
                            <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-brand-600 text-white text-xs font-bold shadow-xs hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 active:scale-[0.98] transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Save Changes
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <script>
            function previewAvatar(event) {
                const preview = document.getElementById('avatarPreview');
                if (event.target.files && event.target.files[0]) {
                    preview.src = URL.createObjectURL(event.target.files[0]);
                }
            }
        </script>

    </div>
@endsection