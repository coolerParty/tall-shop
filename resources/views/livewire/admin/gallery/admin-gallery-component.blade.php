<div>
    @section('title', 'Admin / Gallery')
    <!-- Main content header -->
    <div
        class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap">Gallery</h1>
        @can('gallery-create')
        <a href="#" wire:click="showAddModal()"
            class="inline-flex items-center px-6 py-2 space-x-1 text-white bg-purple-600 rounded-md shadow hover:bg-opacity-95">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <span>Add New</span>
        </a>
        @endcan
    </div>
    <div class="flex flex-col mt-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    category
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    featured
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    active
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            <!-- flash message Start -->
                            @if(Session::has('create-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-blue-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('create-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            @if(Session::has('update-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-emerald-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('update-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            @if(Session::has('delete-success'))
                            <div x-data="{ msg:'true'}">
                                <template x-if="msg">
                                    <div class="w-full text-white bg-red-500">
                                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                            <div class="flex">
                                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                    <path
                                                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                                    </path>
                                                </svg>

                                                <p class="mx-3">{{ Session::get('delete-success') }}</p>
                                            </div>

                                            <button @click="msg = '' "
                                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            @endif
                            <!-- flash message End -->
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($galleries as $gallery)
                            <tr class="transition-all hover:bg-gray-100 ">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    @if($gallery->image)
                                    <a href="{{ asset('storage/assets/gallery/large') }}/{{ $gallery->image }}"
                                        target="_blank"><img
                                            class="object-cover w-10 h-10 rounded-md cursor-pointer hover:shadow-lg"
                                            src="{{ asset('storage/assets/gallery/thumbnail') }}/{{ $gallery->image }}" /></a>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $gallery->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    <div class="text-sm text-gray-900">{{ $gallery->category->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                    @can('gallery-edit')
                                    <input
                                        class="float-left h-5 align-top bg-gray-300 bg-no-repeat bg-contain rounded-full shadow-sm appearance-none cursor-pointer form-check-input w-9 focus:outline-none"
                                        type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ ($gallery->featured
                                    == 1)? 'checked' : '' }} wire:click.prevent="updateFeatured({{ $gallery->id }},{{
                                    $gallery->featured }})">
                                    @else
                                    <div
                                        class="text-sm py-1 px-3 rounded-full text-gray-800 {{ ($gallery->featured == 1) ? 'bg-green-200' : 'bg-gray-200' }}">
                                        {{ ($gallery->featured == 1) ? 'Active' : 'Inactive' }}</div>
                                    @endcan
                                </td>
                                <td class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                    @can('gallery-edit')
                                    <input
                                        class="float-left h-5 align-top bg-gray-300 bg-no-repeat bg-contain rounded-full shadow-sm appearance-none cursor-pointer form-check-input w-9 focus:outline-none"
                                        type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ ($gallery->active
                                    == 1)? 'checked' : '' }} wire:click.prevent="updateActive({{ $gallery->id }},{{
                                    $gallery->active }})">
                                    @else
                                    <div
                                        class="text-sm py-1 px-3 rounded-full text-gray-800 {{ ($gallery->active == 1) ? 'bg-green-200' : 'bg-gray-200' }}">
                                        {{ ($gallery->active == 1) ? 'Active' : 'Inactive' }}</div>
                                    @endcan
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    @can('gallery-edit')
                                    <x-link-success wire:click="showEditModal({{ $gallery->id }})" href="#"> Edit
                                    </x-link-success>

                                    @can('gallery-delete')
                                    @endcan
                                    <x-link-danger href="#" class="btn btn-danger btn-sm text-light"
                                        onclick="confirm('Are you sure, You want to delete this gallery?') || event.stopImmediatePropagation()"
                                        wire:click.prevent="destroy({{ $gallery->id }})">
                                        Delete
                                    </x-link-danger>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                <td class="px-6 py-4 text-center whitespace-nowrap" colspan="9">
                                    <div class="text-sm font-medium text-gray-900">No gallery found</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-4">
                        {!! $galleries->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    {{-- Show-gallery-Modal Start --}}
    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            @if($modalType == 1)
            Gallery Create
            @elseif($modalType == 2)
            Gallery Edit
            @endif
        </x-slot>
        <x-slot name="content" class="w-full">
            <div class="w-full mt-10">
                <!-- <x-jet-validation-errors class="mb-4" /> -->
                <section class="max-w-4xl mx-auto dark:bg-gray-800">
                    @if($modalType == 1)
                    <form wire:submit.prevent="store">
                        @elseif($modalType == 2)
                        <form wire:submit.prevent="update">
                            @endif
                            <div class="px-2 mt-4 ">
                                <label class="text-gray-700 dark:text-gray-200" for="name">name</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    wire:model.lazy="name" required autofocus autocomplete="name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring
                                        @error('name') border-red-500 @enderror">
                                @error('name')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                            </div>

                            <div class="flex flex-wrap mt-4">
                                <div class="w-full px-2 md:w-1/2">
                                    <label for="featured" class="text-gray-700 dark:text-gray-200">Featured</label>
                                    <select id="featured" name="featured" wire:model.lazy="featured"
                                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('featured') border-red-500 @enderror">
                                        <option value="0">Don't Show</option>
                                        <option value="1">Show</option>
                                    </select>
                                    @error('featured')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                                </div>
                                <div class="w-full px-2 md:w-1/2">
                                    <label for="category_id" class="text-gray-700 dark:text-gray-200">Category</label>
                                    <select id="category_id" name="category_id" wire:model.lazy="category_id"
                                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('category_id') border-red-500 @enderror">
                                        <option value="">Select Categories</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap mt-4">
                                <div class="w-full px-2 md:w-1/2">
                                    <label for="active" class="text-gray-700 dark:text-gray-200">Active</label>
                                    <select id="active" name="active" autocomplete="type-name" wire:model.lazy="active"
                                        class="block w-full px-4 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring focus:border-blue-400 dark:focus:border-blue-300 sm:text-sm @error('active') border-red-500 @enderror">
                                        <option value="0">Don't Show</option>
                                        <option value="1">Show</option>
                                    </select>
                                    @error('active')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                                </div>
                                <div class="w-full px-2 md:w-1/2">
                                    @if($modalType == 1)
                                    <label class="text-gray-700 dark:text-gray-200" for="image">Image</label>
                                    <input id="image" type="file" name="image" wire:model="image" autocomplete="image"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('image') border-red-500 @enderror">
                                    @error('image')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
                                    <div class="block w-full px-4 py-2 m-1 text-white bg-emerald-500 " wire:loading
                                        wire:target="image">
                                        Uploading...
                                    </div>
                                    @if ($image)
                                    <img class="object-cover rounded place-content-center w-30 h-30"
                                        src="{{ $image->temporaryUrl() }}" alt="">
                                    <x-link-danger type="button" wire:click="removeImage"
                                        class="block w-full cursor-pointer">Remove Selected Image</x-link-danger>
                                    @endif
                                    @elseif($modalType == 2)
                                    <label class="text-gray-700 dark:text-gray-200" for="new_image">Image</label>
                                    <input id="new_image" type="file" name="new_image" wire:model="new_image"
                                        autocomplete="new_image"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('new_image') border-red-500 @enderror">
                                    @error('new_image')<p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                    <div class="block w-full px-4 py-2 m-1 text-white bg-emerald-500 " wire:loading
                                        wire:target="new_image">
                                        Uploading...
                                    </div>
                                    @if ($new_image)
                                    <img class="object-cover rounded place-content-center w-30 h-30"
                                        src="{{ $new_image->temporaryUrl() }}" alt="">
                                    <x-link-danger type="button" wire:click="removeImage"
                                        class="block w-full cursor-pointer">Remove Selected Image</x-link-danger>
                                    @elseif($image)
                                    <img class="object-cover rounded place-content-center w-30 h-30"
                                        src="{{ asset('storage/assets/gallery/medium') }}/{{ $image }}" alt="">
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                            </div> -->
                        </form>
                </section>
            </div>
        </x-slot>
        <x-slot name="footer">
            @if($modalType == 1)
            <form wire:submit.prevent="store">
                <button type="submit"
                    class="px-6 py-2 mr-2 leading-5 text-white transition-colors duration-200 transform bg-purple-700 rounded-md hover:bg-purple-600 focus:outline-none focus:bg-gray-600">
                    Create</button>
            </form>
            @elseif($modalType == 2)
            <form wire:submit.prevent="update">
                <button type="submit"
                    class="px-6 py-2 mr-2 leading-5 text-white transition-colors duration-200 transform bg-green-700 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600">
                    Update</button>
            </form>
            @endif
            <x-link-danger type="button" wire:click.prevent="closeModal"
                class="text-white bg-gray-600 hover:bg-gray-800 cursor-pointer">Close</x-link-danger>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Show-gallery-Modal End --}}
</div>
