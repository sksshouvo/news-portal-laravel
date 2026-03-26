@extends('dashboard/includes/main_app')
@section('custom_style')
    <style>

      .toggle.btn{
        width: 21%

      }
    </style>
@endsection
@section('general_body')
    <div class="col-sm-12 ">
        @include('dashboard.partials.errors') 
    @include('dashboard.partials.session')
        <h2>All User List</h2> <input type="button" value="Add New User" class="btn btn-primary btn-block" id="add_new_user" data-toggle="modal" data-target="#create_user_modal">
           <div class="active-overflow">
           <br>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th>Mobile</th>
                    <td>Action</td>
                </tr>
                @foreach ($users as $udata)
                <tr>
                    <td>{{$udata->name}}</td>
                    <td>{{$udata->email}}</td>
                
                    <td>{{$udata->mobile}}</td>
                    <td>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit_modal{{$udata->id}}" onclick="edit_udata({{$udata->id}})"><em class="fa fa-edit"></em></button>
                    </td>
                </tr>
                <!!--edit user modal--!!>
                <div class="modal fade" id="edit_modal{{$udata->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <span class="modal-title">Update User</span>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="users/{{$udata->id}}" method="POST" id="user_update">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="updated_by" name="updated_by" value="{{Auth::id()}}">
                                <input type="hidden" id="user_id" name="user_id" value="{{$udata->id}}" >

                              <label for="name">Name: </label>
                              <input type="text" id="name" name="name" class="form-control" value="{{$udata->name}}">
                             
                              <label for="email">Email: </label>
                              <input type="text" name="email" id="email" class="form-control" value="{{$udata->email}}">
                              
                              <label for="password">Password: </label>
                              <input type="text" id="password" name="password" class="form-control">
                             
                              <label for="mobile">Mobile: </label>
                              <input type="text" id="mobile" name="mobile" value="{{$udata->mobile}}" class="form-control">
                             
                              <label for="country">Country: </label>
                              <select name="country_id" id="country_{{$udata->id}}" class="form-control">


                              </select>
                             
                              <label for="designation">Designation: </label>
                            <select name="desg_id" id="designation_{{$udata->id}}" class="form-control">


                            </select>
                            
                             <label for="concern">Concern: </label> 
                             <select name="concern_id" id="concern_id_{{$udata->id}}" class="form-control">


                             </select>
                            
                            <div>
                              <br>
                              <label for="parmission">Permission: </label>
                              <select name="edit_permission" id="edit_permission" class="form-control">
                                <option value=""></option>
                                <option value="desg" <?=($udata->permission=="desg")?'selected':''?>>Designation Wise</option>
                                 <option value="menu" <?=($udata->permission=="menu")?'selected':''?>>Menu Wise</option> 
                              </select>
                            </div>
                             <div>
                              <label for="status">Status: </label>
                              <select name="status" id="status" class="form-control">
                                <option value=""></option>
                                <option value="0" <?=($udata->status==0)?'selected':''?>>Inactive</option>
                                <option value="1" <?=($udata->status==1)?'selected':''?>>Active</option>
                              </select>
                             


                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save changes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>   
                <!!--edit user modal--!!>
                @endforeach
                
            </table>
            {{$users->links()}}
           </div>
    </div>

          <!!--Create user modal--!!>
          <div class="modal fade" id="create_user_modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="modal-title">Create User</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="./users" method="POST" id="create_user">
                          @csrf
                          
                        
                        <label for="name">Name: </label>
                        <input type="text" id="name" name="name" class="form-control" >
                       
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email" class="form-control" >
                        
                        <label for="password">Password: </label>
                        <input type="text" id="password" name="password" class="form-control">
                       
                        <label for="mobile">Mobile: </label>
                        <input type="text" id="mobile" name="mobile" class="form-control">
                       
                        <label for="country">Country: </label>
                        <select name="country_id" id="country_id" class="form-control"></select>
                       
                        <label for="designation">Designation: </label>
                        <select name="desg_id" id="desg_id" class="form-control"></select>
                      
                       <label for="concern">Concern: </label> 
                       <select name="concern_id" id="concern_id" class="form-control"></select>
                      <br>
                       <label for="parmission">Permission: </label>
                       
                       <input type="checkbox" data-toggle="toggle" data-on="Designation Wise" data-off="Menu Wise" checked id="new_permission" name="new_permission">
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save_user" >Create User</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>   
                <!!--Designation Modal modal--!!>
@endsection
@section('add_js')
 <script>
$(".btn-info").click(function(){
$.ajax({
url:"https://restcountries.eu/rest/v2/all",
method:'get',
dataType:'json',
success:function(data){
var text = "";
$("#country").append("<option value=''></option> ");
$.each(data, function(index, value){
$("#country").append("<option value='"+data[index].numericCode+"'>"+data[index].name+"</option> ");

});

}

})
});
$("#add_new_user").click(function(){
	
$.ajax({
url:"https://restcountries.eu/rest/v2/all",
method:'get',
dataType:'json',
success:function(data){
var text = "";
$("#country_id").append("<option value=''></option> ");
$.each(data, function(index, value){
$("#country_id").append("<option value='"+data[index].numericCode+"'>"+data[index].name+"</option> ");

});

}

}),
$.ajax({
  url:"./ajax/concern",
  method:'get',
  dataType:'json',
  success:function(data){
  var text = "";
  $("#concern_id").append("<option value=''></option> ");
  $.each(data, function(index, value){
  $("#concern_id").append("<option value='"+data[index].id+"'>"+data[index].concern_name+"</option> ");
  
  });
  
  }
  
  }),

$.ajax({
  url:"./ajax/desg",
  method:'get',
  dataType:'json',
  success:function(data){
  var text = "";
  $("#desg_id").append("<option value=''></option> ");
  $.each(data, function(index, value){
  $("#desg_id").append("<option value='"+data[index].id+"'>"+data[index].designation+"</option> ");
  
  });
  
  }
  
  })
});
function edit_udata(user_id){
 
    $.ajax ({
      url:"./ajax/edit_user",
      method:'get',
      dataType:'json',
      data:{
        user_id:user_id
      },
      success:function(data){
     $.ajax({
      url:"./ajax/desg",
      method:'get',
      dataType:'json',
      success:function(data1){
        var text;
        text = "";
        text += "<option></option>";
        $.each(data1, function(key, val){
          if(data.desg_id==data1[key].id){
            
            text+='<option value="'+data1[key].id+'" selected>'+data1[key].designation+'</option>';     
          }else{
            text+='<option value="'+data1[key].id+'">'+data1[key].designation+'</option>';            
          }

        });
        $("#designation_"+user_id).html(text);
      }
     }),
     $.ajax({
url:"https://restcountries.eu/rest/v2/all",
method:'get',
dataType:'json',
success:function(data2){
var new_text = "";
$("#country_"+user_id).append("<option value=''></option> ");
$.each(data2, function(index, value){
  if(data.country_id==data2[index].numericCode){
    $("#country_"+user_id).append("<option value='"+data2[index].numericCode+"' selected>"+data2[index].name+"</option> ");
  }else{
    $("#country_"+user_id).append("<option value='"+data2[index].numericCode+"'>"+data2[index].name+"</option> "); 
  }
});
}

}),
$.ajax({
  url:"./ajax/concern",
  method:'get',
  dataType:'json',
  success:function(data3){
  var text2;
  text2="";
  text2 += "<option></option>";
  $.each(data3, function(index, value){
if(data.concern_id==data3[index].id){
  text2+="<option value='"+data3[index].id+"' selected>"+data3[index].concern_name+"</option>"
}else{
  text2+="<option value='"+data3[index].id+"'>"+data3[index].concern_name+"</option>"
}
  });
  $("#concern_id_"+user_id).html(text2);
}
  
})
}
})
}
</script>   

@endsection