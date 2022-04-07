@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
            <div class="col-12">
            <div class="box">
					<div class="box-header">						
						<h4 class="box-title">Edit Brand </h4>
					</div>
                    <div class="box-body">
                <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf				
                        <div class="form-group">
                            <h5>brand Name EN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="hidden" name="id" value="{{$brand->id}}">
                                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                                @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>brand Name HIN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_hin" class="form-control" value="{{$brand->brand_name_hin}}">
                                @error('brand_name_hin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Brand Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control" value="">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Update Brand</button>
                    </div>
                </form>
                </div>
            </div>
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

  <!-- /.content-wrapper -->

@endsection