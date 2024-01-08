<?php

namespace App\Providers;

use App\Repositories\SeriesRepository\{EloquentSeriesRepository, SeriesRepository};
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];
}
