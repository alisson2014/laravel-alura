<?php

namespace App\Http\Controllers\Series;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\{Series};
use App\Repositories\SeriesRepository\EloquentSeriesRepository;
use Illuminate\Http\{RedirectResponse, Request};
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function __construct(
        private EloquentSeriesRepository $seriesRepository
    ) {   
        $this->middleware('authenticator')->except('index');
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

        $email = new SeriesCreated(
            $series->name,
            $series->id,
            $request->seasonsQty,
            $request->episodesPerSeason
        );
        Mail::to($request->user())->send($email);

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
