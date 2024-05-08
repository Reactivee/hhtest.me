<?php

use App\Http\Controllers\BankCardController;
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


//Route::get('/api/bank-cards', [BankCardController::class, 'index']);

Route::post('/cards/bank-cards', [BankCardController::class, 'store']);
Route::get('/cards/bank-cards', [BankCardController::class, 'index']);
