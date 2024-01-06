@extends('components.layout')

@section('title', "Editar série $series->nome")
@section('content')
    @parent
    @include(
    'components.series.form',  
    [
        'action' => route('series.update', $series->id),
        'nome' => $series->nome,
        'update' => true
    ])
@endsection