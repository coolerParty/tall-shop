<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function render()
    {
        $orders = Order::with('user')
                ->select('id','user_id','total','status','created_at')
                ->orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.order.admin-order-component', ['orders' => $orders])->layout('layouts.base');
    }
}
