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
        @foreach ($pictures as $p)
            <a class="works-image-link" href="{{ 'https://s3-sa-east-1.amazonaws.com/ludmilaporto/uploads/images/album/picture/' . $p->image_src }}" data-lightbox="drawings-set" title="{{ $p->description }}">
                <img class="works-image" src="{{ 'https://s3-sa-east-1.amazonaws.com/ludmilaporto/uploads/images/album/picture/' . $p->thumb_src }}" width="150" height="150" />
            </a>
        @endforeach
    </div>
</div>
<div id="footer">
</div>
@stop
