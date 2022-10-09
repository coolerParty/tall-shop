<?php

namespace App\Http\Livewire\Admin\Review;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminReviewComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        $this->authorize('review-show');
        $reviews = Review::with('orderItem')
            ->select('id', 'title', 'rating', 'comment', 'order_item_id', 'created_at')
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.review.admin-review-component', ['reviews' => $reviews])->layout('layouts.base');
    }
}
