<div class="w-full pb-10 bg-orange-200">
    @section('title', 'Change Password')
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

    <!-- order section starts  -->
    <section class="container mx-auto" id="order">
        <h1 class="p-1 mt-10 text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize md:p-0">Change
            Password
        </h1>

        <form class="w-full mx-auto mt-10" wire:submit.prevent="changePassword">
            <div class="max-w-md pb-10 mx-auto mt-5">
                <div>
                    <!-- Password Start -->
                    @if (Session::has('password_success'))
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

                                        <p class="mx-3">{{ Session::get('password_success') }}</p>
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
                    @if (Session::has('password_error'))
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

                                        <p class="mx-3">{{ Session::get('password_error') }}</p>
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
                    <div class="bg-white rounded-md shadow-lg p-7">
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="current_password">
                                    Current Password
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('current_password') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="current_password" type="password" placeholder="Current Password"
                                    wire:model.lazy="current_password">
                                @error('current_password') <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="password">
                                    New Password
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="password" type="password" placeholder="Password" wire:model.lazy="password">
                                @error('password') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="password_confirmation">
                                    Password Confirmation
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="password_confirmation" type="password" placeholder="Password Confirmation"
                                    wire:model.lazy="password_confirmation">
                                @error('password_confirmation') <p class="text-xs italic text-red-500">{{ $message }}
                                </p>@enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                                        clip-rule="evenodd" />
                                </svg>

                                Submit</button>
                        </div>
                    </div>
                    <!-- Password End -->
                </div>
            </div>
        </form>
    </section>
    <!-- order section ends -->

    <div wire:loading.delay.long wire:target="placeOrder">
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
