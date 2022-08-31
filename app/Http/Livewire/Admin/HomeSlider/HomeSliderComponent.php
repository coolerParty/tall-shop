<?php

namespace App\Http\Livewire\Admin\HomeSlider;

use Livewire\Component;

class HomeSliderComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.home-slider.home-slider-component')->layout('layouts.base');
    }
}
