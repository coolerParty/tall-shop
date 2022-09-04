<div class="w-full pb-10 bg-orange-200">
    @section('title', 'Checkout')
    <div class="w-full bg-white">
        <nav class="container p-2 mx-auto ">
            <ol class="flex list-reset">
                <li><a href="#" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="mx-2 text-gray-500">/</span></li>
                <li><a href="#" class="text-blue-600 hover:text-blue-700">Library</a></li>
                <li><span class="mx-2 text-gray-500">/</span></li>
                <li class="text-gray-500">Data</li>
            </ol>
        </nav>
    </div>

    <!-- order section starts  -->
    <section class="container mx-auto" id="order">
        <h3 class="p-1 mt-10 text-3xl font-semibold text-center capitalize md:p-0">order now</h3>
        <h1 class="p-1 text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize md:p-0">free and fast
        </h1>
        <form class="w-full max-w-2xl mx-auto mt-10">
            <div class="bg-white rounded-md shadow-lg p-7">
                <h1 class="mb-5 text-xl font-semibold text-orange-500">Billing Address</h1>
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="firstname">
                            First Name
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="firstname" type="text" placeholder="firstname" wire:model.lazy="firstname">
                        @error('firstname') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="lastname">
                            Last Name
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="lastname" type="text" placeholder="lastname" wire:model.lazy="lastname">
                        @error('lastname') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="mobile">
                            mobile
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('mobile') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="mobile" type="text" placeholder="mobile" wire:model.lazy="mobile">
                        @error('mobile') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="email">
                            email
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="email" type="email" placeholder="example@email.com" wire:model.lazy="email">
                        @error('email') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="line1">
                            line1
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('line1') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="line1" type="text" placeholder="line1" wire:model.lazy="line1">
                        @error('line1') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="line2">
                            line2
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="line2" type="text" placeholder="line2" wire:model.lazy="line2">
                        @error('line2') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="city">
                            city
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('city') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="city" type="text" placeholder="city" wire:model.lazy="city">
                        @error('city') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="province">
                            province
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="province" type="text" placeholder="province" wire:model.lazy="province">
                        @error('province') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="country">
                            country
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('country') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="country" type="text" placeholder="country" wire:model.lazy="country">
                        @error('country') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="zipcode">
                            zipcode
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="zipcode" type="text" placeholder="zipcode" wire:model.lazy="zipcode">
                        @error('zipcode') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="w-full px-3 mt-5 mb-5 md:w-1/2">
                <input
                    class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-sm appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                    type="checkbox" value="1" id="ship_to_different" value="1" type="checkbox"
                    wire:model="ship_to_different">
                <label class="inline-block font-semibold text-gray-800 form-check-label" for="ship_to_different">
                    Change Shipping Address?
                </label>
            </div>

            @if ($ship_to_different)
            <div class="mb-2 bg-white rounded-md p-7">
                <h1 class="mb-5 text-xl font-semibold text-orange-500">Shipping Address</h1>
                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="s_firstname">
                            firstname
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_firstname" type="text" placeholder="firstname" wire:model.lazy="s_firstname">
                        @error('s_firstname') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="s_lastname">
                            lastname
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_lastname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_lastname" type="text" placeholder="lastname" wire:model.lazy="s_lastname">
                        @error('s_lastname') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="s_mobile">
                            mobile
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_mobile') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_mobile" type="text" placeholder="mobile" wire:model.lazy="s_mobile">
                        @error('s_mobile') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="s_email">
                            email
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_email') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_email" type="email" placeholder="email" wire:model.lazy="s_email">
                        @error('s_email') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="s_line1">
                            line1
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_line1') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_line1" type="text" placeholder="line1" wire:model.lazy="s_line1">
                        @error('s_line1') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="s_line2">
                            line2
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_line2') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_line2" type="text" placeholder="line2" wire:model.lazy="s_line2">
                        @error('s_line2') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="s_city">
                            city
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_city') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_city" type="text" placeholder="city" wire:model.lazy="s_city">
                        @error('s_city') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="s_province">
                            province
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_province') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_province" type="text" placeholder="province" wire:model.lazy="s_province">
                        @error('s_province') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex flex-wrap mb-6 -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="s_country">
                            country
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_country') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_country" type="text" placeholder="country" wire:model.lazy="s_country">
                        @error('s_country') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="s_zipcode">
                            zipcode
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200
                            @error('s_zipcode') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                            id="s_zipcode" type="text" placeholder="zipcode" wire:model.lazy="s_zipcode">
                        @error('s_zipcode') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white rounded-md shadow-lg p-7">
                <h1 class="mb-5 text-xl font-semibold text-orange-500">Payment Method</h1>
                @error('paymentmode')<p class="italic text-red-500">{{ $message }}</p> @enderror
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                        <label for="cod" class="space-x-2">
                            <input id="cod" value="cod" type="radio" name="payment-method"
                                wire:model.lazy="paymentmode">
                            <span>Cash on Delivery</span>
                        </label>
                    </div>
                    <div class="w-full px-3 md:w-1/2">
                        <label for="card" class="space-x-2">
                            <input id="card" value="card" type="radio" name="payment-method"
                                wire:model.lazy="paymentmode">
                            <span>Debit / Credit Card</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-2 mb-2 bg-white rounded-md shadow-lg p-7">
                <div class="flex justify-between w-full px-3 mb-6 text-base md:mb-0">
                    @if (Session::has('checkout'))
                    <h1 class="text-xl font-semibold text-orange-500">Grand Total:</h1>
                    <h1 class="text-2xl font-semibold">${{ number_format(Session::get('checkout')['total'],2) }}</h1>
                    @endif
                </div>
            </div>
            <x-link-danger type="button" class="w-full px-5 py-5 cursor-pointer" wire:click.prevent="placeOrder">Place Order Now</x-link-danger>
            @if (Session::has('checkout_message'))
                <div class="p-5" role="alert">
                    <p class="italic text-red-500"><i class="icon fas fa-check"></i> {{ Session::get('checkout_message') }}</p>
                </div>
            @endif
        </form>
    </section>
    <!-- order section ends -->

    <div wire:loading.delay.long>
        <!-- Loading screen -->
        <div show="true"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-10 text-3xl">
            <!-- By Sam Herbert (@sherb), for everyone. More @ http://goo.gl/7AJzbL -->
            <svg width="60" height="60" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="2">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18" />
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18"
                                dur="1s" repeatCount="indefinite" />
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </div>
</div>
