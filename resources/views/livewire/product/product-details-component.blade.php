<div class="w-full bg-orange-200">
    @section('title', 'Product Details')
    <!-- Main content header -->
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
    <div class="container max-w-6xl p-5 mx-auto">
        <div class="grid grid-cols-1 gap-2 mt-5 mb-5 bg-white rounded sm:grid-cols-2">
            <img alt="ecommerce"
                class="object-cover object-center w-full h-full rounded-t md:rounded-r-none md:rounded-l"
                src="{{ asset('storage/assets/product/large') }}/{{ $image }}">
            <div class="p-5 my-auto space-y-4">
                <div class="text-xs text-gray-500 capitalize">Category: <span
                        class="ml-1 text-sm font-semibold text-teal-700">{{ $product->category->name }}</span></div>
                <h4 class="text-4xl font-bold tracking-wide text-gray-800 capitalize">{{ $name }}</h4>
                <div class="flex">

                    <div class="flex space-x-0.5">
                        <svg class="w-5 h-5 {{ ($reviews->count() != 0 && 1 <= ($reviews->sum('rating') / $reviews->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($reviews->count() != 0 && 1 <= ($reviews->sum('rating') / $reviews->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($reviews->count() != 0 && 2 <= ($reviews->sum('rating') / $reviews->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($reviews->count() != 0 && 2 <= ($reviews->sum('rating') / $reviews->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($reviews->count() != 0 && 3 <= ($reviews->sum('rating') / $reviews->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($reviews->count() != 0 && 3 <= ($reviews->sum('rating') / $reviews->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($reviews->count() != 0 && 4 <= ($reviews->sum('rating') / $reviews->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($reviews->count() != 0 && 4 <= ($reviews->sum('rating') / $reviews->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($reviews->count() != 0 && 5 <= ($reviews->sum('rating') / $reviews->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($reviews->count() != 0 && 5 <= ($reviews->sum('rating') / $reviews->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </div>
                    <span class="ml-2 font-semibold text-teal-700">{{ $reviews->count() }} Reviews</span>
                </div>
                <div>
                    @if($sale_price)
                    <span class="font-semibold text-gray-500 line-through">${{ $regular_price }}</span> | <span
                        class="font-semibold text-teal-700">{{ 100 - number_format(($sale_price/$regular_price)*100) }}%
                        off</span> <span class="ml-2 text-3xl font-bold text-gray-800">${{ $sale_price }}</span>
                    @else
                    <span class="ml-2 text-3xl font-bold text-gray-800">${{ $regular_price }}</span>
                    @endif
                </div>
                <p class="text-gray-600">Quibusdam non a ipsam dolor adipisci quo. Impedit voluptates est sit ad
                    possimus non natus. Quisquam
                    officiis quo facere nemo omnis et eos exercitationem.</p>

                <div class="text-base text-gray-800">
                    <span class="text-xs text-gray-500 capitalize">stock available : </span> <b>{{ $quantity }}</b>
                </div>
                <div class="flex content-center justify-start gap-1 text-center">
                    <a href="#" class="py-2 px-3 text-xs col-span-1 max-w-[60px] bg-gray-300 hover:bg-gray-400"
                        wire:click.prevent="decreaseQuantity()" title="Descrease Quantiry">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>
                    </a>
                    <div class="col-span-3  max-w-[50px] h-full">
                        <input type="text" name="product-quantity" class="w-full text-center" value="{{ $qty }}"
                            data-max="120" pattern="[0-9]*" wire:model="qty">
                    </div>

                    <a href="#" class="py-2 px-3 text-xs col-span-1 max-w-[60px] bg-gray-300 hover:bg-gray-400"
                        wire:click.prevent="increaseQuantity()" title="Increase Quantity">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                    </a>
                    <a class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent md:py-2 md:space-x-2 md:px-7 hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-200 active:bg-gary-800 disabled:opacity-25"
                        href="#">
                        <span>Buy Now</span>
                    </a>
                </div>

                <div class="flex flex-row gap-1">

                    <a class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold tracking-widest text-white capitalize transition bg-orange-600 border border-transparent hover:bg-orange-500 focus:outline-none focus:border-orange-700 focus:ring focus:ring-orange-200 active:bg-orange-600 disabled:opacity-25"
                        href="#">
                        <span>Add to Cart</span>
                    </a>
                    <a class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold tracking-widest text-white capitalize transition bg-indigo-600 border border-transparent hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-600 disabled:opacity-25"
                        href="#">
                        <span>Add to Wishlist</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5 bg-white rounded">
            <div class="w-full px-5 py-2 bg-gray-100 rounded-t">
                <h5 class="text-lg font-semibold text-gray-800">Product Description</h5>
            </div>
            <div class="p-5">
                Quia consequatur autem expedita ut et. Deserunt tempora neque et ut. Odio nemo et dolore corrupti.
                Nesciunt quos natus sequi voluptas magnam suscipit vero repudiandae.
            </div>
        </div>
        <div class="mt-5 mb-5 bg-white rounded">
            <div class="w-full px-5 py-2 bg-gray-100 rounded-t">
                <h5 class="text-lg font-semibold text-gray-800">Customer Review</h5>
            </div>
            <div>
                <div class="container p-5 mx-auto">
                    <div class="bg-gray-200">
                        @foreach($reviews as $review)
                        <div
                            class="p-3 transition duration-150 ease-in-out transform bg-white border-b border-gray-200">
                            <div class="m-5">
                                <div class="flex space-x-0.5">
                                    <svg class="w-5 h-5 {{ (1 <= $review->rating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                        fill="{{ (1 <= $review->rating) ? 'currentColor' : 'none' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 {{ (2 <= $review->rating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                        fill="{{ (2 <= $review->rating) ? 'currentColor' : 'none' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 {{ (3 <= $review->rating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                        fill="{{ (3 <= $review->rating) ? 'currentColor' : 'none' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 {{ (4 <= $review->rating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                        fill="{{ (4 <= $review->rating) ? 'currentColor' : 'none' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 {{ (5 <= $review->rating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                        fill="{{ (5 <= $review->rating) ? 'currentColor' : 'none' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="mt-2 text-sm font-medium leading-5 text-gray-500"> {{ $review->created_at }}
                                </p>
                            </div>
                            <div class="m-5 space-y-1">
                                <h3 class="font-semibold text-gray-800"> {{ $review->title }}
                                </h3>
                                <p class="text-sm leading-5 text-gray-500">{{ $review->comment }}</p>
                            </div>

                            <div class="flex items-center m-5 space-x-2">
                                @if($review->orderItem->order->user->profile_photo_path)
                                <img class="object-cover w-8 h-8 border-2 border-purple-900 rounded-full"
                                    src="{{ asset('storage/assets/profile/small') }}/{{ $review->orderItem->order->user->profile_photo_path }}"
                                    alt="" />
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 border-purple-900 rounded-full"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                @endif
                                <div class="text-sm">
                                    <p class="font-semibold leading-5 text-gray-900"> {{
                                        $review->orderItem->order->user->name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    @if($reviews->count() == 0)
                    <div class="w-full p-10 text-center">
                        <h4 class="w-full text-lg font-semibold text-gray-600">No review yet.</h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
