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
						<h4 class="box-title">SubCategory List</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
                                        <th>Category</th>
										<th>SubCategory EN</th>
										<th>SubCategory HIN</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($subcategorys as $item)
									<tr>
                                    <td>{{$item->category_id}}</td>
										<td>{{$item->subcategory_name_en}}</td>
										<td>{{$item->subcategory_name_hin}}</td>
										<td width="30%">
                                         <a href="{{route('SubCategory.edit',$item->id)}}" class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                         <a href="{{route('SubCategory.delete',$item->id)}}" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
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
						<h4 class="box-title">Add SubCategory </h4>
					</div>
                    <div class="box-body">
                <form action="{{route('SubCategory.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
								<h5>Select Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select id="select" name="category_id" required class="form-control">
                                     <option value="" selected>Select Category</option>
                                    @foreach($categorys as $item)
									 <option value="{{$item->id}}">{{$item->category_name_en}} </option>
                                    @endforeach
									</select>
                                    @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
								</div>
						</div>				
                        <div class="form-group">
                            <h5>SubCategory Name EN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_en" class="form-control" value="">
                                @error('subcategory_name_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>category Name HIN <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_hin" class="form-control" value="">
                                @error('subcategory_name_hin')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Add subcategory</button>
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