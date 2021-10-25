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
<title>Dang Nhap</title>
</head>
<body style="background-color:#36344d">
    <div class="container-fluid">
        <div class="container">
            <div class="row" style="margin-top:90px">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4" style="border: 1px solid black; padding: 30px 20px; background-color: rgb(230, 233, 210);">
                    <h3 style="text-align: center;">Login</h3>
                        @if (session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="post" action="{{route('login')}}" role="form">
                        @csrf
                        @method('post')
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <label for="">Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Input Email" value="{{ old('email') }}">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Input Password"><br>
                      <button type="submit" class="btn btn-primary center-block" name="login">Login</button><br>
                      <span>Don't have an account?
                    <a href="{{ route('register')}}">Register Now!</a>
                    </span>
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
