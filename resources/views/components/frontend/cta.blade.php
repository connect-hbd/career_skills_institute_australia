 <div class="bg-secondary-500 rounded-2xl px-5 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12" id="cta-form">

     <div class="flex flex-col lg:flex-row items-center justify-between gap-6 lg:gap-10">

         <!-- Content -->
         <div class="text-center lg:text-left max-w-2xl">
             <h4 class="text-white font-semibold leading-snug
                text-lg md:text-xl lg:text-2xl">
                 Stay in the loop and never miss an update.
             </h4>
         </div>

         <!-- Form -->
         <form class="w-full lg:w-auto" action="{{ route('subscribe.store') }}" method="POST">
             @csrf
             <div class="flex flex-col sm:flex-row gap-3">

                 <input type="email" name="email" placeholder="Enter Email Address..." required
                     class="w-full sm:min-w-[320px] lg:min-w-100
                        px-4 py-3
                        bg-white
                        border border-white/20
                        rounded-lg
                        text-neutral-900
                        placeholder:text-neutral-500
                        focus:outline-none
                        focus:ring-2
                        focus:ring-brand-500">

                 <button type="submit"
                     class="whitespace-nowrap
                        bg-brand-600
                        hover:bg-brand-600
                        text-white
                        px-6 py-3
                        rounded-lg
                        font-medium
                        transition">
                     SUBSCRIBE
                 </button>

             </div>
         </form>

     </div>

 </div>


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