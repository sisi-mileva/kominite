@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>@if($generalInfo->type == '1') За нас @else Контакти @endif</h2>
    </div>
    <div class="col-xs-12">
        {!!Form::model($generalInfo, ['action' => ['GeneralInfoController@update'],'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        {{Form::hidden('id', $generalInfo->id, [])}}
        {{Form::hidden('type', $generalInfo->type, [])}}
        <div class="form-group">
            {{Form::textarea('page_content', $generalInfo->page_content, ['class' => 'form-control', 'row' => '6', 'placeholder' => 'Описание'])}}
        </div>
        {{Form::submit('Запази', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection