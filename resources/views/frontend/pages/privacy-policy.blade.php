@extends('frontend.layouts.app')

@section('content')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

        {{-- Page Header --}}
        <header class="mx-auto max-w-4xl pb-8 text-center lg:pb-10">

            {{-- Badge --}}
            <div
                class="mb-6 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1.5 text-xs font-semibold text-brand-700 shadow-sm">

                <span class="relative flex h-2 w-2">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-50">
                    </span>

                    <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                </span>

                Privacy & Data Protection

            </div>

            {{-- Heading --}}
            <h1
                class="text-2xl sm:text-3xl font-bold tracking-[-0.035em] text-neutral-950 md:text-4xl lg:text-5xl uppercase">
                Privacy Policy
            </h1>

            {{-- Description --}}
            <p class="mx-auto mt-5 max-w-2xl text-sm text-neutral-500 sm:text-base">
                Please review this Privacy Policy to understand how Career Skills Institute collects,
                uses, stores, and protects your personal information.
            </p>

        </header>


        {{-- Main Layout --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12 lg:gap-8">

            {{-- Sidebar --}}
            <aside class="space-y-6 lg:col-span-4">

                <div
                    class="sticky top-24 space-y-5"
                    x-data="{
                        activeSection: 'section-1',

                        sections: [
                            { id: 'section-1', label: 'About this Privacy Policy' },
                            { id: 'section-2', label: 'Personal Information We Collect' },
                            { id: 'section-3', label: 'How We Collect and Hold Information' },
                            { id: 'section-4', label: 'How We Use Your Information' },
                            { id: 'section-5', label: 'Disclosure of Personal Information' },
                            { id: 'section-6', label: 'Disclosure Outside Australia' },
                            { id: 'section-7', label: 'Security of Personal Information' },
                            { id: 'section-8', label: 'Website Usage and Cookies' },
                            { id: 'section-9', label: 'Access and Correction' },
                            { id: 'section-10', label: 'Making a Complaint' },
                            { id: 'section-11', label: 'Contact Us' }
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

                    {{-- Table of Contents --}}
                    <div
                        class="overflow-hidden rounded-2xl border border-neutral-200 bg-white px-12 py-16 shadow-[0_8px_30px_rgb(16,24,40,0.04)] md:px-4 md:py-8">

                        <h2 class="mb-4 text-xs font-bold uppercase tracking-wider text-slate-400">
                            On This Page
                        </h2>

                        <nav
                            class="space-y-1 text-sm font-medium text-slate-600"
                            aria-label="Privacy Policy table of contents"
                        >

                            <template
                                x-for="(section, index) in sections"
                                :key="section.id"
                            >

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

                                    {{-- Section Number --}}
                                    <span
                                        class="mr-2 w-5 text-xs font-semibold"
                                        :class="activeSection === section.id
                                            ? 'text-blue-600'
                                            : 'text-slate-400 group-hover:text-blue-600'"
                                        x-text="(index + 1) + '.'"
                                    ></span>

                                    {{-- Section Name --}}
                                    <span x-text="section.label"></span>

                                </a>

                            </template>

                        </nav>

                    </div>


                    {{-- Privacy Note --}}
                    <div class="rounded-2xl border border-brand-100 bg-brand-50/60 p-5">

                        <div class="flex gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-brand-600">

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
                                        d="M12 15v2m-6 4h12a2 2 0 002-2V7a2 2 0 00-2-2h-1V4a3 3 0 00-6 0v1H9a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    />
                                </svg>

                            </div>

                            <div>

                                <h3 class="text-sm font-semibold text-neutral-800">
                                    Your privacy matters
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-neutral-500">
                                    We take reasonable steps to protect your personal information
                                    and handle it in accordance with applicable privacy requirements.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </aside>


            {{-- Article --}}
            <article class="min-w-0 lg:col-span-8">

                <div
                    class="rounded-2xl border border-neutral-200 bg-white px-5 py-8 shadow-[0_8px_30px_rgb(16,24,40,0.03)] sm:px-8 sm:py-10 lg:px-10 lg:py-12"
                >


                    {{-- ========================================================= --}}
                    {{-- SECTION 1 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-1"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 01
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            1. About this Privacy Policy
                        </h2>

                        <p class="leading-relaxed">
                            This Privacy Policy outlines how
                            <strong>Career Skills Institute</strong>
                            (“Career Skills Institute”, “we”, “us”, or “our”) collects, holds,
                            uses, and discloses your personal information in accordance with the
                            <strong>Privacy Act 1988 (Cth)</strong>
                            and the
                            <strong>Australian Privacy Principles (APPs)</strong>.
                        </p>

                        <p class="leading-relaxed">
                            <strong>Personal information</strong>
                            refers to information or an opinion about an identified individual,
                            or an individual who is reasonably identifiable.
                        </p>

                        <p class="leading-relaxed">
                            By providing your personal information to us, you consent to our
                            collection, use, storage, and disclosure of that information in
                            accordance with this Privacy Policy and any other arrangements
                            that may apply between us.
                        </p>

                        <p class="leading-relaxed">
                            We reserve the right to update this Privacy Policy at any time.
                            Any revisions will be published on our website. By continuing to
                            use our website and services, you acknowledge that you have read
                            and agree to the latest version of this Privacy Policy.
                        </p>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 2 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-2"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 02
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            2. What Personal Information Do We Collect and Hold?
                        </h2>

                        <p class="leading-relaxed">
                            In conducting our consultation business, we may collect and hold
                            a range of personal information about you, including:
                        </p>

                        <ol class="space-y-2 pl-0 list-none">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>your full name;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>residential, mailing, and billing address;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>email address;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>telephone and mobile numbers;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>identity details (e.g., ID proof, date of birth);</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>details of the services we have provided or that you have enquired about;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>information relating to your employment history, skills, and educational qualifications;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>any information you provide directly through our website, email, or social media;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>feedback, testimonials, or enquiry details; and</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>other information necessary to facilitate your dealings with us.</span>
                            </li>

                        </ol>

                        <div
                            class="my-4 rounded-xl border border-amber-200/80 bg-amber-50 p-4 text-sm font-medium text-amber-900"
                        >
                            We do not store credit card information directly. Payment details,
                            where applicable, are processed securely through our banking or
                            third-party payment providers.
                        </div>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 3 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-3"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 03
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            3. How Do We Collect and Hold Personal Information?
                        </h2>

                        <p class="leading-relaxed">
                            We may collect your personal information directly from you or from
                            third parties, including RTO partners and marketing platforms.
                        </p>

                        <p class="pt-2 font-semibold leading-relaxed text-slate-900">
                            You may provide information to us when you:
                        </p>

                        <ol class="space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>submit an enquiry via our website;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>communicate with us through phone, email, or in-person meetings;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>participate in a consultation or assessment process; or</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>engage with us on social media platforms or marketing campaigns.</span>
                            </li>

                        </ol>

                        <p class="pt-2 leading-relaxed">
                            All collected data is securely stored in our CRM or internal systems
                            with appropriate data protection measures.
                        </p>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 4 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-4"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 04
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            4. Why and How Do We Use Your Personal Information?
                        </h2>

                        <p class="leading-relaxed">
                            We collect, hold, use, and disclose personal information for purposes including:
                        </p>

                        <ol class="space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>providing consultation and related support services;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>matching your experience and skills to appropriate qualifications;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>coordinating with Registered Training Organisations (RTOs) for assessment and certification;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>processing payments and issuing invoices;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>maintaining communication and responding to enquiries;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>improving our website, services, and marketing;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>generating internal reports and business analytics; and</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>complying with legal obligations and resolving disputes.</span>
                            </li>

                        </ol>

                        <p class="pt-2 font-semibold leading-relaxed text-slate-900">
                            We may also use your personal information for <strong>marketing purposes</strong>, such as:
                        </p>

                        <ul class="space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>sending you updates, offers, or information about new services;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>contacting you via email, SMS, or phone for consultation follow-ups.</span>
                            </li>

                        </ul>

                        <div
                            class="mt-4 rounded-xl border border-blue-100 bg-blue-50/70 p-4 text-sm font-medium text-blue-900"
                        >
                            You can request to <strong>opt out</strong> of receiving marketing
                            communications at any time by contacting us.
                        </div>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 5 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-5"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 05
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            5. Who Do We Disclose Personal Information To?
                        </h2>

                        <p class="leading-relaxed">
                            We may share your personal information with:
                        </p>

                        <ol class="space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>our employees, contractors, and internal departments;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span><strong>Registered Training Organisations (RTOs)</strong> for qualification assessment and certification;</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>third-party service providers who assist us in operations, such as:</span>
                            </li>

                        </ol>

                        <ul class="ml-7 space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-slate-400"></span>
                                <span>IT and website hosting companies,</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-slate-400"></span>
                                <span>marketing and advertising agencies,</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-slate-400"></span>
                                <span>CRM and cloud service providers;</span>
                            </li>

                        </ul>

                        <ol start="4" class="space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>professional advisers (lawyers, accountants, auditors);</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>payment service operators (banks, payment gateways);</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>government agencies, regulatory authorities, or law enforcement (as required by law); and</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>other parties authorised by you.</span>
                            </li>

                        </ol>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 6 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-6"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 06
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            6. Do We Disclose Personal Information Outside Australia?
                        </h2>

                        <p class="leading-relaxed">
                            Some of our service providers or partners may be located outside Australia.
                            When you provide us with your personal information, you consent to the
                            transfer of such information overseas.
                        </p>

                        <p class="leading-relaxed">
                            We take all reasonable steps to ensure any overseas recipients handle
                            your data in a manner consistent with Australian Privacy Principles.
                        </p>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 7 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-7"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 07
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            7. Security of Your Personal Information
                        </h2>

                        <p class="leading-relaxed">
                            Career Skills Institute takes reasonable precautions to protect your
                            personal information from misuse, interference, unauthorised access,
                            modification, or disclosure.
                        </p>

                        <p class="leading-relaxed">
                            We use secure systems for data storage, encrypted communications where
                            applicable, and restricted internal access to sensitive information.
                        </p>

                        <div
                            class="mt-4 rounded-xl border border-amber-200/80 bg-amber-50 p-4 text-sm font-medium text-amber-900"
                        >
                            While we strive to protect your data, no system can guarantee absolute
                            security, and you acknowledge that you provide information at your own risk.
                        </div>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 8 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-8"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 08
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            8. Website Usage and Cookies
                        </h2>

                        <p class="leading-relaxed">
                            When you visit our website, we may collect certain technical
                            information such as:
                        </p>

                        <ul class="space-y-2 list-none pl-0">

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>your IP address,</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>browser type,</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>date and time of visit, and</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-blue-600"></span>
                                <span>pages viewed.</span>
                            </li>

                        </ul>

                        <p class="leading-relaxed pt-2">
                            Our website uses <strong>cookies</strong> to enhance user experience,
                            track website performance, and support remarketing campaigns.
                        </p>

                        <p class="leading-relaxed">
                            Cookies are small text files stored on your device. You can choose to
                            disable cookies via your browser settings, but some website features
                            may not function properly as a result.
                        </p>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 9 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-9"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 09
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            9. Access and Correction of Personal Information
                        </h2>

                        <p class="leading-relaxed">
                            We take reasonable steps to ensure the personal information we hold
                            is accurate, up-to-date, and complete.
                        </p>

                        <p class="leading-relaxed">
                            You have the right to request access to, or correction of, your
                            personal information at any time. Requests must be made in writing
                            to our contact details below.
                        </p>

                        <p class="leading-relaxed">
                            If we cannot provide you access to certain information, we will
                            inform you and explain why.
                        </p>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 10 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-10"
                        class="scroll-mt-28 space-y-3 pb-12"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 10
                        </span>

                        <h2
                            class="border-b border-slate-100 pb-3 text-xl font-bold text-slate-900 sm:text-2xl"
                        >
                            10. Making a Complaint
                        </h2>

                        <p class="leading-relaxed">
                            If you believe your personal information has been mishandled or
                            that we have breached this Privacy Policy, please contact us directly.
                        </p>

                        <p class="leading-relaxed">
                            You can make a complaint by emailing
                            <a
                                href="mailto:info@csi.com"
                                class="font-bold text-blue-700 underline hover:text-blue-800"
                            >
                                info@csi.com
                            </a>
                            with your name, contact details, and a clear description of your concern.
                        </p>

                        <p class="leading-relaxed">
                            We will acknowledge your complaint and respond within a reasonable
                            time frame. If you are unsatisfied with our response, you may refer
                            your complaint to the
                            <strong>Office of the Australian Information Commissioner (OAIC)</strong>.
                        </p>

                    </section>


                    {{-- ========================================================= --}}
                    {{-- SECTION 11 --}}
                    {{-- ========================================================= --}}

                    <section
                        id="section-11"
                        class="scroll-mt-28 space-y-4 border-t border-slate-200 pt-8"
                    >

                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                            Section 11
                        </span>

                        <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">
                            11. Contact Us
                        </h2>

                        <p class="leading-relaxed">
                            For any questions regarding these Terms, please contact:
                        </p>

                        <div
                            class="space-y-3 rounded-2xl bg-slate-900 p-6 text-white"
                        >

                            <h3 class="text-lg font-bold">
                                Career Skills Institute
                            </h3>

                            <div class="space-y-1 text-sm text-slate-300">

                                <p>
                                    <span class="font-medium text-slate-400">
                                        Email:
                                    </span>

                                    <a
                                        href="mailto:info@openschool education.com"
                                        class="ml-1 text-blue-400 hover:underline"
                                    >
                                        info@openschool education.com
                                    </a>
                                </p>

                                <p>
                                    <span class="font-medium text-slate-400">
                                        Website:
                                    </span>

                                    <a
                                        href="https://openschooleducation.com/"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="ml-1 text-blue-400 hover:underline"
                                    >
                                        https://openschooleducation.com/
                                    </a>
                                </p>

                            </div>

                        </div>

                    </section>

                </div>

            </article>

        </div>

    </main>
@endsection