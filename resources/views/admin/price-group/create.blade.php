@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Нова Ценова група</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/product/' . $productId) }}" role="button">Назад към продукта</a></p>
    </div>
    <div class="col-sm-6">
        {!!Form::open(['action' => 'PriceGroupController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        {{Form::hidden('product_id', $productId)}}
        <div class="form-group">
            <label>Снимка1:</label>
            {{Form::file('image1')}}
        </div>
        <div class="form-group">
            <label>Снимка 2:</label>
            {{Form::file('image2')}}
        </div>
        <div class="form-group">
            <label>Ценова таблица:</label>
            {{Form::textarea('price_table','',['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание'])}}
        </div>
        {{Form::submit('Създай', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection