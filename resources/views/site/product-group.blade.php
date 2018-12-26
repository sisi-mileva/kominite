@extends('site.index')

@section('content')
    <div class="products-container clearfix product-group">
        <div class="products-wrapper clearfix">
            <div class="cart-grid">
                <div class="cart-wrapper">
                    <img src="{{url('/storage/products/' . $product->image)}}" alt="product"/>
                    <h3>{{$product->name}}</h3>
                    <div>{!! $product->description !!}</div>
                    <p>{{$product->code}}</p>
                </div>
            </div>
            <div class="prices-wrapper">
                @foreach($product->priceGroups as $priceGroup)
                    <div class="image-wrapper clearfix">
                        <div class="image-box first-col">
                            <h3>{{$priceGroup->title}}</h3>
                        </div>
                        @if(! empty($priceGroup->image1) && ! empty($priceGroup->image2))
                            <div class="image-box">
                                <img src="{{url('/storage/products/' . $priceGroup->image1)}}" alt="">
                            </div>
                            <div class="image-box">
                                <img src="{{url('/storage/products/' . $priceGroup->image2)}}" alt="">
                            </div>
                        @endif
                    </div>
                    {!! $priceGroup->price_table !!}
                @endforeach
            </div>
        </div>
        @include('site.inc.slider')
    </div>
@endsection