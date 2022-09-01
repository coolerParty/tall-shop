<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Livewire\Component;

class SliderComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::select('id', 'title', 'sub_title', 'link', 'image')->orderBy('created_at', 'ASC')->where('active', 1)->get();
        return view('livewire.slider-component', ['sliders' => $sliders]);
    }
}
