<div class="w-full bg-orange-200">
    @section('title', 'Order Details')
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
    <div class="container p-5 mx-auto ">
        <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">Popular Dishes</h3>
        <h1 class="p-1 mb-10 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">Our Delicious Food</h1>
        <!-- Order Items Start -->
        <div class="flex flex-col">
            <div class="-my-3 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 rounded-md ">
                        <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th colspan="5"
                                        class="px-6 py-4 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                                        Ordered Items</th>
                                </tr>
                                <tr class="bg-gray-100">
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
                                        price
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-center text-right text-gray-500 uppercase">
                                        quantity
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                        rstatus
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($orderItems as $orderItem)
                                <tr class="transition-all">
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        @if($orderItem->product->image)
                                        <img class="object-cover w-10 h-10 rounded-md cursor-pointer hover:shadow-lg"
                                            src="{{ asset('storage/assets/product/thumbnail') }}/{{ $orderItem->product->image }}" />
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
                                        <div class="text-sm font-semibold text-gray-900">{{ $orderItem->product->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                                        <div class="text-sm text-gray-900">${{ $orderItem->price }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-right text-gray-900">{{
                                            $orderItem->quantity }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                        <div class="text-gray-900 ">{{ $orderItem->rstatus}}</div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                    <td class="px-6 py-4 text-center whitespace-nowrap" colspan="9">
                                        <div class="text-sm font-medium text-gray-900">No items found.</div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Order Items End -->
        <div class="grid w-full grid-cols-1 gap-2 pb-10 mt-5 md:grid-cols-2">
            <!-- Order Summary START -->
            <div class="md:order-last">
                <div class="overflow-hidden border-b border-gray-200 rounded-md ">
                    <table class="w-full overflow-x-scroll divide-y divide-gray-200 rounded-md ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="2"
                                    class="px-6 py-4 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
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
                                        number_format($order->subtotal + $order->discount, 2) }}</div>
                                </td>
                            </tr>
                            @if($order->discount > 0)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex text-sm text-left text-gray-900">Discount</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">
                                        -${{number_format($order->discount,2)}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Subtotal with Discount</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">
                                        ${{number_format($order->subtotal,2)}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Tax</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">
                                        ${{number_format($order->tax ,2)}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-base font-bold text-left text-gray-900">Total</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base font-bold text-right text-gray-900">
                                        ${{number_format($order->total ,2)}}</div>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Tax</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">${{
                                        number_format($order->tax ,2) }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-base font-bold text-left text-gray-900">Total</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-base font-bold text-right text-gray-900">${{
                                        number_format($order->total , 2) }}</div>
                                </td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
                <div class="mt-2 overflow-hidden border-b border-gray-200 rounded-md ">
                    <table class="w-full overflow-x-scroll divide-y divide-gray-200 rounded-md ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="2"
                                    class="px-6 py-4 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                                    Transaction Details</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Transaction Mode</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">{{
                                        $order->transaction->mode }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Status</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">{{
                                        $order->transaction->status }}</div>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Transactino Date</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-right text-gray-900">
                                        {{$order->transaction->created_at }}</div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
            <!-- Order Summary END -->
            <div class="">
                <!-- Billing Details START -->
                <div class="overflow-hidden border-b border-gray-200 rounded-md ">
                    <table class="w-full overflow-x-scroll divide-y divide-gray-200 rounded-md ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="2"
                                    class="px-6 py-4 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                                    Billing Details</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">First Name</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->firstname }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Last Name</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->lastname }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Phone</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->mobile }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Email</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->email }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Line1</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->line1 }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Line2</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->line2 }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">city</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->city }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">province</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->province }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">country</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->country }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">zipcode</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->zipcode }}</div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <!-- Billing Details END -->
                <!-- Shipping Details START -->
                @if($order->is_shipping_different)
                <div class="mt-2 overflow-hidden border-b border-gray-200 rounded-md ">
                    <table class="w-full overflow-x-scroll divide-y divide-gray-200 rounded-md ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th colspan="2"
                                    class="px-6 py-4 text-xs text-left text-gray-500 uppercase md:tracking-wider md:px-6 md:py-3 md:font-medium">
                                    Shipping Details</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">First Name</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->firstname }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Last Name</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->lastname }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Phone</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->mobile }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Email</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->email }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Line1</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->line1 }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">Line2</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->line2 }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">city</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->city }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">province</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->province }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">country</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->country }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-left text-gray-900">zipcode</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $order->shipping->zipcode }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endif
                <!-- Shipping Details END -->
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
