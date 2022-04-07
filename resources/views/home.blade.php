@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="col-md-2">
		 <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($admindata->profile_photo_path))?
         url('upload/admin_images/'.$admindata->profile_photo_path):url('upload/no_image.jpg') }}" style="border-radius:50%" height="100%" width="100%">

         <ul class="list-group-flush">
             <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
             <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
             <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
             <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
         </ul>
        </div>
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <div class="card">
                <h1 class="text-center"><span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Welcome to Easy Shop</h1>
            </div>
        </div>
    </div>
</div><br>
@endsection