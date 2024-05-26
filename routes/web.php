<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTypeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Customer Type Routes
Route::get('/customertypes', [CustomerTypeController::class, 'index'])->name('customertype.index');
Route::get('/customertypes/create', [CustomerTypeController::class, 'create'])->name('customertype.create');
Route::get('/customertypes/{id}/edit', [CustomerTypeController::class, 'edit'])->name('customertype.edit');
Route::post('/customertypes', [CustomerTypeController::class, 'store'])->name('customertype.store');
Route::put('/customertypes/{id}', [CustomerTypeController::class, 'update'])->name('customertype.update');
Route::delete('/customertypes/{id}', [CustomerTypeController::class, 'destroy'])->name('customertype.destroy');

// Customer Routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customers', [CustomerController::class, 'store'])->name('customer.store');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
