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
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-right text-gray-500 uppercase">
                                    total
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    created_at
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($orders as $order)
                            <tr class="transition-all hover:bg-gray-100 ">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    @if($order->user->profile_photo_path)
                                    <img class="object-cover w-10 h-10 rounded-md cursor-pointer hover:shadow-lg"
                                        src="{{ asset('storage/assets/user/profile-photo/thumbnail') }}/{{ $order->user->profile_photo_path }}" />
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->user->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    <div class="text-sm text-gray-900">{{ $order->user->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">${{
                                        number_format($order->total,2) }}</div>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                    <div class="text-gray-900 ">
                                        <div class="relative" x-data="{ isOpen: false }">
                                            <button @click="isOpen = !isOpen" class="px-4 py-2 rounded-md text-sm text-white  focus:outline-none focus:ring flex items-center space-x-1 capitalize
                                                @if($order->status == 'ordered')
                                                bg-indigo-700 hover:bg-indigo-600
                                                @elseif($order->status == 'delivered')
                                                bg-green-700 hover:bg-green-600
                                                @elseif($order->status == 'canceled')
                                                bg-gray-700 hover:bg-gray-600
                                                @endif
                                                ">
                                                <span>
                                                    @if($order->status == 'ordered')
                                                    ordered
                                                    @elseif($order->status == 'delivered')
                                                    delivered
                                                    @elseif($order->status == 'canceled')
                                                    cancelled
                                                    @endif
                                                </span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-4 h-4">
                                                    <path fill-rule="evenodd"
                                                        d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <div @click.away="isOpen = false" x-show.transition.opacity="isOpen"
                                                class="absolute z-50 max-w-md text-white transform bg-white shadow-lg w-36 -translate-x-1/4 min-w-max">
                                                <ul class="flex flex-col">
                                                    @if($order->status == 'ordered')
                                                    <li><a class="block px-3 py-2 transition bg-green-700 hover:bg-green-600"
                                                            href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                                    </li>
                                                    <li><a class="block px-3 py-2 transition bg-gray-700 hover:bg-gray-600"
                                                            href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a>
                                                    </li>
                                                    @elseif($order->status == 'delivered')
                                                    <li><a class="block px-3 py-2 transition bg-gray-700 hover:bg-gray-600"
                                                            href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a>
                                                    </li>
                                                    @elseif($order->status == 'canceled')
                                                    <li><a class="block px-3 py-2 transition bg-green-700 hover:bg-green-600"
                                                            href="#"
                                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->created_at }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    @can('slider-edit')
                                    <x-link-success href="{{ route('admin.order.show', ['order_id' => $order->id]) }}">
                                        Details
                                    </x-link-success>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 text-center whitespace-nowrap" colspan="9">
                                    <div class="text-sm font-medium text-gray-900">No orders found.</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </div>
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
