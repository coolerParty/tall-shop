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

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.front');
    }
}
