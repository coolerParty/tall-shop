<div class="w-full z-0">
    <style>
        .swiper {
            width: 100%;
            height: auto;
        }
    </style>
    <div class="swiper p-6">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper bg-black">
            <!-- Slides -->
            <div class="swiper-slide text-center"
                style="background: url({{ asset('assets/images/homesliders/home-slide-1.jpg') }}) no-repeat;">
                <div
                    class="text-center w-full text-white  h-[400px] md:h-[600px] flex items-center justify-center bg-blend-hard-light">
                    <div class="text-center">
                        <span class="text-2xl md:text-4xl capitalize text-gray-400 font-semibold">outstanding
                            food</span>
                        <h3
                            class="text-7xl md:text-9xl mb-5 md:mb-10 uppercase tracking-tighter leading-none  font-bold text-center max-w-2xl">
                            delicious cooking</h3>
                        <a href="#" class="bg-orange-500 hover:bg-orange-600 md:text-xl capitalize py-2 md:py-3 px-4 md:px-5 shadow m-5 hover:tracking-wider">get started</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide text-center"
                style="background: url({{ asset('assets/images/homesliders/home-slide-2.jpg') }}) no-repeat;">
                <div
                    class="text-center w-full text-white  h-[400px] md:h-[600px] flex items-center justify-center bg-blend-hard-light">
                    <div class="text-center">
                        <span class="text-2xl md:text-4xl capitalize text-gray-400 font-simebold">outstanding
                            food</span>
                        <h3
                            class="text-7xl md:text-9xl mb-5 md:mb-10 uppercase tracking-tighter leading-none  font-bold text-center max-w-2xl">
                            morning moment</h3>
                        <a href="#" class="bg-orange-500 hover:bg-orange-600 md:text-xl capitalize py-2 md:py-3 px-4 md:px-5 shadow m-5 hover:tracking-wider">get started</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide text-center"
                style="background: url({{ asset('assets/images/homesliders/home-slide-3.jpg') }}) no-repeat;">
                <div
                    class="text-center w-full text-white  h-[400px] md:h-[600px]  flex items-center justify-center bg-blend-hard-light">
                    <div class="text-center">
                        <span class="text-2xl md:text-4xl capitalize text-gray-400 font-simebold">outstanding
                            food</span>
                        <h3
                            class="text-7xl md:text-9xl mb-5 md:mb-10 uppercase tracking-tighter leading-none font-bold text-center max-w-2xl">
                            authentic kitchen</h3>
                        <a href="#" class="text-white bg-orange-500 hover:bg-orange-600 md:text-xl capitalize py-2 md:py-3 px-4 md:px-5 shadow m-5 hover:tracking-wider">get started</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

    </div>
</div>
