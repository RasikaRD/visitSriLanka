<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TravelController;
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

Route::get('/', [TravelController::class, 'index']);
Route::post('/beautiful-locations', [TravelController::class, 'getBeautifulLocations'])->name('chatgpt.ask');
