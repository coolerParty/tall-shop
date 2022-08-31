<div class="px-3 pt-10 pb-10 mt-10 mb-10 font-sans leading-normal tracking-normal bg-orange-200">
    <h3 class="mt-10 text-3xl font-semibold text-center capitalize">customer's review </h3>
    <h1 class="text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">what they say</h1>
    <div class="container mx-auto mt-10" x-data="{myForData: sourceData}">
        <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
            <template x-for="item in myForData" :key="item">

                <div
                    class="p-3 transition duration-150 ease-in-out transform bg-white hover:shadow-lg hover:rounded hover:scale-102">
                    <div class="m-5">
                        <div class="flex space-x-0.5">
                            <svg :class="1 <= item.rating ? 'text-yellow-300' : 'text-gray-300'" class="w-5 h-5"
                                :fill="1 <= item.rating ? 'currentColor' : 'none'" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg :class="2 <= item.rating ? 'text-yellow-300' : 'text-gray-300'" class="w-5 h-5"
                                :fill="2 <= item.rating ? 'currentColor' : 'none'" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg :class="3 <= item.rating ? 'text-yellow-300' : 'text-gray-300'" class="w-5 h-5"
                                :fill="3 <= item.rating ? 'currentColor' : 'none'" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg :class="4 <= item.rating ? 'text-yellow-300' : 'text-gray-300'" class="w-5 h-5"
                                :fill="4 <= item.rating ? 'currentColor' : 'none'" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg :class="5 <= item.rating ? 'text-yellow-300' : 'text-gray-300'" class="w-5 h-5"
                                :fill="5 <= item.rating ? 'currentColor' : 'none'" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </div>
                        <p class="mt-2 text-sm font-medium leading-5 text-gray-500" x-text="item.r_date"></p>
                    </div>
                    <div class="m-5 space-y-1">
                        <h3 class="font-semibold text-gray-800" x-text="item.title">
                        </h3>
                        <p class="text-sm leading-5 text-gray-500" x-text="item.body"></p>
                    </div>

                    <div class="flex items-center m-5 space-x-2">
                        <img class="object-cover w-8 h-8 border-2 border-purple-900 rounded-full"
                            :src="`${item.profile_image}`" />
                        <div class="text-sm">
                            <p class="font-semibold leading-5 text-gray-900" x-text="item.employee_name"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
    <script>
        var sourceData = [
            {
                id: "1",
                employee_name: "Tiger Nixon",
                title: "There's a reason they're number one",
                body: "There's not much to say about YETI stainless steel tumblers that hasn't been said. There's a reason they're so highly rated. I filled mine with ice and water at 8:30am last week and drove to work sipping it. I left it in my car when I went into the office.",
                employee_age: "61",
                rating: "4",
                r_date: "12.09.2019",
                profile_image: "https://randomuser.me/api/portraits/men/1.jpg",
            },
            {
                id: "2",
                employee_name: "Garrett Winters",
                title: "There's a reason they're number one",
                body: "There's not much to say about YETI stainless steel tumblers that hasn't been said. There's a reason they're so highly rated. I filled mine with ice and water at 8:30am last week and drove to work sipping it. I left it in my car when I went into the office.",
                employee_age: "63",
                rating: "5",
                r_date: "12.09.2019",
                profile_image: "https://randomuser.me/api/portraits/men/2.jpg",
            },
            {
                id: "3",
                employee_name: "Ashton Cox",
                title: "There's a reason they're number one",
                body: "There's not much to say about YETI stainless steel tumblers that hasn't been said. There's a reason they're so highly rated. I filled mine with ice and water at 8:30am last week and drove to work sipping it. I left it in my car when I went into the office.",
                employee_age: "66",
                rating: "2",
                r_date: "12.09.2019",
                profile_image: "https://randomuser.me/api/portraits/men/3.jpg",
            },
            {
                id: "4",
                employee_name: "Cedric Kelly",
                title: "There's a reason they're number one",
                body: "There's not much to say about YETI stainless steel tumblers that hasn't been said. There's a reason they're so highly rated. I filled mine with ice and water at 8:30am last week and drove to work sipping it. I left it in my car when I went into the office.",
                employee_age: "22",
                rating: "3",
                r_date: "12.09.2019",
                profile_image: "https://randomuser.me/api/portraits/men/4.jpg",
            },
            {
                id: "5",
                employee_name: "Airi Satou",
                title: "There's a reason they're number one",
                body: "There's not much to say about YETI stainless steel tumblers that hasn't been said. There's a reason they're so highly rated. I filled mine with ice and water at 8:30am last week and drove to work sipping it. I left it in my car when I went into the office.",
                employee_age: "33",
                rating: "5",
                r_date: "12.09.2019",
                profile_image: "https://randomuser.me/api/portraits/women/5.jpg",
            },
            {
                id: "6",
                employee_name: "Brielle Williamson",
                title: "There's a reason they're number one",
                body: "There's not much to say about YETI stainless steel tumblers that hasn't been said. There's a reason they're so highly rated. I filled mine with ice and water at 8:30am last week and drove to work sipping it. I left it in my car when I went into the office.",
                employee_age: "61",
                rating: "4",
                r_date: "12.09.2019",
                profile_image: "https://randomuser.me/api/portraits/women/6.jpg",
            },
        ];
    </script>
</div>