<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset">
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
                <h3>Details</h3>
                       <div style="float: right;"> <a href="{{route('auth.logout')}}">Logout</a></div>
                        </tr>
                        <br>
        
                <p style="font-size: 20px;">Your Name: {{$LoggedUserInfo['fname']}}</p>
                <p style="font-size: 20px;">Your Class: {{$LoggedUserInfo['class']}}</p>
                <p style="font-size: 20px;">Your Section: {{$LoggedUserInfo['section']}}</p>
            </div>
        </div>
    </div>

</body>
</html>