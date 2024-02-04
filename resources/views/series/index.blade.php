@extends('components.layout')

@section('title', 'Lista de séries')
@section('content')
    @parent
    
    @auth    
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">
            <span>Adicionar</span>
            <i class="bi bi-plus-circle"></i>
        </a>
    @endauth

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach($seriesData as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                @isset($series->cover_path) 
                    <img 
                        src="{{ asset('storage/' . $series?->cover_path) }}" 
                        height="80"
                        class="me-3 img-thumbnaill"
                        alt="Capa da série {{ $series->name }}" 
                        title="Capa da série {{ $series->name }}"
                    />
                @else
                    <i class="bi bi-card-image me-3" style="font-size: 80px"></i>
                @endisset

                @auth <a href="{{ route('seasons.index', $series->id) }}"> @endauth
                    {{ $series->name }}
                @auth </a> @endauth
            </div>

            @auth
            <span class="d-flex">
                <a 
                    href="{{ route('series.edit', $series->id) }}" 
                    title="Editar série: '{{ $series->name }}'"
                    class="btn btn-primary btn-md"
                >
                    <span>Editar</span>
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form 
                    action="{{ route('series.destroy', $series->id) }}" 
                    method="POST"
                    class="ms-2"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        class="btn btn-danger btn-md" 
                        type="submit"
                        title="Excluir série: {{ $series->name }}"
                    >
                        <span>Excluir</span>
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </span>
            @endauth
        </li>
        @endforeach
    </ul>
@endsection