    <section aria-label="Why Choose Us" class=" py-20 lg:py-24">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mx-auto mb-12 max-w-3xl text-center">

                <span
                    class="inline-flex rounded-full bg-brand-50 px-4 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-brand-600">
                    Why We're Different
                </span>

                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                    Why Choose
                    <span class="text-brand-500">
                        Career Skills Institute?
                    </span>
                </h2>

                <div class="mx-auto mt-4 h-1 w-14 rounded-full bg-brand-500"></div>

                <p class="mt-5 text-sm leading-7 text-slate-600">
                    We deliver the quickest, most transparent, and fully accredited pathway to achieving your nationally
                    recognized qualification.
                </p>

            </div>


            @php
                $benefits = [
                    [
                        'title' => 'Swift and Stellar',
                        'text' =>
                            "Experience the galaxy's quickest Recognition of Prior Learning services with rapid turnaround.",
                        'icon' =>
                            '<path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'Convenience at Your Fingertips',
                        'text' =>
                            'Simply submit and email your documents; our team handles the compliance and paperwork for you.',
                        'icon' =>
                            '<path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'No Classroom Required',
                        'text' =>
                            'Forget the hassle of attending physical classes; our assessment process is conducted entirely remotely.',
                        'icon' =>
                            '<path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'Secure and Dependable',
                        'text' =>
                            'Our process is rigorous, compliant, and backed by registered RTO partners across Australia.',
                        'icon' =>
                            '<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'Elite Expertise',
                        'text' =>
                            'Our top-tier qualified assessors guide you through each piece of portfolio evidence smoothly.',
                        'icon' =>
                            '<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'Prestigious & Accredited',
                        'text' =>
                            'Receive a genuine, nationally recognized qualification accepted by Australian employers and authorities.',
                        'icon' =>
                            '<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'Exceptional Value',
                        'text' =>
                            'Achieve the best certifications at affordable and competitive pricing with flexible payment plans.',
                        'icon' =>
                            '<path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                    [
                        'title' => 'Career Catalyst',
                        'text' =>
                            'Elevate your career prospects and licensing options. #Get_Certified for a brighter future.',
                        'icon' =>
                            '<path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>',
                    ],
                ];
            @endphp


            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($benefits as $benefit)
                    <article
                        class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-md">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-500">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $benefit['icon'] !!}
                            </svg>

                        </div>

                        <h3 class="mt-5 text-base font-extrabold text-slate-900">
                            {{ $benefit['title'] }}
                        </h3>

                        <p class="mt-2 text-xs leading-6 text-slate-600">
                            {{ $benefit['text'] }}
                        </p>

                        <div class="mt-5 h-0.5 w-8 rounded-full bg-brand-500"></div>

                    </article>
                @endforeach

            </div>

        </div>
    </section>