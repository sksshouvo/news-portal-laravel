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
                        <label for="details">বিস্তারিত: </label>
                        <textarea name="post_content_bng" id="summernote" rows="20" class="form-control" placeholder="বিস্তারিত" >{{$edit_news->post_content_bng}}</textarea>        
                        
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
<label for="post_status">Status: AA</label>
<select name="post_status" id="post_status" class="form-control">
<option value="0">Draft</option>
<option value="1">Publish</option>
</select>
<br>
<label for="category_id">Category: </label>
@php
$for_categories = App\postCategoryNSubcategory::where('news_id', '=', $edit_news->id)->select('category_id')->groupBy('category_id')->first();
@endphp
<select name="category_id" id="category_id" class="form-control">
    <option value=""></option>
    @php
    $categories = App\category::all();
    @endphp
    @forelse ($categories as $item)
    <option value="{{$item->id}}" {{{($for_categories->category_id==$item->id)?"selected":""}}}>{{$item->category}}</option>
    @empty
    <option value="">No Data Found</option>
    @endforelse
        
    
</select>
<div id="sub_category_id" >
<br>
<label for="sub_category_id">Sub categories</label>
<select name="sub_categories_id[]" id="sub_categories_id" class="form-control" multiple>
    @php
    $sub_categories = App\sub_category::where('category_id', $for_categories->category_id)->get();
    @endphp
    @forelse ($sub_categories as $key => $sc)
    @php
    $for_sub_categories = App\postCategoryNSubcategory::where('sub_category_id','=',$sc->id)->select('sub_category_id')->groupBy('sub_category_id')->first();
    @endphp

    <option value="{{$sc->id}}" {{{($for_sub_categories['sub_category_id']==$sc->id)?'selected="selected"':''}}}>{{$sc->sub_category}}</option>
    @empty
    <option value="">No Data Found</option>
    @endforelse
        
</select>
</div>
<br>
<label for="f_image">Feature Image: </label>
<input type="file" name="f_image" id="f_image" class="from-control" onchange="readURL(this)" >
<br>
<div class="new_image">
    @php
    $f_images = App\f_image::where('post_id','=',$edit_news->id)->select('image_name', 'image_path')->first();
    $url =   Storage::url($f_images->image_path.$f_images->image_name);
    @endphp
    <img id="little_image" alt="My Image" class="img-responsive" src="{{$url}}" accept=".png, .jpg, .jpeg" />
</div>

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
    $.ajax({
        url:"../ajax/get_sub_category",
        method:"get",
        dataType:"json",
        data:{
            category_id:$(this).val()
        },
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
  });

</script>
@endsection
