@extends('site.index')

@section('content')
    <div class="products-container clearfix">
        <div class="products-wrapper clearfix info-container text-center">
            {!! $contacts !!}
        </div>
        @include('site.inc.slider')
    </div>
@endsection