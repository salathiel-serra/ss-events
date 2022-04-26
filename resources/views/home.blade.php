@extends("layouts.app")

@section("title", "SS | Events")

@section("content")

    <div id="search-container" class="col-md-12">
        <form action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procure eventos">
            <br>
            <input type="submit" value="Buscar" class="btn btn-sm btn-light">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        @if($search)
            <h2> Buscando por: {{ $search }} </h2>
        @else
            <h2> Próximos eventos </h2>
            <p class="subtitle"> Saiba os eventos que acontecerão nos próximos dias </p>
        @endif

        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-3">
                    
                    <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    <div class="card-body">
                        <p class="card-date"> 00/00/0000 </p>
                        <h5 class="card-title"> {{ $event->title }} </h5>
                        <p class="card-participants"> ** Participantes </p>
                        <a href="#" class="btn btn-primary"> Ver mais </a>

                    </div>
                </div>
            @endforeach

            @if($search && count($events) == 0)
                <p> Não foi possível encontrar nenhum evento com {{ $search }}! <a href="/" class=""> Ver todos </a> </p>

            @elseif(count($events) == 0)
                <p> Não há eventos disponíveis </p>

            @endif
        </div>

    </div>


@endsection