@extends('admin.cms')

@section('content')
    <div class="jumbotron clearfix">
        <h2>{{$album->name}}</h2>
        <p>{!! $album->description !!}</p>
        <p class="col-xs-9">
            <a class="btn btn-primary btn-lg" href="{{ url('/admin/gallery') }}" role="button">Към галерия с албуми</a>
            <a class="btn btn-success btn-lg" href="{{ url('/admin/photos/create/' . $album->id) }}" role="button">Добави снимка</a>
        </p>
        <p class="col-xs-3 text-right">
            <a class="btn btn-danger btn-lg float-left" href="{{ url('/admin/gallery/destroy/' . $album->id) }}">Изтрий Албума</a>
        </p>
    </div>
    <div class="col-sm-12">
        @foreach($album->photos as $photo)
            <div class="col-xs-6 col-md-3">
                <div class="thumbnail">
                    <img src="../../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->$photo}}">
                </div>
                <div>
                    <p class="col-xs-9">{{$photo->title}}</p>
                    <p class="col-xs-3 text-right">
                        <a class="btn btn-danger float-left" href="{{ url('/admin/photos/destroy/' . $photo->id) }}">X</a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection