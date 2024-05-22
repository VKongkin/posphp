<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/change-qty', [CartController::class, 'changeQty']);
    Route::delete('/cart/delete', [CartController::class, 'delete']);
    Route::delete('/cart/empty', [CartController::class, 'empty']);
    Route::resource('users', UserController::class);
});
Route::get('/generate-invoice/{order}', [InvoiceController::class, 'generateInvoice']);

Route::get('/invoice', [InvoiceController::class, 'show'])->name('show.invoice');
Route::get('/print/invoice', [InvoiceController::class, 'print'])->name('print.invoice');

Route::get('/quotation/{order}', [QuotationController::class, 'show']);
Route::get('/print/quotation', [QuotationController::class, 'print'])->name('print.quotation');
// Route::post('/update-profile-image', 'UserController@updateProfileImage')->name('update-profile-image');
// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{user}', 'UserController@show')->name('users.show');
// Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
// Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');


