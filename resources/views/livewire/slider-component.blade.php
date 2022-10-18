<div class="z-0 w-full">
    <style>

        .swiper {
            width: 100%;
            height: auto;
        }

    </style>


    <div class="w-full p-6 swiper cursor-grab">
        <!-- Additional required wrapper -->
        <div class="w-full swiper-wrapper">
            <!-- Slides -->
            @foreach($sliders as $slider)
            <div class="object-cover w-full text-center swiper-slide"
                style="background: black url({{ asset('/storage/assets/homeslider/large') }}/{{ $slider->image }}) no-repeat  fixed center;">
                <div
                    class="text-center w-full text-white  h-[400px] md:h-[600px] flex items-center justify-center bg-blend-hard-light">
                    <div class="text-center">
                        <span class="text-2xl font-semibold text-gray-400 capitalize md:text-4xl">{{ $slider->sub_title }}</span>
                        <h3
                            class="max-w-2xl mb-5 font-bold leading-none tracking-tighter text-center uppercase text-7xl md:text-9xl md:mb-10"
                            data-swiper-parallax-scale=".50"
                            data-swiper-parallax-opacity="0.90"
                            data-swiper-parallax-duration="1000"
                            >
                            {{ $slider->title }}</h3>
                        <a href="{{ $slider->link }}" class="px-6 py-3 mt-3 font-bold text-white capitalize transition duration-500 ease-in-out delay-300 bg-orange-500 shadow hover:-translate-y-1 hover:bg-indigo-500">get started</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

    </div>

</div>
@push('scripts')

@endpush

