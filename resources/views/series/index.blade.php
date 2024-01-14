@extends('components.layout')

@section('title', 'Lista de séries')
@section('content')
    @parent
    
    @auth    
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach($seriesData as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth <a href="{{ route('seasons.index', $series->id) }}"> @endauth
                {{ $series->name }}
            @auth </a> @endauth

            @auth
            <span class="d-flex">
                <a 
                    href="{{ route('series.edit', $series->id) }}" 
                    title="Editar serie '{{ $series->name }}'"
                    class="btn btn-primary btn-sm"
                >Editar</a>
                <form 
                    action="{{ route('series.destroy', $series->id) }}" 
                    method="POST"
                    class="ms-2"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        class="btn btn-danger btn-sm" 
                        type="submit"
                        title="Excluir {{ $series->name }}"
                    >Excluir</button>
                </form>
            </span>
            @endauth
        </li>
        @endforeach
    </ul>
@endsection