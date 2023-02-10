@extends('layouts.apps')

@section('content')




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
</div>



@endsection


