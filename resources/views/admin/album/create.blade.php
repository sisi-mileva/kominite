@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Нов Албум</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/gallery') }}">Назад</a></p>
    </div>
    <div class="col-sm-6">
        {!!Form::open(['action' => 'CmsAlbumsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::text('name','',['placeholder' => 'Име на албума','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::textarea('description','',['class' => 'form-control', 'row' => '3', 'placeholder' => 'Кратко описание'])}}
        </div>
        {{Form::submit('Създай', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection