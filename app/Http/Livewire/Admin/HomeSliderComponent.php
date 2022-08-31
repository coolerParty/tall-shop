<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class HomeSliderComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.home-slider-component')->layout('layouts.base');
    }
}
