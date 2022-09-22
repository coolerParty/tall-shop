<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class FeaturedProductComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
        // session()->flash('cart_message', '"' . $product_name . '" has been added to cart!');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent'); // refresh wishlist count display top right menu
        // session()->flash('cart_message', '"' . $product_name . '" has been added to wishlist!');
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

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent'); // refresh wishlist count display top right menu
                return;
            }
        }
    }

    public function render()
    {
        $products = Product::with('ratings')->select('id', 'name', 'image', 'regular_price', 'sale_price', 'slug')->where('active', 1)->where('featured', 1)->take(8)->get();
        $witems = Cart::instance('wishlist')->content()->pluck('id');
        $citems = Cart::instance('cart')->content()->pluck('id');
        return view('livewire.featured-product-component', ['products' => $products, 'citems' => $citems, 'witems' => $witems]);
    }
}
