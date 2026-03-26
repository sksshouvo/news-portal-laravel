@php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
	@php
	$route_name = explode('.',Route::currentRouteName());
	@endphp
	{{ucfirst(str_replace('_', ' ', $route_name[0]))}}
</title>
	<meta name="csrf-token" content="{{csrf_token() }}">
	<link href="{{asset('css/dashboard/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/dashboard/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/dashboard/datepicker3.css')}}" rel="stylesheet">
	<link href="{{asset('css/dashboard/styles.css')}}" rel="stylesheet">
	<link href="{{asset('css/dashboard/custom.css')}}" rel="stylesheet">
	<link href="{{asset('css/dashboard/bootstrap-toggle.min.css')}}" rel="stylesheet">
	@section('add_css_src')
		
	@show
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('js/dashboard/html5shiv.js')}}"></script>
    <script src="{{asset('js/dashboard/respond.min.js')}}"></script>
	<![endif]-->
	@section('custom_style')
		
	@show
</head>
<body>