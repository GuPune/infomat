@extends('layouts.apps')

@section('content')



<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>ติดต่อเรา</h2>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
                <div id="map"></div>
            </div>

          </div>

        </div>

        <div class="col-lg-6">
          <form action="#" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                <div class="help-block-name">กรุณากรอกชื่อ</div>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                <div class="help-block-email">กรุณากรอกอีเมล</div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              <div class="help-block-subject">กรุณากรอกหัวข้อ</div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
              <div class="help-block-message">กรุณากรอกรายละเอียด</div>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center">

                <button type="button" class="btn btn-danger btn-save" class="reload" id="reload">
                    Send Message
                </button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
  <style type="text/css">
    .help-block-name,.help-block-email,.help-block-subject,.help-block-des,.help-block-message,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
        display: none;
        color: red;
        text-align: center;
    }

    #map {
          height: 400px;
        }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



<script defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" >
</script>
<script type="text/javascript">

// function initMap() {alert("ok");}
    function initMap() {
      const myLatLng = { lat: 16.0243089, lng: 103.2676393 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: myLatLng,
      });

      new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello Rajkot!",
      });
    }

    window.initMap = initMap;
</script>
  <script>


    $('body').on('click', '.btn-save', function () {


    let valform = validateForm();
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();

    if(valform === true){
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
                       name:name,email:email,subject:subject,message:message},
                   url: '/contact',
                   success: function(datas){
                    swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

        var name = $('#name').val('');
        var email = $('#email').val('');
        var subject = $('#subject').val('');
        var message = $('#message').val('');
                   }
               })

    }else {
        swal("ส่งข้อมูลไม่สำเร็จ!", "ส่งข้อมูลไม่สำเร็จ!", "error");

    }

       });

       function validateForm(){
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();



        if(name == ''){
    $('.help-block-name').show();
    }else {
    $('.help-block-name').hide();
    }

    if(email == ''){
    $('.help-block-email').show();
    }else {
    $('.help-block-email').hide();
    }

    if(subject == ''){
    $('.help-block-subject').show();
    }else {
    $('.help-block-subject').hide();
    }

    if(message == ''){
    $('.help-block-message').show();
    }else {
    $('.help-block-message').hide();
    }




    if(email == '' || message == '' || subject == '' || name == ''){
    return false;
    }else{


        return true;

    }





    }




        </script>


@endsection


