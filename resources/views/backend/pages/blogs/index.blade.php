@extends('backend.layouts.app')

@section('content')
    <div class="">

          @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="fixed top-3 right-5 z-[99999] w-full max-w-sm">
                <div class="relative">
                    <button @click="show = false" class="absolute top-3 right-3 z-10 text-neutral-500 hover:text-neutral-700">
                        ✕
                    </button>

                    <x-ui.alert variant="success" title="" message="{{ session('success') }}" />
                </div>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-neutral-800 dark:text-white/90">Blog Management</h3>
                <p class="text-sm text-neutral-500 dark:text-neutral-400">Manage Meta tags, Open Graph, and Schema for all routes.
                </p>
            </div>
            <a href="{{ role_route('role.blogs.create') }}"
                class="px-4 py-2 bg-brand-600 text-white rounded-lg text-sm font-medium hover:bg-brand-600 transition-colors">
                + Add New Blog
            </a>
        </div>
       @include('backend.pages.blogs.table', ['items' => $blogs])
    </div>
@endsection
