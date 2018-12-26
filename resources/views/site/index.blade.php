<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<!--[if lt IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <title>Kominite.com</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @if (trim($__env->yieldContent('description')))
        <meta name="description" content="@yield('description')">
    @endif
    @if (trim($__env->yieldContent('keywords')))
        <meta name="keywords" content="@yield('keywords')">
    @endif
    <link rel="stylesheet" href="{{asset('css/libs.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css"/>
</head>
<body>
@include('site.inc.header')
<div class="top-padding">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"
></script>
<script type="text/javascript" src="{{asset('js/libs.js')}}" defer></script>
<script type="text/javascript" src="{{asset('js/all.js')}}" defer></script>
</body>
</html>