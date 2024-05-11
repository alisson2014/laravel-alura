<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
        
    }

    public function index(Request $request)
    {
        $query = Series::query();
        if($request->has("name")) {
            $query->where("name", $request->name);
        }

        return $query->paginate(2);
    }

    public function show(int $series)
    {
        $seriesModel = Series::with("seasons.episodes")->find($series);
        if(is_null($seriesModel)) {
            return response()->json(['message' => 'Series not found'], 404);
        }
        
        return $seriesModel->with("seasons.episodes")->get();
    }

    public function store(SeriesFormRequest $request)
    {
        return response()->json(
            $this->seriesRepository->add(
                $request->name, 
                $request->seasonsQty, 
                $request->episodesPerSeason,
                $request->cover_path
            ), 201
        );
    }

    public function update(Series $series, SeriesFormRequest $seriesFormRequest) 
    {
        $series->fill($seriesFormRequest->all());
        $series->save();

        return $series;
    }

    public function destroy(int $series)
    {
        Series::destroy($series);
        return response()->noContent();
    }
}
