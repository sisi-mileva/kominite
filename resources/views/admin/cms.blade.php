<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kominite.com</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
</head>
<body>
<div class="container clearfix">
    @include('admin.inc.sideNavigation')
    <div class="cms-container clearfix">
        @yield('content')
    </div>
</div>
<script>
  $('textarea:visible').each(function() {
    CKEDITOR.replace(this.name)
  });
</script>
</body>
</html>