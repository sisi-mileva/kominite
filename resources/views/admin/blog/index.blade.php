@extends('admin.cms')

@section('content')
    <div class="jumbotron">
        <h2>Съвети</h2>
        <p><a class="btn btn-primary btn-lg" href="{{ url('/admin/advice') }}" role="button">Създай съвет</a></p>
    </div>
    <div class="col-sm-6">
        <table class="table table-striped table-bordered text-center">
            <thead>
            <tr>
                <th class="text-center">id</th>
                <th class="text-center">Заглавие</th>
                <th class="text-center">Дата</th>
                <th class="text-center">Готов за пускане</th>
                <th class="text-center">Редакция</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->date}}</td>
                    <td>{{$blog->is_ready}}</td>
                    <td class="edit-product">
                        <a href="{{ url('/admin/advice/' . $blog->id) }}">
                            <i class="fas fa-pen text-success"></i>
                        </a>
                        <a href="{{ url('/admin/advice/destroy/' . $blog->id) }}">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection