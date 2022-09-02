<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class MenuComponent extends Component
{
    use WithPagination;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('cart_message', '"' . $product_name . '" has been added to cart!');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('cart_message', '"' . $product_name . '" has been added to wishlist!');
    }

    public function render()
    {
        $products = Product::select('id', 'name', 'regular_price', 'sale_price', 'short_description', 'image')
            ->orderBy('name', 'ASC')->where('active', 1)->paginate(8);
        $witems = Cart::instance('wishlist')->content()->pluck('id');
        return view('livewire.menu-component', ['products' => $products, 'witems' => $witems])->layout('layouts.front');
    }
}
