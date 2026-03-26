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
        <h2>All Designation List</h2> <input type="button" value="Add New Designation" class="btn btn-primary btn-block" id="add_new_designation" data-toggle="modal" data-target="#create_designation_modal">
           <div class="active-overflow">
               <br>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th class="text-center">Designation</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Action</th>
                </tr>
                @forelse ($designation as $d)
                <tr>
                    <td class="text-center">{{$d->designation}}</td>
                    <td class="text-center">{{$d->created_at->diffForHumans()}}</td>
                    <td class="text-center"><button type="button" data-toggle="modal" data-target="#designationedit_{{$d->id}}" class="btn btn-sm btn-primary"><em class="fa fa-edit"></em></button></td>
                </tr>
               
                <!!--edit designation modal--!!>
                <div class="modal fade" id="designationedit_{{$d->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <span class="modal-title">Edit Designation</span>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="designation/{{$d->id}}" method="POST" >
                                @csrf
                                @method('PUT')
                                
                              
                              <label for="name">Designation: </label>
                              <input type="text" id="designation" name="designation" class="form-control" value="{{$d->designation}}" >
                             
                              
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" id="update_designation" >Update Designation</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>   
                      <!!--edit designation modal--!!>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No Data Fiund</td>
                    </tr>

                      @endforelse
                
            </table>
            {{$designation->links()}}
           </div>
    </div>

          <!!--Create user modal--!!>
          <div class="modal fade" id="create_designation_modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="modal-title">Create Designation</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="designation" method="POST" id="create_designation">
                          @csrf
                          
                        
                        <label for="name">Designation: </label>
                        <input type="text" id="designation" name="designation" class="form-control" >
                       
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save_user" >Create Designation</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>   
                <!!--Designation Modal modal--!!>
@endsection
