<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/admin/dashboard', function(){
    return view('admin.wop');
})->name('admin-dash');

Route::get('/admin/orders', function(){
    return view('admin.wop');
})->name('admin-orders');

Route::get('/admin/products', [AdminController::class, 'products'])->name('admin-products');

Route::get('/admin/customers', function(){
    return view('admin.wop');
})->name('admin-customers');
