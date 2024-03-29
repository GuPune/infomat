@extends('layouts.admin')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('video.update',$content->id) }}" >
          <h4 class="card-title">แก้ไขแบบฟอร์ม กิจกรรม</h4>
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <input type="hidden" class="form-control" id="id" placeholder="ID" value="{{$content->id}}">
            <div class="form-group">
              <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (ไทย)</label><label  style="color:red;"> * </label>
              <input type="text" class="form-control" id="title_th" name="title_th" placeholder="ใส่ภาษาไทย" value="{{$content->title_th}}" required>
              <div class="help-block-name help-block-name-th">กรุณากรอกชื่อเรื่อง</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (อังกฤษ)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="title_en" name="title_en" placeholder="ใส่ภาษาอังกฤษ" value="{{$content->title_en}}" required>
                <div class="help-block-name help-block-name-en">กรุณากรอกชื่อเรื่อง</div>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (ไทย)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="detail_th" name="detail_th" placeholder="ใส่ภาษาไทย" value="{{$content->detail_th}}" required>
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (อังกฤษ)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="detail_en" name="detail_en" placeholder="ใส่ภาษาอังกฤษ" value="{{$content->detail_en}}" required>
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>


              <div class="form-group">
                <label for="exampleInputUsername1">Keywords ใส่เครื่องหมาย (,) เพื่อคั่นประโยค  </label>
                <input type="text" class="form-control" id="keyword" placeholder="Keyword"  value="{{$content->keyword}}">
              </div>


              <div id="youtube">
                <div class="row">
                    <div class="col-12">
                        <label for="inputEmail4">Youtube ลิงค์</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url"  id="url" value="{{$content->url}}">
                        </div>
                        <div class="help-block-url">กรุณากรอก URL</div>
                        <label for="inputEmail4">ตัวอย่าง. https://www.youtube.com/watch?v=ks18SVYOIrE</label>
                    </div>
                </div>

                <div  id="rx" class="row" >
                    <div class="col-12">
                        <iframe width="420" height="345" id="calendar" src="">
                        </iframe>
                    </div>
                </div>
            </div>


              <div class="form-group">
                <label for="exampleInputUsername1">สถานะ </label>
                <select class="form-control" id="status" name="status">
                    <option value="Y" @if($content->status == 'Y') selected @endif>Active</option>
                    <option value="N" @if($content->status == 'N') selected @endif>Isactive</option>
                  </select>
              </div>
            <button type="submit" class="btn btn-info btn-lg btn-block btn-save">Save
                <i class="typcn typcn-th-menu float-right"></i>
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css">
    .help-block-name,.help-block-name-th,.help-block-name-en,.help-block-name-ch,.help-block-des,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
        display: none;
        color: red;
        text-align: center;
    }
</style>
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">


var $link = "<?php echo url('/public/product/'); ?>";
var $pub = "<?php echo url('/img/'); ?>";


$( "#url" ).keyup(function() {
    var url = $('#url').val();
    let text = url;

var z = text.substring(0, 32);


let b = text.substring(32);
let y = 'https://www.youtube.com/embed/'+b

if(z == 'https://www.youtube.com/watch?v='){
    var url = $('#url').val(y);
    document.getElementById('calendar').src = y;
    document.getElementById("rx").style.display = "block";
}else{

     $('#url').val(url);
    document.getElementById('calendar').src = url;
    document.getElementById("rx").style.display = "block";

}


    // document.getElementById('calendar').src = y;
    // var target = $('#target').val(y);


});

$("#image_slide").on('change', function(){
        if ($('input[name ="image_slide"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "image_slide"]').prop('files')[0];

            var _token = $('input#_token').val();

            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('image_slide', file_data);
                    form_data.append("_token", _token);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/admin/product/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {

;                               $('input[name=images]').val(resp.data);
                                $('#showImageslide').attr("src", $link +'/'+ resp.data);
swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                        },
                        error: function error(xhr, textStatus, errorThrown) {

                            console.log(errorThrown);
                        }
                    });
                };
                img.onerror = function() {
                    alert( "not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }
    })

    CKEDITOR.replace('desciption_th', {
            filebrowserUploadUrl: "{{route('uploadx', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });

        CKEDITOR.replace('desciption_en', {
            filebrowserUploadUrl: "{{route('uploadx', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });




//         $('body').on('click', '.btn-save', function () {


//      let valform = validateForm();



//      if(valform === true){

//         var title_th = $('#title_th').val();
//         var title_en = $('#title_en').val();
//         var desciption_th = CKEDITOR.instances.desciption_th.getData();
//         var desciption_en = CKEDITOR.instances.desciption_en.getData();
//         var keyword = $('#keyword').val();
//         var status = $('#status').val();
//         var detail_th = $('#detail_th').val();
//         var detail_en = $('#detail_en').val();
//         var image = $('#images_slide').val();
//         var id = $('#id').val();


//         $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                     }
//                     });

//                 $.ajax({
//                     dataType: 'json',
//                     type:'PUT',

//                     data:{
//                         '_token': "{{ csrf_token() }}",
//                         title_th:title_th,title_en:title_en,desciption_th:desciption_th,desciption_en:desciption_en,keyword:keyword,status:status,detail_th:detail_th,detail_en:detail_en,image:image},
//                     url: '/admin/new/' + id,
//                     success: function(datas){

//                       swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");


//         var title_th = $('#title_th').val('');
//         var title_en = $('#title_en').val('');
//         var title_ch = $('#title_ch').val('');
//         var desciption_th = CKEDITOR.instances.desciption_th.setData();
//         var desciption_en = CKEDITOR.instances.desciption_en.setData();
//         var url = $('#url').val('');
//         var keyword = $('#keyword').val('');
//         var detail_th = $('#detail_th').val('');
//         var detail_en = $('#detail_en').val('');


//         $("#images").val('');
//         $("#image_slide").val('');
// $('#showImageslide').attr("src", $pub +'/'+ 'no_photo.jpg');


//                     }
//                 })

//      }else {


//      }

//         });

        function validateForm(){
var title_th = $('#title_th').val();
var title_en = $('#title_en').val();



if(title_th == ''){
    $('.help-block-name-th').show();
}else {
    $('.help-block-name-th').hide();
}

if(title_en == ''){
    $('.help-block-name-en').show();
}else {
    $('.help-block-name-en').hide();
}







if(title_th == '' || title_en == ''){
    return false;
}else{
    return true;
}

}

</script>





@endsection


