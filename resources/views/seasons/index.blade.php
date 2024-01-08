@extends('components.layout')

@section('title', 'Lista de temporadas')

@section('content')
    <ul class="list-group">
        @foreach ($seasons as $season)            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada: {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection