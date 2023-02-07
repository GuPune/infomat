@extends('layouts.admin')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">แบบฟอร์ม ข่าวสาร</h4>
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (ไทย)</label><label  style="color:red;"> * </label>
              <input type="text" class="form-control" id="title_th" placeholder="ใส่ภาษาไทย">
              <div class="help-block-name help-block-name-th">กรุณากรอกชื่อเรื่อง</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (อังกฤษ)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="title_en" placeholder="ใส่ภาษาอังกฤษ">
                <div class="help-block-name help-block-name-en">กรุณากรอกชื่อเรื่อง</div>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (ไทย)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="detail_th" placeholder="ใส่ภาษาไทย">
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (อังกฤษ)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="detail_en" placeholder="ใส่ภาษาอังกฤษ">
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>


            <div class="form-group">
                <label for="exampleInputUsername1">รายละเอียด (ไทย)</label><label  style="color:red;"> * </label>
                <textarea name="desciption_en"  id="desciption_en"></textarea>
                <div class="help-block-des help-block">กรุณากรอกรายละเอียด</div>
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">รายละเอียด (อังกฤษ)</label><label  style="color:red;"> * </label>
                <textarea name="desciption_th"  id="desciption_th"></textarea>
                <div class="help-block-des help-block">กรุณากรอกรายละเอียด</div>
              </div>


              <div class="form-group">
                <label for="exampleInputUsername1">Keywords ใส่เครื่องหมาย (,) เพื่อคั่นประโยค  </label>
                <input type="text" class="form-control" id="keyword" placeholder="Keyword">
              </div>


              <div class="form-group">
                <label for="exampleInputUsername1">Upload รูปภาพ</label>
                <input type="file" name="image_slide" id="image_slide" ><br>
                <input type="hidden" class="form-control" name="images" id="images">
                <img src="/img/no_photo.jpg" alt="รูปภาพสไลด์" class="img-fluid rounded mx-auto d-block profile-image" id="showImageslide" width="300" height="150">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">สถานะ </label>
                <select class="form-control" id="status">
                    <option value="Y">Active</option>
                    <option value="N">Isactive</option>
                  </select>
              </div>
            <button type="button" class="btn btn-info btn-lg btn-block btn-save">Save
                <i class="typcn typcn-th-menu float-right"></i>
              </button>
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
  <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">


var $link = "<?php echo url('/public/product/'); ?>";
var $pub = "<?php echo url('/img/'); ?>";

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




        $('body').on('click', '.btn-save', function () {


     let valform = validateForm();



     if(valform === true){

        var title_th = $('#title_th').val();
        var title_en = $('#title_en').val();
        var desciption_th = CKEDITOR.instances.desciption_th.getData();
        var desciption_en = CKEDITOR.instances.desciption_en.getData();
        var keyword = $('#keyword').val();
        var status = $('#status').val();
        var detail_th = $('#detail_th').val();
        var detail_en = $('#detail_en').val();
        var image = $('#images_slide').val();


        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                $.ajax({
                    dataType: 'json',
                    type:'POST',

                    data:{
                        '_token': "{{ csrf_token() }}",
                        title_th:title_th,title_en:title_en,desciption_th:desciption_th,desciption_en:desciption_en,keyword:keyword,status:status,detail_th:detail_th,detail_en:detail_en,image:image},
                    url: '/admin/new',
                    success: function(datas){

                      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");


        var title_th = $('#title_th').val('');
        var title_en = $('#title_en').val('');
        var title_ch = $('#title_ch').val('');
        var desciption_th = CKEDITOR.instances.desciption_th.setData();
        var desciption_en = CKEDITOR.instances.desciption_en.setData();
        var url = $('#url').val('');
        var keyword = $('#keyword').val('');
        var detail_th = $('#detail_th').val('');
        var detail_en = $('#detail_en').val('');


        $("#images").val('');
        $("#image_slide").val('');
$('#showImageslide').attr("src", $pub +'/'+ 'no_photo.jpg');


                    }
                })

     }else {


     }

        });

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


