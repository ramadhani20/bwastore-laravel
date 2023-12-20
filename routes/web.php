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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('category', CategoryController::class);
Route::resource('cart', CartController::class);

Route::resource('dashboard', DashboardController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard-products', [DashboardProductController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard-products/{id}', [DashboardProductController::class, 'detail'])->name('dashboard.detail');
Route::get('/dashboard-products-create', [DashboardProductController::class, 'create'])->name('dashboard.create');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/success', [CartController::class, 'success'])->name('cart.success');
Route::get('details/{id}', [CategoryController::class, 'detail'])->name('category.detail');
Route::get('/register/success', [HomeController::class, 'success'])->name('register.success');

Route::get('/transaction', [DashboardTransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/{id}', [DashboardTransactionController::class, 'details'])->name('transaction.detail');

Route::get('/dashboard-settings', [DashboardSettingController::class, 'index'])->name('setting.index');
Route::get('/dashboard-account', [DashboardSettingController::class, 'settings'])->name('setting.account');

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');

    // CATEGORIES ADMIN
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin-categories');
    Route::get('/categories-create', [CategoriesController::class, 'create'])->name('admin-categories-create');
    Route::post('/categories-store', [CategoriesController::class, 'store'])->name('admin-categories-store');
    Route::get('/categories-edit/{id}', [CategoriesController::class, 'edit'])->name('admin-categories-edit');
    Route::put('/categories-update/{id}', [CategoriesController::class, 'update'])->name('admin-categories-update');
    Route::delete('/categories-destroy/{id}', [CategoriesController::class, 'destroy'])->name('admin-categories-destroy');

    // USERS ADMIN
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    // PRODUCTS ADMIN
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('products/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // PRODUCT GALLERY ADMIN
    Route::get('/products-gallery', [ProductGalleryController::class, 'index'])->name('product-gallery.index');
    Route::get('/products-gallery/create', [ProductGalleryController::class, 'create'])->name('product-gallery.create');
    Route::post('/products-gallery/store', [ProductGalleryController::class, 'store'])->name('product-gallery.store');
    Route::delete('/products-gallery/destroy/{id}', [ProductGalleryController::class, 'destroy'])->name('product-gallery.destroy');
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
