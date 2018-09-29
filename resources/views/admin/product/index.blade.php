@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Продукти</h2>
        <p><a class="btn btn-primary btn-lg" href="{{ url('/admin/product') }}" role="button">Създай продукт</a></p>
    </div>
    <div class="col-sm-6">
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">id</th>
                    <th class="text-center">Продукт</th>
                    <th class="text-center">Редакция</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td class="edit-product">
                        <a href="{{ url('/admin/product/' . $product->id) }}">
                            <i class="fas fa-pen text-success"></i>
                        </a>
                        <a href="{{ url('/admin/product/destroy/' . $product->id) }}">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection