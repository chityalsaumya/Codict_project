<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
</head>
<body>
    
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 col-md-offset-4" >
            <h4>Contact Form</h4><hr>
            <form action="{{route('admin.email')}}" method="post">
                
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
                    <label for="">Subject</label>
                    <input type="subject" class="form-control" name="subject" placeholder="Enter subject" id="">
                    <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea type="message" class="form-control" cols='4' name="message" placeholder="Enter message" id=""></textarea>
                    <span class="text-danger">@error('message'){{$message}} @enderror</span>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Send</button>
                <br>
            </form>
        </div>
    </div>
</div>

</body>
</html>