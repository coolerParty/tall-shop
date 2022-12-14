<div>
    @section('title', 'Product Create')
    <!-- Main content header -->
    <div
        class="flex flex-col items-start justify-between pb-6 mb-2 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-lg font-semibold whitespace-nowrap">Product <span class="text-base text-gray-400">/</span> <span
                class="text-2xl">Create</span></h1>
        <a href="{{ route('admin.product.index') }}"
            class="inline-flex items-center px-6 py-2 space-x-1 text-white bg-purple-600 rounded-md shadow hover:bg-opacity-95">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg>
            </span>
            <span>Back</span>
        </a>
    </div>
    <div class="max-w-full md:bg-gray-300 md:p-4">

        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <form wire:submit.prevent="store">
                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" wire:model.lazy="name" required
                            autofocus autocomplete="name"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring
                            @error('name') border-red-500 @enderror">
                            @error('name')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="short_description">Short Description</label>
                        <textarea id="short_description" type="text" name="short_description" value="{{ old('short_description') }}" wire:model.lazy="short_description"
                            required autofocus autocomplete="short_description"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('short_description') border-red-500 @enderror" rows="6"></textarea>
                            @error('short_description')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="description">Description</label>
                        <textarea id="description" type="text" name="description" value="{{ old('description') }}" wire:model.lazy="description"
                            required autofocus autocomplete="description"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('description') border-red-500 @enderror" rows="6"></textarea>
                            @error('description')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="regular_price">Regular Price</label>
                        <input id="regular_price" type="number" step="any" name="regular_price" value="{{ old('regular_price') }}" wire:model.lazy="regular_price"
                            required autofocus autocomplete="regular_price"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            @error('regular_price') border-red-500 @enderror">
                            @error('regular_price')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="sale_price">Sale Price</label>
                        <input id="sale_price" type="number" step="any" name="sale_price" value="{{ old('sale_price') }}" wire:model.lazy="sale_price"
                            required autofocus autocomplete="sale_price"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring
                            @error('sale_price') border-red-500 @enderror">
                            @error('sale_price')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label for="stock_status" class="text-gray-700 dark:text-gray-200">Stock Status</label>
                        <select id="stock_status" name="stock_status" autocomplete="type-name" wire:model.lazy="stock_status"
                            class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('stock_status') border-red-500 @enderror">
                            <option value="instock">Instock</option>
                            <option value="outofstock">Out of Stock</option>
                        </select>
                        @error('stock_status')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label for="featured" class="text-gray-700 dark:text-gray-200">Featured</label>
                        <select id="featured" name="featured" wire:model.lazy="featured"
                            class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('featured') border-red-500 @enderror">
                            <option value="0">Don't Show</option>
                            <option value="1">Show</option>
                        </select>
                        @error('featured')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="quantity">Quantity</label>
                        <input id="quantity" type="number" name="quantity" value="{{ old('quantity') }}" wire:model.lazy="quantity"
                            required autofocus autocomplete="quantity"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring
                            @error('quantity') border-red-500 @enderror">
                            @error('quantity')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label for="category_id" class="text-gray-700 dark:text-gray-200">Category</label>
                        <select id="category_id" name="category_id" wire:model.lazy="category_id"
                            class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('category_id') border-red-500 @enderror">
                            <option value="">Select Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label for="active" class="text-gray-700 dark:text-gray-200">Active</label>
                        <select id="active" name="active" autocomplete="type-name" wire:model.lazy="active"
                            class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('active') border-red-500 @enderror">
                            <option value="0">Don't Show</option>
                            <option value="1">Show</option>
                        </select>
                        @error('active')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="image">Image</label>
                        <input id="image" type="file" name="image" wire:model="image" autocomplete="image"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('image') border-red-500 @enderror">
                            @error('image')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                        <div class="block w-full px-4 py-2 m-1 text-white bg-emerald-500 " wire:loading wire:target="image">
                            Uploading...
                        </div>
                        @if ($image)
                        <img class="object-cover rounded place-content-center w-30 h-30"
                            src="{{ $image->temporaryUrl() }}" alt="">
                        <x-link-danger type="button" wire:click="removeImage"
                            class="block w-full cursor-pointer">Remove Selected Image</x-link-danger>
                        @endif
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>
        </section>
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
