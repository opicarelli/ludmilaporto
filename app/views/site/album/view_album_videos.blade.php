@extends('site.layouts.album')

@section('title')
{{ $album->title }} ::
@parent
@stop

@section('content')
<div id="page">
    <div id="image-set-title">
        <a href="{{ URL::to('/') }}">{{ $album->title }}</a>
    </div>
    <div id="image-set">
        @foreach ($videos as $v)
            <a data-video-id="{{$v->link}}" class="works-image-link video-link" href="#">
                <img class="works-image" src="{{ asset('assets/css/img/youtube.png') }}" width="150" height="150" alt="{{$v->description}}"/>
            </a>
        @endforeach
    </div>
</div>
<div id="footer">
</div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".video-link").jqueryVideoLightning({
                autoplay: 1,
                backdrop_color: "#ddd",
                backdrop_opacity: 0.6,
                glow: 20,
                glow_color: "#000"
            });
        });
    </script>
@stop