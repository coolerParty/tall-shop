<div>
    @section('title', 'Users Create')
    <!-- Main content header -->
    <div
        class="flex flex-col items-start justify-between pb-6 mb-2 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-lg font-semibold whitespace-nowrap">Users <span class="text-base text-gray-400">/</span> <span
                class="text-2xl">Create</span></h1>
        <a href="{{ route('admin.users.index') }}"
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
    <div class="max-w-full max-h-screen md:bg-gray-300 md:p-4">

        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <x-jet-validation-errors class="mb-4" />
            <form wire:submit.prevent="store">
                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" wire:model="name" required
                            autofocus autocomplete="name"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="title">email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" wire:model="email"
                            required autofocus autocomplete="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password">password</label>
                        <input id="password" type="password" name="password" value="{{ old('new password') }}"
                            wire:model="password" required autofocus autocomplete="password"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="password_confirmation">password
                            confirmation</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            wire:model="password_confirmation" value="{{ old('password_confirmation') }}" required
                            autofocus autocomplete="password_confirmation"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        <x-jet-input-error for="password_confirmation" class="mt-2" />
                    </div>
                </div>

                <div class="mt-4">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="image">Image</label>
                        <input id="image" type="file" name="image" wire:model="image" autocomplete="image"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
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

                <div class="mt-4">
                    <div class="py-4"><strong>Roles:</strong></div>
                    @foreach($roles as $value)
                    <div class="grid gap-1 md:grid-cols-4">
                        <div class="w-full p-2 m-1 border shadow-sm">
                            <label>
                                <input type="checkbox" value="{{ $value->id }}"
                                    class="{{ $value->name  }} rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-indigo-900"
                                    wire:model="userRoles" {{ in_array($value->id , $userRoles) ? 'checked' : ''
                                }}>
                                {{ $value->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>
        </section>
    </div>
</div>
