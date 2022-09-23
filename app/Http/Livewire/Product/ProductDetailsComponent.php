<?php

namespace App\Http\Livewire\Product;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Livewire\Component;
use Cart;

class ProductDetailsComponent extends Component
{
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $stock_status;
    public $quantity;
    public $category_id;
    public $image;

    public $qty = 1;
    public $product;

    public function mount($slug)
    {
        $this->product           = Product::with('category')->where('slug', $this->slug)->where('active', true)->first();
        $this->product_id        = $this->product->id;
        $this->name              = $this->product->name;
        $this->slug              = $this->product->slug;
        $this->short_description = $this->product->short_description;
        $this->description       = $this->product->description;
        $this->regular_price     = $this->product->regular_price;
        $this->sale_price        = $this->product->sale_price;
        $this->stock_status      = $this->product->stock_status;
        $this->quantity          = $this->product->quantity;
        $this->category_id       = $this->product->category_id;
        $this->image             = $this->product->image;
    }

    public function increaseQuantity()
    {
        $this->qty = $this->qty + 1;
    }

    public function decreaseQuantity()
    {
        $this->qty = $this->qty - 1;
    }

    public function buy($product_id, $product_name, $product_price)
    {
        if ($this->qty == 0) {
            return session()->flash('error', 'Error with quantity!');
        }

        foreach (Cart::instance('cart')->content() as $citem) {
            if ($citem->id == $product_id) {
                Cart::instance('cart')->remove($citem->rowId);
                $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
            }
        }

        if ($this->qty > 0) {
            Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
            $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
            return redirect()->to(route('cart.index'));
        }
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
        return session()->flash('success', "'" . $product_name . "' has been added to cart!");
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent'); // refresh wishlist count display top right menu
        return;
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
                $this->emitTo('cart-count-component', 'refreshComponent'); // refresh cart count display top right menu
                return;
            }
        }
    }

    public function render()
    {
        $orderItems = OrderItem::where('product_id', $this->product_id)->where('rstatus', true)->pluck('id');
        $reviews = Review::with('orderItem')->whereIn('order_item_id', $orderItems)->get();

        $witems = Cart::instance('wishlist')->content()->pluck('id');
        $citems = Cart::instance('cart')->content()->pluck('id');
        return view('livewire.product.product-details-component', ['reviews' => $reviews, 'witems' => $witems, 'citems' => $citems])->layout('layouts.front');
    }
}
