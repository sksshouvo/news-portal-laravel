<!-- ##### Footer Area Start ##### -->
<footer class="footer-area" id="main_footer" style="display: none">

    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                  <div class="footer-widget-area mt-80">
                  <!-- Footer Logo -->
                  <div class="footer-logo">
                      <a href="{{ url('./') }}"><img src="{{Storage::url('app/public/footer_logo.png')}}" alt="footer_logo"></a>
                  </div>
                </div>
                </div>
                <div class="col-sm-6">
                <br>
                <br>
                <br>
                <br>
                <div class="addthis_inline_share_toolbox"></div>
                </div>
                <!-- Footer Widget Area -->
                 @php
                                      
                 $all_category2 = App\category::where('status', '=', 1)->get();
                  @endphp
                  @foreach ($all_category2 as $ac2)
                  @php
                  if(strpos(Request::url(), 'news_categories')){
                  $link = '../news_categories/'.$ac2->id.'';
                  }else if(strpos(Request::url(), 'news_sub_categories')){
                  $link = '../news_categories/'.$ac2->id.'';
                  }else if(strpos(Request::url(), 'news_details')){
                  $link = '../news_categories/'.$ac2->id.'';
                  }else{
                  $link = './news_categories/'.$ac2->id.'';
                  }
                  @endphp
                <div class="col-12 col-sm-6 col-lg-2">
                    <div class="">
                        <!-- Title -->
                        <h4 class="widget-title"><a style="text-decoration:none;color:white;" href="{{$link}}">{{$ac2->category}}</a></h4>

                    </div>
                </div>
   				@endforeach
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
<div class="col-sm-12">
@php
$main_info = App\main_setting::first();
@endphp
<p style="color:white"><strong>{{$main_info->title}}</strong></p>
<p style="color:white"><strong>{{$main_info->address}}</strong></p>
<p style="color:white"><strong>{{$main_info->phone}}</strong></p>
<p style="color:white"><strong>{{$main_info->support_mail.','.$main_info->info_mail}}</strong></p>
<p style="color:white">&copy; সর্বস্বত্ব স্বত্বধিকার সংরক্ষিত {{date('Y')}}</p>
</div>
    
    </div>
    </div>
    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Copywrite -->
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Powered By দৈনিক স্বাস্থ্য
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{asset('js/main_site/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/main_site/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/main_site/bootstrap/bootstrap.min.js')}}"></script>
<!-- All Plugins js -->
<script src="{{asset('js/main_site/plugins/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/main_site/active.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).scroll(function(){if($(this).scrollTop()==$("#main_footer").offset().top ){$("#main_footer").fadeIn(500);}});
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5444207a5007ac5e"></script>
@section('add_js')
	
@show

</body>
</html>