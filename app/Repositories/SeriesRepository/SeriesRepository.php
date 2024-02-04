<?php

namespace App\Repositories\SeriesRepository;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Database\Eloquent\Collection;

interface SeriesRepository
{
    public function add(string $name, int $seasonsQty, int $episodesPerSeason, string|null $cover_path): Series ;
    public function put(Series $series, string $name, int $seasonsQty, int $episodesPerSeason, string|null $cover_path): bool;
    public function all(): Collection;
}
