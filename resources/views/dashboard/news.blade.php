@extends('dashboard/includes/main_app')
@section('custom_style')
    <style>
        .toggle.btn{
        width: 21%
    }
.new_image{
    display: none;
}
    </style>
@endsection
@section('add_css_src')
<link rel="stylesheet" href="{{asset('css/dashboard/bootstrap-tagsinput.css')}}">
{{--  include summernote css/js  --}}
<link rel="stylesheet" href="{{asset('css/dashboard/summernote-lite.css')}}">
@endsection
@section('general_body')
    <div class="col-sm-12 ">
    @include('dashboard.partials.errors') 
    @include('dashboard.partials.session')
        <h2>Create News</h2>
    </div>
    @php
        if(isset($_POST['post_title_bng']) && $_POST['post_title_bng']!=""){
            $post_title_bangla = $_POST['post_title_bng'];
        }else{
            $post_title_bangla = "";
        }
        if(isset($_POST['post_content_bng']) && $_POST['post_content_bng']!=""){
            $post_cn_bangla = $_POST['post_content_bng'];
        }else{
            $post_cn_bangla = "";
        }
        if(isset($_POST['meta_description_bng']) && $_POST['meta_description_bng']!=""){
            $meta_description_bng = $_POST['meta_description_bng'];
        }else{
            $meta_description_bng = "";
        }
        if(isset($_POST['meta_description_eng']) && $_POST['meta_description_eng']!=""){
            $meta_description_eng = $_POST['meta_description_eng'];
        }else{
            $meta_description_eng = "";
        }
        if(isset($_POST['post_title_eng']) && $_POST['post_title_eng']!=""){
            $post_title_english = $_POST['post_title_eng'];
        }else{
            $post_title_english = "";
        }
        if(isset($_POST['post_content_eng']) && $_POST['post_content_eng']!=""){
            $post_cn_english = $_POST['post_content_eng'];
        }else{
            $post_cn_english = "";
        }
        if(isset($_POST['sub_title_bng']) && $_POST['sub_title_bng']!=""){
            $sub_title_bng = $_POST['sub_title_bng'];
        }else{
            $sub_title_bng = "";
        }
        if(isset($_POST['sub_title_eng']) && $_POST['sub_title_eng']!=""){
            $sub_title_eng = $_POST['sub_title_eng'];
        }else{
            $sub_title_eng = "";
        }
    @endphp
    <form action="./news" method="POST" enctype="multipart/form-data">
@csrf
@method('POST')
    
<div class="col-sm-8">
        <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#bang">বাংলা</a></li>
                <li><a data-toggle="tab" href="#eng">English</a></li>
        </ul>
        <div class="tab-content">
                <div id="bang" class="tab-pane fade in active">
                        <label for="title">শিরোনাম: </label>
                <input type="text" id="post_title_bng" name="post_title_bng"  class="form-control" placeholder="শিরোনাম" value="{{$post_title_bangla}}" >
                        <br>
                        <label for="sub_title_bng">উপ শিরোনাম</label>
                        <input type="text" name="sub_title_bng" id="sub_title_bng" value="{{$sub_title_bng}}" class="form-control">
                        <br>
                        <label for="sub_title_bng_position">উপশিরোনাম পজিশন</label>
                        <select name="sub_title_bng_position" id="sub_title_bng_position" class="form-control">
                        <option value=""></option>
                        <option value="top_of_title_bng">টাইটেলের উপরে</option>
                        <option value="bottom_of_title_eng">টাইটেলের নিচে</option>
                        </select>
                        <br>
                        <label for="">লিংক: </label>
                        <input type="text" id="post_url_bng" name="post_url_bng" class="form-control" placeholder="লিংক" value="{{uniqid()}}" >
                        <br>
                        <input class="btn btn-sm btn-primary" type="button" value="Slug" id="slug">
                        <br>
                        <br>
                        <label for="news_by">প্রকাশক</label>
                        <input type="text" name="news_by" id="news_by" placeholder="News By" value="{{{(isset($_POST['news_by'])?$_POST['news_by']:"")}}}" class="form-control">
                        <br>
                        <label for="details">বিস্তারিত: </label>
                <textarea name="post_content_bng" id="summernote" rows="20" class="form-control" placeholder="বিস্তারিত" >{{$post_cn_bangla}}</textarea>        
                <br>
                <textarea name="meta_description_bng" id="meta_description_bng" class="form-control" rows="10" placeholder="Meta Description In Bangla">{{$meta_description_bng}}</textarea>     
                <br>
                <input type="number" name="limit_description_bng" id="limit_description_bng" class="form-control" placeholder="Limit for meta description in Bangla">
                </div>
                <div id="eng" class="tab-pane fade">
                        <label for="title">Title: </label>
                        <input type="text" id="post_title_eng" name="post_title_eng" class="form-control" placeholder="Title" value="">
                        <br>
                        <label for="sub_title_bng">Sub Title: </label>
                        <input type="text" name="sub_title_eng" id="sub_title_eng" value="{{$sub_title_eng}}" class="form-control">
                        <br>
                        <label for="sub_title_bng_position">Sub Title Position: </label>
                        <select name="sub_title_eng_position" id="sub_title_eng_position" class="form-control">
                        <option value=""></option>
                        <option value="top_of_title_eng">Top of Title</option>
                        <option value="top_of_title_eng">Bottom of Title</option>
                        </select>
                        <label for="">Link: </label>
                        <input type="text" id="post_url_eng" name="post_url_eng" class="form-control" placeholder="Link" value="{{uniqid()}}" >
                        <br>
                        <label for="details">Description: </label>
                        <textarea name="post_content_eng" id="summernote2" rows="20" class="form-control" placeholder="Description" ></textarea>        
                        <br>
                        <textarea name="meta_description_eng" id="meta_description_eng" class="form-control" rows="10" placeholder="Meta Description In English">{{$meta_description_eng}}</textarea>     
                        <br>
                        <input type="number" name="limit_description_eng" id="limit_description_eng" class="form-control" placeholder="Limit for meta description in English">
                </div>
               
              </div>              
</div>
<div class="col-sm-4">
<label for="post_type">Post Type: </label>
<select name="post_type" id="post_type" class="form-control" >
<option value=""></option>
<option value="1">Content</option>
<option value="2">Image</option>
<option value="3">Video</option>
</select>
<br>
<label for="tags">Tags: </label>
<br>
<input type="text" name="tags" id="tags" data-role="tagsinput" class="form-control">
<br>
<label for="post_status">Status: </label>
<select name="post_status" id="post_status" class="form-control">
<option value="0">Draft</option>
<option value="1">Publish</option>
</select>
<br>
<label for="set_as">Set As</label>
<select name="set_as" id="set_as" class="form-control">
    <option value=""></option>
    <option value="lead_news_1">Lead News 1</option>
    <option value="lead_news_2">Lead News 2</option>
    <option value="lead_news_3">Lead News 3</option>
    <option value="caption_news_1">Caption news 1</option>
    <option value="caption_news_2">Caption news 2</option>
    <option value="caption_news_3">Caption news 3</option>
    <option value="s_lead_news_1">স্বাস্থ্যসেবা Lead News 1</option>
    <option value="s_lead_news_2">স্বাস্থ্যসেবা Lead News 2</option>
    <option value="t_lead_news_1">চিকিৎসা শিক্ষা Lead News 1</option>
    <option value="m_lead_news_1">ওষুধ প্রযুক্তি Lead News 1</option>
    <option value="image_gallery">Image Gallery</option>
    <option value="video_gallery">Video Gallery</option>
    <option value="international_1">International 1</option>
    <option value="f_n_m_1">খাদ্য ও পুষ্টি 1</option>
    <option value="etc_1">বিবিধ 1</option>
    <option value="ml_1">মেডিকেল লাইফ 1</option>
    <option value="ml_2">মেডিকেল লাইফ 2</option>
   <option value="hm_1">স্বাস্থ্য মন্ত্রণালয় 1</option>

</select>
<br>
<label for="breaking_news">Set Breaking News</label>
<select name="set_as_breaking_news" id="set_as_breaking_news" class="form-control">
<option value=""></option>
<option value="breaking_news_1">Breaking News 1</option>
<option value="breaking_news_2">Breaking News 2</option>
</select>
<br>
<label for="category_id">Category: </label>
<select name="category_id[]" id="category_id" class="form-control" multiple>
    <option value=""></option>
    @php
        $categories = App\category::all();
    @endphp
    @forelse ($categories as $item)
    <option value="{{$item->id}}">{{$item->category}}</option>
    @empty
    <option value="">No Data Found</option>
    @endforelse
        
    
</select>
<div id="sub_category_id" style="display: none">
<br>
<label for="sub_category_id">Sub categories</label>
<select name="sub_categories_id[]" id="sub_categories_id" class="form-control" multiple>

</select>
</div>
<br>
<label for="f_image">Feature Image: (Width:600px, height:400px)</label>
<input type="file" name="f_image" id="f_image" class="from-control" onchange="readURL(this)" >
<br>
<div class="new_image">
    <img id="little_image" alt="My Image" class="img-responsive" accept=".png, .jpg, .jpeg"  />
</div>
<br>
<input type="text" name="image_caption" id="image_caption" class="form-control" placeholder="Imgae Caption Here">
<br>
<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-block btn-success"> 

</form> 
<form action="">
<br>
<input type="submit" id="reset" name="reset" value="Reset" class="btn btn-block btn-danger">
<br>
</form>
</div>   
@endsection
@section('add_src')
<script src="{{asset('js/dashboard/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('js/dashboard/summernote-lite.min.js')}}"></script>
@endsection
@section('add_js')
<script>
$(document).ready(function(){
    $("#category_id").change(function(){
        var catss = $('#category_id').serializeArray();
    $.ajax({
        url:"./ajax/get_sub_category",
        method:"get",
        dataType:"json",
        data:catss,
        success:function(data){
        if(data!=""){
        $("#sub_category_id").show();
        
        var all_sc = "";
        $.each(data, function(key, val){
        all_sc+="<option value="+data[key].id+">"+data[key].sub_category+"</option>";
        });
        $("#sub_categories_id").html(all_sc);
        
        }else{
        $("#sub_categories_id").html("");
        }
        }

    })
    });
});
function readURL(data) {
    if (data.files && data.files[0]) {
        
        var reader = new FileReader();
        reader.onload = function (e) {
        $(".new_image").show();
        $('#little_image').attr('src', e.target.result);
        console.log($('#little_image').width());
        };

        reader.readAsDataURL(data.files[0]);
    }
}

$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'বিস্তারিত',
        tabsize: 2,
        height: 319
          
    });
    $('#summernote2').summernote({
        placeholder: 'Description',
        tabsize: 2,
        height: 319,
        
    });

$("#slug").click(function(){

if($("#post_title_bng").val()!=""){

$.ajax({
 url:'./ajax/make_slug',
 method:'get',
 dataType:'json',
 data:{
 url_value:$("#post_title_bng").val()
 },
 success:function(data, msg){
 $("#post_url_bng").val(data);
 }
 });
 }
 });

});
</script>
@endsection
