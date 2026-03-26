@extends('dashboard/includes/main_app')
@section('custom_style')
<style>
        .toggle.btn{
        width: 21%
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
        <h2>Edit News</h2>
    </div>
<form action="../edit_news/{{$edit_news->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    
<div class="col-sm-8">
        <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#bang">বাংলা</a></li>
                <li><a data-toggle="tab" href="#eng">English</a></li>
        </ul>
        <div class="tab-content">
                <div id="bang" class="tab-pane fade in active">
                        <label for="title">শিরোনাম: </label>
                        <input type="text" id="post_title_bng" name="post_title_bng" class="form-control" placeholder="শিরোনাম" value="{{$edit_news->post_title_bng}}" >
                        <br>
                        <label for="">লিংক: </label>
                        <input type="text" id="post_url_bng" name="post_url_bng" class="form-control" placeholder="লিংক" value="{{{($edit_news->post_url_bng!='')?$edit_news->post_url_bng:uniqid()}}}" >
                        
                        <br>
                        <label for="sub_title_bng">উপ শিরোনাম</label>
                        <input type="text" name="sub_title_bng" id="sub_title_bng" value="{{$edit_news->sub_title_bng}}" class="form-control">
                        <br>
                        <label for="sub_title_bng_position">উপশিরোনাম পজিশন</label>
                        <select name="sub_title_bng_position" id="sub_title_bng_position" class="form-control">
                        <option value=""></option>
                        <option value="top_of_title_bng" {{{($edit_news->sub_title_bng_position=="top_of_title_bng")?"selected":""}}}>টাইটেলের উপরে</option>
                        <option value="bottom_of_title_bng" {{{($edit_news->sub_title_bng_position=="bottom_of_title_bng")?"selected":""}}}>টাইটেলের নিচে</option>
                        </select>
                        <br>
                        <input type="button" id="slug" value="Slug" class="btn btn-primary btn-sm">
                        <br>
                        <br>
                        <label for="news_by">প্রকাশক</label>
                        <input type="text" name="news_by" id="news_by" value="{{$edit_news->news_by}}" class="form-control">
                        <br>
                        <br>
                        <label for="details">বিস্তারিত: </label>
                        <textarea name="post_content_bng" id="summernote" rows="20" class="form-control" placeholder="বিস্তারিত" >{{$edit_news->post_content_bng}}</textarea>        
                        <br>
                        <textarea placeholder="Meta Description in Bangla" name="meta_description_bng" id="meta_description_bng" rows="5" class="form-control">{{$edit_news->meta_description_bng}}</textarea>
                        <br>
                        <input type="number" name="limit_description_bng" id="limit_description_bng" class="form-control" placeholder="Limit for meta description in Bangla" value="{{$edit_news->limit_description_bng}}">
                </div>
                <div id="eng" class="tab-pane fade">
                        <label for="title">Title: </label>
                        <input type="text" id="post_title_eng" name="post_title_eng" class="form-control" placeholder="Title" value="{{$edit_news->post_title_eng}}">
                        <br>
                        <label for="">Link: </label>
                        <input type="text" id="post_url_eng" name="post_url_eng" class="form-control" placeholder="Link" value="{{{($edit_news->post_url_eng!='')?$edit_news->post_url_eng:uniqid()}}}" >
                        <br>
                        <label for="details">Description: </label>
                        <textarea name="post_content_eng" id="summernote2" rows="20" class="form-control" placeholder="Description" >{{$edit_news->post_content_eng}}</textarea>        
                        <br>
                        <textarea placeholder="Meta Description in English" name="meta_description_eng" id="meta_description_eng" rows="5" class="form-control">{{$edit_news->meta_description_eng}}</textarea>
                        <br>
                        <input type="number" name="limit_description_eng" id="limit_description_eng" class="form-control" placeholder="Limit for meta description in English">
                </div>
               
              </div>              
</div>
<div class="col-sm-4">
<label for="post_type">Post Type: </label>
<select name="post_type" id="post_type" class="form-control" >
<option value=""></option>
<option value="1" {{{($edit_news->post_type==1)?"selected":""}}}>Content</option>
<option value="2" {{{($edit_news->post_type==2)?"selected":""}}}>Image</option>
<option value="3" {{{($edit_news->post_type==3)?"selected":""}}}>Video</option>
</select>
<br>
@php
    $tags = App\tag::where('post_id','=',$edit_news->id)->get();
    foreach($tags as $new_tags){
        $l_tags[]= $new_tags->tags;
    }

    $go =  implode(',', $l_tags);
@endphp

<label for="tags">Tags: </label>
<br>
<input type="text" name="tags" id="tags" data-role="tagsinput" class="form-control" value="{{$go}}">
<br>
<label for="post_status">Status: </label>
<select name="post_status" id="post_status" class="form-control">

<option value="0" {{{($edit_news->post_status==0)?'selected':''}}}>Draft</option>
<option value="1" {{{($edit_news->post_status==1)?'selected':''}}}>Publish</option>
</select>
<br>
<label for="set_as">Set As </label>
<select name="set_as" id="set_as" class="form-control">
    <option value=""></option>
    @if (isset( $set_as->set_as) && $set_as->set_as!="")
    <option value="lead_news_1" {{{($set_as->set_as=="lead_news_1")?'selected':""}}}>Lead News 1</option>
    <option value="lead_news_2" {{{($set_as->set_as=="lead_news_2")?'selected':""}}}>Lead News 2</option>
    <option value="lead_news_3" {{{($set_as->set_as=="lead_news_3")?'selected':""}}}>Lead News 3</option>
    <option value="caption_news_1" {{{($set_as->set_as=="caption_news_1")?'selected':""}}}>Caption news 1</option>
    <option value="caption_news_2" {{{($set_as->set_as=="caption_news_2")?'selected':""}}}>Caption news 2</option>
    <option value="caption_news_3" {{{($set_as->set_as=="caption_news_3")?'selected':""}}}>Caption news 3</option>
    <option value="s_lead_news_1" {{{($set_as->set_as=="s_lead_news_1")?'selected':""}}}>স্বাস্থ্যসেবা Lead News 1</option>
    <option value="s_lead_news_2" {{{($set_as->set_as=="s_lead_news_2")?'selected':""}}}>স্বাস্থ্যসেবা Lead News 2</option>
    <option value="t_lead_news_1" {{{($set_as->set_as=="t_lead_news_1")?'selected':""}}}>চিকিৎসা শিক্ষা Lead News 1</option>
    <option value="m_lead_news_1" {{{($set_as->set_as=="m_lead_news_1")?'selected':""}}}>ওষুধ প্রযুক্তি Lead News 1</option>
    <option value="image_gallery" {{{($set_as->set_as=="image_gallery")?'selected':""}}}>Image Gallery</option>
    <option value="video_gallery" {{{($set_as->set_as=="video_gallery")?'selected':""}}}>Video Gallery</option>
    <option value="international_1" {{{($set_as->set_as=="international_1")?'selected':""}}}>International 1</option>
    <option value="f_n_m_1" {{{($set_as->set_as=="f_n_m_1")?'selected':""}}}>খাদ্য ও পুষ্টি 1</option>
    <option value="etc_1" {{{($set_as->set_as=="etc_1")?'selected':""}}}>বিবিধ 1</option>
    <option value="ml_1" {{{($set_as->set_as=="ml_1")?'selected':""}}}>মেডিকেল লাইফ 1</option>
    <option value="ml_2" {{{($set_as->set_as=="ml_2")?'selected':""}}}>মেডিকেল লাইফ 2</option>
   <option value="hm_1" {{{($set_as->set_as=="hm_1")?'selected':""}}}>স্বাস্থ্য মন্ত্রণালয় 1</option>
    
    @else
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
    @endif
        
    
   
</select>
<br>
<label for="breaking_news">Set Breaking News</label>
<select name="set_as_breaking_news" id="set_as_breaking_news" class="form-control">
<option value=""></option>
@if (isset($set_as_br_n) && $set_as_br_n!="")
<option value="breaking_news_1" {{{($set_as_br_n->set_as=="breaking_news_1")?'selected':''}}}>Breaking News 1</option>
<option value="breaking_news_2" {{{($set_as_br_n->set_as=="breaking_news_2")?'selected':''}}}>Breaking News 2</option>    
@else
<option value="breaking_news_1">Breaking News 1</option>
<option value="breaking_news_2">Breaking News 2</option>
@endif

</select>
<br>
<label for="category_id">Category: </label>

<select name="category_id[]" id="category_id" class="form-control" multiple>
    <option value=""></option>
    @php
    $for_categories = App\postCategoryNSubcategory::where('news_category_n_sub_categories.news_id', '=', $edit_news->id)
    ->select('categories.category', 'news_category_n_sub_categories.category_id')
    ->join('categories', 'categories.id', 'news_category_n_sub_categories.category_id')
    ->groupBy('news_category_n_sub_categories.category_id')
    ->get();
    @endphp
    @forelse ($for_categories as $fc)
    @php
    $not[] = $fc->category_id;
    @endphp
        <option value="{{$fc->category_id}}" selected >{{$fc->category}}</option>
    @empty
        
    @endforelse
    @php
    $categories = App\category::whereNotIn('id', $not)->get();
    @endphp
    @forelse ($categories as $item)
    <option value="{{$item->id}}">{{$item->category}}</option>
    @empty
    <option value="">No Data Found</option>
    @endforelse
        
    
</select>
<div id="sub_category_id" >
<br>
<label for="sub_category_id">Sub categories</label>
<select name="sub_categories_id[]" id="sub_categories_id" class="form-control" multiple>
    @php
    $notscc[]="";
    $for_sub_categories = App\postCategoryNSubcategory::where('news_category_n_sub_categories.news_id','=',$edit_news->id)
    ->join('sub_categories', 'sub_categories.id', 'news_category_n_sub_categories.sub_category_id')
    ->select('news_category_n_sub_categories.sub_category_id', 'sub_categories.sub_category')
    ->groupBy('news_category_n_sub_categories.sub_category_id')
    ->get();
    @endphp
@foreach ($for_sub_categories as $fsc)
@php
    $notscc[] = $fsc->sub_category_id; 
@endphp
    <option value="{{$fsc->sub_category_id}}" selected>{{$fsc->sub_category}}</option>
@endforeach
    @php
    if($notscc!=""){
        $sub_categories = App\sub_category::whereNotIn('id', $notscc)->whereIn('category_id', $not)->get();
    }else{
        $sub_categories = App\sub_category::whereIn('category_id', $not)->get();
    }
    
    @endphp
    @foreach ($sub_categories as $key => $sc)
    <option value="{{$sc->id}}" >{{$sc->sub_category}}</option>
    @endforeach
        
</select>
</div>
<br>
<label for="f_image">Feature Image: (Width:600px, height:400px)</label>
<input type="file" name="f_image" id="f_image" class="from-control" onchange="readURL(this)" >
<br>
<div class="new_image">
    @php
    $f_images = App\f_image::where('post_id','=',$edit_news->id)->select('image_name', 'image_path', 'image_caption')->first();
    $url =   Storage::url($f_images->image_path.$f_images->image_name);
    @endphp
    <img id="little_image" alt="My Image" class="img-responsive" src="{{$url}}" accept=".png, .jpg, .jpeg" />
</div>
<br>
<input type="text" name="image_caption" id="image_caption" placeholder="Image caption here" value="{{$f_images->image_caption}}" class="form-control">
<br>
<input type="submit" id="update" name="update" value="Update" class="btn btn-block btn-success"> 
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
        var catss = $("#category_id").serializeArray();
    $.ajax({
        url:"../ajax/get_sub_category",
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
        height: 319
    });
    $("#slug").click(function(){

        if($("#post_title_bng").val()!=""){
        
        $.ajax({
         url:'../ajax/make_slug',
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
