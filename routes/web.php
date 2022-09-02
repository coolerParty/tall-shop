<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductAddComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductEditComponent;
use App\Http\Livewire\Admin\HomeSlider\HomeSliderAddComponent;
use App\Http\Livewire\Admin\Homeslider\HomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\HomeSliderEditComponent;
use App\Http\Livewire\Admin\Users\UserAddComponent;
use App\Http\Livewire\Admin\Users\UserComponent;
use App\Http\Livewire\Admin\Users\UserEditComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/menu', MenuComponent::class)->name('menu');
Route::get('/cart', CartComponent::class)->name('cart.index');
Route::get('/checkout', CheckoutComponent::class)->name('checkout.index');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','role_or_permission:super-admin|dashboard-access|admin'
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminDashboardComponent::class)->name('dashboard');

    Route::get('/home-slider', HomeSliderComponent::class)->name('homeslider.index');
    Route::get('/home-slider/create', HomeSliderAddComponent::class)->name('homeslider.create');
    Route::get('/home-slider/{homeslider_id}/edit', HomeSliderEditComponent::class)->name('homeslider.edit');

    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);

    Route::get('/users', UserComponent::class)->name('users.index');
    Route::get('/users/create', UserAddComponent::class)->name('users.create');
    Route::get('/users/{user_id}/edit', UserEditComponent::class)->name('users.edit');

    Route::get('/products', AdminProductComponent::class)->name('product.index');
    Route::get('/products/create', AdminProductAddComponent::class)->name('product.create');
    Route::get('/products/{product_id}/edit', AdminProductEditComponent::class)->name('product.edit');

});
