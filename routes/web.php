<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\facilityUser;
use App\Http\Controllers\RegisterController;
use App\Models\facility;

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
    return view('halo',[
        'facilities' => facility::latest()->offset(0)->limit(3)->get()
    ]);
});


Route::resource('/booking',BookingController::class)->middleware('auth');

Route::resource('/users',UsersController::class)->middleware('auth');

Route::resource('/facility',FacilityController::class)->middleware('auth');

Route::get('/guestfacility',function(){
    return view('facilityGuest',[
        'facilities' => facility::all()
    ]);
})->middleware('guest');

Route::get('/login',[LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/facilityUser',[facilityUser::class, 'index'])->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
