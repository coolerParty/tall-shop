<?php

namespace App\Http\Livewire\Product;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class ProductDetailsComponent extends Component
{
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_priced;
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

    public function render()
    {
        $orderItems = OrderItem::where('product_id', $this->product_id)->where('rstatus', true)->pluck('id');
        $reviews = Review::with('orderItem')->whereIn('order_item_id', $orderItems)->get();
        return view('livewire.product.product-details-component', ['reviews' => $reviews])->layout('layouts.front');
    }
}
