<div class="w-full pb-10 bg-orange-200">
    @section('title', 'Cart')
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

    @if(Cart::instance('cart')->count() > 0)
    <!-- Cart START -->
    <div class="container flex flex-col mx-auto mt-10">
        <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">Popular Dishes</h3>
        <h1 class="p-1 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">Our Delicious Food</h1>
        <div class="mt-10 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="p-1 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                                    Image
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-left text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-right text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Price
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-center text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    quantity
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-right text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Total
                                </th>
                                <th scope="col" class="p-1 md:px-6 md:py-3">
                                    Action
                                </th>
                            </tr>
                            <!-- flash message Start -->
                            @if(Session::has('create-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-blue-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('create-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            @if(Session::has('update-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-emerald-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('update-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            @if(Session::has('delete-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-red-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('delete-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            <!-- flash message End -->
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach(Cart::instance('cart')->content() as $cart)
                            <tr class="transition-all hover:bg-gray-100 ">
                                <td class="p-1 md:px-3 md:py-2 whitespace-nowrap">
                                    @if($cart->model->image)
                                    <a href="{{ route('product.details', ['slug' => $cart->model->slug ]) }}"><img
                                            class="object-cover w-20 h-20 rounded-md cursor-pointer hover:shadow-lg"
                                            src="{{ asset('storage/assets/product/thumbnail') }}/{{ $cart->model->image }}" /></a>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-orange-600"><a href="{{ route('product.details', ['slug' => $cart->model->slug ]) }}">{{ $cart->model->name }}</a></div>
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">${{
                                        $cart->model->regular_price}}</div>
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="flex content-center justify-center gap-1 p-1 text-center">
                                        <a href="#"
                                            class="px-1 py-2 md:px-3 text-xs col-span-1 max-w-[60px] bg-gray-300 hover:bg-gray-400"
                                            wire:click.prevent="decreaseQuantity('{{ $cart->rowId }}')"
                                            title="Descrease Quantiry">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                            </svg>
                                        </a>
                                        <div class="col-span-3  max-w-[100px]">
                                            <input type="text" name="product-quantity" class="w-full"
                                                value="{{ $cart->qty }}" data-max="120" pattern="[0-9]*" disabled>
                                        </div>

                                        <a href="#"
                                            class="px-1 py-2 md:px-3 text-xs col-span-1 max-w-[60px] bg-gray-300 hover:bg-gray-400"
                                            wire:click.prevent="increaseQuantity('{{ $cart->rowId }}')"
                                            title="Increase Quantity">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m6-6H6" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td class="p-1 text-right md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-gray-900">${{ $cart->subtotal }}</div>
                                </td>
                                <td class="p-1 text-sm font-medium text-right md:px-6 md:py-4">
                                    <x-link-success href="#" class="text-xs xs:p-1"
                                        wire:click.prevent="switchToSaveForLater('{{ $cart->rowId }}')"
                                        title="Save for later.">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                                                clip-rule="evenodd" />
                                        </svg>


                                    </x-link-success>
                                    <x-link-danger href="#" class="text-xs xs:p-1"
                                        wire:click.prevent="destroy('{{ $cart->rowId }}')" title="Remove from cart.">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </x-link-danger>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart END -->
    @else
    <div class="w-full mt-10 mb-10">
        <div class="px-6 py-4 text-center whitespace-nowrap">
            <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">No item found in cart.</h3>
            <h1 class="p-1 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">Add Dishes to it now!</h1>
            <x-link-success href="{{ route('menu') }}" class="px-10 py-5 mt-5">Shop Now!</x-link-success>
        </div>
    </div>
    @endif

    <!-- Cart Summary START -->
    @if(Cart::instance('cart')->count() > 0)
    <div class="container mx-auto mt-5">
        <div class="w-full pr-5 text-right">
            <x-link-danger href="#" wire:click.prevent="destroyAll()" class="btn btn-delete" title="">
                <span>Clear Shopping Cart</span>
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </x-link-danger>
        </div>

        <div class="flex justify-end w-full pb-10 mt-5 rounded-md">
            <table class="w-full overflow-x-scroll divide-y divide-gray-200 rounded-md shadow-md lg:w-1/2">
                <thead class="bg-gray-50">
                    <tr>
                        <th colspan="2"
                            class="p-1 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                            Order Summary</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-left text-gray-900">Subtotal</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">${{
                                number_format(Cart::instance('cart')->subtotal(), 2) }}</div>
                        </td>
                    </tr>
                    @if (!Session::has('coupon'))
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap text-sm text-left text-gray-900 align-middle">
                                <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox"
                                    wire:model="haveCouponCode">
                                <label for="have-code" class="ml-2 text-xs font-thin">Has coupon code</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($haveCouponCode == 1)
                            <form wire:submit.prevent="applyCouponCode">
                                <div class="float-right">
                                    @if (Session::has('coupon_message'))
                                    <div class="text-xs italic text-red-500" role="danger">{{
                                        Session::get('coupon_message')
                                        }}</div>
                                    @endif
                                    <div class="flex">
                                        <input type="text" placeholder="coupon code" name="couponCode"
                                            wire:model.lazy="couponCode">
                                        <button type="submit"
                                            class="px-3 py-2 text-white bg-gray-700 hover:bg-gray-800">Apply</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @if(Session::has('coupon'))
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex text-sm text-left text-gray-900">Discount
                                ({{Session::get('coupon')['code']}})
                                <a href="#" wire:click.prevent="removeCoupon"
                                    class="ml-2 text-white bg-red-500 rounded-full hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">-${{number_format($discount,2)}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-left text-gray-900">Subtotal with Discount</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">
                                ${{number_format($subtotalAfterDiscount,2)}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-left text-gray-900">Tax ({{ config('cart.tax') }}%)</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">
                                ${{number_format($taxAfterDiscount,2)}}</div>
                        </td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="px-6 py-4">
                            <div class="text-base font-bold text-left text-gray-900">Total</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-base font-bold text-right text-gray-900">
                                ${{number_format($totalAfterDiscount,2)}}</div>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-left text-gray-900">Tax</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">${{
                                number_format(Cart::instance('cart')->tax(),2) }}</div>
                        </td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="px-6 py-4">
                            <div class="text-base font-bold text-left text-gray-900">Total</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-base font-bold text-right text-gray-900">${{
                                number_format(Cart::instance('cart')->total(), 2) }}</div>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="2 flex flex-col">
                            <x-link-danger href="#" class="w-full px-3 py-3 space-x-2 rounded-none" title="" wire:click.prevent="checkout">
                                <span>Checkout</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                                </svg>
                            </x-link-danger>
                            @if (Session::has('checkout_message'))
                                <div class="p-5" role="alert">
                                    <p class="italic text-red-500"><i class="icon fas fa-check"></i> {{ Session::get('checkout_message') }}</p>
                                </div>
                            @endif
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>
    @endif
    <!-- Cart Summary END -->

    <!-- Save for Later START -->
    @if(Cart::instance('saveForLater')->count() > 0)
    <div class="container flex flex-col mx-auto">
        <h3 class="p-1 text-3xl font-semibold capitalize md:p-0">Save for later</h3>
        <div class="overflow-x-auto mt-5-my-2 sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="p-1 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                                    Image
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-left text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Name
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-right text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Price
                                </th>
                                <th scope="col" class="p-1 md:px-6 md:py-3">
                                    Action
                                </th>
                            </tr>
                            <!-- flash message Start -->
                            @if(Session::has('create-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-blue-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('create-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            @if(Session::has('update-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-emerald-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('update-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            @if(Session::has('delete-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-red-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('delete-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            <!-- flash message End -->
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach(Cart::instance('saveForLater')->content() as $saveLater)
                            <tr class="transition-all hover:bg-gray-100 ">
                                <td class="p-1 md:px-3 md:py-2 whitespace-nowrap">
                                    @if($saveLater->model->image)
                                    <a href="{{ asset('storage/assets/product/large') }}/{{ $saveLater->model->image }}"
                                        target="_blank"><img
                                            class="object-cover w-20 h-20 rounded-md cursor-pointer hover:shadow-lg"
                                            src="{{ asset('storage/assets/product/thumbnail') }}/{{ $saveLater->model->image }}" /></a>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-orange-600">{{ $saveLater->model->name }}
                                    </div>
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">${{
                                        $saveLater->model->regular_price}}</div>
                                </td>
                                <td class="p-1 text-sm font-medium text-right md:px-6 md:py-4">
                                    <x-link-success href="#" class="text-xs xs:p-1"
                                        wire:click.prevent="switchToCart('{{ $saveLater->rowId }}')"
                                        title="Move to Cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                        </svg>
                                    </x-link-success>
                                    <x-link-danger href="#" class="text-xs xs:p-1"
                                        wire:click.prevent="destroySaveForLater('{{ $saveLater->rowId }}')"
                                        title="Remove Item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </x-link-danger>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-5">
        <div class="w-full pr-5 text-right">
            <x-link-danger href="#" wire:click.prevent="destroyAllSavedForLater()" class="btn btn-delete" title="">
                <span>Clear Save for Later</span>
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </x-link-danger>
        </div>
    </div>
    @endif
    <!-- Save for Later END -->

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
