@extends('layouts.apps')

@section('content')




<div style="margin: 30px;">
    <div class="row row-cols-1 row-cols-md-4 g-5">
        @foreach($tmp as $tmps)
        <div class="col">
            <iframe width="420" height="315" src="{{$tmps->url}}" frameborder="0" allowfullscreen></iframe>
        </div>
        @endforeach
    </div>
</div>



@endsection


