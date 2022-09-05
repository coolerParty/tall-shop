<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserOrderComponent extends Component
{
    use WithPagination;

    public function render()
    {

        $orders = Order::with('orderItems')->select('id', 'total', 'status', 'created_at')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('livewire.user.order.user-order-component', ['orders' => $orders])->layout('layouts.front');
    }
}
