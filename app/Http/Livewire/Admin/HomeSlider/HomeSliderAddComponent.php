<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use App\Models\HomeSlider;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class HomeSliderAddComponent extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $title;
    public $sub_title;
    public $link;
    public $image;
    public $active = false;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'     => ['required', 'min:3', 'max:10', 'string'],
            'sub_title' => ['required', 'min:3', 'max:10', 'string'],
            'link'      => ['required', 'url'],
            'image'     => ['required', 'image', 'max:2048'],
            'active'    => ['required', 'boolean'],
        ]);
    }

    public function store()
    {
        $this->confirmation();

        $this->validate([
            'title'     => ['required', 'min:3', 'max:10', 'string'],
            'sub_title' => ['required', 'min:3', 'max:10', 'string'],
            'link'      => ['required', 'url'],
            'image'     => ['required', 'image', 'max:2048'],
            'active'    => ['required', 'boolean'],
        ]);

        $slider            = new HomeSlider();
        $slider->title     = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->link      = $this->link;
        $slider->active    = $this->active;

        if ($this->image) {
            $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();

            $originalPath   = storage_path() . '/app/public/assets/homeslider/large/';
            $thumbnailPath  = storage_path() . '/app/public/assets/homeslider/thumbnail/';
            $thumbnailImage = Image::make($this->image);
            $thumbnailImage->fit(1920, 1017);
            $thumbnailImage->save($originalPath . $imagename);
            $thumbnailImage->fit(189, 100);
            $thumbnailImage->save($thumbnailPath . $imagename);

            $slider->image = $imagename;
        }
        $slider->save();


        return redirect()->route('admin.homeslider.index')
            ->with('create-success', 'User "' . $this->title . '" created successfully.');
    }

    public function confirmation()
    {

        $this->authorize('slider-create');
    }

    public function removeImage()
    {
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.admin.home-slider.home-slider-add-component')->layout('layouts.base');
    }
}
