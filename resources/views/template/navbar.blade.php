@php
$tmp = \App\Models\Banner::first();
@endphp
<style>
    .videoWrapper {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

body.gallery header, body.top header {
display: none;
}
#top_foot{
    display: block;
}

body.gallery div#top_titlea {
    position: absolute;
    z-index: 10;
    text-align: center;
    color: #f2f2f2;
}
.m_area{
    left: 593.779px;
    top: 50px;
}
    </style>
<header>









</header>


<div class="rt_link clearfix">
    <ul class="lang clearfix">
        <li >
            <a href="/change/en" class="ja">

                EN
            </a>
        </li>
        <li>
            <a href="/change/th" class="ja">
                TH
            </a>
        </li>
    </ul>


    <div class="line"></div>


    <ul class="social clearfix">


        <li>
            <a href="https://www.instagram.com/nonghin.mulberry.house/" target="_blank">
                <img src="https://nipponia-kosuge.jp/wp/wp-content/themes/kosuge_v2/assets/images/bt_in.svg" alt="Twitter" width="18">
            </a>
        </li>
        <li>
            <a href="https://www.facebook.com/NongHinMulberryHouse" target="_blank">
                <img src="https://nipponia-kosuge.jp/wp/wp-content/themes/kosuge_v2/assets/images/bt_fb.svg" alt="Facebook" width="18">
            </a>
        </li>
    </ul>

</div>


@if ($tmp->type == 'V')



<div id="main">
	<div id="movie_area">
		<div id="top_title">
			{{-- <h2>NONG-HIN MULBERRY </h2> --}}
					</div>

                    <div class="col-12">
                        <div class="videoWrapper">
                            <iframe width="560" height="315" src="{{$tmp->link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                          </div>
                    </div>
	</div>
</div>
@else

<div id="main">


	<div id="movie_area">

        <div id="top_title" class="m_area" >
         <h1>Nong - Hin - <span style='margin-left: -0.2em'>MulberryHouse</span></h1>
        <p> ท่องเที่ยวชุมชนบ้านหนองหิน</p>
        </div>


		<div id="top_video_wrap">
		<div class="gradient"></div>
	<video class="full_resize" preload="none" loop="loop" muted="muted" playsinline="" preload="auto" poster="/public/product/{{$tmp->image}}">
	<source src="http://127.0.0.1:8000/x1.mov" type="video/mp4">
	</video>
</div>
	</div>
</div>



@endif



<div id="top_foot" class="clearfix ba">
    <div class="left">
        <a href="https://www.instagram.com/nonghin.mulberry.house/" target="_blank" id="bt_schedule">
                                <div class="bt"></div><span class="ja">RESERVE</span>
                        </a>
    </div>

    <div class="right">
        @if (session()->get('locale') == 'th')
        <ul>

            <li
                ><a class="select en" href="/">
                    {{ trans('multi.Home_TH') }}
                </a></li>
            <li
                ><a class=" en" href="/product">
                    {{ trans('multi.Pro_TH') }}
                </a></li>
            <li
                ><a class="en" href="/new">
                    {{ trans('multi.New_TH') }}
                </a></li>
                <li
                ><a class="en" href="/activity">

                    {{ trans('multi.Activity_TH') }}
                </a></li>
                <li
                ><a class="en" href="/video">

                    {{ trans('multi.Vdo_TH') }}
                </a></li>
            <li
                ><a class=" en" href="/contact">
                    {{ trans('multi.Contact_TH') }}
                </a></li>


    </ul>

@else

<ul>

    <li
        ><a class="select en" href="/">
            {{ trans('multi.Home') }}
        </a></li>
    <li
        ><a class=" en" href="/product">
            {{ trans('multi.Pro') }}
        </a></li>
    <li
        ><a class="en" href="/new">
            {{ trans('multi.New') }}
        </a></li>
        <li
        ><a class="en" href="/activity">

            {{ trans('multi.Activity') }}
        </a></li>
        <li
        ><a class="en" href="/video">

            {{ trans('multi.Vdo') }}
        </a></li>
    <li
        ><a class=" en" href="/contact">

            {{ trans('multi.Contact') }}
        </a></li>
</ul>

@endif

    </div>
</div>
