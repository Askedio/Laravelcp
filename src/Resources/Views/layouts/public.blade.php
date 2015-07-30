<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <title>@yield('title', trans('lcp::app.title'))</title>

    {!! Html::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
    {!! Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/app.css') !!}
    @yield('styles')
    @yield('head')

</head>
<body>
    @section('header')
    @show

    @yield('content')
 

    @section('footer')
    @show

  {!! Html::script('//code.jquery.com/jquery-2.1.4.min.js') !!}
  {!! Html::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}
  {!! Html::script('assets/js/app.js') !!}
  @yield('scripts')
</body>
</html>