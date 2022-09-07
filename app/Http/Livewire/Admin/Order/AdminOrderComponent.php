<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function updateOrderStatus($order_id, $status)
    {
        $this->authorize('order-edit');

        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order status has been updated successfully to '. $status . '!');
        return redirect()->to(route('admin.order.index'));
    }

    public function render()
    {
        $this->authorize('order-show');

        $orders = Order::with('user')
                ->select('id','user_id','total','status','created_at')
                ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.order.admin-order-component', ['orders' => $orders])->layout('layouts.base');
    }
}
