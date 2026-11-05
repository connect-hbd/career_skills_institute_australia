<form id="get-in-touch-form" action="{{ route('contact.store') }}" method="POST">
    @csrf
    <input type="hidden" name="form_type" value="get_in_touch">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-form.input-text name="name" label="Full Name" value="" placeholder="Enter Full Name..." />
        <x-form.input-text name="email" label="Email" type="email" value="" placeholder="Enter Email..." />

    </div>
    <div class="space-y-4 mt-4">
        <x-form.input-text name="phone" label="Phone" value="" placeholder="Enter Phone No..." />
        <x-form.textarea-input name="message" label="Note" rows="3" placeholder="Write your note..." />
    </div>

    <div class="flex justify-end mt-4 md:mt-6">
        <button type="submit"
            class=" text-base   bg-brand-600 text-white px-4 py-2.5 lg:px-6 lg:py-3 rounded-lg font-normal hover:bg-brand-600 transition">
            Submit Message
        </button>
    </div>
</form>

@if ($errors->any())
    <script>
        window.addEventListener('load', () => {

            document
                .getElementById('get-in-touch-form')
                ?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

            const firstErrorField = document.querySelector(
                '.is-invalid, [aria-invalid="true"], .border-red-500'
            );

            firstErrorField?.focus();
        });
    </script>
@endif


<div x-data="{ showModal: {{ session('success') ? 'true' : 'false' }} }">

    @if (session('success'))
        <div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            style="display:none">

            <div @click.away="showModal = false" class="bg-white rounded-2xl p-8 max-w-md mx-4 flex flex-col items-center justify-center text-center shadow-xl">

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-green-100 dark:bg-green-500/15">
                    <svg class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                        stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-neutral-900 mb-2">
                    Success!
                </h3>

                <p class="text-neutral-600 mb-6">
                    {{ session('success') }}
                </p>

                <button @click="showModal = false" class="bg-brand-600 text-white text-sm px-6 py-1.5 rounded-lg">
                    Close
                </button>
            </div>
        </div>
    @endif

</div>
