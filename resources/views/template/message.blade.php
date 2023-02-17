@php
$tmp = \App\Models\Content::where('status','Y')->where('type',1)->orderby('seq','asc')->take(4)->get();
@endphp
<div id="top_copy" class="text-dark text-center"> <br> <h2>



    @if (session()->get('locale') == 'th')
    ข่าวสาร
@else
NEWS
@endif

</h2> </div>
<div style="margin: 30px;">
    <div class="row row-cols-1 row-cols-md-4 g-5">
    @foreach($tmp as $tmps)
      <div class="col">
        <div class="card">
          <img src="/public/product/{{$tmps->image}}" class="card-img-top" alt="...">
          </div>
          <div class="">
            <small class="text-secondary">{{$tmps->created_at}}</small>
            <p class="card-text">{{$tmps->title_th}}</p>
          </div>
      </div>
      @endforeach
    </div>
    <br>
      <div class="container text-center">
        <a href="/new">
        <button type="button" class="btn btn-outline-dark ">

            @if (session()->get('locale') == 'th')
            ข่าวสารทั้งหมด
        @else
        NEWS ALL
        @endif



        </button>
        </a>
      </div>
      <br>

    </div>
