@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>{{$advice->title}}</h2>
        <p><a class="btn btn-primary" href="{{ url('/admin/blog') }}">Към съвети</a></p>
    </div>
    <div class="col-sm-6">
        {!!Form::model($advice, ['action' => 'CmsBlogController@update','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        {{Form::hidden('id', $advice->id, [])}}
        <div class="form-group">
            <label>Заглавие:</label>
            {{Form::text('title',$advice->title,['placeholder' => 'Заглавие','class' => 'form-control'])}}
        </div>
        <div class="form-group">
            <label>Дата:</label>
            {{Form::text('datе',$advice->date,['placeholder' => 'дд-мм-гггг','class' => 'form-control date'])}}
        </div>
        <div class="form-group">
            <label>Кратко описание:</label>
            {{Form::textarea('short_description',$advice->short_description,['class' => 'form-control', 'row' => '2', 'placeholder' => 'Кратко описание'])}}
        </div>
        <div class="form-group">
            <label>Текст съвет:</label>
            {{Form::textarea('description',$advice->descxription,['class' => 'form-control', 'row' => '2', 'placeholder' => 'Текст съвет'])}}
        </div>
        <div class="form-group">
            <label>Снимка:</label>
            <div>
                <img src="../../storage/advices/{{$advice->image}}" width="260" alt="product image"/>
            </div>
            {{Form::file('image')}}
        </div>
        <div class="form-group">
            <label>
                {{Form::checkbox('is_ready', '1')}} Готов за публикуване
            </label>
        </div>
        {{Form::submit('Създай', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
@endsection