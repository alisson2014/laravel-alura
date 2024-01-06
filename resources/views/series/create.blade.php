@extends('components.layout')

@section('title', 'Cadastro de séries')
@section('content')
    @parent
    @include(
        'components.series.form',  
        [
            'action' => route('series.store'),
            'nome' => old('nome'),
            'update' => false
        ]
    )
@endsection