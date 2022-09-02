<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class MenuComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::select('id','name','regular_price','sale_price','short_description','image')
        ->orderBy('name','ASC')->where('active',1)->paginate(8);
        return view('livewire.menu-component',['products'=>$products])->layout('layouts.front');
    }
}
