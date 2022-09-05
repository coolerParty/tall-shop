<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminOrderDetailsComponent extends Component
{
    use AuthorizesRequests;

    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $this->authorize('order-show');

        $order = Order::with('user','shipping','transaction')->where('id', $this->order_id)->first();
        if(empty($order)){
            abort(404);
        }
        $orderItems = OrderItem::with('product')->select('product_id','order_id','price','quantity','rstatus')->where('order_id', $order->id)->get();

        return view('livewire.admin.order.admin-order-details-component',['order'=> $order,'orderItems'=>$orderItems])->layout('layouts.base');
    }
}
