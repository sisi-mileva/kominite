@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Качване на снимка</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/gallery') }}">Назад</a></p>
    </div>
    <div class="col-sm-6">
        {!!Form::open(['action' => 'CmsPhotosController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::text('title','',['placeholder' => 'Име','class' => 'form-control'])}}
        </div>
        {{Form::hidden('album_id', $album_id)}}
        <div class="form-group">
            {{Form::file('photo')}}
        </div>
        <div class="form-group">
            <label>
                {{Form::checkbox('is_cover')}}
                Запази като корица
            </label>
        </div>
        {{Form::submit('Качване', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection