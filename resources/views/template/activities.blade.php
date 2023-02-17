
@php
$tmp = \App\Models\Content::where('status','Y')->where('type',2)->orderby('seq','asc')->take(3)->get();
$post = \App\Models\Content::where('status','Y')->where('type',2)->inRandomOrder()->limit(3)->get();

@endphp
<div style="margin: 100px;">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach($post as $key => $rs)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}" data-bs-interval="10000">
            <img src="/public/product/{{$rs->image}}" class="d-block w-100"  alt="...">
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>






<div id="top_copy" class="text-dark text-center"> <br> <h2>

@if (session()->get('locale') == 'th')
    กิจกรรมของเรา
@else
Activities ALL
@endif
</h2>
</div>
<div style="margin: 30px;">
  <div class="row align-items-start">
    @foreach($tmp as $tmps)
    <div class="col-4">
       <img src="/public/product/{{$tmps->image}}" style="  border-radius: 10px;" class="card-img-top" alt="..." >
    </div>
    @endforeach
  </div>
  <br>

  <div class="container text-center">
    <a href="/activity">
  <button type="button" class="btn btn-outline-dark">
    @if (session()->get('locale') == 'th')
    กิจกรรมทั้งหมด
@else
Activities ALL
@endif

</button>
</a>
  </div><br>

</div>
