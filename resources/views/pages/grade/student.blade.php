@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <h3>Student In Grades</h3>
        <div class="add" style="margin: 20px 0">
            <a style="color: rgb(15, 52, 216);" href="{{ route('grade.list')}}">Back</a>
        </div>
          <div class="row">
              <div class="col-md-12">
                 <table class="table">
                     <thead>
                         <tr>
                            <th>Id</th>
                            <th>Name</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach($students as $st)
                            <tr>
                                <td>{{$st->id}}</td>
                                <td>{{$st->name}}</td>
                            </tr>
                        @endforeach
                     </tbody>
                 </table>
              </div>
          </div>
      </div>
    </div>
@endsection
