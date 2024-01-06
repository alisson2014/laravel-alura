<?php

namespace App\Http\Controllers\Series;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\{RedirectResponse, Request};

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        $successMessage = session('success.message');

        return view('series.index', compact(['series', 'successMessage']));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request): RedirectResponse
    {
        $series = Series::create($request->all());

        return to_route('series.index')
            ->with('success.message', "Série '{$series->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series): RedirectResponse
    {
        $series->delete();
       
        return to_route('series.index')
            ->with('success.message', "Série {$series->nome} removida com sucesso");
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
            ->with('success.message', "Série '{$series->nome}' atualizada com sucesso.");
    }
}
