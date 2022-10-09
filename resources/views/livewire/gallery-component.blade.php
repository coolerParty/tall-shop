<div class="w-full pb-10 bg-orange-200">
    @section('title', 'Gallery' )
    <div class="w-full bg-white">
        <nav class="container p-2 mx-auto ">
            <ol class="flex list-reset">
                <li><a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700">Home</a></li>
                <li><span class="mx-2 text-gray-500">/</span></li>
                <li class="text-gray-500">Gallery</li>
            </ol>
        </nav>
    </div>
    <h3 class="mt-10 text-3xl font-semibold text-center capitalize">
        Our Gallery
    </h3>
    <h1 class="mb-10 text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">
        Our Untold Stories
    </h1>

    <section class="container mx-auto mt-10 mb-10" x-data="{ tab: 'all' }">
        <div class="">
            <ul class="flex flex-wrap justify-center p-2 mb-5 space-x-1 font-semibold text-center">
                <li class="">
                    <a href="#" class="bg-gray-100 px-5 py-2 uppercase hover:bg-orange-300 {{
                            $categorySelectedId == 0 ? 'bg-orange-400' : ''
                        }}" wire:click.prevent="selectCategory(0)">All</a>
                </li>
                @forelse($categories as $category)
                <li class="">
                    <a href="#"
                        class="bg-gray-100 px-5 py-2 uppercase hover:bg-orange-300 {{ ($category->id == $categorySelectedId) ? 'bg-orange-400' : '' }}"
                        wire:click.prevent="selectCategory({{ $category->id }})">{{ $category->name }}</a>
                </li>
                @empty
                <li class="">
                    <a href="#" @click.prevent="tab = 'pizza'" :class="{ 'active' : tab === 'pizza' }"
                        class="px-5 py-2 underline bg-gray-100 hover:bg-orange-300">Pizza</a>
                </li>
                <li class="">
                    <a href="#" @click.prevent="tab = 'dessert'" :class="{ 'active' : tab === 'dessert' }"
                        class="px-5 py-2 underline bg-gray-100 hover:bg-orange-300">Dessert</a>
                </li>
                @endforelse
            </ul>
        </div>
        <div class="grid grid-cols-2 gap-0 md:grid-cols-3">
            @forelse($galleries as $gallery)
            <div class="object-cover max-w-md" x-show="tab === '{{ $gallery->category->name }}' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('storage/assets/gallery/large')
                    }}/{{ $gallery->image }}" alt="{{ $gallery->name }}" title="{{ $gallery->name }}" />
            </div>
            @empty
            <div class="object-cover max-w-md" x-show="tab === 'pizza' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('assets/images/gallery/food-galler-img-1.jpg')
                    }}" alt="Running Kitty" title="Running Kitty" />
            </div>
            <div class="object-cover max-w-md" x-show="tab === 'dessert' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('assets/images/gallery/food-galler-img-2.jpg')
                    }}" alt="Tiny puppy" title="Tiny puppy" />
            </div>
            <div class="object-cover max-w-md" x-show="tab === 'pizza' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('assets/images/gallery/food-galler-img-3.jpg')
                    }}" alt="Shocked Kitty" title="Shocked Kitty" />
            </div>
            <div class="object-cover max-w-md" x-show="tab === 'dessert' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('assets/images/gallery/food-galler-img-4.jpg')
                    }}" alt="Jumping puppy" title="Jumping puppy" />
            </div>
            <div class="object-cover max-w-md" x-show="tab === 'pizza' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('assets/images/gallery/food-galler-img-5.jpg')
                    }}" alt="Sleeping Kitty" title="Sleeping Kitty" />
            </div>
            <div class="object-cover max-w-md" x-show="tab === 'dessert' || tab === 'all'">
                <img loading="lazy" src="{{
                        asset('assets/images/gallery/food-galler-img-6.jpg')
                    }}" alt="Happy Puppy" title="Happy Puppy" />
            </div>
            @endforelse
        </div>
        @if($galleriesTotal > $imageMaxNumber)
        <div class="mt-10 text-center">
            <button type="button"
                class="px-4 py-2 text-white capitalize bg-orange-500 shadow hover:bg-orange-600 md:text-xl md:py-3 md:px-5 hover:tracking-wider"
                wire:click="viewMoreImage">
                View More
            </button>
        </div>
        @endif
    </section>
    <div wire:loading.delay.long>
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
