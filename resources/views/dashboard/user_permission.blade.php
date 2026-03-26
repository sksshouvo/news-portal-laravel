@extends('dashboard/includes/main_app')
@section('custom_style')
    <style>
   
    </style>
@endsection
@section('general_body')
    <div class="col-sm-12 ">
    @include('dashboard.partials.errors') 
    @include('dashboard.partials.session')
        <h2>User Permission Menu Wise</h2> 
        <div class="row">
         <div class="col-sm-12">
           <input type="button" name="add_new_user_permission" id="add_new_user_permission" class="btn btn-primary btn-block" value="Add new user permission" data-toggle="modal" data-target="#new_user_permission">
         </div>
        <br>
        <div class="col-sm-12">
          <br>
          <table class="table table-responsive table-bordered" style="overflow: auto">
            <tr>
              <th>User Name</th>
              <th>Main Menu Name</th>
              <th>Sub Menu Name</th>
              <th>Created At</th>
              <th style="text-align:center">Action</th>
            </tr>
          @forelse ($user_permission as $item)
          @php
          $user_info = App\user::where('id', '=',$item->user_id)->first();
          $menu_name = App\menu::where('id', '=', $item->main_menu_id)->first();
          if($item->sub_menu_id!=""){
          $sub_menu_name = App\sub_menu::where([['id', '=', $item->sub_menu_id], ['main_menu_id', '=',$item->main_menu_id ]])->first();
          }
          
          @endphp
                <tr>
                  <td>{{$user_info->name}}</td>
                  <td>{{$menu_name->menu_name}}</td>
                  <td>{{{($item->sub_menu_id>0)?$sub_menu_name->sub_menu_name:"Null"}}}</td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  
                  <td style="text-align: center">
  
                      <form action='user_permissions/{{$item->id}}' method="POST" onclick="return confirm('Are you sure you want to delete this item?')">
                          @csrf 
                          @method('delete')
                          <button type="submit" class="btn btn-danger">
                              <span class="fa fa-trash"></span>
                          </button>
                      </form>
                  </td>
                </tr>
                      
        @empty
      
        <tr>

          <td colspan="5"><br>
            <div class="well"><h4 class="text-center text-danger">No Data Found</h4></div>  </td>
        </tr>
          
        
        
        @endforelse
      </table>
      {{$user_permission->links()}}
    </div>
        
        
        </div>
        
 {{-- create new uper permission--}}
 <div class="modal fade" id="new_user_permission" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Create User</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="user_permissions" id="create_permission">
            @csrf
            
          
          <label for="name">User id: </label>
          <select name="user_id" id="user_id" class="form-control" required>
            <option value=""></option>
            @php
                $all_user = App\user::where('permission', 'menu')->get();
            @endphp
            @forelse ($all_user as $udata)
                <option value="{{$udata->id}}">{{$udata->name}}</option>
            @empty
                <option value="">No data found</option>
            @endforelse
          </select>
        <br>
        <label for="main_menu_id">Main Menu: </label>
        
        <select name="main_menu_id" id="main_menu_id" class="form-control" required>
          <option value=""></option>
          @php
          $all_menu = App\menu::all();
          @endphp
          @forelse ($all_menu as $mdata)
              <option value="{{$mdata->id}}">{{$mdata->menu_name}}</option>
          @empty
              <option value="">No data Found</option>
          @endforelse
          
        </select>
        <br>
        <label for="sub_menu_id">Sub Menus: </label>
          <select name="sub_menu_id[]" id="sub_menu_id" class="form-control" multiple></select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="save_user" >Create User</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>   

{{-- create new uper permission--}}

@endsection
@section('add_js')
 <script>
$(document).ready(function(){
$("#main_menu_id").change(function(){
$.ajax({
  url:'./ajax/get_sub_menu',
  method:'GET',
  dataType:'json',
  data:{
    main_menu_id: $("#main_menu_id").val()
  },
  success:function(data, msg){
    var options = "";
    
    $.each(data, function(key, val){
    options+= "<option value='"+data[key].id+"'>"+data[key].sub_menu_name+"</option>";

    });
    $("#sub_menu_id").html(options);
  }
})
})
});
 </script>   

@endsection