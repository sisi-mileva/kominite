@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Нов Продукт</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/products') }}">Към продукти</a></p>
    </div>
    <div class="col-sm-6">
        {!!Form::open(['action' => 'ProductsController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            <label>Име на продукта:</label>
            {{Form::text('name','',['placeholder' => 'Име на продукта','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Кратко описание:</label>
            {{Form::textarea('description','',['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание'])}}
        </div>
        <div class="form-group">
            <label>Код:</label>
            {{Form::text('code','',['placeholder' => 'Код','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Ключови думи:</label>
            {{Form::text('opt_keys','',['placeholder' => 'Ключови думи','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Кратко описание за търсачка:</label>
            {{Form::textarea('opt_description','',['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание за търсачка'])}}
        </div>
        <div class="form-group">
            <label>Снимка:</label>
            {{Form::file('image')}}
        </div>
        {{Form::submit('Създай', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection