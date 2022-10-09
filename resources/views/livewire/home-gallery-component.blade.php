<div class="w-full pt-10 pb-10">
    <h3 class="mt-10 text-3xl font-semibold text-center capitalize">Our Gallery</h3>
    <h1 class="text-5xl font-bold tracking-tighter text-center text-orange-500 capitalize">Our Untold Stories</h1>
    <section class="container mx-auto mt-10 mb-10" x-data="{ tab: 'all' }">
        <div class="">
          <ul class="flex flex-wrap justify-center p-2 mb-5 space-x-1 font-semibold text-center">
            <li class="">
              <a href="#" @click.prevent="tab = 'all'" :class="{ 'active' : tab === 'all' }" class="px-5 py-2 uppercase bg-gray-100 hover:bg-orange-300">All</a>
            </li>
            @forelse($categories as $category)
            <li class="">
              <a href="#" @click.prevent="tab = '{{ $category->name }}'" :class="{ 'active' : tab === '{{ $category->name }}' }" class="px-5 py-2 uppercase bg-gray-100 hover:bg-orange-300">{{ $category->name }}</a>
            </li>
            @empty
              <li class="">
                <a href="#" @click.prevent="tab = 'pizza'" :class="{ 'active' : tab === 'pizza' }" class="px-5 py-2 uppercase bg-gray-100 hover:bg-orange-300">Pizza</a>
              </li>
              <li class="">
                <a href="#" @click.prevent="tab = 'dessert'" :class="{ 'active' : tab === 'dessert' }" class="px-5 py-2 uppercase bg-gray-100 hover:bg-orange-300">Dessert</a>
              </li>
            @endforelse

          </ul>
        </div>
        <div class="grid grid-cols-2 gap-0 md:grid-cols-3">
          @forelse($galleries as $gallery)
          <div class="object-cover max-w-md" x-show="tab === '{{ $gallery->category->name }}' || tab === 'all'"><img loading="lazy" src="{{ asset('storage/assets/gallery/large') }}/{{ $gallery->image }}" alt="{{ $gallery->name }}" title="{{ $gallery->name }}"></div>
          @empty
          <div class="object-cover max-w-md" x-show="tab === 'pizza' || tab === 'all'"><img loading="lazy" src="{{ asset('assets/images/gallery/food-galler-img-1.jpg') }}" alt="Running Kitty" title="Running Kitty"></div>
          <div class="object-cover max-w-md" x-show="tab === 'dessert' || tab === 'all'"><img loading="lazy" src="{{ asset('assets/images/gallery/food-galler-img-2.jpg') }}" alt="Tiny puppy" title="Tiny puppy"></div>
          <div class="object-cover max-w-md" x-show="tab === 'pizza' || tab === 'all'"><img loading="lazy" src="{{ asset('assets/images/gallery/food-galler-img-3.jpg') }}" alt="Shocked Kitty" title="Shocked Kitty"></div>
          <div class="object-cover max-w-md" x-show="tab === 'dessert' || tab === 'all'"><img loading="lazy" src="{{ asset('assets/images/gallery/food-galler-img-4.jpg') }}" alt="Jumping puppy" title="Jumping puppy"></div>
          <div class="object-cover max-w-md" x-show="tab === 'pizza' || tab === 'all'"><img loading="lazy" src="{{ asset('assets/images/gallery/food-galler-img-5.jpg') }}" alt="Sleeping Kitty" title="Sleeping Kitty"></div>
          <div class="object-cover max-w-md" x-show="tab === 'dessert' || tab === 'all'"><img loading="lazy" src="{{ asset('assets/images/gallery/food-galler-img-6.jpg') }}" alt="Happy Puppy" title="Happy Puppy"></div>
          @endforelse
        </div>
      </section>
</div>
