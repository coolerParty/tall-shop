<?php

namespace App\Http\Livewire\User\Review;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $title;
    public $rating;
    public $comment;
    public $order_id;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }

    public function addReview()
    {
        $this->validate([
            'title' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $order = Order::select('user_id')->find($this->order_id);
        if (!$order && Auth::user()->id != $order->user_id) {
            abort(404);
        }

        $review = new Review();
        $review->order_item_id = $this->order_item_id;
        $review->title = $this->title;
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();

        session()->flash('message', 'Your review has been added successfully!');
        return redirect()->to(route('user.orderdetail', ['order_id' => $this->order_id]));
    }

    public function render()
    {

        $orderItem = OrderItem::find($this->order_item_id);
        $order = Order::select('id', 'user_id')->find($orderItem->order_id);
        if (!$order && Auth::user()->id != $order->user_id) {
            abort(404);
        }
        $this->order_id = $order->id;
        return view('livewire.user.review.user-review-component', ['orderItem' => $orderItem])->layout('layouts.front');
    }
}
