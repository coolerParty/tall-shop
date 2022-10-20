<div class="w-full pt-10 pb-10">
    <div class="container grid mx-auto mt-10 mb-10 md:grid-cols-2 md:gap-2 min-h-fit">
        <div x-data="{ shown: false }" x-intersect.full="shown = true">
            <img
               loading="lazy" src="{{ asset('assets/images/about/about-img.png') }}" alt="">
         </div>
        <div class="p-5 mt-5 md:mt-10 md:p-0"  x-data="{ shown: false }" x-intersect.full="shown = true">
            <h1 x-show="shown"
            x-transition:enter="transition origin-right ease-out duration-500 delay-300"
            x-transition:enter-start="transform translate-x-full opacity-0"
            x-transition:enter-end="transform translate-x-0 opacity-100"
             class="mb-5 text-3xl font-semibold tracking-tight">Welcome To Our Restaurant</h1>
            <p x-show="shown"
            x-transition:enter="transition origin-right ease-out duration-500 delay-400"
            x-transition:enter-start="transform translate-x-full opacity-0"
            x-transition:enter-end="transform translate-x-0 opacity-100"
             class="mb-10 leading-loose">Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Nisi Optio At, Saepe Accusamus Dolorum, Quos Eos Nesciunt Amet Exercitationem Illum Quis Nostrum, Repellat Quaerat Eum Debitis Fugit Alias Magnam Omnis!</p>
            <a x-show="shown"
            x-transition:enter="transition origin-right ease-out duration-500 delay-500"
            x-transition:enter-start="transform translate-x-full opacity-0"
            x-transition:enter-end="transform translate-x-0 opacity-100"
             href="#" class="px-6 py-3 mt-3 font-bold text-white capitalize transition duration-500 ease-in-out delay-300 bg-orange-500 shadow hover:-translate-y-1 hover:bg-indigo-500">Read More</a>
            <div class="grid grid-cols-3 gap-2 mt-10">
                <div class="p-5 text-center bg-gray-100 cols-1"
                  x-show="shown"
                  x-transition:enter="transition origin-bottom ease-out duration-500 delay-300"
                  x-transition:enter-start="transform translate-y-full opacity-0"
                  x-transition:enter-end="transform translate-y-0 opacity-100"
            >
                   <img loading="lazy" class="mx-auto" src="{{ asset('assets/images/about/about-icon-1.png') }}" alt="">
                   <h3>quality food</h3>
                </div>
                <div class="p-5 text-center bg-gray-100 cols-1"
                x-show="shown"
                  x-transition:enter="transition origin-bottom ease-out duration-500 delay-400"
                  x-transition:enter-start="transform translate-y-full opacity-0"
                  x-transition:enter-end="transform translate-y-0 opacity-100"
                >
                   <img loading="lazy" class="mx-auto" src="{{ asset('assets/images/about/about-icon-2.png') }}" alt="">
                   <h3>food & drinks</h3>
                </div>
                <div class="p-5 text-center bg-gray-100 cols-1"
                x-show="shown"
                  x-transition:enter="transition origin-bottom ease-out duration-500 delay-500"
                  x-transition:enter-start="transform translate-y-full opacity-0"
                  x-transition:enter-end="transform translate-y-0 opacity-100"
                >
                   <img loading="lazy" class="mx-auto" src="{{ asset('assets/images/about/about-icon-3.png') }}" alt="">
                   <h3>expert chefs</h3>
                </div>
             </div>
        </div>
    </div>

  </div>
