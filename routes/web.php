<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Home
Route::resource('/', HomeController::class);
Route::get('/register/success', [HomeController::class, 'success'])->name('register.success');

// Dashboard
Route::resource('dashboard', DashboardController::class);

// Category
Route::resource('category', CategoryController::class);
Route::get('category-details/{id}', [CategoryController::class, 'detail'])->name('category.detail');

// Dashboard Product
Route::resource('dashboard-products', DashboardProductController::class);

// Cart
Route::resource('cart', CartController::class);
Route::get('/cart/success', [CartController::class, 'success'])->name('cart.success');

// Transaction
Route::resource('transaction', DashboardTransactionController::class);
Route::get('/transaction/{id}', [DashboardTransactionController::class, 'details'])->name('transaction.detail');

// Dashboard Settings
Route::resource('dashboard-settings', DashboardSettingController::class);
Route::get('/dashboard-account', [DashboardSettingController::class, 'settings'])->name('setting.account');

Route::prefix('admin')->group(function () {

    Route::resource('/', AdminDashboardController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('user', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-gallery', ProductGalleryController::class);

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
