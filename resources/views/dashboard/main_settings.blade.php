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
        <h2>Main Settings</h2>
    </div>
    <div class="col-sm-12">
@foreach ($main_settings as $ms)
    

      <form action="main_settings/{{$ms->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="email">Title:</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$ms->title}}" required>
        </div>
        <div class="form-group">
          <label for="pwd">Description (SEO Friendly): </label>
          <textarea name="description" id="description" class="form-control">{{$ms->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="address">Address (SEO Friendly): </label>
          <input type="text" class="form-control" id="address" name="address" value="{{$ms->address}}">
        </div>
        <div class="form-group">
          <label for="address">Header For SEO: </label>
          <textarea name="header_for_seo" id="header_for_seo" cols="30" rows="10" class="form-control">{{$ms->header_for_seo}}</textarea>
        </div>
        <div class="form-group">
          <label for="phone">Phone : </label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{$ms->phone}}">
        </div>
        <div class="form-group">
            <label for="email">Keywords (SEO Friendly): </label>
            <input type="text" class="form-control" id="keywords" name="keywords" value="{{$ms->keywords}}">
          </div>
          <div class="form-group">
            <label for="email">Support Email : </label>
            <input type="email" class="form-control" id="support_mail" name="support_mail" value="{{$ms->support_mail}}" required>
          </div>
          <div class="form-group">
            <label for="email">Info Email : </label>
            <input type="email" class="form-control" id="info_mail" name="info_mail" value="{{$ms->info_mail}}" required>
          </div>
        
          <div class="form-group">
            <label for="text">Email Driver : </label>
            <input type="text" class="form-control" id="mail_driver" name="mail_driver" value="{{$ms->mail_driver}}" required>
          </div>
          <div class="form-group">
            <label for="text">Email Host : </label>
            <input type="text" class="form-control" id="mail_host" name="mail_host" value="{{$ms->mail_host}}" required>
          </div>
          <div class="form-group">
            <label for="text">Email Port : </label>
            <input type="text" class="form-control" id="mail_port" name="mail_port" value="{{$ms->mail_port}}" required>
          </div>
          <div class="form-group">
            <label for="text">Email Username : </label>
            <input type="text" class="form-control" id="mail_username" name="mail_username" value="{{$ms->mail_username}}" required>
          </div>
          <div class="form-group">
            <label for="text">Email Password : </label>
            <input type="text" class="form-control" id="mail_password" name="mail_password" value="{{$ms->mail_password}}" required>
          </div>
          <div class="form-group">
            <label for="text">Email Encryption : </label>
            <input type="text" class="form-control" id="mail_encryption" name="mail_encryption" value="{{$ms->mail_encryption}}" required>
          </div>
          <div class="form-group">
            <label for="text">Logo (SIZE: 261 &#215; 49): </label>
            <input type="file" name="logo" id="logo">
          </div>
          <div class="row">

              <div class="col-sm-12">
                  @php
                    $url =   Storage::url('app/public/logo.png');
                  @endphp
                  <div class="row">

                      <div class="col-sm-4" style="background-color: #EE002D;">
      @if ($url!="")
      <img src="{{$url}}" alt="" class="img-responsive">
      @endif
                   
                      </div>
                  </div>
                
      
                </div>
          </div>
          <br>
        <button type="submit" class="btn btn-primary">Update</button>
      </form> 
      @endforeach
    </div>
@endsection
