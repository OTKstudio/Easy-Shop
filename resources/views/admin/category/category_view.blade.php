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
						<h4 class="box-title">category List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>category EN</th>
										<th>category HIN</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($categorys as $item)
									<tr>
										<td>{{$item->category_name_en}}</td>
										<td>{{$item->category_name_hin}}</td>
										<td><span><i class="{{$item->category_icon}}"></i></span></td>
										<td width="30%">
                                         <a href="{{route('Category.edit',$item->id)}}" class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                         <a href="{{route('Category.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
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
						<h4 class="box-title">Add category </h4>
					</div>
                    <div class="box-body">
                <form action="{{route('Category.store')}}" method="POST">
                    @csrf				
                        <div class="form-group">
                            <h5>category Name EN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_en" class="form-control" value="">
                                @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>category Name HIN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_hin" class="form-control" value="">
                                @error('category_name_hin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>category Icon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" class="form-control" value="">
                                @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Add category</button>
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