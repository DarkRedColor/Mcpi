<?php

use App\Http\Controllers\Mcpi\CaesarController;
use \App\Http\Controllers\Mcpi\DecryptController;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

$prefix = request()->segment(1)?request()->segment(1):'';
if($prefix!='ro'){
    $prefix='';
}
Route::group(['middleware'=>'language', 'prefix' => $prefix],function ()
{
    Route::get('/caesar', [CaesarController::class, 'index']);
    Route::post('/caesar', [CaesarController::class, 'store']);
    Route::post('/playfare', [CaesarController::class, 'store'])->name('playfare');
});

