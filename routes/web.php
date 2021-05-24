<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController; 
use App\Http\Controllers\FacebookUserController; 

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

Route::get('/stock/{id}',[StockController::class,'index']);
Route::post('/stock', [StockController::class, 'storeStock']);
Route::post('/facebook-user', [FacebookUserController::class, 'checkFacebookUser']);





