@extends('components.layout')

@section('title', 'Lista de temporadas')

@section('content')
    <figure class="d-flex flex-column justify-content-center">
        <img 
            style="height: 300px"
            src="{{ asset('storage/' . $series?->cover_path) }}" 
            alt="Capa da série {!! $series->name !!}" 
            title="Capa da série {!! $series->name !!}"
            class="img-fluid"
        />
        <figcaption>Descrção da imagem/série</figcaption>
    </figure>

    <ul class="list-group">
        @foreach ($seasons as $season)            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada: {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection