@php
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Repository;
$seconds = 3600;
Cache::put('name', 'salman Kabir', $seconds);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Stylesheet -->
    <link href="{{asset('css/main_site/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/custom-icon.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/classy-nav.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/nice-select.min.csss')}}" rel="stylesheet">
    <link href="{{asset('css/main_site/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    @section('news_head')
        
    @show
    @section('add_extra_css') 
           
    @show
   <style>

    body {
        font-family: 'SolaimanLipi', Arial, sans-serif !important;
    }
   </style>
</head>
<body>
    <!-- ##### Header Area Start ##### -->