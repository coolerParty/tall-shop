<div>
    @section('title', 'Admin / Product')
    <!-- Main content header -->
    <div
        class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Product</h1>
        @can('product-create')
        <a href="{{ route('admin.product.create') }}"
            class="inline-flex items-center px-6 py-2 space-x-1 text-white bg-purple-600 rounded-md shadow hover:bg-opacity-95">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <span>Add New</span>
        </a>
        @endcan
    </div>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    category
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    quantity
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    featured
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    stock_status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    active
                                </th>
                                <th scope="col" class="relative px-6 py-3">
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
                            @forelse($products as $product)
                            <tr class="transition-all hover:bg-gray-100 ">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    @if($product->image)
                                    <a href="{{ asset('storage/assets/product/large') }}/{{ $product->image }}" target="_blank"><img class="object-cover w-10 h-10 rounded-md cursor-pointer hover:shadow-lg" src="{{ asset('storage/assets/product/thumbnail') }}/{{ $product->image }}" /></a>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $product->quantity }}</div>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                    @can('product-edit')
                                        <input class="float-left h-5 align-top bg-gray-300 bg-no-repeat bg-contain rounded-full shadow-sm appearance-none cursor-pointer form-check-input w-9 focus:outline-none" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ ($product->featured == 1)? 'checked' : '' }} wire:click.prevent="updateFeatured({{ $product->id }},{{ $product->featured }})">
                                    @else
                                        <div class="text-sm py-1 px-3 rounded-full text-gray-800 {{ ($product->featured == 1) ? 'bg-green-200' : 'bg-gray-200' }}">{{ ($product->featured == 1) ? 'Active' : 'Inactive' }}</div>
                                    @endcan
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                    @can('product-edit')
                                        <input class="float-left h-5 align-top bg-gray-300 bg-no-repeat bg-contain rounded-full shadow-sm appearance-none cursor-pointer form-check-input w-9 focus:outline-none" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ ($product->stock_status == 'instock')? 'checked' : '' }} wire:click.prevent="updateStocked({{ $product->id }},'{{ $product->stock_status }}')">
                                    @else
                                        <div class="text-sm py-1 px-3 rounded-full text-gray-800 {{ ($product->stock_status == 'instock') ? 'bg-green-200' : 'bg-gray-200' }}">{{ ($product->stock_status == 'instock' ) ? 'Instock' : 'Out of Stock' }}</div>
                                    @endcan
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                    @can('product-edit')
                                        <input class="float-left h-5 align-top bg-gray-300 bg-no-repeat bg-contain rounded-full shadow-sm appearance-none cursor-pointer form-check-input w-9 focus:outline-none" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ ($product->active == 1)? 'checked' : '' }} wire:click.prevent="updateActive({{ $product->id }},{{ $product->active }})">
                                    @else
                                        <div class="text-sm py-1 px-3 rounded-full text-gray-800 {{ ($product->active == 1) ? 'bg-green-200' : 'bg-gray-200' }}">{{ ($product->active == 1) ? 'Active' : 'Inactive' }}</div>
                                    @endcan
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    @can('slider-edit')
                                    <x-link-success href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}"> Edit
                                    </x-link-success>
                                    @can('slider-delete')
                                    @endcan
                                    <x-link-danger href="#" class="btn btn-danger btn-sm text-light"
                                        onclick="confirm('Are you sure, You want to delete this country?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="destroy({{ $product->id }})">
                                        Delete
                                    </x-link-danger>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 text-center whitespace-nowrap" colspan="9">
                                    <div class="text-sm font-medium text-gray-900">No Product Found</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
