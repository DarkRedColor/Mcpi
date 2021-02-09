<?php

use App\Http\Controllers\Mcpi\CaesarController;
use \App\Http\Controllers\Mcpi\DecryptController;
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
Route::get('/caesar', [CaesarController::class, 'index']);
Route::post('/caesar', [CaesarController::class, 'store']);


