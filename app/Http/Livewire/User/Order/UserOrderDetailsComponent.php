<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

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
        $orderItems = OrderItem::with('product')->select('product_id', 'order_id', 'price', 'quantity')->where('order_id', $order->id)->get();
        return view('livewire.user.order.user-order-details-component', ['order' => $order, 'orderItems' => $orderItems])->layout('layouts.front');
    }
}
