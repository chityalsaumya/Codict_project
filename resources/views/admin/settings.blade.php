<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset">
                <h4>Settings</h4><hr>
                <h3>Change Settings</h3>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                        <td>{{$LoggedUserInfo['name']}}</td>
                        <td>{{$LoggedUserInfo['email']}}</td>
                        <td><a href="{{route('auth.logout')}}">Logout</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h3>Hello Users</h3>
 
    <div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 col-md-offset-4" >
            <h4>Registration Custom Auth</h4><hr>
            <form action="{{route('auth.save')}}" method="post">
                
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('danger')}}
            </div>
            @endif

            @csrf
            <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Fullname" value="{{old('name')}}">
                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" id="">
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Enter password" id="">
                    <span class="text-danger">@error('confirmpassword'){{$message}} @enderror</span>
                </div>
                <br>
                <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                <br>
                <a href="{{route('auth.login')}}">I already have an account, Sign In</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>