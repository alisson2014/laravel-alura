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
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->nome }}

            <span class="d-flex">
                <a 
                    href="{{ route('series.edit', $serie->id) }}" 
                    title="Editar serie '{{ $serie->nome }}'"
                    class="btn btn-primary btn-sm"
                >Editar</a>
                <form 
                    action="{{ route('series.destroy', $serie->id) }}" 
                    method="POST"
                    class="ms-2"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        class="btn btn-danger btn-sm" 
                        type="submit"
                        title="Excluir {{ $serie->nome }}"
                    >Excluir</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
@endsection