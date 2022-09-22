<?php

namespace App\Http\Livewire\User\Order;

use App\Http\Requests\ReviewRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;
    public $order_item_id;

    public $review_id;
    public $title   = '';
    public $comment = '';
    public $rating  = 0;
    public $rev; // short for review
    public $showModal = false;
    public $modalType = 1;      // 1 for store, 2 for edit

    public function rules(): array
    {
        return (new ReviewRequest())->rules();
    }

    public function showAddModal($order_item_id)
    {
        $this->resetReview();
        $this->resetValidation();
        $this->showModal = true;
        $this->modalType = 1;
        $this->order_item_id = $order_item_id;
    }

    public function showEditModal($order_item_id)
    {
        $this->resetReview();
        $this->resetValidation();
        $this->modalType = 2;
        $this->order_item_id = $order_item_id;
        $this->loadReview();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        $review                = new Review();
        $review->title         = $this->title;
        $review->rating        = $this->rating;
        $review->comment       = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();

        $this->resetReview();
        return session()->flash('success', 'Review written successfully.');
    }

    public function loadReview()
    {
        $this->rev       = Review::where('order_item_id',$this->order_item_id)->first();
        $this->title     = $this->rev->title;
        $this->rating    = $this->rev->rating;
        $this->comment   = $this->rev->comment;
        $this->review_id = $this->rev->id;
    }

    public function update()
    {
        $this->validate();

        $review                    = Review::find($this->review_id);
        if (empty($review)) {
            abort(404);
        }
        $review->title              = $this->title;
        $review->rating = $this->rating;
        $review->comment       = $this->comment;
        $review->save();

        $this->resetReview();
        return session()->flash('success', 'Review updated successfully.');
    }

    public function closeModal()
    {
        $this->resetReview();
    }

    public function resetReview()
    {
        $this->review_id = '';
        $this->rev       = [];     // short for product
        $this->showModal = false;
        $this->modalType = 1;

        $this->order_item_id = '';
        $this->title         = '';
        $this->rating        = 0;
        $this->comment       = '';

    }

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function cancelOrder()
    {
        $order = Order::where('id', $this->order_id)->where('user_id', Auth::user()->id)->first();
        if(empty($order))
        {
            return session()->flash('error_order_message', 'Error occurred! please try again.');
        }
        if($order->status == 'delivered')
        {
            return session()->flash('error_order_message', 'Order already cancelled!');
        }
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('success_order_message', 'Order has been canceled successfully!');
        return redirect()->to(route('user.order.show', ['order_id' => $this->order_id]));
    }

    public function render()
    {
        $order = Order::with('orderItems')->where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        if (empty($order)) {
            abort(404);
        }
        $orderItems = OrderItem::with('product')->select('id','product_id', 'order_id', 'price', 'quantity','rstatus')->where('order_id', $order->id)->get();
        return view('livewire.user.order.user-order-details-component', ['order' => $order, 'orderItems' => $orderItems])->layout('layouts.front');
    }
}
