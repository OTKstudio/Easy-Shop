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
						<h4 class="box-title">Edit category </h4>
					</div>
                    <div class="box-body">
                <form action="{{route('Category.update',$category->id)}}" method="POST">
                    @csrf				
                        <div class="form-group">
                            <h5>category Name EN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <input type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
                                @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>category Name HIN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_hin" class="form-control" value="{{$category->category_name_hin}}">
                                @error('category_name_hin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>category Icon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" class="form-control" value="{{$category->category_icon}}">
                                @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Update category</button>
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