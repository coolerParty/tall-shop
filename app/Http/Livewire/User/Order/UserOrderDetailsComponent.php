<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::with('orderItems')->where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        if (empty($order)) {
            abort(404);
        }
        $orderItems = OrderItem::with('product')->select('product_id', 'order_id', 'price', 'quantity', 'rstatus')->where('order_id', $order->id)->get();
        return view('livewire.user.order.user-order-details-component', ['order' => $order, 'orderItems' => $orderItems])->layout('layouts.front');
    }
}
