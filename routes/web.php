<?php

use App\Models\Cloth;
use App\Models\Customer;
use App\Models\Neck;
use App\Models\NeckStyleContainer;
use App\Models\shoulder;
use App\Models\ShoulderStyleContainer;
use App\Models\Skirt;
use App\Models\SkirtStyleContainer;
use App\Models\Vaskates;
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

Route::middleware('auth')->group(function () {

    Route::get('/', App\Livewire\Index::class)->name('home');
    Route::get('/cloths', App\Livewire\ClothBill::class)->name('bill.cloths');
  
    Route::get('/vaskate', App\Livewire\VaskatBill::class)->name('bill.vaskate');
    Route::get('/coat', App\Livewire\CoatBill::class)->name('bill.coat');
    Route::get('/panth', App\Livewire\PanthBill::class)->name('bill.panth');
  
    Route::get('/tshirt', App\Livewire\TshirtBill::class)->name('bill.tshirt');
    Route::get('/customers', App\Livewire\Customer::class)->name('page.customer');
    Route::get('/staff', App\Livewire\Staff::class)->name('page.staff');
    Route::get('/staffDelete', [App\Http\Controllers\deleteStaff::class,"deleteStaff"])->name('page.staff.delete');
    Route::get('/cloths/style', App\Livewire\Style::class)->name('page.style');
    Route::get('/staff/{id}', App\Livewire\StaffShowAllCloth::class)->name('staff.details');


    Route::get('/setting', App\Livewire\Setting::class)->name('page.setting');
});

Route::get('/login', App\Livewire\Login::class)->name('login')->middleware('guest');


Route::get("/test" , function(){
    $v  = Cloth::find(6);
   
   
    return $v->SleeveStyleContainer->where("clothing_type","cloth")->first()->sleeve_id;
    
    
 
});