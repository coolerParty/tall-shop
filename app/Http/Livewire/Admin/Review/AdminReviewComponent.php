<?php

namespace App\Http\Livewire\Admin\Review;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class AdminReviewComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        $this->authorize('review-show');

            $reviews = DB::table('reviews')
            ->join('order_items', 'order_items.id', '=', 'reviews.order_item_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select(
                'reviews.id as rid','reviews.title as rTitle','reviews.rating as rRating','reviews.comment as rComment','reviews.created_at as rCreated_at',
                'products.name as pName','products.slug as pSlug','products.image as pImage',
                'users.name as uName','profile_photo_path',
            )
            ->paginate(10);

        return view('livewire.admin.review.admin-review-component', ['reviews' => $reviews])->layout('layouts.base');
    }
}
