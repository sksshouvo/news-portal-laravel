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

    </style>
@endsection
@section('general_body')
    <div class="col-sm-12 ">
    @include('dashboard.partials.errors') 
    @include('dashboard.partials.session')
    <h2>All Category List</h2> 
    <div class="row">
    <div class="col-sm-6">
    <input type="button" value="Add New Category" class="btn btn-primary btn-block" id="add_new_category" data-toggle="modal" data-target="#create_category">
    </div>
    <div class="col-sm-6">
    <input type="button" value="Add New Sub Category" class="btn btn-warning btn-block" id="add_new_sub_category" data-toggle="modal" data-target="#create_sub_category">
    </div>
    </div>
    <br>
    <div class="active-overflow">
    <div class="panel-group" id="accordion">
    @forelse ($categories as $key=>$cats)
    <div class="panel panel-{{{($cats->status==0)?'danger':'success'}}}">
    <div class="panel-heading">
    <h4 class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$key}}">{{$cats->category}} ({{$cats->category_eng}})</a>
    <a class="pull-right" data-toggle="modal" href="#edit_{{$key}}">Edit</a>
    </h4>
    </div>
    <div id="collapse_{{$key}}" class="panel-collapse collapse">
    <div class="panel-body">
    @php
    $sub_category = App\category::find($cats->id)->sub_categories;  
    @endphp
    @forelse ($sub_category as $new)
    <ul class="list-group">
    <li class="list-group-item list-group-item-{{{($new->status=='1')?'success':'danger'}}}">{{$new->sub_category}} ({{$new->sub_category_eng}})<a class="pull-right" href="#" data-toggle="modal" data-target="#edit_sub_category_{{$new->id}}">Edit</a></li>
    </ul>
                        
                        
{{-- edit sub category modal --}}

<div class="modal fade" id="edit_sub_category_{{$new->id}}" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<span class="modal-title">Edit Sub Category</span>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="./sub_categories/{{$new->id}}" method="POST" id="edit_sub_categories">
  @method('PUT')
  @csrf
<select name="category_id" id="category_id" class="form-control">
<option value=""></option>
@foreach ($categories as $catss)
<option value="{{$catss->id}}" {{{($catss->id==$new->category_id)?"selected":""}}}>{{$catss->category}}</option>
@endforeach
</select>
<br>
<label for="sub_category">Sub Category: </label>
<input type="text" id="sub_category" name="sub_category" class="form-control" required value="{{$new->sub_category}}">
<br>
<label for="sub_category_eng">Sub Category Eng: </label>
<input type="text" id="sub_category_eng" name="sub_category_eng" class="form-control" required value="{{$new->sub_category_eng}}">
<br>
<label for="sub_category_icon">Category icon</label>
<input type="text" name="sub_category_icon" id="sub_category_icon" class="form-control" value="{{$new->sub_category_icon}}">
<br>
<label for="sub_category_description">Sub Category Description: </label>
<textarea name="sub_category_description" id="sub_category_description" cols="30" rows="10" class="form-control">{{$new->sub_category_description}}</textarea>
<br>
<label for="status">Status</label>
<select name="status" id="status" class="form-control">
<option value=""></option>
<option value="1" {{{($new->status=="1")?'selected':''}}}>Active</option>
<option value="0" {{{($new->status=="0")?'selected':''}}}>Inactive</option>
</select>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="edit_sub_category" >Edit Sub Category</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>   


{{-- edit sub category modal --}}
 @empty
<ul class="list-group">
<li class="list-group-item text-center text-danger">No Data Found</li>
</ul>
@endforelse
</div>
</div>
</div>



{{-- edit category modal --}}

<div class="modal fade" id="edit_{{$key}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Create Category</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./categories/{{$cats->id}}" id="create_categories" method="POST">
            @csrf
            @method('PUT')
          
          <label for="category">Category: </label>
          <input type="text" id="category" name="category" class="form-control" required value="{{$cats->category}}">
          <br>
          <label for="category_eng">Category Eng: </label>
          <input type="text" id="category_eng" name="category_eng" value="{{$cats->category_eng}}" class="form-control">
          <br>
          <label for="category_icon">Category icon</label>
          <input type="text" name="category_icon" id="category_icon" class="form-control" value="{{$cats->category_icon}}">
          <br>
          <label for="category_description">Category Description: </label>
          <textarea name="category_description" id="category_description" cols="30" rows="5" class="form-control">{{$cats->category_description}}</textarea>
          <br>
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
            <option value=""></option>
            <option value="1" {{{($cats->status==1)?'selected':''}}}>Active</option>
            <option value="0" {{{($cats->status==0)?'selected':''}}}>Inactive</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="edit_category" name="edit_category" >Edit Category</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   
  
  
  {{-- edit category modal --}} 
  
  
              @empty
                  <div class="well text-center text-danger">
                      No data found
                  </div>
              @endforelse
             
            
            </div> 
            <nav aria-label="Page navigation example">
            {{$categories->links()}}
            </nav>
           </div>
           
    </div>
{{-- create category modal --}}

<div class="modal fade" id="create_category" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Create Category</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./categories" method="POST" id="create_categories">
          @csrf
          @method('POST')
        
        <label for="category">Category: </label>
        <input type="text" id="category" name="category" class="form-control" required>
        <br>
        <label for="category_eng">Category Eng: </label>
        <input type="text" name="category_eng" id="category_eng" class="form-control" required>
        <br>
        <label for="category_icon">Category icon</label>
        <input type="text" name="category_icon" id="category_icon" class="form-control">
        <br>
        <label for="category_description">Category Description: </label>
        <textarea name="category_description" id="category_description" cols="30" rows="5" class="form-control"></textarea>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_category" name="save_category" >Create Category</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>   


{{-- create category modal --}}

{{-- create sub category modal --}}

<div class="modal fade" id="create_sub_category" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Create Sub Category</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./sub_categories" method="POST" id="create_sub_categories">
            @method('POST')
            @csrf
            <select name="category_id" id="category_id" class="form-control">
              <option value=""></option>
              @foreach ($categories as $catss)
                  <option value="{{$catss->id}}">{{$catss->category}}</option>
              @endforeach
            </select>
          <br>
          <label for="sub_category">Sub Category: </label>
          <input type="text" id="sub_category" name="sub_category" class="form-control" required>
         
          <br>
          <label for="sub_category_eng">Sub Category Eng: </label>
          <input type="text" id="sub_category_eng" name="sub_category_eng" class="form-control" required>

          <br>
          <label for="sub_category_icon">Category icon</label>
          <input type="text" name="sub_category_icon" id="sub_category_icon" class="form-control">
          <br>
          <label for="sub_category_description">Sub Category Description: </label>
          <textarea name="sub_category_description" id="sub_category_description" cols="30" rows="5" class="form-control"></textarea>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="save_sub_category" >Sub Create Category</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   
  
  
 {{-- create sub category modal --}}
  
@endsection
