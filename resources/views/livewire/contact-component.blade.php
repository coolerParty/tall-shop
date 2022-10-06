<div class="w-full pt-10 pb-10 mb-10">
    <div class="container mx-auto">
        <h3 class="text-3xl font-semibold text-center capitalize">Contact Us</h3>
        <h1 class="text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">We want to hear from you
        </h1>
        <div class="grid grid-cols-1 mt-10 mb-10 md:grid-cols-2">
            <div class="mt-2 md:mr-4 dark:bg-gray-800 sm:rounded-lg">
                <img loading="lazy" src="{{ asset('assets/images/contact/order-img.jpg') }}" alt="" class="object-cover w-full">
            </div>
            <form class="flex flex-col justify-center m-2 md:m-0" wire:submit.prevent="sendMessage">
                @if (Session::has('message'))
                <div x-data="{ msg:'true'}">
                    <template x-if="msg">
                        <div class="w-full text-white bg-indigo-500">
                            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                <div class="flex">
                                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                        <path
                                            d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                        </path>
                                    </svg>

                                    <p class="mx-3">{{ Session::get('message') }}</p>
                                </div>

                                <button @click="msg = '' "
                                    class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
                @endif
                <div class="flex flex-col">
                    <label for="name" class="hidden">Full Name</label>
                    @error('name')<div class="text-xs italic text-red-500">{{ $message }}</div>@enderror
                    <input type="name" name="name" id="name" placeholder="Full Name"
                        class="px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none @error('name') border-red-400 focus:border-red-500 text-red-800 @enderror"
                        wire:model="name">
                </div>

                <div class="flex flex-col mt-1">
                    <label for="email" class="hidden">Email</label>
                    @error('email')<div class="text-xs italic text-red-500">{{ $message }}</div>@enderror
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="px-3 py-3 mt-1 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none @error('email') border-red-400 focus:border-red-500 text-red-800 @enderror"
                        wire:model="email">
                </div>

                <div class="flex flex-col mt-1">
                    <label for="tel" class="hidden">Number</label>
                    @error('phone')<div class="text-xs italic text-red-500">{{ $message }}</div>@enderror
                    <input type="tel" name="tel" id="tel" placeholder="Telephone Number"
                        class="px-3 py-3 mt-1 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none @error('phone') border-red-400 focus:border-red-500 text-red-800 @enderror"
                        wire:model="phone">
                </div>

                <div class="flex flex-col mt-1">
                    <label for="msg" class="hidden">Message</label>
                    @error('comment')<div class="text-xs italic text-red-500">{{ $message }}</div>@enderror
                    <textarea name="msg" id="msg" placeholder="Message" cols="30" rows="5"
                        class="px-3 py-3 mt-1 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none @error('comment') border-red-400 focus:border-red-500 text-red-800 @enderror"
                        wire:model="comment"></textarea>
                </div>

                <button type="submit"
                    class="px-6 py-3 mt-3 font-bold text-white transition duration-300 ease-in-out bg-indigo-600 md:w-32 hover:bg-blue-dark hover:bg-indigo-500">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
