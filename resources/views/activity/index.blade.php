@extends('layouts.admin')

@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert">×</button>
Check the following errors :(  {{$errors->first()}}
</div>
@endif



  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">ข้อมูลข่าว</div>
          <div class="card-body">
            <div class="table-responsive pt-3">
              <table id="myTable">
                <thead>
                  <tr>
                    <th>
                      ลำดับ
                    </th>
                    <th>
                        รูป
                    </th>
                    <th>
                        เรื่อง / หัวข้อ
                    </th>
                    <th>
                        สถานะ
                    </th>

                    <th>
                        ปรับ
                    </th>
                    <th>
                        จัดการ
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $k => $items)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>

                        @if ($items->image == '')
                        <img class="img-profile"
                        src="/img/image.jpg" width="150" height="100">
                        @else
                        <img class="img-profile"
                        src="/public/product/{{$items->image}}" width="150" height="100">

                        @endif


                    </td>
                    <td>
                        {{ $items->title_th }}
                    </td>
                    <td>
                        @if ($items->status == 'Y')
                        <label class="badge badge-info">ใข้งาน</label>

                        @else
                        <label class="badge badge-danger">ไม่ใช้งาน</label>
                        @endif



                    </td>
                    <td class="text-center" width="20%">
                        @if($min == $items->seq)
                            <button
                                class="btn btn-outline bg-success border-success text-success-800 btn-icon down"
                                data-name="activity" data-no="{{ $items->seq }}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งลง"
                                data-placement="top"
                                id="top"
                                data-original-title="top tooltip">
                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            </button>
                        @elseif($min < $items->seq && $items->seq < $count)
                            <button
                                class="btn btn-outline bg-success border-success text-success-800 btn-icon up"
                                data-name="activity" data-no="{{ $items->seq }}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งขึ้น"
                                data-placement="bottom"
                                id="bottom"
                                data-original-title="bottom tooltip">

                                <i class="fa fa-arrow-up" aria-hidden="true"></i>

                            </button>
                            <button
                                class="btn btn-outline bg-success border-success text-success-800 btn-icon down"
                                data-name="activity" data-no="{{ $items->seq }}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งลง"
                                data-placement="top"
                                id="top"
                                data-original-title="top tooltip">

                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            </button>
                        @else
                            <button
                                class="btn btn-outline bg-success border-success text-success-800 btn-icon up"
                                data-name="activity" data-no="{{ $items->seq }}"
                                data-popup="tooltip"
                                title="เลื่อนตำแหน่งขึ้น"
                                data-placement="bottom"
                                id="bottom"
                                data-original-title="bottom tooltip">
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                            </button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/activity/' . $items->id . '/edit') }}" class="btn btn-warning editmdi btn-edit">แก้ไข</a>

                        <button class="btn btn-danger btn-delete" data-id="{{ $items->id}}" data-popup="tooltip" title="ลบ" data-placement="bottom">
                            ลบ
                        </button>
                    </td>
                  </tr>
              @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>


  <style type="text/css">
.btnx {
    display: inline-block;
    font-weight: 400;
    color: #001737;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    font-size: 0.875rem;
    line-height: 1;
    border-radius: 0.1875rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.delmdi{
    color: red;
}
.editmdi{
    color: rgb(255, 187, 0);
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>




$('body').on('click', '.btn-delete', function (e) {

var id = $(this).attr('data-id');
deleteConf(id);


});

function deleteConf(id) {
            swal({
                title: "คุณต้องการลบจริงหรือไม่?",
                text: "ข้อมูลไม่สามารถกู้คืนได้!",
                icon: "warning",
                buttons: [
                    'ยกเลิกลบรายการ',
                    'ลบรายการ'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'ลบรายการ!',
                        text: 'ลบรายการเรียบร้อย',
                        icon: 'success'
                    }).then(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            dataType: 'json',
                            type:'DELETE',
                            data:{
                                '_token': "{{ csrf_token() }}",
                                id:id},
                            url: '/admin/new/' + id,
                            success: function(datas){

                                location.reload();
                            }

                        })
                    });
                } else {
                    swal("ยกเลิก", "ยกเลิกรายการ", "error");
                }
            });
        } // error form show text


        $('.up').on('click',function(){
                var no   = $(this).data('no');
                var name = $(this).data('name');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

                $.ajax({
                    type: "PATCH",
                    url: "/admin/sequence/up",
                    data: {no : no,name:name,'_token': "{{ csrf_token() }}"},
                    success: function(rs){
                        swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
                        setTimeout(function() {
                            location.reload();
                        }, 1200);

                    }
                });

                swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});

            });

            $('.down').on('click',function(){

                var no   = $(this).data('no');
                var name = $(this).data('name');

                $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
                $.ajax({
                    type: "PATCH",
                    url: "/admin/sequence/down",
                    data: {no : no,name:name,'_token': "{{ csrf_token() }}"},
                    success: function(rs){
                        swal("Success!", "ทำการเลื่อนตำแหน่งเรียบร้อยแล้ว", "success", {button:false});
                        setTimeout(function() {
                            location.reload();
                        }, 1200);

                    }
                });


            });

    </script>







@endsection


