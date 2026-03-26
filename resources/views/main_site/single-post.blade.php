@extends('main_site.includes.main_site')
@section('add_extra_css')
<meta property="og:title" content="{{$full_news_info->post_title_bng}}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://dainikshastha.com/news_deatils/{{$full_news_info->post_url_bng}}" />
<meta property="og:image" content="http://dainikshastha.com{{$images}}" />
<style>
    .breadcrumb {

        background-color: #EE002D;

    }

    a,
    a:hover,
    a:focus {

        color: white;
    }

    .breadcrumb-item.active {
        color: white;
    }
</style>
@endsection
@section('news_head')
<title>{{$full_news_info->post_title_bng}} || দৈনিক স্বাস্থ্য</title>
@php
foreach($all_tages as $at){
$alt[] =  $at->tags;
}
@endphp
<meta name="keywords" content="{{implode(',',$alt)}}">
@endsection
@section('body_section')
<!-- ##### Hero Area Start ##### -->
{{-- <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                   <div class="footer-add">
                       @php
                       $ads1 = Storage::url('app/public/img/bg-img/footer-add.gif');
                       @endphp
                        <a href="#"><img src="{{$ads1}}" alt=""></a>
</div>
</div>

<!-- Hero Add -->

</div>
</div>
</div> --}}
<!-- ##### Hero Area End ##### -->
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a
                    href="../news_categories/{{$full_news_info->category_id}}">{{$full_news_info->category}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$full_news_info->post_title_bng}}</li>
        </ol>
    </nav>
</div>

<div class="blog-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area">

                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">

                        <div class="post-data">
                            @if ($full_news_info->sub_title_bng_position=="top_of_title_bng")
                               <h4>{{$full_news_info->sub_title_bng}}</h4> 
                            @endif
                            <a href="#" class="post-title">
                                <h6>{{$full_news_info->post_title_bng}}</h6>
                            </a>
                            @if ($full_news_info->sub_title_bng_position=="bottom_of_title_bng")
                            <h4>{{$full_news_info->sub_title_bng}}</h4> 
                         @endif
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <h5>{{$full_news_info->news_by}}</h5>

                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row" style="float:right">
                                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="post-thumb">
                                <a href="#"><img src="{{$images}}" alt="" style="width: 100%"></a>
                                <p>Image Caption: {{$img_caption}}</p>
                            </div>


                            <div class="post-meta">
                                {!!$full_news_info->post_content_bng!!}
                                <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                    <!-- Tags -->
                                    <div class="newspaper-tags d-flex">
                                        <span>Tags:</span>
                                        @foreach ($all_tages as $at)
                                        <ul class="d-flex">
                                            <li><a target="_blank" href="../news_tags/{{$at->tags}}">{{$at->tags}}</a></li>
                                        </ul>
                                        @endforeach

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="hero-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-12">
                    <div class="row">
                       <div class="footer-add">
                            <a href="#"><img src="{{$ads1}}" alt=""></a>
                </div>
            </div>

        </div>

        <!-- Hero Add -->

    </div>
</div>
</div> --}}
</div>
</div>

<div class="col-12 col-lg-4">
    <div class="blog-sidebar-area">
        {{-- <div class="single-blog-post style-2">
            <div class="col-sm-12">
                <div class="row">
                    <a href="#"><img src="{{$ads111}}" alt="ad1"></a>
                </div>
            </div>

            <br>
            <div class="col-sm-12">
                <div class="row">
                    <a href="#"><img src="{{$ads11}}" alt="ad2"></a>
                </div>
            </div>
            <br>

        </div> --}}
        <br>
        <br>
        <div class="section-heading">
            <h6>সর্বাধিক পঠিত</h6>

        </div>
        <!-- Latest Posts Widget -->
        <div class="latest-posts-widget mb-50" style="overflow:auto;height:400px">
            <div class="div"></div>
        </div>
</div>
</div>
</div>
</div>
</div>
<!-- ##### Blog Area Start ##### -->
@endsection
@section('add_js')

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
                        text2 += '<a target="_blank"  href="./' + data3[key].pn_news.news.post_url_bng + '"><img src="' + data3[key].pn_news.img + '" alt="popular_news_' + key + '"></a>';
                        text2 += '</div>';
                        text2 += '<div class="post-data">';
                        text2 += '<a target="_blank"  href="./' + data3[key].pn_news.news.post_url_bng + '" class="post-title"><h6>' + data3[key].pn_news.news.post_title_bng + '</h6></a>';
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