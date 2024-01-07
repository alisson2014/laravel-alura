@extends('components.layout')

@section('title', 'Lista de séries')
@section('content')
    @parent
    
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach($seriesData as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('seasons.index', $series->id) }}">
                {{ $series->name }}
            </a>

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
        </li>
        @endforeach
    </ul>
@endsection