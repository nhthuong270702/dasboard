@extends('dashboard')

@section('content')
<div class="content">
    <div class="container">
        <h3>Management Students</h3>
          <div class="row">
              <div class="col-md-12">
                  <div class="add" style="margin: 20px 0">
                    <button class="btn btn-primary"><a style="color:aliceblue;" href="{{ route('student.create') }}">Add student</a></button>
                    <button type="button" class="btn btn-danger" id="deleteall">Delete Selected </button>
                  </div>
                 <table class="table">
                     <thead>
                         <tr>
                             <th><input type="checkbox" id="chkCheckAll" /></th>
                             <th>Id</th>
                             <th>Name</th>
                             <th colspan="2">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($students as $al)
                         <tr id="sid{{$al->id}}">
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{$al->id}}"></td>
                             <td>{{$al->id}}</td>
                             <td>{{$al->name}}</td>
                             <td>
                                <form method="POST" action="{{ route('student.delete', $al->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                             </td>
                             <td><a href="{{ route('student.edit', $al->id) }}">Edit</a></td>
                         </tr>
                         @endforeach
                         <a href="{{ route('student.restore')}}">Khôi phục các sinh viên đã xóa</a>
                     </tbody>
                 </table>
              </div>
          </div>
      </div>
    </div>
    <script>
        $(function(e) {
            $("#chkCheckAll").click(function() {
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
            });

            $("#deleteall").click(function(e){
                e.preventDefault();
                var allids= [];
                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });
                $.ajax({
                    url:"{{route('student.deleteall')}}",
                    type:'GET',
                    data:{
                        ids:allids,
                        _token:$("input[name=_token]").val()
                    },
                    success:function(response)
                    {
                        $.each(allids,function(key,val){
                            $('#sid'+val).remove();
                        });
                    }
                });
            });
        });
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
     <script type="text/javascript">

          $('.show_confirm').click(function(event) {
               var form =  $(this).closest("form");
               var name = $(this).data("name");
               event.preventDefault();
               swal({
                   title: `Bạn có muốn xóa hàng này không?`,
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                   form.submit();
                 }
               });
           });

     </script>
@endsection
