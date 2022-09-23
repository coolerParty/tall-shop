<div class="w-full pb-10 bg-orange-200">
    @section('title', 'Profile' )
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
        <h3 class="p-1 mt-10 text-3xl font-semibold text-center capitalize md:p-0">order now</h3>
        <h1 class="p-1 text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize md:p-0">free and fast
        </h1>

        <form class="w-full mx-auto mt-10" wire:submit.prevent="update">
            <div class="grid w-full grid-cols-1 gap-0 mt-5 bg-white rounded-md shadow-lg md:grid-cols-2">

                <div class="relative grid content-center justify-center w-full h-full p-5">
                    @if ($newimage)
                    <img class="object-cover w-full h-full rounded-lg aspect-square"
                        src="{{ $newimage->temporaryUrl() }}" alt="" width="100%">
                    <x-link-danger type="button" wire:click="removeImage" class="absolute block w-full cursor-pointer bottom-5">Remove
                        Selected Image</x-link-danger>
                    @elseif($profile_photo_path)
                    <img class="object-cover w-full h-full rounded-lg aspect-square"
                        src="{{ asset('storage/assets/user/profile-photo/large') }}/{{ $profile_photo_path }}"
                        width="100%" alt="">
                    @else
                    <img class="rounded-full" src="{{ asset('storage/assets/user/profile-photo/large') }}/default.png"
                        width="100%" alt="">
                    @endif
                </div>
                    <!-- Billing Address Start -->
                    <div class="p-5">
                        <h1 class="mb-5 text-xl font-semibold text-orange-500">User Profile Edit</h1>
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="name">
                                    First Name
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('name') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="name" type="text" placeholder="name" wire:model.lazy="name">
                                @error('name') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="lastname">
                                    Last Name
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="lastname" type="text" placeholder="lastname" wire:model.lazy="lastname">
                                @error('lastname') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="mobile">
                                    mobile
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('mobile') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="mobile" type="text" placeholder="mobile" wire:model.lazy="mobile">
                                @error('mobile') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="email">
                                    email
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="email" type="email" placeholder="example@email.com" wire:model.lazy="email">
                                @error('email') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="line1">
                                    line1
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('line1') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="line1" type="text" placeholder="line1" wire:model.lazy="line1">
                                @error('line1') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="line2">
                                    line2
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="line2" type="text" placeholder="line2" wire:model.lazy="line2">
                                @error('line2') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="city">
                                    city
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('city') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="city" type="text" placeholder="city" wire:model.lazy="city">
                                @error('city') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="province">
                                    province
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="province" type="text" placeholder="province" wire:model.lazy="province">
                                @error('province') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="country">
                                    country
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('country') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="country" type="text" placeholder="country" wire:model.lazy="country">
                                @error('country') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="zipcode">
                                    zipcode
                                </label>
                                <input
                                    class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('firstname') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white"
                                    id="zipcode" type="text" placeholder="zipcode" wire:model.lazy="zipcode">
                                @error('zipcode') <p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>
                        </div>


                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="newimage">Image</label>
                            <input id="newimage" type="file" name="newimage" wire:model="newimage"
                                autocomplete="newimage"
                                class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border @error('newimage') border-red-500 @enderror rounded appearance-none focus:outline-none focus:bg-white">
                            @error('newimage')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            <div class="block w-full px-4 py-2 m-1 text-white bg-emerald-500 " wire:loading
                                wire:target="newimage">
                                Uploading...
                            </div>
                        </div>
                        </div>

                    <x-button-success type="submit" value="submit" name="submit">Update</x-button-success>
                    <x-link-success href="{{ route('user.profile') }}"  name="submit" >Cancel</x-link-success>
                    </div>

                    <!-- Billing Address End -->
            </div>
        </form>
    </section>
    <!-- order section ends -->
</div>
