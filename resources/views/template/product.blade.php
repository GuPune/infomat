@php
$tmp = \App\Models\Content::where('status','Y')->where('type',4)->orderby('seq','asc')->take(3)->get();

$x = \App\Models\Content::where('status','Y')->where('type',4)->orderby('seq','asc')->take(4)->get();
@endphp

<div id="top_copy" class="text-dark text-center"> <br> <h2>
@if (session()->get('locale') == 'th')
ผลิตภัณฑ์ของเรา
@else
Product ALL
@endif

</h2> </div>

<div style="margin: 30px;">
  <div class="row align-items-start">
    @foreach($tmp as $tmps)
    <div class="col-4">
    <div class="card" >
       <img src="img/หนองหินมัลเบอร์รี่เฮาส์/268802550_394644252349566_1235860328743203525_n.jpg"  style="border-radius: 8px;"  class="card-img-top" alt="..." >
    </div>
    </div>
    @endforeach
  </div>
  <br>


  </div>
</div>



<div style="margin: 30px;">
<div class="row">
  <div class="col-sm-6">
  <div id="top_copy"> <h3>สินค้าวางจำหน่าย</h3> </div><br>
  @foreach($tmp as $tmps)
  <div class="row g-0">
    <div class="col-md-3">
      <img src="img/หนองหินมัลเบอร์รี่เฮาส์/268802550_394644252349566_1235860328743203525_n.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">น้ำผลไม้มลเบอร์รี่</h5>
        <a class="text-dark" style="text-decoration:none" href=""> <p class="card-text">สั่งสินค้าชุมชนออนไลน์ โชห่วยการ์เด้น จัดส่งทั่วโลก</p></a>
        <p class="card-text"><small class="text-muted">20 มกราคม 2023 </small></p>
      </div>
    </div>
  </div>
  <br>
  @endforeach

  </div>


  <div class="col-sm-6">
      <div class="card-body">

       <div class="container text-center">
        <div class="row">
            @foreach($x as $tmpa)
          <div class="col-6 col-sm-6">
            <div class="card" >
              <img src="img/หนองหินมัลเบอร์รี่เฮาส์/268802550_394644252349566_1235860328743203525_n.jpg"  style="border-radius: 8px;"  class="card-img-top" alt="..." >
            </div>
          </div>
          @endforeach


          <!-- Force next columns to break to new line at md breakpoint and up -->
          <div class="w-100 d-none d-md-block"></div>


        </div>
      </div>

      </div>
  </div>

  <div class="container text-center">
    <button type="button" class="btn btn-outline-dark ">

@if (session()->get('locale') == 'th')
        ผลิตภัณฑ์ทั้งหมด
@else
Product ALL
@endif

    </button>
  </div><br>

</div>
</div>
</div>
