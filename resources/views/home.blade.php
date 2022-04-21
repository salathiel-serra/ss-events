@extends("layouts.app")

@section("title", "SS | Events")

@section("content")

    <div class="container">
        <h1> Eventos </h1>
    
        <hr>
    
        @foreach($events as $event)
            <p> {{ $event->title }} -- {{ $event->description }} </p>
        @endforeach
    </div>


@endsection