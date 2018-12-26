@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Ценова група</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/product/' . $priceGroup->product_id) }}" role="button">Назад към продукта</a></p>
    </div>
    <div class="col-sm-6">
        {!!Form::model($priceGroup, ['action' => ['PriceGroupController@update'],'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        {{Form::hidden('id', $priceGroup->id, [])}}
        {{Form::hidden('product_id', $priceGroup->product_id)}}
        <div class="form-group">
            {{Form::text('title', $priceGroup->title, ['placeholder' => 'Име','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Снимка1:</label>
            <div>
                <img src="../../storage/products/{{$priceGroup->image1}}" width="260" alt="product image"/>
            </div>
            {{Form::file('image1')}}
        </div>
        <div class="form-group">
            <label>Снимка 2:</label>
            <div>
                <img src="../../storage/products/{{$priceGroup->image2}}" width="260" alt="product image"/>
            </div>
            {{Form::file('image2')}}
        </div>
        <div class="form-group">
            <label>Ценова таблица:</label>
            {{Form::textarea('price_table', $priceGroup->price_table, ['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание'])}}
        </div>
        {{Form::submit('Запази', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection