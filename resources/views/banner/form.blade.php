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
          <h4 class="card-title">ตั้งค่า Banner</h4>
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          <input type="text" id="id" name="id" value="{{$banner->id}}">




            <div id="youtube">
                <div class="row">
                    <div class="col-12">
                        <label for="inputEmail4">Youtube ลิงค์</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url"  id="url" value="{{$banner->link}}">
                        </div>
                        <div class="help-block-link">กรุณากรอก URL</div>
                        <label for="inputEmail4">ตัวอย่าง. https://www.youtube.com/watch?v=ks18SVYOIrE</label>
                    </div>
                </div>

                <div  id="rx" class="row" >
                    <div class="col-12">
                        <iframe width="420" height="345" id="calendar" src="{{$banner->link}}">
                        </iframe>
                    </div>
                </div>
            </div>


              <div class="form-group">
                <label for="exampleInputUsername1">Upload รูปภาพ</label>
                <input type="file" name="image_slide" id="image_slide" ><br>
                <input type="text" class="form-control" name="images" id="images">
                <img src="/img/no_photo.jpg" alt="รูปภาพสไลด์" class="img-fluid rounded mx-auto d-block profile-image" id="showImageslide" width="300" height="150">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">ประเภท </label>
                <select class="form-control" id="type">
                    <option value="I">รูปภาพ</option>
                    <option value="V">วีดีโอ</option>
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
    .help-block-link,.help-block-name-th,.help-block-name-en,.help-block-name-ch,.help-block-des,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
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







        $('body').on('click', '.btn-save', function () {


     let valform = validateForm();



     if(valform === true){
        var id = $('#id').val();
        var link = $('#url').val();
        var image = $('#images').val();
        var type = $('#type').val();


        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                $.ajax({
                    dataType: 'json',
                    type:'PUT',

                    data:{
                        '_token': "{{ csrf_token() }}",
                        link:link,image:image,type:type,id:id},
                    url: '/admin/banner/' + id,
                    success: function(datas){

                      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");




                    }
                })

     }else {


     }

        });

        function validateForm(){
            var link = $('#url').val();
        var image = $('#images').val();


if(link == ''){
    $('.help-block-link').show();
}else {
    $('.help-block-link').hide();
}

if(image == ''){
    $('.help-block-image').show();
}else {
    $('.help-block-image').hide();
}







if(link == '' || image == ''){
    return false;
}else{
    return true;
}

}

</script>





@endsection


