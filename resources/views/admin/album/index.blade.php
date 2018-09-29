@extends('admin.cms')

@section('content')
 <div class="jumbotron">
  <h2>Галерия</h2>
  <p>От тук се създават албуми с монтажи</p>
  <p><a class="btn btn-primary btn-lg" href="{{ url('/admin/gallery/create') }}" role="button">Създай албум</a></p>
 </div>
 <div class="col-sm-12">
  @foreach($albums as $album)
   <div class="col-xs-6 col-md-3">
    <a href="{{ url('/admin/gallery/' . $album->id) }}" class="thumbnail">
     <img src="../storage/photos/{{$album->id}}/{{$album->cover_image}}" alt="{{$album->name}}">
    </a>
    <h3 class="text-center">{{$album->name}}</h3>
   </div>
  @endforeach
 </div>
@endsection