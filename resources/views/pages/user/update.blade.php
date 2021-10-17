@extends('dashboard')

@section('content')

<div class="content">
    <div class="container">
        <h3>Add User</h3>
        <form method="post" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('put')
            <label for="">Id:</label>
            <input class="form-control" type="text" name="id" value="{{ $user->id }}" placeholder="">
            <label for="">Full Name:</label>
            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
            <label for="">Email:</label>
            <input class="form-control" type="text" name="email" value="{{$user->email}}">
            <label for="">Password:</label>
            <input class="form-control" type="text" name="password" value="{{ $user->password }}"><br>
            <button type="submit" class="btn-info center-block" name="add">Update</button>
        </form>
    </div>
    </div>
@endsection
