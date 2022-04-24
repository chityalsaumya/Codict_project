<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
             
                <h3>Hello {{$LoggedUserInfo['name']}}</h3>
                <div style="float: right;"> <a href="{{route('auth.logout')}}">Logout</a></div>
            </div>
        </div>
    </div>


    <div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 col-md-offset-4" >
            <h4>Form</h4><hr>
            <form action="{{route('admin.send')}}" method="post">
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
                    <input type="text" class="form-control" name="fname" placeholder="Enter name" value="">
                    <span class="text-danger">@error('fname'){{$message}} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label name="class" for="">Choose Class</label>
                    <select name="class">
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                </select>
                    <span class="text-danger">@error('class'){{$message}} @enderror</span>
                </div>          
                <br>     
                <div class="form-group">
                    <label for="">Choose Section</label>
                    <select name="section">
                    <option value="section A">section A</option>
                    <option value="section B">section B</option>
                </select>
                    <span class="text-danger">@error('section'){{$message}} @enderror</span>
                </div>
            
                <br>
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
               
      
                <a class="btn btn-primary" href="{{ route('homepage') }}">Cancel</a>


            </form>

        </div>
    </div>
</div>
</body>
</html>