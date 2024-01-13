<?php

use App\Http\Controllers\Episodes\EpisodesController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Seasons\SeasonsController;
use App\Http\Controllers\Series\SeriesController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Middleware\Authenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->name('signin');
Route::get('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [UsersController::class, 'create'])
    ->name('users.create');

Route::post('/register', [UsersController::class, 'store'])
    ->name('users.store');

Route::get('/', fn () => redirect('/series'))->middleware(Authenticator::class);

Route::resource('series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])
    ->name('episodes.update');