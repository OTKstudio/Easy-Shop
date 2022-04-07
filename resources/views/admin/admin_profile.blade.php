@extends('admin.admin_master')
@section('admin')
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <!-- {{ asset('') }} -->
		<!-- {{ Auth::guard('admin')->user()->name }} -->
				  <div class="box box-widget widget-user">
                      <div class="d d-flex justify-content-between">
                      <h4 class="  m-lg-3">  Admin name : {{$admindata->name}}</h4>
                      <a href="{{route('admin.profile_edit')}}" style="float: right !important;width:75px" class="btn btn-primary mb-5 float-end">Edit</a> 
                      </div>
                  <h4 class="widget-user-desc m-lg-3">  Admin email : {{$admindata->email}}</h4>
					  <div class="box-body text-center pb-50">
						<a href="#"> 
						  <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($admindata->profile_photo_path))?
                        url('upload/admin_images/'.$admindata->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
						</a>
					  </div>

					  <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
						<li>
						  <span class="opacity-60">Followers</span><br>
						  <span class="font-size-20">8.6K</span>
						</li>
						<li>
						  <span class="opacity-60">Following</span><br>
						  <span class="font-size-20">8457</span>
						</li>
						<li>
						  <span class="opacity-60">Tweets</span><br>
						  <span class="font-size-20">2154</span>
						</li>
					  </ul>
					</div>				


				</div>

        </div>
    </section>
    <!-- /.content -->

@endsection