<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Illuminate\Support\Facades\Auth;

class MenuComponent extends Component
{
    use WithPagination;

    public function store($product_id, $product_name, $product_price)
    {
        $citems = Cart::instance('cart')->content()->pluck('id');
        if($citems->contains($product_id)){
            $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
            // session()->flash('cart_message', 'Product has already been added to cart!');
        }else{
            Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
            $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
            // session()->flash('cart_message', '"' . $product_name . '" has been added to cart!');
        }


    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        $witems = Cart::instance('wishlist')->content()->pluck('id');
        if($witems->contains($product_id)){
            $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
        }else{
            Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
            $this->emitTo('wishlist-count-component', 'refreshComponent'); // refresh wishlist count display top right menu
            // session()->flash('cart_message', '"' . $product_name . '" has been added to wishlist!');
        }

    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent'); // refresh wishlist count display top right menu
                return;
            }
        }
    }

    public function removeFromCart($product_id)
    {
        foreach (Cart::instance('cart')->content() as $citem) {
            if ($citem->id == $product_id) {
                Cart::instance('cart')->remove($citem->rowId);
                $this->emitTo('cart-count-component', 'refreshComponent'); // refresh wishlist count display top right menu
                return;
            }
        }
    }

    public function render()
    {
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email); // save cart to database using user email;
            Cart::instance('wishlist')->store(Auth::user()->email); // save wishlist to database using user email;
        }

        $products = Product::with('ratings')
            ->select('id', 'name', 'regular_price', 'sale_price', 'short_description', 'image', 'slug')
            ->orderBy('name', 'ASC')
            ->where('active', 1)
            ->paginate(8);
        $witems = Cart::instance('wishlist')->content()->pluck('id');
        $citems = Cart::instance('cart')->content()->pluck('id');
        return view('livewire.menu-component', ['products' => $products, 'witems' => $witems, 'citems' => $citems])->layout('layouts.front');
    }
}
