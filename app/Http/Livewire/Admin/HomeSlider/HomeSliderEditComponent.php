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
        $this->confirmation();

        $slider = HomeSlider::find($homeslider_id);
        if(empty($slider))
        {
            abort(404);
        }

        $this->slide_id  = $slider->id;
        $this->title     = $slider->title;
        $this->sub_title = $slider->sub_title;
        $this->link      = $slider->link;
        $this->image     = $slider->image;
        $this->active    = $slider->active;

    }

    public function update()
    {
        
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
        return view('livewire.admin.home-slider.home-slider-edit-component')->layout('layouts.base');
    }
}
