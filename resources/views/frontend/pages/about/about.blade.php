@extends('frontend.layouts.app')

@section('content')
    <!-- Main Container -->

    <!-- About Us Section -->
@include('frontend.pages.about.section')
  @include('frontend.pages.about.why')

<!-- MISSION AND VALUES -->
<section class="relative overflow-hidden bg-brand-50 py-24">
    <div class="pointer-events-none absolute top-0 left-1/2 h-64 w-64 -tranbrand-x-1/2 rounded-full bg-brand-100/40 blur-3xl"></div>
    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <p class="mb-3 text-sm font-semibold uppercase tracking-widest text-brand-600">Our Foundation</p>
            <h2 class="text-3xl font-extrabold text-brand-900 sm:text-4xl">Our Mission</h2>
        </div>
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <div class="group relative overflow-hidden rounded-3xl border border-brand-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-tranbrand-y-2 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10">
                {{-- <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-brand-500 to-violet-500"></div> --}}
                <div class="mb-6 flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-500 to-violet-600 shadow-lg shadow-brand-500/20 transition-transform duration-300 group-hover:scale-110">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16 8l2-2"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-900">Our Mission</h3>
                </div>
                <p class="leading-relaxed text-brand-600">
                    To enable skilled individuals to achieve formal qualifications through Recognition of Prior Learning (RPL), fostering career advancement and professional recognition across Australia.
                </p>
            </div>
            <div class="group relative overflow-hidden rounded-3xl bordertransition-all duration-300 hover:-tranbrand-y-2">
              <img src="{{ asset('mission-vission.webp') }}" alt="" class="rounded-3xl">
            </div>
        </div>
    </div>
</section>



@endsection
