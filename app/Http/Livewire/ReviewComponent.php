<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewComponent extends Component
{
    public function render()
    {
        $reviews = Review::with('orderItem')
            ->select(
                'id',
                'title',
                'comment',
                'rating',
                'created_at',
                'order_item_id'
            )
            ->orderBy('created_at', 'DESC')
            ->take(9)
            ->get();
        return view('livewire.review-component', ['reviews' => $reviews]);
    }
}
