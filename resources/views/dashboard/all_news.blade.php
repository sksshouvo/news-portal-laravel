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
    <h2>All News List</h2> 
    <div class="row">
    <div class="col-sm-12">
    <a href="./news" target="_blank" class="btn btn-primary btn-block" id="add_news" >Add New Post</a>
    </div>
    </div>
    <br>
    <div style="overflow: auto">
        <table class="table table-bordered table-hovered">
            <tr>
                <th>Post Title</th>
                <th>Created At</th>
                <th>Created By</th>
               
                <th>Status</th>
                <th>Edit</th>
            </tr>
        @forelse ($news_move as $item)
            <tr>
                <td>{{$item->post_title_bng}} ({{$item->post_title_eng}})</td>
                <td>{{$item->created_at}}</td>
                @php
                $user_name = App\news_table::find($item->id)->new_user;
                @endphp
                <td>{{$user_name->name}}</td>
               
                <td>
                @if ($item->post_status==0)
                    <p class="text-danger">Draft</p>
                @else
                    <p class="text-success">Published</p>
                @endif
            </td>
            <td>
                <a href="./update_news/{{$item->id}}" target="_blank" title="Edit News" class="btn btn-primary"><span class="fa fa-edit"></span></a>
               </td>
            </tr>
        @empty
        <tr>
            <td colspan="4"> <p class="text-danger text-center">No Data Found</p> </td>
        </tr>
        @endforelse
    
        </table>

    </div>

    {{$news_move->links()}}
    </div>
    @endsection
@section('add_js')
<script>
{{--  function set_as(id){
$.ajax({
url:"./ajax/set_as",
method: "get",
dataType: "json",
data:{
"news_id": id,
"set_as_id": $('#set_as').val()
},
success:function(data){
if(data==1){
    alert("News is updated")
   // location.reload()
}
}
})
}  --}}
</script>
@endsection