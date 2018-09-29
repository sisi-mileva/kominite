@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>{{$product->name}}</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/products') }}">Към продукти</a></p>
    </div>
    <div class="col-md-6 col-xs-12">
        {!!Form::model($product, ['action' => ['ProductsController@update'],'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        {{Form::hidden('id', $product->id, [])}}
        <div class="form-group">
            <label>Име на продукта:</label>
            {{Form::text('name', $product->name, ['placeholder' => 'Име на продукта','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Кратко описание:</label>
            {{Form::textarea('description', $product->description, ['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание'])}}
        </div>
        <div class="form-group">
            <label>Код:</label>
            {{Form::text('code', $product->code, ['placeholder' => 'Код','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Ключови думи:</label>
            {{Form::text('opt_keys', $product->opt_keys, ['placeholder' => 'Ключови думи','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Кратко описание за търсачка:</label>
            {{Form::textarea('opt_description', $product->opt_description, ['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание за търсачка'])}}
        </div>
        <div class="form-group">
            <label>Снимка:</label>
            <div>
                <img src="../../storage/products/{{$product->image}}" width="260" alt="product image"/>
            </div>
            {{Form::file('image')}}
        </div>
        {{Form::submit('Запази', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
    <div class="col-md-6 col-xs-12">
        <p class="form-group"><a class="btn btn-primary" href="{{ url('/admin/price_group/create/' . $product->id) }}" role="button">Добави ценова група</a></p>
        <table class="table table-striped table-bordered text-center">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Снимка 1</th>
                <th class="text-center">Снимка 2</th>
                <th class="text-center">Редакция</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->priceGroups as $priceGroup)
                <tr>
                    <td>{{$priceGroup->id}}</td>
                    <td>
                        <img src="../../storage/products/{{$priceGroup->image1}}" width="100" alt="product image"/>
                    </td>
                    <td>
                        <img src="../../storage/products/{{$priceGroup->image2}}" width="100" alt="product image"/>
                    </td>
                    <td class="edit-product">
                        <a href="{{ url('/admin/price_group/' . $priceGroup->id) }}">
                            <i class="fas fa-pen text-success"></i>
                        </a>
                        <a href="{{ url('/admin/price_group/destroy/' . $priceGroup->id) }}">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection