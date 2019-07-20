@extends('site.index')

@section('content')
    <div class="products-container gallery-wrapper clearfix">
        <h1>{{$album->name}}</h1>
        <div>{!! $album->description !!}</div>
        <div class="album-wrapper">
            @foreach($album->photos as $photo)
                <div class="album-cart">
                    <div class="album-link">
                        <img src="../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->$photo}}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection