<?php

namespace App\Http\Livewire\Admin\Coupon;

use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class AdminCouponComponent extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public function destroy($coupon_id)
    {
        $this->authorize('coupon-delete');

        $coupon = Coupon::find($coupon_id);
        if(empty($coupon))
        {
            return session()->flash('error', 'No Item Found!');
        }
        $coupon->delete();
        return session()->flash('success', 'Coupon has been deleted successfully');
    }

    public function render()
    {
        $this->authorize('coupon-show');

        $coupons = Coupon::select('id', 'code', 'type', 'value', 'cart_value', 'created_at')
            ->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.admin.coupon.admin-coupon-component', ['coupons' => $coupons])->layout('layouts.base');
    }
}
