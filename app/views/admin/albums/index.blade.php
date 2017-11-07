@extends('admin.layouts.default')

@section('title')
{{ $title }} :: @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title }}</h1>
        </div>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="{{ URL::to('admin') }}">{{ Lang::get('app.title_admin_dashboard') }}</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> {{ $title }}
            </li>
        </ol>
    </div>

    @foreach($albums as $a)
    <hr>
    <div class="row">
        <div class="col-md-2">
            <a href="#">
                <img class="img-responsive" src="{{ URL::to('uploads/images/album/' . $a->image_src) }}" alt="">
            </a>
        </div>
        <div class="col-md-3">
            <h3>{{ $a->title }}</h3>
            <p>{{ $a->content }}</p>
            <a class="btn btn-primary" href="{{ URL::to('admin/albums/' . $a->id . '/edit') }}">
                <i class="glyphicon glyphicon-edit"></i>
                <span>{{ Lang::get('app.common_button_edit') }}</span>
            </a>
            @if($a->type == "PICTURE")
            <a class="btn btn-default" href="{{ URL::to('admin/albums/' . $a->id . '/pictures') }}">
                <i class="glyphicon glyphicon-picture"></i>
                <span>{{ Lang::get('app.common_button_pictures') }}</span>
            </a>
            @elseif($a->type == "VIDEO")
            <a class="btn btn-default" href="{{ URL::to('admin/albums/' . $a->id . '/videos') }}">
                <i class="glyphicon glyphicon-film"></i>
                <span>{{ Lang::get('app.common_button_videos') }}</span>
            </a>
            @endif
        </div>
    </div>
    @endforeach
@stop