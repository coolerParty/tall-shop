<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public  function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public  function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('delete-success','Item has been removed!');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('delete-success','All Item has been removed!');
    }

    public function render()
    {
        $carts = Cart::instance('cart');
        return view('livewire.cart-component', ['carts'=>$carts])->layout('layouts.front');
    }
}
