<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">@php
	
                    $route_name = explode('.',Route::currentRouteName());
            
                    @endphp
                {{ucfirst(str_replace('_', ' ', $route_name[0]))}}</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@yield('page_name')</h1>
        </div>
    </div><!--/.row-->
    @section('dashboard_header')
                
    @show
    
    <div class="row">
        <div class="col-md-12">
           @section('traffic_section')
               
           @show
        </div>
    </div><!--/.row-->
    <div class="row">
      @section('pie_chart')
          
      @show
    </div><!--/.row-->
      
    <div class="row">
        @section('general_body')
            
        @show
    </div>
    <div class="row">
        @section('others_section')
            
        @show
        <div class="col-sm-12">
            <p class="back-link">Powered By Sksshouvo.inc</p>
        </div>
    </div><!--/.row-->
  
</div>	<!--/.main-->
