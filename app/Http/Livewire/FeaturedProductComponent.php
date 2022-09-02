<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class FeaturedProductComponent extends Component
{
    public function render()
    {
        $products = Product::select('id', 'name', 'image', 'regular_price', 'sale_price')->where('active', 1)->where('featured', 1)->take(8)->get();
        return view('livewire.featured-product-component', ['products' => $products]);
    }
}
