<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewComponent extends Component
{
    public function render()
    {
        $reviews = Review::with('orderItem')->take(10)->get();
        return view('livewire.review-component', ['reviews' => $reviews]);
    }
}
