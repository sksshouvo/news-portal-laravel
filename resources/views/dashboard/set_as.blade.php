@extends('dashboard/includes/main_app')
@php
use Illuminate\Support\Str;
@endphp
@section('custom_style')
    <style>
      .panel-title{
        padding-top: 1%;
        font-weight: 700;
      }
      .panel-title a{
  color: white;
  text-decoration: none;
  
}
#first{
  display: none;
}
#second{
display: none;
}
#third{
  display: none;
}
.new_table{
  overflow: auto;
}
    </style>
@endsection
@section('general_body')
    <div class="col-sm-12 ">
    @include('dashboard.partials.errors') 
    @include('dashboard.partials.session')
    <h2>All News List</h2> 
    <div class="row">
    <div class="col-sm-12">
    <input type="button" value="Add New Set As" class="btn btn-primary btn-block" id="add_new_set_as" data-toggle="modal" data-target="#create_News">
    <br>
    <div class="new_table">
<table class="table table-responsive table-bordered">
  <tr>
    <th>News Title</th>
    <th>Set As</th>
  </tr>
  @forelse ($set_as as $sa)
@php
$news_title = App\news_table::find($sa->news_id);
@endphp
  <tr>
      <td>{{$news_title->post_title_bng }} ({{$news_title->post_title_eng}})</td>
      <td>{{ucfirst(str_replace("_"," ",$sa->set_as))}}</td>
    </tr>    
  @empty
  <tr>
      <td colspan="2">No Data Found</td>
    </tr>     
  @endforelse
 
</table>
{{$set_as->links()}}
    </div>
    </div>           
    </div>
  
{{-- create News modal --}}

<div class="modal fade" id="create_News" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Create News</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./set_as" method="POST" id="create_set_as" enctype="multipart/form-data">
          @csrf
          @method('POST')
        
        <label >Select News: </label>
        <select name="news_id" id="news_id" class="form-control" required>
          <option value=""></option>
          @php
              $all_news = App\news_table::all();
              
          @endphp
          @foreach ($all_news as $an)
          @php
          $category_name = DB::table('news_category_n_sub_categories')
          ->join('categories', 'categories.id', '=', 'news_category_n_sub_categories.category_id')
          ->where('news_category_n_sub_categories.news_id', '=', $an->id)
          ->select('categories.category')
          ->first();  
          @endphp
          
              <option value="{{$an->id}}">{{$an->post_title_bng}} ({{$an->post_title_eng}}) - Category Name: {{$category_name->category}}</option>
          @endforeach
        </select>
        <br>
        <label for="ad_section">Set As: </label>
        <select name="set_as" id="set_as" class="form-control" required>
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
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_news" name="save_news" >Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>   


{{-- create News modal --}}

@endsection