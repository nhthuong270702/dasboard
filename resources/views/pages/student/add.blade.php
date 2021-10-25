@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <h3>Add Student</h3>
    <form method="post" action="{{ route('student.store') }}">
        @csrf
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
                <tr>
                    <th>
                        <input type="text" name="name" value="">
                    </th>
                </tr>
            </thead>
        </table>
      <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
    </div>
@endsection
