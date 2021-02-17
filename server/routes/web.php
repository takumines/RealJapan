<?php

use App\Http\Controllers\PropertyController;
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

Route::get('/', [PropertyController::class, 'index']);
Route::get('/search-city', [PropertyController::class, 'searchCity']);
Route::get('/search-area', [PropertyController::class, 'searchArea']);
Route::get('/search-property-type', [PropertyController::class, 'searchPropertyType']);
Route::post('/search', [PropertyController::class, 'search'])->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
