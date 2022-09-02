<div class="w-full bg-orange-200">
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

    <div class="container mx-auto md:p-5">

        <div class="relative z-0 w-full pt-10 pb-10">
            <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">Popular Dishes</h3>
            <h1 class="p-1 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">Our Delicious Food</h1>
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
                            <a href="#"
                                class="px-2 py-1 text-base text-indigo-500 capitalize border border-indigo-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-indigo-500 ">Add
                                to Wishlist</a>
                            <a href="#"
                                class="px-2 py-1 text-base text-orange-500 capitalize border border-orange-500 shadow md:px-4 md:py-2 hover:text-white hover:bg-orange-500 ">Add
                                to Cart</a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="w-full p-2 m-2 md:p-0">{!! $products->links() !!}</div>
    </div>



</div>