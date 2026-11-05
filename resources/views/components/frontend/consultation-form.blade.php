
<div id="consultation-form">
     <div class="md:mb-4 mb-3 lg:mb-6">
     <h1 class="text-center text-xl md:text-2xl lg:text-3xl font-bold text-neutral-900">Book a Free Consultation
     </h1>
 </div>
 <form action="{{ route('contact.store') }}" method="POST"
     class="border border-neutral-200 p-6 w-full lg:max-w-3xl mx-auto rounded-lg">
     @csrf
     <div class="flex flex-col gap-4">
     <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
         <x-form.input-text name="name" label="Full Name" value="" placeholder="Enter Full Name..." />
         <x-form.input-text name="email" label="Email" type="email" value="" placeholder="Enter Email..." />
     </div>
     <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
         <x-form.input-text name="phone" label="Phone" value="" placeholder="Enter Phone No..." />
        <x-form.contact-form />

     </div>
     <x-form.textarea-input name="message" label="Note" rows="3" placeholder="Write your note..." />
 </div>
     <div class="flex justify-end mt-4 md:mt-6">
         <button type="submit"
             class=" text-sm   bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-normal hover:bg-brand-600 transition">
             Book Consultation
         </button>
     </div>
 </form>
</div>

@if ($errors->any())
    <script>
        window.addEventListener('load', () => {
            document
                .getElementById('consultation-form')
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

            <div @click.away="showModal = false" class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center shadow-xl">

                <div class="mb-4">
                    <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h3 class="text-xl font-bold text-neutral-900 mb-2">
                    Success!
                </h3>

                <p class="text-neutral-600 mb-6">
                    {{ session('success') }}
                </p>

                <button @click="showModal = false" class="bg-brand-600 text-white px-6 py-2 rounded-lg">
                    Close
                </button>
            </div>
        </div>
    @endif

</div>
