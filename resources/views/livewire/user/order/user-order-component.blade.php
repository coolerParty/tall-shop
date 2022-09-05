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
                                    Price
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-right text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-1 text-xs text-center text-gray-500 uppercase md:font-medium md:tracking-wider md:px-6 md:py-3">
                                    Date
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
                            @forelse($orders as $order)
                            <tr class="transition-all hover:shadow">
                                <td class="flex flex-wrap gap-2 p-1 md:px-3 md:py-10">
                                    @foreach($order->orderItems as $orderItem)
                                    <div class="relative">
                                        <a href="{{ asset('storage/assets/product/large') }}/{{ $orderItem->product->image }}"
                                            target="_blank"><img
                                                class="object-cover w-10 h-10 rounded-full cursor-pointer md:w-15 md:h-15 lg:w-20 lg:h-20 xl:w-30 xl:h-30 hover:shadow-lg hover:scale-105"
                                                src="{{ asset('storage/assets/product/thumbnail') }}/{{ $orderItem->product->image }}" /></a>
                                        <span
                                            class="absolute bottom-0 right-0 p-1 text-xs text-white bg-gray-700 rounded-lg md:px-2 md:py-1">{{
                                            $orderItem->quantity }}</span>
                                    </div>
                                    @endforeach
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-right text-orange-600">{{
                                        number_format($order->total,2) }}</div>
                                </td>
                                <td class="p-1 md:px-6 md:py-4">
                                    <div class="text-gray-900">
                                        @if($order->status == 'ordered')
                                        <span
                                            class="px-2 py-1 text-sm capitalize bg-indigo-300 rounded-full">ordered</span>
                                        @elseif($order->status == 'delivered')
                                        <span
                                            class="px-3 py-1 text-sm capitalize bg-green-300 rounded-full">delivered</span>
                                        @elseif($order->status == 'canceled')
                                        <span
                                            class="px-3 py-1 text-sm capitalize bg-gray-300 rounded-full">canceled</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-1 text-right md:px-6 md:py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{
                                        $order->created_at->format('d/m/Y') }}</div>
                                </td>
                                <td class="p-1 text-sm font-medium text-right md:px-6 md:py-4">
                                    <x-link-success href="{{ route('user.order.show',['order_id'=> $order->id]) }}"
                                        class="text-xs xs:p-1" title="Save for later.">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z"
                                                clip-rule="evenodd" />
                                        </svg>


                                    </x-link-success>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="px-6 py-4 text-center whitespace-nowrap">
                                        <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">No item found in
                                            cart.</h3>
                                        <h1
                                            class="p-1 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">
                                            Add Dishes to it now!</h1>
                                        <x-link-success href="{{ route('menu') }}" class="px-10 py-5 mt-5">Shop Now!
                                        </x-link-success>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container p-2 m-2 mx-auto md:p-0">{!! $orders->links() !!}</div>
    </div>
    <!-- Cart END -->



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
