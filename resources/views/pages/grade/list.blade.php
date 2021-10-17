@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <h3>Management Grades</h3>
          <div class="row">
              <div class="col-md-12">
                <div class="add" style="margin: 20px 0">
                    <button class="btn btn-primary"><a style="color:aliceblue;" href="{{ route('grade.create') }}">Add grade</a></button>
                    <button class="btn btn-info"> <a style="color:aliceblue;" href="{{ route('grade.all') }}">Show All Grade & Student</a></button>
                </div>
                  <table class="table">
                     <thead>
                         <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Student In Grade</th>
                            <th colspan="2">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($grades as $al)
                         <tr>
                             <td>{{$al->id}}</td>
                             <td>{{$al->name}}</td>
                             <td><a href="{{ route('grade.student', $al->id) }}">Show</a></td>
                             <td><a href="{{ route('grade.delete', $al->id) }}">Delete</a></td>
                             <td><a href="{{ route('grade.edit', $al->id) }}">Edit</a></td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
              </div>
          </div>
      </div>
    </div>
@endsection
