@extends('dashboard')

@section('content')

<div class="content">
    <div class="container">
        <h3>Add User</h3>
        <form method="post" action="{{ route('user.store') }}">
            @csrf
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for="">Full Name:</label>
            <input class="form-control" type="text" name="name" required>
            <label for="">Email:</label>
            <input class="form-control" type="text" name="email" required>
            <label for="">Password:</label>
            <input class="form-control" type="text" name="password" required>
            <label for="">C_Password:</label>
            <input class="form-control" type="text" name="password_confirmation" required><br>
            <button type="submit" class="btn-info center-block" name="add">Add</button>
        </form>
    </div>
    </div>
@endsection
