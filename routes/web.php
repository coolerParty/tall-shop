<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\HomeSliderComponent;
use App\Http\Livewire\Admin\Users\UserAddComponent;
use App\Http\Livewire\Admin\Users\UserComponent;
use App\Http\Livewire\Admin\Users\UserEditComponent;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeComponent::class)->name('home');


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

    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);

    Route::get('/users', UserComponent::class)->name('users.index');
    Route::get('/users/create', UserAddComponent::class)->name('users.create');
    Route::get('/users/{user_id}/edit', UserEditComponent::class)->name('users.edit');
    
});
