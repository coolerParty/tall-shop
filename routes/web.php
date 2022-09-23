<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryAddComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryEditComponent;
use App\Http\Livewire\Admin\Contact\AdminContactComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponAddComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponEditComponent;
use App\Http\Livewire\Admin\Product\AdminProductAddComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\Product\AdminProductEditComponent;
use App\Http\Livewire\Admin\HomeSlider\HomeSliderAddComponent;
use App\Http\Livewire\Admin\Homeslider\HomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\HomeSliderEditComponent;
use App\Http\Livewire\Admin\Order\AdminOrderComponent;
use App\Http\Livewire\Admin\Order\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\Users\UserAddComponent;
use App\Http\Livewire\Admin\Users\UserComponent;
use App\Http\Livewire\Admin\Users\UserEditComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\MenuComponent;
use App\Http\Livewire\Product\ProductDetailsComponent;
use App\Http\Livewire\User\Order\UserOrderComponent;
use App\Http\Livewire\User\Order\UserOrderDetailsComponent;
use App\Http\Livewire\User\Password\UserChangePasswordComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');
Route::get('/menu', MenuComponent::class)->name('menu');
Route::get('/cart', CartComponent::class)->name('cart.index');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist.index');
Route::get('/product/{slug}', ProductDetailsComponent::class)->name('product.details');
Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thankyou');


// users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('user')->name('user.')->group(function () {

    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/orders', UserOrderComponent::class)->name('order.index');
    Route::get('/orders/{order_id}/details', UserOrderDetailsComponent::class)->name('order.show');
    Route::get('/change-password', UserChangePasswordComponent::class)->name('changepassword');
});

// admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'role_or_permission:super-admin|dashboard-access|admin'
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

    Route::get('/coupons', AdminCouponComponent::class)->name('coupon.index');
    Route::get('/coupons/create', AdminCouponAddComponent::class)->name('coupon.create');
    Route::get('/coupons/{coupon_id}/edit', AdminCouponEditComponent::class)->name('coupon.edit');

    Route::get('/categories', AdminCategoryComponent::class)->name('category.index');
    Route::get('/categories/create', AdminCategoryAddComponent::class)->name('category.create');
    Route::get('/categories/{category_id}/edit', AdminCategoryEditComponent::class)->name('category.edit');

    Route::get('/orders', AdminOrderComponent::class)->name('order.index');
    Route::get('/orders/{order_id}', AdminOrderDetailsComponent::class)->name('order.show');

    Route::get('/contact-us', AdminContactComponent::class)->name('contact');
});
