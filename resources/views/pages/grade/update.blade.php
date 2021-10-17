@extends('dashboard')

@section('content')
<div class="content-wrapper">
    <form method="post" action="{{ route('grade.update', $grade->id) }}">
        @csrf
        @method('put')
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                <tr>
                    <th>
                        <input type="text" name="id" value="{{ $grade->id}}">
                    </th>
                    <th>
                        <input type="text" name="name" value="{{ $grade->name }}">
                    </th>
                </tr>
            </thead>
        </table>
      <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
@endsection
