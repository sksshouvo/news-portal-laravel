@extends('dashboard/includes/main_app')
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
    </style>
@endsection
@section('general_body')
    <div class="col-sm-12 ">
    @include('dashboard.partials.errors') 
    @include('dashboard.partials.session')
    <h2>All Ads List</h2> 
    <div class="row">
    <div class="col-sm-12">
    <input type="button" value="Add New Ads" class="btn btn-primary btn-block" id="add_new_ads" data-toggle="modal" data-target="#create_ads">
    </div>
    
    </div>
    <br>
    <div class="active-overflow">
    <div class="panel-group" id="accordion">
    @forelse ($ads as $key=>$cats)
    <div class="panel panel-{{{($cats->status==0)?'danger':'success'}}}">
    <div class="panel-heading">
    <h4 class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$key}}">{{$cats->Ads}}</a>
    <a class="pull-right" data-toggle="modal" href="#edit_{{$key}}">Edit</a>
    </h4>
    </div>
    <div id="collapse_{{$key}}" class="panel-collapse collapse">
    <div class="panel-body">
    @php
    $sub_Ads = App\Ads::find($cats->id)->sub_ads;  
    @endphp
    @forelse ($sub_Ads as $new)
    <ul class="list-group">
    <li class="list-group-item list-group-item-{{{($new->status=='1')?'success':'danger'}}}">{{$new->sub_Ads}} <a class="pull-right" href="#" data-toggle="modal" data-target="#edit_sub_Ads_{{$new->id}}">Edit</a></li>
    </ul>
                        
                        
{{-- edit sub Ads modal --}}

<div class="modal fade" id="edit_sub_Ads_{{$new->id}}" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<span class="modal-title">Edit Sub Ads</span>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="./sub_ads/{{$new->id}}" method="POST" id="edit_sub_ads">
  @method('PUT')
  @csrf
<select name="Ads_id" id="Ads_id" class="form-control">
<option value=""></option>
@foreach ($ads as $catss)
<option value="{{$catss->id}}" {{{($catss->id==$new->Ads_id)?"selected":""}}}>{{$catss->Ads}}</option>
@endforeach
</select>
<br>
<label for="sub_Ads">Sub Ads: </label>
<input type="text" id="sub_Ads" name="sub_Ads" class="form-control" required value="{{$new->sub_Ads}}">
<br>
<label for="sub_Ads_icon">Ads icon</label>
<input type="text" name="sub_Ads_icon" id="sub_Ads_icon" class="form-control" value="{{$new->sub_Ads_icon}}">
<br>
<label for="sub_Ads_description">Sub Ads Description: </label>
<textarea name="sub_Ads_description" id="sub_Ads_description" cols="30" rows="10" class="form-control">{{$new->sub_Ads_description}}</textarea>
<br>
<label for="status">Status</label>
<select name="status" id="status" class="form-control">
<option value=""></option>
<option value="1" {{{($new->status=="1")?'selected':''}}}>Active</option>
<option value="0" {{{($new->status=="0")?'selected':''}}}>Inactive</option>
</select>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="edit_sub_Ads" >Edit Sub Ads</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>   


{{-- edit sub Ads modal --}}
 @empty
<ul class="list-group">
<li class="list-group-item text-center text-danger">No Data Found</li>
</ul>
@endforelse
</div>
</div>
</div>



{{-- edit Ads modal --}}

<div class="modal fade" id="edit_{{$key}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Create Ads</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./ads/{{$cats->id}}" id="create_ads" method="POST">
            @csrf
            @method('PUT')
          
          <label for="Ads">Ads: </label>
          <input type="text" id="Ads" name="Ads" class="form-control" required value="{{$cats->Ads}}">
          <br>
          <label for="Ads_icon">Ads icon</label>
          <input type="text" name="Ads_icon" id="Ads_icon" class="form-control" value="{{$cats->Ads_icon}}">
          <br>
          <label for="Ads_description">Ads Description: </label>
          <textarea name="Ads_description" id="Ads_description" cols="30" rows="10" class="form-control">{{$cats->Ads_description}}</textarea>
          <br>
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
            <option value=""></option>
            <option value="1" {{{($cats->status==1)?'selected':''}}}>Active</option>
            <option value="0" {{{($cats->status==0)?'selected':''}}}>Inactive</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="edit_Ads" name="edit_Ads" >Edit Ads</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   
  
  
  {{-- edit Ads modal --}} 
  
  
              @empty
                  <div class="well text-center text-danger">
                      No data found
                  </div>
              @endforelse
             
            
            </div> 
            {{$ads->links()}}
           </div>
           
    </div>
    
{{-- create Ads modal --}}

<div class="modal fade" id="create_ads" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Create Ads</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./ads" method="POST" id="create_ads" enctype="multipart/form-data">
          @csrf
          @method('POST')
        
        <label for="ad_title">Ad title: </label>
        <input type="text" id="ad_title" name="ad_title" class="form-control" required>
        <br>
        <label for="ad_section">Ad section: </label>
        <select name="ad_section" id="ad_section" class="form-control" required>
          <option value=""></option>
          <option value="1">News details ad</option>
          <option value="2">Category ad</option>
          <option value="3">Create assign convention landing page</option>
        </select>
        <br>
        <label for="ad_switch">Ads Switch: </label>
       <select name="ad_switch" id="ad_switch" class="form-control" required>

        <option value=""></option>
        <option value="1">Script</option>
        <option value="2">Image</option>
       </select>
        <br>
<div id="first">
<label for="ad_link">Paste Link Here: </label>
<input type="text" id="ad_link" name="ad_link" class="form-control">
<label for="ad_code">Paste Code here: </label>
<textarea name="ad_code" id="ad_code" class="form-control"></textarea>
</div>
<div id="second">
<label for="ad_path">Ad Path: </label>
<input type="file" name="ad_path" id="ad_path" >
</div>
<label for="ad_size_type">Ad size type: </label>
<select name="ad_size_type" id="ad_size_type" class="form-control" required>
<option value=""></option>
<option value="responsive">Responsive</option>
<option value="custom">Custom</option>
</select>
<br>
<div id="third">
  
<label for="ad_size">Ad Size: </label>
<input type="text" name="ad_size" id="ad_size" class="form-control" placeholder="Example:300 &#215; 400 ">
  
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_Ads" name="save_Ads" >Create Ads</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>   


{{-- create Ads modal --}}

@endsection
@section('add_js')
    <script>
      $(document).ready(function(){
        $('#ad_switch').change(function(){
        if($('#ad_switch').val()==1){
          $('#first').show();
          $('#second').hide();
        }else if($('#ad_switch').val()==2){
          $('#first').hide();
          $('#second').show();
        }else{
          $('#first').hide();
          $('#second').hide();
        }
        });
        $("#ad_size_type").change(function(){
        if($("#ad_size_type").val()=='custom'){
          $("#third").show();
        }else{
          $("#third").hide();
        }
        })
      })
    </script>
@endsection