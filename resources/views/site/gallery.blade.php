@extends('site.index')

@section('content')
    <div class="products-container gallery-wrapper clearfix">
        @foreach($albums as $album)
            <div class="album-cart">
                <a href="{{ url('/gallery/' . $album->id) }}" class="album-link">
                    <img src="./storage/photos/{{$album->id}}/{{$album->cover_image}}" alt="{{$album->name}}">
                </a>
                <h3 class="text-center album-title">{{$album->name}}</h3>
            </div>
        @endforeach
    </div>
@endsection