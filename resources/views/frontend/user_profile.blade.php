@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="col-md-2">
		 <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($user->profile_photo_path))?
         url('upload/admin_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" style="border-radius:50%" height="100%" width="100%">

         <ul class="list-group-flush">
             <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
             <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
             <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
             <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
         </ul>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-center"><span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Update your profile</h1>
            </div>
            <div class="card-body">
                <form class="register-form outer-top-xs" role="form" action="{{route('user.profile_store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">All Name </label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" id="exampleInputtext1" >
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address </label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" id="exampleInputEmail1" >
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Password </label>
                        <input type="password" class="form-control" name="password" value="{{$user->password}}" id="exampleInputPassword1" >
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>File Input Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="file" name="profile_photo_path" class="form-control" id="image"> <div class="help-block"></div></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <img id="showImage" src="{{ (!empty($user->profile_photo_path))?
                        url('upload/admin_image/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 75px;height:75px">
                        </div>
                    </div> <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upadate profile</button>
                    </div><br>
                    </form>  
         </div>
        </div>
    </div>
</div><br>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']); 
        });
    }); 
</script>
@endsection