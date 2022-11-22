<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

/* All dashboard related groups */

Route::get('/admin/dashboard', function(){
    return view('admin.wop');
})->name('admin-dash');

/* All order related groups */

Route::get('/admin/orders', function(){
    return view('admin.wop');
})->name('admin-orders');


/* All products related routes */
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin-products');

Route::get('/admin/products/new', [AdminController::class, 'newProduct'])->name('admin-products-new');

Route::post('/admin/products/new', [ProductController::class, 'new'])->name('new-product');

Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin-categories');

Route::get('/admin/categories/new', [AdminController::class, 'newCategory'])->name('admin-categories-new');

Route::post('/admin/categories/new', [CatergoryController::class, 'new'])->name('new-category');

//All account related routes

Route::get('/admin/accounts', [AdminController::class, 'accounts'])->name('admin-accounts');
Route::get('/admin/accounts/new', [AdminController::class, 'accounts_new'])->name('admin-accounts-new');
Route::post('/admin/accounts/new', [AccountController::class, 'accounts_new'])->name('admin-accounts-new-post');



Route::get('/admin/customers', function(){
    return view('admin.wop');
})->name('admin-customers');
