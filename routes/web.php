<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\BrandController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProductController;


Route::middleware("auth")->get('/dashboard', function () {
    return Inertia::render('Welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect("/login");
});

//Brands
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('brands');
    Route::get('/add', [BrandController::class, 'add'])->name('add');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::post('/save', [BrandController::class, 'save'])->name('brands.save');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brands.delete');
});

//Products
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/add', [ProductController::class, 'add'])->name('products.add');
    Route::post('/save', [ProductController::class, 'save'])->name('products.save');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

});

//Parts
Route::prefix('parts')->group(function () {
    Route::get('/add', [PartController::class, 'add'])->name('parts.add');

});




// Route::get('/brand/create', [BrandController::class, 'create'])->name('create');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });
