@extends('frontend.layouts.app')

@section('content')
<section id="faq" class="bg-slate-50 py-16 sm:py-20 lg:py-24">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-xs font-black uppercase tracking-[0.18em] text-brand-600">
                Frequently Asked Questions
            </span>

            <h2 class="mt-5 text-3xl font-black leading-tight tracking-tight text-brand-950 sm:text-4xl">
                Everything You Need
                <span class="text-secondary-600">To Know</span>
            </h2>

            <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-base">
                Find answers to the most common questions about Recognition of Prior Learning,
                eligibility, evidence and the qualification process.
            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- CONTENT --}}
        {{-- ========================================================= --}}

        <div class="mt-12 grid grid-cols-1 items-start gap-8 lg:grid-cols-12 lg:gap-10">


            {{-- ===================================================== --}}
            {{-- LEFT SIDE --}}
            {{-- ===================================================== --}}

            <div class="lg:col-span-4 lg:self-stretch">

                <div class="lg:sticky lg:top-28">


                    {{-- ================================================= --}}
                    {{-- CONTACT CARD --}}
                    {{-- ================================================= --}}

                    <div class="rounded-2xl border border-brand-100 bg-white p-6 shadow-sm sm:p-7">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 text-brand-500">

                            <iconify-icon
                                icon="lucide:messages-square"
                                class="text-xl">
                            </iconify-icon>

                        </div>


                        <h3 class="mt-5 text-xl font-black text-brand-950">
                            Have more questions?
                        </h3>


                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Our RPL specialists can help you understand the assessment process,
                            required evidence, eligibility and next steps.
                        </p>


                        <a
                            href="mailto:info@csi.com"
                            class="group mt-6 flex items-center justify-between rounded-xl border border-brand-100 bg-brand-50 p-3.5 transition hover:border-brand-200 hover:bg-brand-100"
                        >

                            <span class="flex items-center gap-3">

                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-secondary-600">

                                    <iconify-icon
                                        icon="lucide:mail"
                                        class="text-lg">
                                    </iconify-icon>

                                </span>


                                <span>

                                    <span class="block text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                        Email Us
                                    </span>

                                    <span class="mt-0.5 block text-sm font-extrabold text-brand-900">
                                        Our RPL Team
                                    </span>

                                </span>

                            </span>


                            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-brand-600 transition group-hover:translate-x-0.5">

                                <iconify-icon
                                    icon="lucide:arrow-up-right"
                                    class="text-sm">
                                </iconify-icon>

                            </span>

                        </a>

                    </div>


                    {{-- ================================================= --}}
                    {{-- HELP CARD --}}
                    {{-- ================================================= --}}

                    <div class="mt-4 rounded-2xl bg-brand-900 p-6 text-white">

                        <div class="flex items-start gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-secondary-500/15">

                                <iconify-icon
                                    icon="lucide:headphones"
                                    class="text-lg text-secondary-400">
                                </iconify-icon>

                            </div>


                            <div>

                                <p class="text-sm font-extrabold">
                                    Need personal guidance?
                                </p>

                                <p class="mt-1 text-xs leading-5 text-brand-200">
                                    Speak with our team about your experience and eligibility.
                                </p>

                            </div>

                        </div>


                        <a
                            href="#assessment-form"
                            class="mt-5 inline-flex items-center gap-2 text-xs font-black uppercase tracking-wider text-secondary-400 transition hover:text-secondary-300"
                        >

                            Start Your Assessment

                            <iconify-icon
                                icon="lucide:arrow-right"
                                class="text-base">
                            </iconify-icon>

                        </a>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- FAQ LIST --}}
            {{-- ===================================================== --}}

            <div
                class="lg:col-span-8"
                x-data="{ active: 0 }"
            >

                <div class="space-y-3">


                    {{-- ================================================= --}}
                    {{-- FAQ 01 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 0
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 0 ? null : 0"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 0
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon
                                    icon="lucide:help-circle"
                                    class="text-xl">
                                </iconify-icon>
                            </div>


                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 0
                                        ? 'text-secondary-600'
                                        : 'text-slate-400'"
                                >
                                    Question 01
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    How does the assessment process work?
                                </span>

                            </div>


                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 0
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon
                                    icon="lucide:chevron-down"
                                    class="text-lg">
                                </iconify-icon>
                            </span>

                        </button>


                        <div
                            x-show="active === 0"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                        >

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <div class="min-w-0 flex-1">

                                        <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                            Our consultant will discuss the process with you and, once it has been determined that you are suitable, you will need to gather evidence to prove your competence. This can include:
                                        </p>

                                        <ul class="mt-4 list-disc space-y-2 pl-5 text-sm leading-7 text-slate-600 sm:text-[15px]">

                                            <li>
                                                video or photographic evidence of the different tasks performed on the job
                                            </li>

                                            <li>
                                                providing answers to questions about your experience and skills
                                            </li>

                                            <li>
                                                completing practical tasks to demonstrate your knowledge and skills
                                            </li>

                                            <li>
                                                a resume, workplace documents, references and a job description as supporting evidence.
                                            </li>

                                        </ul>

                                        <p class="mt-4 text-sm leading-7 text-slate-600 sm:text-[15px]">
                                            The evidence you provide should confirm that you have worked in the industry for an appropriate amount of time, and that you can perform relevant tasks at an acceptable level.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 02 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 1
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 1 ? null : 1"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 1
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 1 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 02
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    What if I don’t have proof of my previous qualifications?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 1
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div
                            x-show="active === 1"
                            x-transition
                        >

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Contact the learning institution where you completed the studies. They should be able to provide you with a copy of your qualification. If that is not an option, you will have to discuss other ways in which you can demonstrate your competence with your consultant.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 03 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 2
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 2 ? null : 2"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 2
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 2 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 03
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Is it cheaper and easier to just enrol in the courses?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 2
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 2" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        There is a pre-assessment process that is free of charge, and it takes place prior to enrolment. If you are not eligible for an Career Skills Institute Australia, it will be determined during the pre-assessment.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 04 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 3
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 3 ? null : 3"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 3
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 3 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 04
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Is Recognition of Prior Learning a complicated process?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 3
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 3" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <div>

                                        <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                            No, it is not complicated, and our consultants are on hand to provide you with the help and support you need in relation to:
                                        </p>

                                        <ul class="mt-4 list-disc space-y-2 pl-5 text-sm leading-7 text-slate-600 sm:text-[15px]">

                                            <li>understanding the process</li>
                                            <li>explaining the costs of the Career Skills Institute Australia process</li>
                                            <li>what is needed in terms of supporting documents</li>
                                            <li>help completing forms</li>
                                            <li>information on what you should do to apply for a building license</li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 05 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 4
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 4 ? null : 4"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 4
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 4 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 05
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Is there an option whereby I can simply demonstrate my skills, instead of having to locate older qualifications?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 4
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 4" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Absolutely Old qualifications are supporting documents, but you can still demonstrate your aptitude without having to present qualifications.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 06 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 5
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 5 ? null : 5"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 5
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 5 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 06
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    I’m a migrant and wish for my prior learning to be recognised in Australia. Is this possible?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 5
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 5" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Yes! But if you need skills assessment to obtain a visa, first check with the Department of Immigration and Citizenship (DIAC) to ensure that you apply for a skills assessment under the correct program for the visa you need.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 07 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 6
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 6 ? null : 6"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 6
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 6 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 07
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    How long does it take to get a qualification?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 6
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 6" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        The process can be completed within a few weeks and depends on the amount of recognition required, and the amount of time it takes for you to gather all your evidence.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 08 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 7
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 7 ? null : 7"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 7
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 7 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 08
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Who is eligible to apply for a qualification via recognition of prior learning?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 7
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 7" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Anyone with relevant prior learning can apply.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 09 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 8
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 8 ? null : 8"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 8
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 8 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 09
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Can I apply for Career Skills Institute Australia or training if I’m in Australia on a 457 Visa?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 8
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 8" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Yes. Primary 457 Visa holders can apply for training and recognition.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 10 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 9
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 9 ? null : 9"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 9
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 9 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 10
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    What do I do if I need help during the process?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 9
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 9" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Your consultant will be available to discuss the process, or to advise you on gathering supporting documents or evidence.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 11 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 10
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 10 ? null : 10"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 10
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 10 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 11
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    How much does the Career Skills Institute Australiacost?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 10
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 10" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Costs depend on the qualification and payment option.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 12 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 11
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 11 ? null : 11"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 11
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 11 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 12
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Can I apply for Career Skills Institute Australia or training if I’m in Australia on a 457 Visa?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 11
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 11" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Yes. Primary 457 Visa holders can apply for training and recognition.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 13 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 12
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 12 ? null : 12"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 12
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 12 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 13
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Can I use previous study as evidence?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 12
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 12" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        Yes. However, it is important to be able to show that you have maintained and applied those skills in subsequent years.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FAQ 14 --}}
                    {{-- ================================================= --}}

                    <div
                        class="overflow-hidden rounded-2xl border bg-white transition duration-200"
                        :class="active === 13
                            ? 'border-secondary-300 shadow-sm'
                            : 'border-slate-200 hover:border-brand-200'"
                    >

                        <button
                            type="button"
                            @click="active = active === 13 ? null : 13"
                            class="flex w-full items-center gap-4 p-5 text-left sm:p-6"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition"
                                :class="active === 13
                                    ? 'bg-secondary-500 text-white'
                                    : 'bg-brand-50 text-brand-500'"
                            >
                                <iconify-icon icon="lucide:help-circle" class="text-xl"></iconify-icon>
                            </div>

                            <div class="min-w-0 flex-1">

                                <span
                                    class="mb-1 block text-[10px] font-black uppercase tracking-[0.16em]"
                                    :class="active === 13 ? 'text-secondary-600' : 'text-slate-400'"
                                >
                                    Question 14
                                </span>

                                <span class="block text-sm font-extrabold leading-6 text-brand-950 sm:text-base">
                                    Is it cheaper and easier to just enrol in the courses?
                                </span>

                            </div>

                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border transition duration-200"
                                :class="active === 13
                                    ? 'rotate-180 border-secondary-300 bg-secondary-50 text-secondary-600'
                                    : 'border-slate-200 bg-white text-slate-500'"
                            >
                                <iconify-icon icon="lucide:chevron-down" class="text-lg"></iconify-icon>
                            </span>

                        </button>


                        <div x-show="active === 13" x-transition>

                            <div class="border-t border-slate-100 px-5 pb-6 pt-5 sm:px-6">

                                <div class="flex gap-4">

                                    <div class="hidden h-8 w-1 shrink-0 rounded-full bg-secondary-400 sm:block"></div>

                                    <p class="text-sm leading-7 text-slate-600 sm:text-[15px]">
                                        In most cases, recognition of prior learning will save you money. You will not have to pay for resources and you already have the basic skills, unless there are gaps that require workplace training or class attendance.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection
