@extends('student.layouts.app')

@section('content')
    <div class="pt-5">

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

     @include('student.profile.step-form.personal-information')
     @include('student.profile.step-form.academic-information')
     @include('student.profile.step-form.study-plan')
     @include('student.profile.step-form.experience-achievements')
     @include('student.profile.step-form.immigration-history')
     @include('student.profile.step-form.visa-documents-checklist')
    </div>
@endsection
