<?php

namespace App\Http\Controllers\Series;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\{Series};
use App\Repositories\SeriesRepository\EloquentSeriesRepository;
use Illuminate\Http\{RedirectResponse, Request};

class SeriesController extends Controller
{
    public function __construct(
        private EloquentSeriesRepository $seriesRepository
    ) {   
    }

    public function index(Request $request)
    {
        return view('series.index')
            ->with('seriesData', Series::all())
            ->with('successMessage', session('success.message'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request): RedirectResponse
    {
        $series = $this->seriesRepository->add($request);

        return to_route('series.index')
            ->with('success.message', "Série '{$series->name}' adicionada com sucesso");
    }

    public function destroy(Series $series): RedirectResponse
    {
        $series->delete();
       
        return to_route('series.index')
            ->with('success.message', "Série {$series->name} removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request): RedirectResponse
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('success.message', "Série '{$series->name}' atualizada com sucesso.");
    }
}
