<div class="relative z-0 w-full pt-10 pb-10 bg-orange-200">


    <div class="container mx-auto">
        <h3 class="mt-10 text-3xl font-semibold text-center capitalize">Popular Dishes</h3>
        <h1 class="text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">Our Delicious Food</h1>
        <div class="grid grid-cols-2 gap-0 mt-10 mb-10 md:gap-2 lg:gap-3 md:grid-cols-3 lg:grid-cols-4">

            @foreach($products as $product)
            <div class="relative pb-5 m-1 rounded md:m-0">

                <img loading="lazy" src="{{ asset('storage/assets/product/medium') }}/{{ $product->image }}" alt=""
                    class="w-full rounded-lg shadow-lg">
                <div class="p-2 mx-2 text-center bg-white rounded-lg shadow-lg -mt-9 opacity-95">
                    <div class="flex justify-center">
                        <div class="flex space-x-0.5">
                            <svg class="w-5 h-5 {{ ($product->ratings->count() != 0 && 1 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'text-yellow-300' : 'text-gray-300' }}" fill="{{ ($product->ratings->count() != 0 && 1 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'currentColor' : 'none' }}" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 {{ ($product->ratings->count() != 0 && 2 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'text-yellow-300' : 'text-gray-300' }}" fill="{{ ($product->ratings->count() != 0 && 2 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'currentColor' : 'none' }}" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 {{ ($product->ratings->count() != 0 && 3 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'text-yellow-300' : 'text-gray-300' }}" fill="{{ ($product->ratings->count() != 0 && 3 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'currentColor' : 'none' }}" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 {{ ($product->ratings->count() != 0 && 4 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'text-yellow-300' : 'text-gray-300' }}" fill="{{ ($product->ratings->count() != 0 && 4 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'currentColor' : 'none' }}" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg class="w-5 h-5 {{ ($product->ratings->count() != 0 && 5 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'text-yellow-300' : 'text-gray-300' }}" fill="{{ ($product->ratings->count() != 0 && 5 <= ($product->ratings->sum('rating') / $product->ratings->count())) ? 'currentColor' : 'none' }}" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-xl font-bold tracking-tighter capitalize "><a class="border-gray-800 hover:border-b-2" href="{{ route('product.details', ['slug' => $product->slug ]) }}">{{ $product->name }}</a></h1>
                    <div class="flex items-end justify-center gap-2">
                        @if($product->sale_price > 0)
                        <div class="text-xl text-orange-500 font-semitbold">${{ $product->sale_price }}</div>
                        <div class="text-base text-gray-500 line-through font-semitbold">${{ $product->regular_price }}
                        </div>
                        @else
                        <div class="text-xl text-orange-500 font-semitbold">${{ $product->regular_price }}</div>
                        @endif
                    </div>
                </div>
                @if ($witems->contains($product->id))
                <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id }})"
                    class="absolute p-2 bg-gray-500 rounded-full cursor-pointer hover:bg-gray-600 top-2 right-12 md:top-2 md:right-12">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-6 h-6 text-white">
                        <path
                            d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                    </svg>
                </a>
                @else
                <a href="#"
                    wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regular_price }})"
                    class="absolute p-2 bg-indigo-500 rounded-full cursor-pointer hover:bg-indigo-600 top-2 right-12 md:top-2 md:right-12">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-6 h-6 text-white">
                        <path
                            d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                    </svg>
                </a>
                @endif

                @if ($citems->contains($product->id))

                <a href="#" wire:click.prevent="removeFromCart({{ $product->id }})"
                    class="absolute p-2 bg-gray-500 rounded-full cursor-pointer hover:bg-gray-600 top-2 right-2 md:top-2 md:right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-6 h-6 text-white">
                        <path
                            d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                </a>
                @else
                <a href="#"
                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regular_price }})"
                    class="absolute p-2 bg-orange-500 rounded-full cursor-pointer hover:bg-orange-600 top-2 right-2 md:top-2 md:right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-6 h-6 text-white">
                        <path
                            d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                </a>
                @endif

            </div>
            @endforeach

        </div>
    </div>

    <div wire:loading.delay.long>

        <!-- Loading screen -->
        <div show="true"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-10 text-3xl">
            <!-- style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"> -->
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
