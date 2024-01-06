@extends('components.layout')

@section('title', 'Cadastro de séries')
@section('content')
    @parent
    <form action="{{ route('series.store') }}" method="POST">
        @csrf
    
        <div class="row mb-3">
            <div class="form-group col-8">
                <label for="name">Nome da série:</label>
                <input 
                    autofocus
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control"
                    minlength="3"
                    required
                    autocomplete="off"
                    value="{{ old('name') }}"
                />
            </div>
            <div class="form-group col-2">
                <label for="seasonsQty">N° Temporadas:</label>
                <input 
                    type="number" 
                    min="1"
                    name="seasonsQty" 
                    id="seasonsQty" 
                    class="form-control"
                    minlength="3"
                    required
                    autocomplete="off"
                    value="{{ old('seasonsQty') }}"
                />
            </div>
            <div class="form-group col-2">
                <label for="episodesPerSeason">Eps / Temporadas:</label>
                <input 
                    type="number" 
                    name="episodesPerSeason" 
                    id="episodesPerSeason" 
                    class="form-control"
                    minlength="3"
                    required
                    autocomplete="off"
                    value="{{ old('episodesPerSeason') }}"
                />
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary mt-2">Enviar</button>
    </form>
@endsection