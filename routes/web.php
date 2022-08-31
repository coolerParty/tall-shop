<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\HomeSliderComponent;
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
    'verified','role_or_permission:super-admin|admin-dashboard-access|admin'
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', AdminDashboardComponent::class)->name('dashboard');
    Route::get('/home-slider', HomeSliderComponent::class)->name('homeslider.index');
});
