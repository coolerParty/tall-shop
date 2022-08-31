<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class HomeSliderEditComponent extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title;
    public $sub_title;
    public $link;
    public $image;
    public $active;

    public $slide_id;
    public $new_image;

    public function mount($homeslider_id)
    {
        $slider = HomeSlider::find($homeslider_id);
        if (empty($slider)) {
            abort(404);
        }

        $this->slide_id  = $slider->id;
        $this->title     = $slider->title;
        $this->sub_title = $slider->sub_title;
        $this->link      = $slider->link;
        $this->image     = $slider->image;
        $this->active    = $slider->active;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'     => ['required', 'min:3', 'max:10', 'string'],
            'sub_title' => ['required', 'min:3', 'max:10', 'string'],
            'link'      => ['required', 'url'],
            'active'    => ['required', 'boolean'],
        ]);

        if ($this->new_image) {
            $this->validateOnly($fields, ['new_image' => ['required', 'image', 'max:2048']]);
        }
    }

    public function update()
    {
        $this->confirmation();

        $this->validate([
            'title'     => ['required', 'min:3', 'max:10', 'string'],
            'sub_title' => ['required', 'min:3', 'max:10', 'string'],
            'link'      => ['required', 'url'],
            'active'    => ['required', 'boolean'],
        ]);

        if ($this->new_image) {
            $this->validate(['new_image' => ['required', 'image', 'max:2048']]);
        }

        $slider            = HomeSlider::find($this->slide_id);
        if (empty($slider)) {
            abort(404);
        }
        $slider->title     = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->link      = $this->link;
        $slider->active    = $this->active;

        if ($this->new_image) {
            if (
                !empty($slider->image) &&
                file_exists('storage/assets/homeslider/thumbnail' . '/' . $slider->image)
            ) {
                unlink('storage/assets/homeslider/thumbnail' . '/' . $slider->image); // Deleting Image
            }
            if (
                !empty($slider->image) &&
                file_exists('storage/assets/homeslider/large' . '/' . $slider->image)
            ) {
                unlink('storage/assets/homeslider/large' . '/' . $slider->image); // Deleting Image
            }

            $imagename      = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $originalPath   = storage_path() . '/app/public/assets/homeslider/large/';
            $thumbnailPath  = storage_path() . '/app/public/assets/homeslider/thumbnail/';
            $thumbnailImage = Image::make($this->new_image);
            $thumbnailImage->fit(1920, 1017);
            $thumbnailImage->save($originalPath . $imagename);
            $thumbnailImage->fit(189, 100);
            $thumbnailImage->save($thumbnailPath . $imagename);

            $slider->image = $imagename;
        }
        $slider->save();

        return redirect()->route('admin.homeslider.index')
            ->with('update-success', 'Slide "' . $this->title . '" updated successfully.');
    }

    public function confirmation()
    {
        $this->authorize('slider-edit');
    }

    public function removeImage()
    {
        $this->new_image = null;
    }

    public function render()
    {
        $this->confirmation();

        return view('livewire.admin.home-slider.home-slider-edit-component')->layout('layouts.base');
    }
}
