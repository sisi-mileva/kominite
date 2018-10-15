@extends('site.index')

@section('content')
    <div class="products-container clearfix">
        <div class="products-slider"></div>
        <div class="products-wrapper clearfix">
            @foreach($products as $product)
                <div class="cart-grid">
                    <a href="" class="cart-wrapper">
                        <img src="./storage/products/{{$product->image}}" alt="product"/>
                        <h3>{{$product->name}}</h3>
                        <div>{!! $product->description !!}</div>
                        <p>{{$product->code}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection