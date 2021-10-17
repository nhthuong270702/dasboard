@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <h3>Management Students</h3>
          <div class="row">
              <div class="col-md-12">
                  <div class="add" style="margin: 20px 0"><button class="btn btn-primary"><a style="color:aliceblue;" href="{{ route('student.create') }}">Add student</a></button></div>
                 <table class="table">
                     <thead>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th colspan="2">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($students as $al)
                         <tr>
                             <td>{{$al->id}}</td>
                             <td>{{$al->name}}</td>
                             <td><a href="{{ route('student.detroy', $al->id) }}">Delete</a></td>
                             <td><a href="{{ route('student.edit', $al->id) }}">Edit</a></td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
              </div>
          </div>
      </div>
    </div>
@endsection
