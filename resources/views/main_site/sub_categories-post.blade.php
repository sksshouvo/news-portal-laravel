@extends('main_site.includes.main_site')
@section('news_head')
@if ($sub_category_info->sub_category_description!="")
{!!$sub_category_info->sub_category_description!!}
@else
    <title>{!!$sub_category_info->sub_category!!} - Dainikshastha - দৈনিক স্বাস্থ্য</title>
@endif
@endsection
@section('add_extra_css')
<style>
        #pop_news{
        width:80%;
        height:auto;
        }
        #medical_life{
        height:50%;
        }
        #caption_new_section{
        display: none;
        }
        #sastho_seba_section{
            display: none;
        }
        .div{
            height: 526px;
            overflow:auto;
        }
        #last_news_details{
            display: none;
            height: 526px;
            overflow:auto;
        }
        #hide2{
          display: none;
        }
        </style>
@endsection

@section('body_section')
{{-- <div class="footer-add-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-add">
                    <a href="#"><img src="img/bg-img/footer-add.gif" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<br>
    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                     <!-- Single Post -->
                     @forelse ($f_news as $key=> $fn)
                     @php
                    $f_img = Storage::url($fn->image_path.$fn->image_name);
                     @endphp
                     <div class="col-12 col-sm-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                <a target="_blank" href="../news_details/{{$fn->post_url_bng}}"><img src="{{$f_img}}" alt="lead_image_{{$key}}"></a>
                                </div>
                                <div class="post-data">

                                    <a target="_blank" href="../news_details/{{$fn->post_url_bng}}" class="post-title">
                                    <h6>{{$fn->post_title_bng}}</h6>
                                    </a>
                                   
                                </div>
                            </div>
                        </div> 
                     @empty
                     <div class="col-12 col-sm-6"><h2>No News is been selected for category lead news</h2></div>
                     @endforelse
                    

                      
                    </div>
                        
                <div class="col-12 col-lg-12">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
@forelse ($full_news_info as $key=> $fni)
    
@php                             
$m_image = Storage::url($fni->image_path.$fni->image_name);
@endphp
<div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
        <a target="_blank" href="../news_details/{{$fni->post_url_bng}}"><img src="{{$m_image}}" alt="{{$key}}"></a>
        </div>
        <div class="post-data">
            <div class="post-meta">
            <a target="_blank" href="../news_details/{{$fni->post_url_bng}}" class="post-title">
                <h6>{{$fni->post_title_bng}}</h6>
                </a>
                
            </div>
        </div>
    </div>    
@empty
<div class="single-blog-post small-featured-post d-flex">
<h2>No Data Found</h2>
</div>
@endforelse
                               

                         
                        </div>

                        <!-- Popular News Widget -->
                      

                       

                        <!-- Latest Comments Widget -->
                   
                    </div>
                </div>
                    <nav aria-label="Page navigation example">
                        {{$full_news_info->links()}}
                    </nav>
                    <br>
                </div>

               <div class="col-12 col-md-5 col-lg-4">
                    <!-- Single Post -->
                    {{-- <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/ad1.png" alt=""></a>
                        </div>
                       
                    </div> --}}
                    
                    <div class="section-heading">
                        <h6>সর্বাধিক পঠিত</h6>
                       
                    </div>
                    <div class="div" style="overflow:auto;height:780px">
                    </div> 
                
               
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection
@section('add_js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5444207a5007ac5e"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "../ajax/popular_news",
            method: "get",
            dataType: "json",
            data: {
                section: "popular_news",
                limit: 100
            },
            success: function (data3) {
                if (data3 != "") {
                    var text2 = "";
                    $.each(data3, function (key, val) {
                        text2 += '<div class="single-blog-post small-featured-post d-flex">';
                        text2 += '<div class="post-thumb">';
                        text2 += '<a target="_blank"  href="../news_details/' + data3[key].pn_news.news.post_url_bng + '"><img src="' + data3[key].pn_news.img + '" alt="popular_news_' + key + '"></a>';
                        text2 += '</div>';
                        text2 += '<div class="post-data">';
                        text2 += '<a target="_blank"  href="../news_details/' + data3[key].pn_news.news.post_url_bng + '" class="post-title"><h6>' + data3[key].pn_news.news.post_title_bng + '</h6></a>';
                        text2 += '</div>';
                        text2 += '</div>';
                    });
                    $(".div").html(text2);

                }
            }
        });
    });
    $(document).ready(function(){$.ajax({url:"../ajax/get_all_tags",method: "get",datatype: "json",success: function(data, msg){var data_arr = data.map(function(val){return val.tags;});$( "#search" ).autocomplete({source: data_arr});}})});
</script>
@endsection