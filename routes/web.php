<?php

use App\Http\Controllers\Episodes\EpisodesController;
use App\Http\Controllers\Seasons\SeasonsController;
use App\Http\Controllers\Series\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/series'));

Route::resource('series', SeriesController::class)
    ->except(['show']);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');