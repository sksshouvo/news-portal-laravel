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
        <h2>All Social Site List</h2> <input type="button" value="Add New Social Site" class="btn btn-primary btn-block" id="add_new_social_site" data-toggle="modal" data-target="#create_social_site_modal">
           <div class="active-overflow">
               <br>
            <table class="table table-responsive table-bordered">
                <tr>
                    <th class="text-center">Site Name</th>
                    <th class="text-center">Site Center</th>
                    <th class="text-center">Site Icon</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
                @forelse ($social_media as $s)
                <tr>
                    <td class="text-center">{{$s->site_name}}</td>
                    <td class="text-center"><a href="{{$s->site_url}}" target="_blank" title="{{$s->site_url}}">Page Link</a></td>
                    <td class="text-center"><span><em class="fa {{$s->site_icon}}"></em></span></td>
                    <td class="text-center">{{$s->created_at->diffForHumans()}}</td>
                    <td class="text-center"><button type="button" data-toggle="modal" data-target="#social_site_edit_{{$s->id}}" class="btn btn-sm btn-primary"><em class="fa fa-edit"></em></button>
                     
                    </td>
                    <td class="text-center"> <form action="social_medias/{{$s->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button type="submit" onclick="confirm('Are Your Sure?')" class="btn btn-sm btn-danger"><em class="fa fa-trash"></em></button>
                    </form></td>
                </tr>
               
                <!!--edit social media modal--!!>
                <div class="modal fade" id="social_site_edit_{{$s->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <span class="modal-title">Edit Scial Sites</span>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="social_medias/{{$s->id}}" method="POST" >
                                @csrf
                                @method('PUT')
                                
                              
                              <label for="site_name">Site Name: </label>
                              <input type="text" id="site_name" name="site_name" class="form-control" value="{{$s->site_name}}" >
                             
                              <label for="site_url">Site Url</label>
                              <input type="text" id="site_url" name="site_url" class="form-control" value="{{$s->site_url}}">
                              <label for="site_icon">Site Icon</label>
                              <input type="text" name="site_icon" id="site_icon" class="form-control" value="{{$s->site_icon}}">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" id="update_social_media" >Update Social Media</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>   
                      <!!--edit social media modal--!!>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Data Fiund</td>
                    </tr>

                      @endforelse
                
            </table>
            {{$social_media->links()}}
           </div>
    </div>

          <!!--Create user modal--!!>
          <div class="modal fade" id="create_social_site_modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <span class="modal-title">Create Designation</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="social_medias" method="POST" id="create_social_sites">
                          @csrf
                        
                          <label for="site_name">Site Name: </label>
                          <input type="text" id="site_name" name="site_name" class="form-control" placeholder="facebook" >
                         
                          <label for="site_url">Site Url</label>
                          <input type="text" id="site_url" name="site_url" class="form-control" placeholder="http://example.com" >
                          <label for="site_icon">Site Icon</label>
                          <input type="text" name="site_icon" id="site_icon" class="form-control" placeholder="fa-example" >   
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="create_social_media" >Create Social Sites</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>   
                <!!--Designation Modal modal--!!>
@endsection
