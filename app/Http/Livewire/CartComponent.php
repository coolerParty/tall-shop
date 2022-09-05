<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public  function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
    }

    public  function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('delete-success', 'Item has been removed!');
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('delete-success', 'All Item has been removed!');
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
    }

    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
        session()->flash('cart_message', 'Item has been saved for later!');
    }

    public function switchToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
        session()->flash('saveforlater_message', 'Item has been saved for later!');
    }

    public function destroySaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('saveforlater_message', 'Item has been removed!');
    }

    public function destroyAllSavedForLater()
    {
        Cart::instance('saveForLater')->destroy();
        session()->flash('saveforlater_message', 'Save for later clear!');
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if (!$coupon) {
            session()->flash('coupon_message', 'Coupon code is invalid!');
            return;
        }
        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value
        ]);
    }

    public function calculateDiscounts()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }

            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {

        $carts = Cart::instance('cart')->content();
        $products = Product::select('id', 'name', 'quantity')->whereIn('id', $carts->pluck('id'))->pluck('quantity', 'id');
        foreach ($carts as $cart) {
            if (
                !isset($products[$cart->id])
                || (int)$products[$cart->id] < $cart->qty
            ) {
                return session()->flash('checkout_message', 'Product ' . $cart->name . ' does not have enough stock! Available Stock ' . $products[$cart->id]);

            }
        }
        return redirect()->route('user.checkout');

    }

    public function setAmountForCheckout()
    {
        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax'      => $this->taxAfterDiscount,
                'total'    => $this->totalAfterDiscount,
            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax'      => Cart::instance('cart')->tax(),
                'total'    => Cart::instance('cart')->total(),
            ]);
        }
    }

    public function render()
    {
        if (session()->has('coupon')) {
            if (cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }

        $this->setAmountForCheckout();

        return view('livewire.cart-component')->layout('layouts.front');
    }
}
