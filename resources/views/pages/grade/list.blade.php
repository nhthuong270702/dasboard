@extends("dashboard")

@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content">
    <div class="container">
        <h3>Management Grades</h3>
          <div class="row">
              <div class="col-md-12">
                <div class="add" style="margin: 20px 0">
                    <button class="btn btn-primary"><a style="color:aliceblue;" href="{{ route("grade.create") }}">Add grade</a></button>
                    <button class="btn btn-info"> <a style="color:aliceblue;" href="{{ route("grade.all") }}">Show All Grade & Student</a></button>
                    <button style="margin: 5px;" class="btn btn-danger delete-all" data-url="">Delete All</button>
                </div>
                  <table class="table">
                     <thead>
                         <tr>
                            <th><input type="checkbox" id="check_all"></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Student In Grade</th>
                            <th colspan="2">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                        @if($grades->count())
                         @foreach($grades as $al)
                         <tr id="tr_{{$al->id}}">
                            <td><input type="checkbox" class="checkbox" data-id="{{$al->id}}"></td>
                             <td>{{$al->id}}</td>
                             <td>{{$al->name}}</td>
                             <td><a href="{{ route("grade.student", $al->id) }}">Show</a></td>
                             <td>
                                <form method="POST" action="{{ route('grade.delete', $al->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                             </td>
                             <td><a href="{{ route("grade.edit", $al->id) }}">Edit</a></td>
                         </tr>
                         @endforeach
                         @endif
                         <a href="{{ route("grade.restore")}}">Khôi phục các lớp đã xóa</a>
                     </tbody>
                 </table>
              </div>
          </div>
      </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#check_all').on('click', function(e) {
            if($(this).is(':checked',true))
        {
            $(".checkbox").prop('checked', true);
            } else {
            $(".checkbox").prop('checked',false);
        }
        });
            $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
            $('#check_all').prop('checked',true);
            }else{
            $('#check_all').prop('checked',false);
        }
        });
            $('.delete-all').on('click', function(e) {
                e.preventDefault();
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
        });
            if(idsArr.length <=0)
        {
            alert("Vui lòng chọn ít nhất 1 hàng để xóa.");
            }  else {
            if(confirm("Bạn có muốn xóa các hàng đã chọn không?")){
            var strIds = idsArr.join(",");
            $.ajax({
            url: "{{ route('grade.deleteall') }}",
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+strIds,
            success: function (data) {
            if (data['status']==true) {
            $(".checkbox:checked").each(function() {
            $(this).parents("tr_").remove();
        });
            alert(data['message']);
            } else {
            location.reload();
        }
        },
            error: function (data) {
            alert(data.responseText);
        }
        });
        }
        }
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
            element.closest('form').submit();
        }
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
