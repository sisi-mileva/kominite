@extends('site.index')

@section('content')
    <div class="products-container clearfix">
        <div class="products-wrapper clearfix info-container">
            {!! $about !!}
        </div>
        @include('site.inc.slider')
    </div>
@endsection