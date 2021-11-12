<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::prefix('carts')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/{idProduct}/add-to-cart', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/{index}/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware('checkLogin')->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    });

    Route::prefix('admin')->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
            Route::get('/{id}/update', [ProductController::class, 'update'])->name('products.update');
            Route::post('/{id}/update', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/delete', [ProductController::class, 'delete'])->name('products.delete');
        });
        Route::prefix('categories')->group(function () {
            Route::get('/',[CategoriesController::class, 'index'])->name('categories.index');
            Route::get('/create',[CategoriesController::class, 'create'])->name('categories.create');
            Route::post('/create',[CategoriesController::class, 'store'])->name('categories.store');
            Route::get('/{id}/update',[CategoriesController::class, 'edit'])->name('categories.edit');
            Route::post('/{id}/update',[CategoriesController::class, 'update'])->name('categories.update');
            Route::get('/{id}/delete',[CategoriesController::class, 'destroy'])->name('categories.destroy');
        });
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('users/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });
});



Route::get('/login', function () {
    return view('login');
})->name('showFormLogin');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $username = $request->username;
    $password = $request->password;

    if ($username == 'admin' && $password == '123456') {
        session()->push('isLogin', true);
        return redirect()->route('products.index');
    } else {
        return redirect('login');
    }
});

