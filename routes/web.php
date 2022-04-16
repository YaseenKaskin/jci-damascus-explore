<?php

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

use App\Http\Controllers\{ActivityController, HotelController, HotelRomeController};
use App\Models\Hotel;
use App\Models\User;

Route::get('/', function () {
    return Hotel::find(1)->capacity;
    return view('welcome');
});

Route::resource('Activity', ActivityController::class);
Route::resource('Hotel', HotelController::class);
Route::resource('HotelRome', HotelRomeController::class);