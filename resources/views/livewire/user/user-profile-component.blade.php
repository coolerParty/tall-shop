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

        <div class="w-full mx-auto mt-10">
            <div class="grid w-full grid-cols-1 gap-0 mt-5 bg-white rounded-md shadow-lg md:grid-cols-2">

                <div class="grid content-center justify-center w-full h-full">
                    @if($user->profile_photo_path)
                    <img class="rounded-lg"
                        src="{{ asset('storage/assets/user/profile-photo/large') }}/{{ $user->profile_photo_path }}"
                        width="100%" alt="">
                    @else
                    <img class="rounded-lg" src="{{ asset('storage/assets/user/profile-photo/large') }}/default.png"
                        width="100%" alt="">
                    @endif
                </div>
                <div>
                    <!-- Billing Address Start -->
                    <div class="p-5">
                        <h1 class="mb-5 text-xl font-semibold text-orange-500">User Profile</h1>
                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="firstname">
                                    First Name
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $user->name }}</div>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="lastname">
                                    Last Name
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $user->lastname }}</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="mobile">
                                    mobile
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->mobile }}</div>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="email">
                                    email
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $user->email }}</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="line1">
                                    line1
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->line1 }}</div>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="line2">
                                    line2
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->line2 }}</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="city">
                                    city
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->city }}</div>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="province">
                                    province
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->province }}</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-6 -mx-3">
                            <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="country">
                                    country
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->country }}</div>
                            </div>
                            <div class="w-full px-3 md:w-1/2">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                    for="zipcode">
                                    zipcode
                                </label>
                                <div class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 border-b border-gray-300 appearance-none focus:outline-none focus:bg-white"
                                    >{{ $userProfile->zipcode }}</div>
                            </div>
                            <x-link-success href="{{ route('user.profile.edit') }}"  name="submit" >Edit</x-link-success>
                        </div>
                    </div>
                    <!-- Billing Address End -->
                </div>
            </div>
        </div>
    </section>
    <!-- order section ends -->
</div>
