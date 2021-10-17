@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <h3>Management Students & Grades</h3>
        <div class="add" style="margin: 20px 0">
            <a style="color: rgb(15, 52, 216);" href="{{ route('grade.list')}}">Back</a>
        </div>
          <div class="row">
              <div class="col-md-12">
                 <table class="table">
                     <tbody>
                        @foreach($all as $link)
                                <tr>
                                    <td>{{ $link }}</td>
                                </tr>
                        @endforeach
                     </tbody>
                 </table>
              </div>
          </div>
      </div>
    </div>
@endsection
