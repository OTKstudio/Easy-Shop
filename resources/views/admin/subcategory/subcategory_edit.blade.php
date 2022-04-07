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
						<h4 class="box-title">Edit subcategory </h4>
					</div>
                    <div class="box-body">
                <form action="{{route('SubCategory.update',$subcategory->id)}}" method="POST">
                    @csrf	
                       <div class="form-group">
								<h5>Select Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select id="select" name="category_id" required class="form-control">
                                     <option value="" selected="" >Select Category</option>
                                    @foreach($category as $item)
									 <option value="{{$item->id}}" {{$item->id == $subcategory->category_id?'selected': ''}}>{{$item->category_name_en}} </option>
                                    @endforeach
									</select>
                                    @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
								</div>
						</div>				
                        <div class="form-group">
                            <h5>category Name EN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="hidden" name="id" value="{{$subcategory->id}}">
                                <input type="text" name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}">
                                @error('subcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>category Name HIN <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="subcategory_name_hin" class="form-control" value="{{$subcategory->subcategory_name_hin}}">
                                @error('subcategory_name_hin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Update subcategory</button>
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