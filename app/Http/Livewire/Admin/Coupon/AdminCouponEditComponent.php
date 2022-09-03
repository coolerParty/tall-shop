<?php

namespace App\Http\Livewire\Admin\Coupon;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;

class AdminCouponEditComponent extends Component
{
    use AuthorizesRequests;
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

    public $coupon_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        if (empty($coupon)) {
            return redirect()->route('admin.coupon.index')
                ->with('error', 'Coupon not found!');
        }
        $this->coupon_id   = $coupon->id;
        $this->code        = $coupon->code;
        $this->type        = $coupon->type;
        $this->value       = $coupon->value;
        $this->cart_value  = $coupon->cart_value;
        $this->expiry_date = $coupon->expiry_date;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code'        => ['required', 'min:4', 'max:8', 'string', Rule::unique('coupons')->ignore($this->coupon_id)],
            'type'        => ['required', Rule::in(['fixed', 'percent'])],
            'value'       => ['required', 'numeric'],
            'cart_value'  => ['required', 'numeric'],
            'expiry_date' => ['required', 'date'],
        ]);
    }

    public function update()
    {
        $this->confirmation();

        $this->validate([
            'code'        => ['required', 'min:4', 'max:8', 'string', Rule::unique('coupons')->ignore($this->coupon_id)],
            'type'        => ['required', Rule::in(['fixed', 'percent'])],
            'value'       => ['required', 'numeric'],
            'cart_value'  => ['required', 'numeric'],
            'expiry_date' => ['required', 'date'],
        ]);

        $coupon = Coupon::find($this->coupon_id);
        if (empty($coupon)) {
            return redirect()->route('admin.coupon.index')
                ->with('error', 'Coupon not found!');
        }
        $coupon->code        = $this->code;
        $coupon->type        = $this->type;
        $coupon->value       = $this->value;
        $coupon->cart_value  = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();

        return redirect()->route('admin.coupon.index')
            ->with('success', 'Coupon "' . $this->code . '" updated successfully.');
    }

    public function confirmation()
    {
        $this->authorize('coupon-edit');
    }

    public function render()
    {
        $this->confirmation();

        return view('livewire.admin.coupon.admin-coupon-edit-component')->layout('layouts.base');
    }
}
