<div class="w-full pt-10 mb-10">
    <div class="container mx-auto">
        <h3 class="text-3xl font-semibold text-center capitalize">Contact Us</h3>
        <h1 class="text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">We want to hear from you</h1>
            <div class="grid grid-cols-1 mt-10 md:grid-cols-2">
                <div class="mt-2 md:mr-4 dark:bg-gray-800 sm:rounded-lg">
                    <img src="{{ asset('assets/images/contact/order-img.jpg') }}" alt="" class="object-cover w-full">
                </div>
                <form class="flex flex-col justify-center">
                    <div class="flex flex-col">
                        <label for="name" class="hidden">Full Name</label>
                        <input type="name" name="name" id="name" placeholder="Full Name" class="px-3 py-3 mt-2 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col mt-1">
                        <label for="email" class="hidden">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="px-3 py-3 mt-1 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col mt-1">
                        <label for="tel" class="hidden">Number</label>
                        <input type="tel" name="tel" id="tel" placeholder="Telephone Number" class="px-3 py-3 mt-1 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none">
                    </div>

                    <div class="flex flex-col mt-1">
                        <label for="msg" class="hidden">Message</label>
                        <textarea name="msg" id="msg" placeholder="Message" cols="30" rows="5" class="px-3 py-3 mt-1 font-semibold text-gray-800 bg-white border border-gray-400 w-100 dark:bg-gray-800 dark:border-gray-700 focus:border-indigo-500 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="px-6 py-3 mt-3 font-bold text-white transition duration-300 ease-in-out bg-indigo-600 md:w-32 hover:bg-blue-dark hover:bg-indigo-500">
                        Submit
                    </button>
                </form>
            </div>
    </div>
</div>