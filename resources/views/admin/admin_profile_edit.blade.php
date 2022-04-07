@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Main content -->
    <div class="container-full">
    <section class="content">
  <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Admin Edit Profile</h4>
        <h6 class="box-subtitle">Admin <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form action="{{route('admin.profile_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-12">						
                    <div class="form-group">
                        <h5>Admin Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            </div>
                            <input type="text" name="name" class="form-control" value="{{$editdata->name}}"> <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <h5>Admin Email<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="email" name="email" class="form-control" value="{{$editdata->email}}"> <div class="help-block"></div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>Admin Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="password" class="form-control" value="{{$editdata->email}}"> <div class="help-block"></div></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <h5>Admin New Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password2" data-validation-match-match="password" class="form-control" required=""> <div class="help-block"></div></div>
                    </div>
                        </div>
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
                        <img id="showImage" src="{{ (!empty($admindata->profile_photo_path))?
                        url('upload/admin_image/'.$admindata->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 75px;height:75px">
                        </div>
                    </div>              
                </div>
                <div class="text-xs-right">
                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                </div>
            </form>

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
    </div>

    <!-- /.content -->
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