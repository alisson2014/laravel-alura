@extends('components.layout')

@section('title', "Editar série $series->name")
@section('content')
    @parent
    @include(
    'components.series.form',  
    [
        'action' => route('series.update', $series->id),
        'name' => $series->name,
        'update' => true
    ])
@endsection