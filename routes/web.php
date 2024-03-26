<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', App\Livewire\Index::class);
Route::get('/cloths', App\Livewire\ClothBill::class)->name('bill.cloths');
Route::get('/vaskate', App\Livewire\VaskatBill::class)->name('bill.vaskate');
Route::get('/coat', App\Livewire\CoatBill::class)->name('bill.coat');
Route::get('/panth', App\Livewire\PanthBill::class)->name('bill.panth');
Route::get('/tshirt', App\Livewire\TshirtBill::class)->name('bill.tshirt');
Route::get('/customers', App\Livewire\Customer::class)->name('page.customer');
Route::get('/staff', App\Livewire\Staff::class)->name('page.staff');
Route::get('/cloths/style', App\Livewire\Style::class)->name('page.style');

Route::get('/setting', App\Livewire\Setting::class)->name('page.setting');


