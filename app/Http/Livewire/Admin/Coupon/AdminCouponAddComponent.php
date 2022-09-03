<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;

class AdminCouponAddComponent extends Component
{
    use AuthorizesRequests;
    public $code;
    public $type;
    public $value;
    public $cart_value;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code'       => ['required', 'min:4', 'max:8', 'string', 'unique:coupons'],
            'type'       => ['required', Rule::in(['fixed', 'percent'])],
            'value'      => ['required', 'numeric'],
            'cart_value' => ['required', 'numeric'],
        ]);
    }

    public function store()
    {
        $this->confirmation();

        $this->validate([
            'code'       => ['required', 'min:4', 'max:8', 'string', 'unique:coupons'],
            'type'       => ['required', Rule::in(['fixed', 'percent'])],
            'value'      => ['required', 'numeric'],
            'cart_value' => ['required', 'numeric'],
        ]);

        $coupon             = new Coupon();
        $coupon->code       = $this->code;
        $coupon->type       = $this->type;
        $coupon->value      = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();

        return redirect()->route('admin.coupon.index')
            ->with('success', 'Coupon "' . $this->code . '" created successfully.');
    }

    public function confirmation()
    {
        $this->authorize('coupon-create');
    }

    public function render()
    {
        $this->confirmation();

        return view('livewire.admin.coupon.admin-coupon-add-component')->layout('layouts.base');
    }
}
