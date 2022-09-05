<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public function mount($order_id)
    {

    }

    public function render()
    {
        return view('livewire.user.order.user-order-details-component')->layout('layouts.front');
    }
}
