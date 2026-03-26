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
        <h2>All concern List</h2> <input type="button" value="Add New Concern" class="btn btn-primary btn-block" id="add_new_concern" data-toggle="modal" data-target="#create_concern_modal">
           <div class="active-overflow">
               <br>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th class="text-center">Concenr Name</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Action</th>
                </tr>
                @forelse ($concern as $c)
                <tr>
                    <td class="text-center">{{$c->concern_name}}</td>
                    <td class="text-center">{{$c->created_at->diffForHumans()}}</td>
                    <td class="text-center"><button type="button" data-toggle="modal" data-target="#concernedit_{{$c->id}}" class="btn btn-sm btn-primary"><em class="fa fa-edit"></em></button></td>
                </tr>
               
                <!!--edit concern modal--!!>
                <div class="modal fade" id="concernedit_{{$c->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <span class="modal-title">Edit concern</span>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="concern/{{$c->id}}" method="POST" >
                                @csrf
                                @method('PUT')
                                
                              
                              <label for="name">Concern: </label>
                              <input type="text" id="concern_name" name="concern_name" class="form-control" value="{{$c->concern_name}}" >
                             
                              
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" id="update_concern" >Update concern</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>   
                      <!!--edit concern modal--!!>
                @empty
                    <tr>
                        <td colspan="3" class="text-center"><h3 class="text-danger">No Data Found</h3></td>
                    </tr>

                      @endforelse
                
            </table>
            {{$concern->links()}}
           </div>
    </div>

          <!!--Create user modal--!!>
          <div class="modal fade" id="create_concern_modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="modal-title">Create concern</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="concern" method="POST" id="create_concern">
                          @csrf
                          
                        
                        <label for="name">Concern: </label>
                        <input type="text" id="concern_name" name="concern_name" class="form-control" >
                       
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save_user" >Create Concern</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>   
                <!!--concern Modal modal--!!>
@endsection
