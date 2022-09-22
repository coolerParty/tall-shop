<div class="px-3 pt-10 pb-10 mt-10 mb-10 font-sans leading-normal tracking-normal bg-orange-200">
    <h3 class="mt-10 text-3xl font-semibold text-center capitalize">customer's review </h3>
    <h1 class="text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">what they say</h1>
    <div class="container mx-auto mt-10 mb-10">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
            @foreach($reviews as $review)

            <div
                class="p-3 transition duration-150 ease-in-out transform bg-white hover:shadow-lg hover:rounded hover:scale-102">
                <div class="m-5">
                    <div class="flex space-x-0.5">
                        <svg class="w-5 h-5 {{ ($review->count() != 0 && 1 <= ($review->sum('rating') / $review->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($review->count() != 0 && 1 <= ($review->sum('rating') / $review->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($review->count() != 0 && 2 <= ($review->sum('rating') / $review->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($review->count() != 0 && 2 <= ($review->sum('rating') / $review->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($review->count() != 0 && 3 <= ($review->sum('rating') / $review->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($review->count() != 0 && 3 <= ($review->sum('rating') / $review->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($review->count() != 0 && 4 <= ($review->sum('rating') / $review->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($review->count() != 0 && 4 <= ($review->sum('rating') / $review->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 {{ ($review->count() != 0 && 5 <= ($review->sum('rating') / $review->count())) ? 'text-yellow-300' : 'text-gray-300' }}"
                            fill="{{ ($review->count() != 0 && 5 <= ($review->sum('rating') / $review->count())) ? 'currentColor' : 'none' }}"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </div>
                    <p class="mt-2 text-sm font-medium leading-5 text-gray-500">{{ $review->created_at }}</p>
                </div>
                <div class="m-5 space-y-1">
                    <h3 class="font-semibold text-gray-800">{{ $review->title }}
                    </h3>
                    <p class="text-sm leading-5 text-gray-500">{{ $review->comment }}</p>
                </div>

                <div class="flex items-center m-5 space-x-2">
                    @if($review->orderItem->order->user->profile_photo_path)
                    <img class="object-cover w-8 h-8 border-2 border-purple-900 rounded-full"
                        src="{{ asset('storage/assets/profile/small') }}/{{ $review->orderItem->order->user->profile_photo_path }}"
                        alt="" />
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 border-purple-900 rounded-full"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    @endif
                    <div class="text-sm">
                        <p class="font-semibold leading-5 text-gray-900">{{ $review->orderItem->order->user->name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
