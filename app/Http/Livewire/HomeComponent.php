<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public function render()
    {
        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email); // save cart to database using user email;
            Cart::instance('wishlist')->restore(Auth::user()->email); // save wishlist to database using user email;
        }

        return view('livewire.home-component')->layout('layouts.front');
    }
}
