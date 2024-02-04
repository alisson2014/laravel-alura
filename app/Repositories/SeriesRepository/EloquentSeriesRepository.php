<?php

namespace App\Repositories\SeriesRepository;

use App\Models\{Season, Series, Episode};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function all(): Collection
    {
        return Series::query()
            ->orderBy('name')->get();
    }

    public function put(Series $series, string $name, int $seasonsQty, int $episodesPerSeason, string|null $cover_path): bool
    {
        $all = compact(['name', 'seasonsQty', 'episodesPerSeason', 'cover_path']);
        $series->fill($all);
        return $series->save();
    }

    public function add(
        string $name, 
        int $seasonsQty, 
        int $episodesPerSeason, 
        string|null $cover_path = null
    ): Series 
    {
        return DB::transaction(function () use ($name, $seasonsQty, $episodesPerSeason, $cover_path) {
            $series = Series::create(compact(['name', 'cover_path']));

            $seasons = [];
            for ($i = 1; $i <= $seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i
                ];
            }
            Season::insert($seasons);
    
            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($j = 1; $j <= $episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }
            Episode::insert($episodes);
            
            return $series;
        });
    }
}
