@extends('components.layout')

@section('title', 'Episódios')

@section('content')
    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <form action="" method="post">
        @csrf 

        <ul class="list-group">
            @foreach ($episodes as $episode)            
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Temporada: {{ $episode->number }}
    
                    <input 
                        type="checkbox" 
                        name="episodes[]" 
                        value="{{ $episode->id }}" 
                        @if ($episode->watched) checked @endif
                    />
                </li>
            @endforeach
        </ul>
    
        <button type="submit" class="btn btn-primary mt-2 mb-2">
            Salvar
        </button>
    </form>
@endsection