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
    <h2>Set News For BREAKING news </h2> 
    <h3>(User Can Add only two lead news for breaking news scroll section)</h3>
    <div class="row">
    <div class="col-sm-12">
    <input type="button" value="Set As Breaking News" class="btn btn-primary btn-block" id="set_as_breaking_news" data-toggle="modal" data-target="#create_News">
    <br>
    <div class="new_table">
<table class="table table-responsive table-bordered">
  <tr>
    <th>News Title</th>
    
    <th>Set as</th>
  </tr>
  @forelse ($set_as_breaking_news as $sac)
  <tr>
      <td>{{$sac->post_title_bng }} ({{$sac->post_title_eng}})</td>
      <td>{{ucfirst(str_replace("_"," ",$sac->set_as))}}</td>
    </tr>    
  @empty
  <tr>
      <td colspan="3">No Data Found</td>
    </tr>     
  @endforelse
 
</table>
{{$set_as_breaking_news->links()}}
    </div>
    </div>           
    </div>
  
{{-- create News modal --}}

<div class="modal fade" id="create_News" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Set Lead News for Sub category page</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./set_as_breaking_news" method="POST" id="create_set_as_br_news" >
          @csrf
          @method('POST')
        
        <label for="breaking_news">Breaking News: </label>
       <select name="set_as" id="set_as" class="form-control">
        <option value=""></option>
        <option value="breaking_news_1">Breaking News 1</option>
        <option value="breaking_news_2">Breaking News 2</option>
       </select>
        <label >Select News: </label>
        <select name="news_id" id="news_id" class="form-control" required>
          <option value=""></option>
          
          @foreach ($all_news as $an)
            <option value="{{$an->id}}">{{$an->post_title_bng}}</option>
          @endforeach
          
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
@section('add_js')
<script>
$(document).ready(function(){
$("#sub_category_id").change(function(){
$.ajax({
url:'./ajax/get_news_under_sub_cat',
method:'get',
dataType:'json',
data:{
sub_category_id : $(this).val()
},
success:function(data){
var text = "";
text='<option> </option>';
$.each(data, function(key, val){
console.log(data[key].post_title_bng);
text+='<option value="'+data[key].news_id+'">'+data[key].post_title_bng+' ('+data[key].post_title_eng+')'+'</option>';
});
$("#news_id").html(text);
}
});
});
});
</script>
@endsection