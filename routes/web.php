<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ClubSponsorController;
use App\Http\Controllers\ChampionnatController;

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
Route::resource('clubs', ClubController::class);
Route::resource('sponsors', SponsorController::class);
Route::resource('clubs-sponsors', ClubSponsorController::class);
Route::resource('championnats', ChampionnatController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

