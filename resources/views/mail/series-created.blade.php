@component('mail::message')

# {{ $seriesName }} criada

A série {{ $seriesName }} com {{ $seasonsQty }} temporadas e {{ $episodesPerSeason }} episódio  por temporada foi criada.

Acesse aqui:
@component('mail::button', ['url' => route('seasons.index', $seriesId)])
    Ver série
@endcomponent

@endcomponent