@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Brand List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Brand EN</th>
										<th>Brand HIN</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($brands as $item)
									<tr>
										<td>{{$item->brand_name_en}}</td>
										<td>{{$item->brand_name_hin}}</td>
										<td><img src="{{url('upload/brand/'.$item->brand_image)}}" style="width: 70px;height: 40px;"></td>
										<td>
                                         <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info" >Edit</a>
                                         <a href="{{route('brand.delete',$item->id)}}" class="btn btn-danger" >Delete</a>
                                        </td>
									</tr>
                                    @endforeach
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
            <div class="col-4">
            <div class="box">
					<div class="box-header">						
						<h4 class="box-title">Add Brand </h4>
					</div>
                    <div class="box-body">
                <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf				
                        <div class="form-group">
                            <h5>brand Name EN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_en" class="form-control" value="">
                                @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>brand Name HIN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_hin" class="form-control" value="">
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
                        <button type="submit" class="btn btn-rounded btn-info">Edit Brand</button>
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