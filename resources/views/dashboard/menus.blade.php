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
        <h2>All Menu List</h2> 
        <div class="row">
          <div class="col-sm-6">
              <input type="button" value="Add New Menu" class="btn btn-primary btn-block" id="add_new_menu" data-toggle="modal" data-target="#create_menu">
          </div>
          <div class="col-sm-6">
              <input type="button" value="Add New Sub Menu" class="btn btn-warning btn-block" id="add_new_sub_menu" data-toggle="modal" data-target="#create_sub_menu">
          </div>
        </div>
        <br>
           <div class="active-overflow">
            <div class="panel-group" id="accordion">
              @forelse ($menus as $key=>$mns)
              <div class="panel panel-{{{($mns->status==0)?'danger':'success'}}}">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$key}}">{{$mns->menu_name}}</a>
                      <a class="pull-right" data-toggle="modal" href="#edit_{{$key}}">Edit</a>
                    </h4>
                  </div>
                  <div id="collapse_{{$key}}" class="panel-collapse collapse">
                    <div class="panel-body">
                      @php
                      $sub_menu = App\menu::find($mns->id)->sub_menu;  
                      @endphp
                        @forelse ($sub_menu as $new)
                        <ul class="list-group">
                          <li class="list-group-item list-group-item-{{{($new->status=='1')?'success':'danger'}}}">{{$new->sub_menu_name}} <a class="pull-right" href="#" data-toggle="modal" data-target="#edit_sub_menu_{{$new->id}}">Edit</a></li>
                        </ul>
                        
                        
{{-- edit sub menu modal --}}

<div class="modal fade" id="edit_sub_menu_{{$new->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Edit Sub menus</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./sub_menus/{{$new->id}}" method="POST" id="edit_sub_menus">
          @method('PUT')
          @csrf
          <select name="main_menu_id" id="main_menu_id" class="form-control">
            <option value=""></option>
            @foreach ($menus as $mnss)
                <option value="{{$mnss->id}}" {{{($mnss->id==$new->main_menu_id)?"selected":""}}}>{{$mnss->menu_name}}</option>
            @endforeach
          </select>
        <br>
        <label for="sub_menu_name">Sub menus: </label>
        <input type="text" id="sub_menu_name" name="sub_menu_name" class="form-control" required value="{{$new->sub_menu_name}}">
        <br>
        <label for="sub_menu_url">Sub menu Url</label>
        <input type="text" name="sub_menu_url" id="sub_menu_url" class="form-control" value="{{$new->sub_menu_url}}">
        <br>
        <label for="sub_menu_icon">Sub menu icon</label>
        <input type="text" name="sub_menu_icon" id="sub_menu_icon" class="form-control" value="{{$new->icon}}">
        <br>
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
          <option value=""></option>
          <option value="1" {{{($new->status=="1")?'selected':''}}}>Active</option>
          <option value="0" {{{($new->status=="0")?'selected':''}}}>Inactive</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="edit_sub_menu" >Edit Sub menus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>   


{{-- edit sub menus modal --}}
                        
                        @empty
                        <ul class="list-group">
                          <li class="list-group-item text-center text-danger">No Data Found</li>
                        </ul>
                        @endforelse
                      
                    </div>
                  </div>
                </div>



{{-- edit menu modal --}}

<div class="modal fade" id="edit_{{$key}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Edit Menu</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./menus/{{$mns->id}}" id="edit_menus" method="POST">
            @csrf
            @method('PUT')
          
          <label for="menus">Menu Name: </label>
          <input type="text" id="menu_name" name="menu_name" class="form-control" required value="{{$mns->menu_name}}">
          <br>
          <label for="menu_url">Menu Url</label>
          <input type="text" name="menu_url" id="menu_url" class="form-control" value="{{$mns->menu_url}}">
          <br>
          <label for="icon">Icon: </label>
          <input name="icon" id="icon"  class="form-control" value="{{$mns->icon}}" />
          <br>
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
            <option value=""></option>
            <option value="1" {{{($mns->status==1)?'selected':''}}}>Active</option>
            <option value="0" {{{($mns->status==0)?'selected':''}}}>Inactive</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="edit_menus" name="edit_menus" >Edit Menu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   
  
  
  {{-- edit menu modal --}} 
  
  
              @empty
                  <div class="well text-center text-danger">
                      No data found
                  </div>
              @endforelse
             
            
            </div> 
            {{$menus->links()}}
           </div>
           
    </div>
{{-- create menus modal --}}

<div class="modal fade" id="create_menu" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Create menus</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./menus" method="POST" id="create_menus">
          @csrf
          @method('POST')
        
        <label for="menus">Menus: </label>
        <input type="text" id="menu_name" name="menu_name" class="form-control" required>
       <br>
       <label for="menu_url">Menu Url</label>
       <input type="text" name="menu_url" id="menu_url" class="form-control">
        <br>
        <label for="menus_icon">Menus icon</label>
        <input type="text" name="icon" id="icon" class="form-control">
       
       
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save_menus" name="save_menus" >Create menus</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>   


{{-- create menus modal --}}

{{-- create sub menus modal --}}

<div class="modal fade" id="create_sub_menu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Create Sub menus</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./sub_menus" method="POST" id="create_sub_menus">
            @method('POST')
            @csrf
            <select name="main_menu_id" id="main_menu_id" class="form-control">
              <option value=""></option>
              @foreach ($menus as $mnss)
                  <option value="{{$mnss->id}}">{{$mnss->menu_name}}</option>
              @endforeach
            </select>
          <br>
          <label for="sub_menu">Sub menus: </label>
          <input type="text" id="sub_menu_name" name="sub_menu_name" class="form-control" required>
          <br>
          <label for="sub_menu_url">Sub menu url: </label>
          <input type="text" id="sub_menu_url" name="sub_menu_url" class="form-control" required>
          <br>
          <label for="sub_menu_icon">menus icon</label>
          <input type="text" name="sub_menu_icon" id="sub_menu_icon" class="form-control">
         
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="save_sub_menu" >Create Sub menus</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   
  
  
 {{-- create sub menus modal --}}
  
@endsection
