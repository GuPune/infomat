
@php
$tmp = \App\Models\Content::where('status','Y')->where('type',3)->orderby('seq','asc')->take(3)->get();


@endphp

<div id="top_copy" class="text-dark text-center"> <br> <h2>


    @if (session()->get('locale') == 'th')
    วีดีโอ
@else
VDO
@endif

</h2> </div>
<div style="margin: 30px;">
  <div class="row align-items-start">
    @foreach($tmp as $tmps)
    <div class="col">
        <iframe width="420" height="315" src="{{$tmps->url}}" frameborder="0" allowfullscreen></iframe>
    </div>
    @endforeach
  </div>
  <br>

  <div class="container text-center">
    <a href="/video">
  <button type="button" class="btn btn-outline-dark">
    @if (session()->get('locale') == 'th')
    วีดีโอทั้งหมด
@else
VDO ALL
@endif
</button>
</a>
  </div><br>

</div>
