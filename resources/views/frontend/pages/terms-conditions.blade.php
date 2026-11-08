@extends('frontend.layouts.app')

@section('content')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

        <header class="mx-auto max-w-4xl pb-8 text-center lg:pb-10">
            {{-- Badge --}}
            <div
                class="mb-6 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1.5 text-xs font-semibold text-brand-700 shadow-sm">

                <span class="relative flex h-2 w-2">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-50"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                </span>

                Legal Terms & Policies

            </div>
            {{-- Heading --}}
            <h1 class="text-2xl sm:text-3xl font-bold tracking-[-0.035em] text-neutral-950 md:text-4xl lg:text-5xl uppercase">

                Terms and Conditions

            </h1>


            {{-- Description --}}
            <p class="mx-auto mt-5 max-w-2xl text-sm text-neutral-500 sm:text-base">

                Please review these Terms carefully before utilizing the services and operations offered by Career Skills Institute Australia
                Education
                Services.

            </p>

        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <aside class="lg:col-span-4 space-y-6">
    <div
        class="space-y-5 sticky top-24"
        x-data="{
            activeSection: 'section-1',

            sections: [
                { id: 'section-1', label: 'Introduction' },
                { id: 'section-2', label: 'About Us' },
                { id: 'section-3', label: 'Services' },
                { id: 'section-4', label: 'Fees & Payments' },
                { id: 'section-5', label: 'Refund Policy' },
                { id: 'section-6', label: 'Client Responsibilities' },
                { id: 'section-7', label: 'RTO Partnership' },
                { id: 'section-8', label: 'Disclaimer' },
                { id: 'section-9', label: 'Liability' },
                { id: 'section-10', label: 'Privacy' },
                { id: 'section-11', label: 'Intellectual Property' },
                { id: 'section-12', label: 'Amendments' },
                { id: 'section-13', label: 'Governing Law' },
                { id: 'section-14', label: 'Contact Us' }
            ],

            init() {
                const observer = new IntersectionObserver(
                    (entries) => {
                        const visibleSections = entries
                            .filter(entry => entry.isIntersecting)
                            .sort((a, b) => {
                                return a.boundingClientRect.top - b.boundingClientRect.top;
                            });

                        if (visibleSections.length) {
                            this.activeSection = visibleSections[0].target.id;
                        }
                    },
                    {
                        root: null,
                        rootMargin: '-120px 0px -55% 0px',
                        threshold: 0
                    }
                );

                this.sections.forEach(section => {
                    const element = document.getElementById(section.id);

                    if (element) {
                        observer.observe(element);
                    }
                });

                this.$cleanup = () => observer.disconnect();
            },

            scrollToSection(id) {
                const element = document.getElementById(id);

                if (!element) {
                    return;
                }

                this.activeSection = id;

                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                history.replaceState(null, '', '#' + id);
            }
        }"
    >

        {{-- Main Overview Card --}}
        <div
            class="overflow-hidden rounded-2xl border border-neutral-200 bg-white px-12 py-16 shadow-[0_8px_30px_rgb(16,24,40,0.04)] md:px-4 md:py-8">

            <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-4">
                On This Page
            </h2>

            <nav
                class="space-y-1 text-sm font-medium text-slate-600"
                aria-label="Table of contents"
            >

                <template x-for="(section, index) in sections" :key="section.id">

                    <a
                        href="#"
                        @click.prevent="scrollToSection(section.id)"
                        :class="activeSection === section.id
                            ? 'bg-blue-50 text-blue-700 font-semibold'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-blue-600'"
                        class="group relative flex items-center rounded-lg px-3 py-2 transition-all duration-200"
                    >

                        {{-- Active Indicator --}}
                        <span
                            class="absolute left-0 top-1/2 h-5 w-0.5 -translate-y-1/2 rounded-full bg-blue-600 transition-all duration-200"
                            :class="activeSection === section.id
                                ? 'opacity-100'
                                : 'opacity-0'"
                        ></span>

                        {{-- Number --}}
                        <span
                            class="mr-2 w-5 text-xs font-semibold"
                            :class="activeSection === section.id
                                ? 'text-blue-600'
                                : 'text-slate-400 group-hover:text-blue-600'"
                            x-text="(index + 1) + '.'"
                        ></span>

                        {{-- Label --}}
                        <span x-text="section.label"></span>

                    </a>

                </template>

            </nav>

        </div>


        {{-- Security Note --}}
        <div class="rounded-2xl border border-brand-100 bg-brand-50/60 p-5">

            <div class="flex gap-3">

                <div
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-brand-600"
                >
                    <svg
                        class="h-4.5 w-4.5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z"
                        />
                    </svg>
                </div>

                <div>

                    <h3 class="text-sm font-semibold text-neutral-800">
                        Read before continuing
                    </h3>

                    <p class="mt-1 text-xs leading-5 text-neutral-500">
                        These terms govern your use of the Career Skills Institute Australia website and associated services.
                    </p>

                </div>

            </div>

        </div>

    </div>
</aside>

            <article class="min-w-0 lg:col-span-8">


                {{-- Article Surface --}}
                <div
                    class="rounded-2xl border border-neutral-200 bg-white px-5 py-8 shadow-[0_8px_30px_rgb(16,24,40,0.03)] sm:px-8 sm:py-10 lg:px-10 lg:py-12">

                    <!-- Section 1 -->
                    <section id="section-1" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 01</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            1. Introduction
                        </h2>
                        <p class="leading-relaxed">
                            Welcome to Career Skills Institute Australia (“Career Skills Institute Australia”, “we”, “us”, or “our”).
                        </p>
                        <p class="leading-relaxed">
                            By accessing or using our website, services, or consultation programs, you agree to comply with
                            and be bound by these Terms and Conditions (“Terms”).
                        </p>
                        <p class="leading-relaxed">
                            These Terms govern all services provided by Career Skills Institute Australia, including but not limited to
                            Recognition of Prior Learning consultations, qualification matching, documentation assistance,
                            and liaison with registered training organisations (RTOs).
                        </p>
                        <p class="leading-relaxed">
                            If you do not agree to these Terms, please do not use our services.
                        </p>
                    </section>

                    <!-- Section 2 -->
                    <section id="section-2" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 02</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            2. About Career Skills Institute Australia
                        </h2>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia is an independent education consultancy that provides guidance and
                            qualification consultation.
                        </p>
                        <!-- Highlight Box -->
                        <div
                            class="p-4 rounded-xl bg-amber-50 border border-amber-200/80 text-amber-900 text-sm font-medium my-3">
                            We are not an RTO (Registered Training Organisation) and do not issue qualifications directly.
                        </div>
                        <p class="leading-relaxed font-semibold text-slate-900 pt-2">
                            Career Skills Institute Australia assists individuals by:
                        </p>
                        <ul class="space-y-2 list-none pl-0">
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Assessing their work experience and skills;</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Matching them to suitable qualifications under the Australian Qualifications Framework
                                    (AQF);</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Guiding them through the documentation and evidence submission process;</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Referring them to partnered or trusted RTOs for formal assessment and
                                    certification.</span>
                            </li>
                        </ul>
                        <p class="leading-relaxed pt-2">
                            All qualifications are issued by accredited Australian RTOs, as per ASQA (Australian Skills
                            Quality Authority) standards.
                        </p>
                    </section>

                    <!-- Section 3 -->
                    <section id="section-3" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 03</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            3. Services
                        </h2>
                        <p class="leading-relaxed font-semibold text-slate-900">
                            Career Skills Institute Australia provides the following services:
                        </p>
                        <div class="grid grid-cols-1 gap-3 pt-2">
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-slate-900">Free Initial Consultation</span>
                                <span class="text-slate-600"> – assessment of skills, work experience, and goals.</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-slate-900">Qualification Matching</span>
                                <span class="text-slate-600"> – identifying the best-fit qualification options under
                                    AQF.</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-slate-900">Documentation Support</span>
                                <span class="text-slate-600"> – helping clients prepare and organise evidence required for
                                    Career Skills Institute Australia assessment.</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-slate-900">RTO Liaison</span>
                                <span class="text-slate-600"> – coordinating with our partnered RTOs for assessment
                                    submission and certification.</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70">
                                <span class="font-bold text-slate-900">Ongoing Support</span>
                                <span class="text-slate-600"> – guidance through each step of the Career Skills Institute Australia
                                    journey until completion.</span>
                            </div>
                        </div>
                    </section>

                    <!-- Section 4 -->
                    <section id="section-4" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 04</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            4. Fees and Payments
                        </h2>
                        <ul class="space-y-3 list-none pl-0">
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>All fees are clearly communicated before service commencement.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Consultation fees (if applicable) are payable prior to initiating the Career Skills Institute Australia
                                    Education application process.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Career Skills Institute Australia may collect fees for consultation, administrative assistance, or
                                    document processing.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Qualification and assessment fees are payable directly to the RTO, unless otherwise
                                    arranged through Career Skills Institute Australia.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Fees may vary depending on qualification level, RTO requirements, and service
                                    scope.</span>
                            </li>
                        </ul>
                    </section>

                    <!-- Section 5 -->
                    <section id="section-5" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 05</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            5. Refund Policy
                        </h2>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia operates under a fair and transparent refund policy. Refunds are available
                            under the following conditions:
                        </p>
                        <ul class="space-y-3 list-none pl-0 my-3">
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>If the consultation has not yet been conducted, a full refund may be issued upon
                                    written request within 7 days of payment.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Once consultation, qualification matching, or document preparation has commenced, fees
                                    are non-refundable.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>RTO-related fees are subject to the refund policies of the respective RTO.</span>
                            </li>
                        </ul>
                        <div
                            class="p-4 rounded-xl bg-blue-50/70 border border-blue-100 text-blue-900 text-sm font-medium mt-4">
                            All refund requests must be submitted in writing to:
                            <a href="mailto:support@openschooleducation.com"
                                class="underline font-bold text-blue-700 hover:text-blue-800">support@openschooleducation.com</a>.
                        </div>
                    </section>

                    <!-- Section 6 -->
                    <section id="section-6" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 06</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            6. Client Responsibilities
                        </h2>
                        <p class="leading-relaxed font-semibold text-slate-900">
                            Clients must:
                        </p>
                        <ul class="space-y-2 list-none pl-0">
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Provide accurate and truthful information regarding their work history, skills, and
                                    qualifications.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Supply all required documentation, such as resumes, work references, and
                                    identification, in a timely manner.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Understand that providing false or misleading information may result in
                                    disqualification or rejection by the RTO.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Cooperate with Career Skills Institute Australia and the RTO during the assessment process.</span>
                            </li>
                        </ul>
                        <p class="leading-relaxed pt-2 text-slate-600 italic">
                            Career Skills Institute Australia will not be held responsible for delays or outcomes resulting from
                            incomplete or inaccurate client information.
                        </p>
                    </section>

                    <!-- Section 7 -->
                    <section id="section-7" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 07</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            7. Partnership with RTOs
                        </h2>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia collaborates with multiple Australian Registered Training Organisations
                            (RTOs) to ensure clients are connected with the most suitable providers.
                        </p>
                        <p class="leading-relaxed">
                            All qualifications are issued by RTOs that are registered with ASQA (Australian Skills Quality
                            Authority) under the Australian Qualifications Framework (AQF).
                        </p>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia does not influence or guarantee the outcome of the RTO’s final assessment.
                        </p>
                    </section>

                    <!-- Section 8 -->
                    <section id="section-8" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 08</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            8. Disclaimer
                        </h2>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia does not issue qualifications and cannot guarantee the outcome of Open
                            School Education assessments.
                        </p>
                        <p class="leading-relaxed">
                            All assessments, validations, and certifications are conducted solely by accredited RTOs.
                        </p>
                        <p class="leading-relaxed">
                            Information on our website is for general guidance only and should not be interpreted as legal
                            or professional advice.
                        </p>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia is not liable for any loss or damage arising from reliance on information
                            or services provided.
                        </p>
                    </section>

                    <!-- Section 9 -->
                    <section id="section-9" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 09</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            9. Limitation of Liability
                        </h2>
                        <p class="leading-relaxed font-semibold text-slate-900">
                            To the maximum extent permitted by law:
                        </p>
                        <ul class="space-y-3 list-none pl-0">
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Career Skills Institute Australia shall not be liable for any indirect, incidental, or
                                    consequential losses.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Total liability for any claim arising under these Terms shall not exceed the total
                                    amount paid by the client for our services.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-blue-600 shrink-0"></span>
                                <span>Clients agree to indemnify Career Skills Institute Australia against any loss or claim arising
                                    from their use of services or provision of false information.</span>
                            </li>
                        </ul>
                    </section>

                    <!-- Section 10 -->
                    <section id="section-10" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 10</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            10. Privacy and Data Protection
                        </h2>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia respects your privacy.
                        </p>
                        <p class="leading-relaxed">
                            All personal and professional information collected is handled in accordance with the Privacy
                            Act 1988 (Cth) and the Australian Privacy Principles (APPs).
                        </p>
                        <p class="leading-relaxed">
                            Your data will only be shared with relevant RTOs for the purpose of qualification assessment and
                            verification.
                        </p>
                        <p class="leading-relaxed">
                            For more details, refer to our Privacy Policy.
                        </p>
                    </section>

                    <!-- Section 11 -->
                    <section id="section-11" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 11</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            11. Intellectual Property
                        </h2>
                        <p class="leading-relaxed">
                            All content, materials, and designs on the Career Skills Institute Australia website — including text,
                            graphics, videos, and logos — are the intellectual property of Career Skills Institute Australia.
                        </p>
                        <p class="leading-relaxed">
                            You may not reproduce, distribute, or reuse any content without prior written consent.
                        </p>
                    </section>

                    <!-- Section 12 -->
                    <section id="section-12" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 12</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            12. Amendments to Terms
                        </h2>
                        <p class="leading-relaxed">
                            Career Skills Institute Australia reserves the right to modify or update these Terms at any time without
                            prior notice.
                        </p>
                        <p class="leading-relaxed">
                            Any changes will be posted on our website with the revised effective date.
                        </p>
                    </section>

                    <!-- Section 13 -->
                    <section id="section-13" class="scroll-mt-8 space-y-3">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 13</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                            13. Governing Law
                        </h2>
                        <p class="leading-relaxed">
                            These Terms are governed by the laws of New South Wales, Australia.
                        </p>
                        <p class="leading-relaxed">
                            Any disputes will be subject to the exclusive jurisdiction of the courts in New South Wales.
                        </p>
                    </section>

                    <!-- Section 14 -->
                    <section id="section-14" class="scroll-mt-8 space-y-4 pt-4 border-t border-slate-200">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Section 14</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">
                            14. Contact Us
                        </h2>
                        <p class="leading-relaxed">
                            For any questions regarding these Terms, please contact:
                        </p>
                        <div class="p-6 rounded-2xl bg-slate-900 text-white space-y-3">
                            <h3 class="text-lg font-bold">Career Skills Institute Australia</h3>
                            <div class="space-y-1 text-sm text-slate-300">
                                <p>
                                    <span class="font-medium text-slate-400">Email:</span>
                                    <a href="mailto:info@csi.com"
                                        class="text-blue-400 hover:underline ml-1">info@openschool education.com</a>
                                </p>
                                <p>
                                    <span class="font-medium text-slate-400">Website:</span>
                                    <a href="https://openschooleducation.com/" target="_blank"
                                        class="text-blue-400 hover:underline ml-1">https://openschooleducation.com/</a>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </article>
        </div>
    </main>
@endsection
