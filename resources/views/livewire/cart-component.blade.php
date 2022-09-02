<div class="w-full bg-orange-200">
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
                            @forelse($carts->content() as $item)
                            <tr class="transition-all hover:bg-gray-100 ">
                                <td class="p-1 md:px-3 md:py-2 whitespace-nowrap">
                                    @if($item->model->image)
                                    <a href="{{ asset('storage/assets/product/large') }}/{{ $item->model->image }}"
                                        target="_blank"><img
                                            class="object-cover w-20 h-20 rounded-md cursor-pointer hover:shadow-lg"
                                            src="{{ asset('storage/assets/product/thumbnail') }}/{{ $item->model->image }}" /></a>
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
                                    <div class="text-sm font-semibold text-orange-600">{{ $item->model->name }}</div>
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">${{
                                        $item->model->regular_price}}</div>
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="flex content-center justify-center gap-1 p-1 text-center">
                                        <a href="#"
                                            class="px-1 py-2 md:px-3 text-xs col-span-1 max-w-[60px] bg-gray-300 hover:bg-gray-400"
                                            wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"
                                            title="Descrease Quantiry">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                            </svg>
                                        </a>
                                        <div class="col-span-3  max-w-[100px]">
                                            <input type="text" name="product-quantity" class="w-full"
                                                value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" disabled>
                                        </div>

                                        <a href="#"
                                            class="px-1 py-2 md:px-3 text-xs col-span-1 max-w-[60px] bg-gray-300 hover:bg-gray-400"
                                            wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"
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
                                    <div class="text-sm font-semibold text-gray-900">${{ $item->subtotal }}</div>
                                </td>
                                <td class="p-1 text-sm font-medium text-right md:px-6 md:py-4">
                                    <x-link-success href="#" class="text-xs xs:p-1"
                                        wire:click.prevent="switchToSaveForLater('1')" title="Save for later.">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                                                clip-rule="evenodd" />
                                        </svg>


                                    </x-link-success>
                                    <x-link-danger href="#" class="text-xs xs:p-1"
                                        wire:click.prevent="destroy('{{ $item->rowId }}')" title="Remove from cart.">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </x-link-danger>
                                </td>
                            </tr>
                            @empty
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 text-center whitespace-nowrap" colspan="6">
                                    <div class="text-sm font-medium text-gray-900">No Item on your Cart</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

    <div class="container mx-auto mb-10">
        @if($carts->count() > 0)
        <div class="w-full pr-5 m-5 text-right">
            <x-link-danger href="#" wire:click.prevent="destroyAll()" class="btn btn-delete" title="">
                <span>Clear Shopping Cart</span>
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </x-link-danger>
        </div>

        <div class="flex justify-end w-full pb-10 mt-5">
            <table
                class="w-full overflow-x-scroll divide-y divide-gray-200 rounded-md shadow-md md:w-1/2 lg:w-1/3">
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
                               $carts->subtotal() }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-left text-gray-900">Tax</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">${{
                                $carts->tax() }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm text-left text-gray-900">Total</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-right text-gray-900">${{
                                $carts->total() }}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <div wire:loading.delay.long>
        <!-- Loading screen -->
        <div  show="true"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-10 text-3xl">
            <!-- style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"> -->
            Loading.....
        </div>
</div>
</div>
