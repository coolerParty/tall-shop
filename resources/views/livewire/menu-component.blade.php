<div class="w-full bg-orange-200">
    @section('title', 'Menu')
    <div class="w-full bg-white">
        <nav class="container p-2 mx-auto ">
            <ol class="flex list-reset">
                <li><a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="mx-2 text-gray-500">/</span></li>
                <li class="text-gray-500">Menu</li>
            </ol>
        </nav>
    </div>
    @if(Session::has('cart_message'))
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

                        <p class="mx-3">{{ Session::get('cart_message') }}</p>
                    </div>

                    <button @click="msg = '' "
                        class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </template>
    </div>
    @endif



    <div class="container mx-auto md:p-5">

        <div class="relative z-0 w-full pt-10 pb-10">
            <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">Popular Dishes</h3>
            <h1 class="p-1 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">Our Delicious Food
            </h1>
            <div class="w-full p-1 mt-10 md:p-0">
                <div class="grid gap-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                    @foreach($products as $product)
                    <div class="relative w-full p-1 bg-white border rounded-lg md:m-0 md:border-0">
                        <div class="relative w-full">
                            <a href="{{ route('product.details', ['slug' => $product->slug ]) }}"><img src="{{ asset('storage/assets/product/medium') }}/{{ $product->image }}" alt=""
                                class="object-cover w-full rounded-lg aspect-square"></a>
                            <div class="absolute top-2 right-2">
                                @if($product->sale_price > 0)
                                <span class="px-2 py-1 text-base font-semibold text-white bg-orange-500 shadow-lg">${{
                                    $product->sale_price }}</span>
                                <span
                                    class="px-2 py-1 text-xs font-semibold line-through bg-gray-400 shadow-lg text-black-100">${{
                                    $product->regular_price }}</span>
                                @else
                                <span class="px-2 py-1 text-base font-semibold text-white bg-orange-500 shadow-lg">${{
                                    $product->regular_price }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="p-2 mb-9 md:mb-6">
                            <h1
                                class="mt-2 mb-2 text-2xl font-semibold leading-none tracking-tighter text-gray-800 capitalize">
                                <a class="border-gray-800 hover:border-b-2" href="{{ route('product.details', ['slug' => $product->slug ]) }}">{{ $product->name }}</a>
                            </h1>
                            <div class="flex justify-start">
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
                            <p class="mt-2 mb-5 leading-5 text-gray-600">{{ $product->short_description }}</p>
                        </div>

                        <div class="absolute flex justify-center gap-1 text-center bottom-2 left-2">
                            @if ($witems->contains($product->id))
                            <a href="#"
                                class="px-2 py-1 text-base text-gray-500 capitalize bg-gray-300 border border-gray-500 shadow hover:bg-gray-400 md:px-4 md:py-2 "
                                wire:click.prevent="removeFromWishlist({{ $product->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>

                            </a>
                            @else
                            <a href="#"
                                wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regular_price }})"
                                class="px-2 py-1 text-base text-indigo-500 capitalize border border-indigo-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-indigo-500 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>

                            </a>
                            @endif
                            @if ($citems->contains($product->id))
                            <a href="#"
                                class="px-2 py-1 text-base text-gray-500 capitalize bg-gray-300 border border-gray-500 shadow hover:bg-gray-400 md:px-4 md:py-2 "
                                wire:click.prevent="removeFromCart({{ $product->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                </svg>

                            </a>
                            @else
                            <a href="#"
                                wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regular_price }})"
                                class="px-2 py-1 text-base text-orange-500 capitalize border border-orange-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-orange-500 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                </svg>

                            </a>
                            @endif


                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="w-full p-2 m-2 md:p-0">{!! $products->links() !!}</div>

    </div>


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
