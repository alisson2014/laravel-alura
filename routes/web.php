<?php

use App\Http\Controllers\Episodes\EpisodesController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Seasons\SeasonsController;
use App\Http\Controllers\Series\SeriesController;
use App\Http\Controllers\Users\UsersController;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Route;

Route::resource('series', SeriesController::class)
    ->except('show');

Route::middleware('authenticator')->group(function () {
    Route::get('/', fn () => redirect('/series'));

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
        ->name('seasons.index');

    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])
        ->name('episodes.index');
    
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])
        ->name('episodes.update');
});

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->name('signin');
Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [UsersController::class, 'create'])
    ->name('users.create');

Route::post('/register', [UsersController::class, 'store'])
    ->name('users.store');

Route::get('/email', function () {
    return new SeriesCreated('Série teste', 11, 2, 5);
});