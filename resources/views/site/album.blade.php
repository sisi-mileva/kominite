@extends('site.index')

@section('content')
    <div class="products-container clearfix">
        <h2>{{$album->name}}</h2>
        <p>{!! $album->description !!}</p>
        @foreach($album->photos as $photo)
            <div class="album-cart">
                <div class="album-link">
                    <img src="../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->$photo}}">
                </div>
                <h3 class="text-center album-title">{{$photo->title}}</h3>
            </div>
        @endforeach
    </div>
@endsection