<?php

use App\Http\Controllers\Series\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/series'));

Route::resource('series', SeriesController::class)
    ->except(['show']);