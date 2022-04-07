<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 35px;">
             <h1>User Login</h1><hr><br>
             <form action="{{ route('user.check') }}" method="POST">
                 @if(session('fail'))
                   <div class="alert alert-danger">
                      {{ Session('fail') }}
                   </div>   
                   @endif                        
                  @csrf
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" placeholder="entre your name">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div><br>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" placeholder="entre your password">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div><br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div><br>
            </form>
            </div>
        </div>
    </div>
</body>
</html>