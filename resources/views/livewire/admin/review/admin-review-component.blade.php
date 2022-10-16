<div>
    @section('title', 'Admin / Reviews')
    <!-- Main content header -->
    <div
        class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Reviews</h1>
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
                                    Product
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-right text-gray-500 uppercase">
                                    rating
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    comment
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    created_at
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    User
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($reviews as $review)
                            <tr class="transition-all hover:bg-gray-100">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <a href="{{ route('product.details', ['slug' => $review->pSlug ]) }}"><img
                                            class="object-cover w-10 h-10 rounded-md cursor-pointer hover:shadow-lg"
                                            src="{{
                                                asset(
                                                    'storage/assets/product/thumbnail'
                                                )
                                            }}/{{ $review->pImage }}" /></a>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm font-semibold text-gray-900">
                                        <a class="hover:text-orange-500"
                                            href="{{ route('product.details', ['slug' => $review->pSlug  ]) }}">{{
                                            $review->pName }}</a>
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-gray-900 dark:text-white">
                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $review->rTitle }}
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm font-semibold text-gray-900">
                                        <div class="m-5">
                                            <div class="flex space-x-0.5">
                                                <svg class="w-4 h-4 {{ ($review->rRating != 0 && 1 <= $review->rRating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                                    fill="{{ ($review->rRating != 0 && 1 <= $review->rRating) ? 'currentColor' : 'none' }}"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                                <svg class="w-4 h-4 {{ ($review->rRating != 0 && 2 <= $review->rRating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                                    fill="{{ ($review->rRating != 0 && 2 <= $review->rRating) ? 'currentColor' : 'none' }}"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                                <svg class="w-4 h-4 {{ ($review->rRating != 0 && 3 <= $review->rRating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                                    fill="{{ ($review->rRating != 0 && 3 <= $review->rRating) ? 'currentColor' : 'none' }}"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                                <svg class="w-4 h-4 {{ ($review->rRating != 0 && 4 <= $review->rRating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                                    fill="{{ ($review->rRating != 0 && 4 <= $review->rRating) ? 'currentColor' : 'none' }}"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                                <svg class="w-4 h-4 {{ ($review->rRating != 0 && 5 <= $review->rRating) ? 'text-yellow-300' : 'text-gray-300' }}"
                                                    fill="{{ ($review->rRating != 0 && 5 <= $review->rRating) ? 'currentColor' : 'none' }}"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-left text-gray-900 dark:text-white">
                                    <div class="text-xs font-semibold text-gray-600">
                                        {{ $review->rComment }}
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $review->rCreated_at }}
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div
                                        class="flex items-center content-center justify-center mr-2 space-x-1 text-sm font-semibold text-gray-900">
                                        @if($review->profile_photo_path)
                                        <img class="object-cover w-8 h-8 border-2 border-purple-900 rounded-full" src="{{
                                                asset(
                                                    'storage/assets/user/profile-photo/thumbnail'
                                                )
                                            }}/{{ $review->profile_photo_path }}" alt="" />
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 border-purple-900 rounded-full" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @endif
                                        <div class="text-sm">
                                            <p class="font-semibold leading-5 text-gray-900">
                                                {{
                                                $review->uName }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 text-center whitespace-nowrap" colspan="9">
                                    <div class="text-sm font-medium text-gray-900">
                                        No reviews found.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">{!! $reviews->links() !!}</div>
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
