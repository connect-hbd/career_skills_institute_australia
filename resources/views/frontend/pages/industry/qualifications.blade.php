@extends('frontend.layouts.app')


@section('content')
 @include('frontend.pages.industry.hero')


    {{-- MAIN QUALIFICATIONS SECTION --}}
    <section id="courses" class="  py-12 md:py-16">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- SECTION HEADER --}}
            <div class="mb-10 space-y-6">

                <div class="mb-8 flex flex-col gap-3">

                    <span class="text-xs font-semibold uppercase tracking-wider text-brand-500">
                        Explore Qualifications
                    </span>

                    <div class="flex flex-col gap-2">

                        <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 md:text-3xl">
                            Nationally Recognised Training Pathways
                        </h2>

                        <p class="text-sm text-slate-600">
                            Filter by qualification tier to find the right entry-level or advanced training path for your
                            career goals.
                        </p>

                    </div>

                </div>




                {{-- FILTER + QUALIFICATIONS --}}
              @include('frontend.pages.industry.industry-filter')

            </div>

        </div>

    </section>
@endsection
