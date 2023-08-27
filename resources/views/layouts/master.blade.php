<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
	<meta name="description" content="Inventory management system">
	<meta name="author" content="Magic Gates Technologies">
	<meta name="keywords" content="Inventory management, Stock management">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title> {{Config::get('app.name')}} | @yield('page_title')</title>
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_web.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

    <script src="{{asset('js/jquery.js')}}"></script>
</head>

<body>
    @yield('body-content')
</body>

@yield('script_index')

</html>
