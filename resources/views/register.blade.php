<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Sign Up</title>
</head>
<body style="background-color:#36344d">
    <div class="container-fluid">
        <div class="container">
            <div class="row" style="margin-top:50px;">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4" style="padding: 30px 20px; background-color:rgb(230, 233, 210);">
                    <h3 style="text-align: center">Sign Up</h3>
                    @if (session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                    @endif
                <form method="post" action="{{route('register')}}">
                    @csrf
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Input Name" required>
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Input Email" required>
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Input Password" required>
                    <label for="">Password Confirmation</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Input Password Confirmation" required><br>
                  <button type="submit" class="btn btn-primary center-block" name="register">Create Account</button><br>
                  <span style="text-align: center">Already have an account?
                  <a href="{{ route('login')}}">Sign in</a></span>
                </form>
            </div>
            <div class="col-sm-4">
            </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
