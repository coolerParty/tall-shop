<div class="w-full bg-orange-200">
    @section('title', 'Menu')
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
                <div
                    class="grid gap-1 sm:grid-cols-2 md:gap-1 md:grid-cols-2 lg:gap-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-3">

                    @foreach($products as $product)
                    <div class="relative w-full p-2 bg-white border rounded md:m-0 md:border-0">
                        <div class="relative w-full">
                            <img src="{{ asset('storage/assets/product/medium') }}/{{ $product->image }}" alt=""
                                class="object-cover w-full aspect-video">
                            <span
                                class="absolute px-3 py-1 text-lg font-semibold text-white bg-orange-500 shadow-lg top-2 left-2 md:text-xl lg:text-2xl">${{
                                $product->sale_price }}</span>
                        </div>
                        <div class="p-2 mb-9 md:mb-6">
                            <h1
                                class="mt-3 mb-3 text-lg font-bold leading-none tracking-tighter text-gray-800 capitalize">
                                {{ $product->name }}</h1>
                            <p class="mb-5 leading-5 text-gray-600">{{ $product->short_description }}</p>
                        </div>

                        <div class="absolute flex justify-center gap-1 text-center bottom-2 left-2">
                            @if ($witems->contains($product->id))
                            <a href="#"
                                class="px-2 py-1 text-base text-gray-500 capitalize bg-gray-300 border border-gray-500 shadow hover:bg-gray-400 md:px-4 md:py-2 "
                                wire:click.prevent="removeFromWishlist({{ $product->id }})">Remove Wishlist</a>
                            @else
                            <a href="#"
                                wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}',{{ $product->regular_price }})"
                                class="px-2 py-1 text-base text-indigo-500 capitalize border border-indigo-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-indigo-500 ">Add
                                to Wishlist</a>
                            @endif
                            @if ($citems->contains($product->id))
                            <a href="#"
                                class="px-2 py-1 text-base text-gray-500 capitalize bg-gray-300 border border-gray-500 shadow hover:bg-gray-400 md:px-4 md:py-2 "
                                wire:click.prevent="removeFromCart({{ $product->id }})">Remove Cart</a>
                            @else
                            <a href="#"
                                wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}',{{ $product->regular_price }})"
                                class="px-2 py-1 text-base text-orange-500 capitalize border border-orange-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-orange-500 ">Add
                                to Cart</a>
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
            <div  show="true"
                class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-10 text-3xl">
                <!-- style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"> -->
                Loading.....
            </div>
    </div>

</div>
