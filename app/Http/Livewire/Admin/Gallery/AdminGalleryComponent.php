<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Http\Requests\GalleryRequest;
use App\Models\Category;
use App\Models\Gallery;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AdminGalleryComponent extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    use WithPagination;

    public $name;
    public $featured = false;
    public $image;
    public $active = false;
    public $category_id;
    public $new_image;

    public $gallery_id;
    public $gal; // short for gallery
    public $showModal = false;
    public $modalType = 1;      // 1 for store, 2 for edit

    public function rules(): array
    {
        return (new GalleryRequest())->rules($this->gallery_id, $this->modalType, $this->new_image);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function showAddModal()
    {
        $this->authorize('gallery-create');
        $this->resetGallery();
        $this->resetValidation();
        $this->showModal = true;
        $this->modalType = 1;
    }

    public function showEditModal($gallery_id)
    {
        $this->authorize('gallery-edit');
        $this->resetGallery();
        $this->resetValidation();
        $this->modalType  = 2;
        $this->gallery_id = $gallery_id;
        $this->loadGallery();
        $this->showModal = true;
    }

    public function loadGallery()
    {
        $this->gal         = Gallery::findOrFail($this->gallery_id);
        $this->name        = $this->gal->name;
        $this->featured    = $this->gal->featured;
        $this->image       = $this->gal->image;
        $this->active      = $this->gal->active;
        $this->category_id = $this->gal->category_id;
    }

    public function store()
    {
        $this->authorize('gallery-create');
        $this->validate();

        $gallery              = new Gallery();
        $gallery->name        = $this->name;
        $gallery->featured    = $this->featured;
        $gallery->active      = $this->active;
        $gallery->category_id = $this->category_id;

        if ($this->image) {
            $gallery->image = $this->saveImage($this->image);
        }
        $gallery->save();

        $this->resetGallery();
        return session()->flash('success', 'Gallery created successfully.');
    }

    public function update()
    {
        $this->authorize('gallery-create');
        $this->validate();

        $gallery = Gallery::find($this->gallery_id);
        if (empty($gallery)) {
            abort(404);
        }
        $gallery->name        = $this->name;
        $gallery->featured    = $this->featured;
        $gallery->active      = $this->active;
        $gallery->category_id = $this->category_id;
        if ($this->new_image) {
            $this->deleteImage($gallery->image);
            $gallery->image = $this->saveImage($this->new_image);
        }
        $gallery->save();

        $this->resetGallery();
        return session()->flash('success', 'Gallery updated successfully.');
    }

    public function saveImage($img)
    {
        $imageName = Carbon::now()->timestamp . '.' . $img->extension();

        $originalPath   = storage_path() . '/app/public/assets/gallery/large/';
        $mediumPath     = storage_path() . '/app/public/assets/gallery/medium/';
        $thumbnailPath  = storage_path() . '/app/public/assets/gallery/thumbnail/';

        $thumbnailImage = Image::make($img);
        $thumbnailImage->fit(800, 800);
        $thumbnailImage->save($originalPath . $imageName);
        $thumbnailImage->fit(400, 400);
        $thumbnailImage->save($mediumPath . $imageName);
        $thumbnailImage->fit(100, 100);
        $thumbnailImage->save($thumbnailPath . $imageName);

        return $imageName;
    }

    public function deleteImage($galleryImage)
    {
        if (!empty($galleryImage)) {
            if (file_exists('storage/assets/gallery/thumbnail' . '/' . $galleryImage)) {
                unlink('storage/assets/gallery/thumbnail' . '/' . $galleryImage); // Deleting Image
            }

            if (file_exists('storage/assets/gallery/medium' . '/' . $galleryImage)) {
                unlink('storage/assets/gallery/medium' . '/' . $galleryImage); // Deleting Image
            }

            if (file_exists('storage/assets/gallery/large' . '/' . $galleryImage)) {
                unlink('storage/assets/gallery/large' . '/' . $galleryImage); // Deleting Image
            }
        }
    }

    public function closeModal()
    {
        $this->resetGallery();
    }

    public function resetGallery()
    {
        $this->gallery_id = '';
        $this->gal        = [];     // short for product
        $this->showModal  = false;
        $this->modalType  = 1;

        $this->name        = '';
        $this->featured    = false;
        $this->image       = null;
        $this->active      = false;
        $this->category_id = '';
        $this->new_image   = null;
    }

    public function removeImage()
    {
        if ($this->modalType == 1) {
            $this->image = null;
        } elseif ($this->modalType == 2) {
            $this->new_image = null;
        }
    }

    public function destroy($gallery_id)
    {

        $this->authorize('gallery-delete');

        $gallery = Gallery::find($gallery_id);
        if (empty($gallery)) {
            abort(404);
        }
        $this->deleteImage($gallery->image);
        $gallery->delete();

        return session()->flash('success', 'Gallery deleted successfully.');
    }

    public function updateActive($gallery_id, $status)
    {
        $this->authorize('gallery-edit');

        $gallery = gallery::find($gallery_id);
        if (empty($gallery)) {
            abort(404);
        }
        $gallery->active = ($status == 1) ? 0 : 1;
        $gallery->save();
    }

    public function updateFeatured($gallery_id, $status)
    {
        $this->authorize('gallery-edit');

        $gallery = Gallery::find($gallery_id);
        if (empty($gallery)) {
            abort(404);
        }
        $gallery->featured = ($status == 1) ? 0 : 1;
        $gallery->save();
    }

    public function render()
    {
        $this->authorize('gallery-show');

        $galleries = Gallery::with('category')
            ->select('id', 'name', 'image', 'featured', 'active', 'category_id')
            ->orderBy('created_at', 'DESC')->paginate(10);

        $categories = Category::select('id', 'name')->orderBy('name', 'ASC')->get();

        return view('livewire.admin.gallery.admin-gallery-component', [
            'galleries' => $galleries, 'categories' => $categories
        ])->layout('layouts.base');
    }
}
