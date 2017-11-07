@extends('admin.layouts.default')

@section('title')
{{ $title }} :: @parent
@stop

@section('styles')
    <style>
        .fileinput-button {
            position: relative;
            overflow: hidden;
        }

        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            -ms-filter: 'alpha(opacity=0)';
            font-size: 200px;
            direction: ltr;
            cursor: pointer;
        }
    </style>
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
            <li>
                <i class="fa fa-edit"></i> <a href="{{ URL::to('admin/albums') }}">{{ Lang::get('app.title_admin_albums') }}</a>
            </li>
            <li class="active">
                <i class="fa fa-edit"></i> {{ $title }}
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" enctype="multipart/form-data" action="@if (isset($album)){{ URL::to('admin/albums/' . $album->id . '/edit') }}@endif">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-error" role="alert">{{Session::get('error')}}</div>
                @endif

                <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
                    <label class="control-label">{{ Lang::get('app.form_admin_albums_create_edit_label_title') }}</label>
                    <input type="text" name="title" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}" value="{{ Input::old('title', isset($album) ? $album->title : null) }}">
                    {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                </div>
                <div class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
                    <label class="control-label">{{ Lang::get('app.form_admin_albums_create_edit_label_content') }}</label>
                    <textarea name="content" class="form-control" rows="3">{{ Input::old('content', isset($album) ? $album->content : null) }}</textarea>
                    {{ $errors->first('content', '<span class="help-block">:message</span>') }}
                </div>
                <div class="form-group {{{ $errors->has('image') ? 'has-error' : '' }}}">
                    <label class="control-label">{{ Lang::get('app.form_admin_albums_create_edit_label_image') }}</label>
                    <div class="form-group">
                        <span class="btn btn-primary fileinput-button">
                            <i class="glyphicon glyphicon-picture"></i>
                            <span>{{ Lang::get('app.common_button_select_image') }}</span>
                            <input type="file" id="image-file" name="image" accept="image/*">
                            <label id="name-image"></label>
                        </span>
                    </div>
                    {{ $errors->first('image', '<span class="help-block">:message</span>') }}
                </div>

                <div class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}}">
                    <label class="control-label">{{ Lang::get('app.form_admin_albums_create_edit_label_type') }}</label>
                    <select id="album-type" name="type" class="form-control">
                        <option value="PICTURE" @if (isset($album) && $album->type == "PICTURE"){{ "selected" }}@endif>{{ Lang::get('app.form_admin_albums_create_edit_label_type_picture') }}</option>
                        <option value="VIDEO" @if (isset($album) && $album->type == "VIDEO"){{ "selected" }}@endif>{{ Lang::get('app.form_admin_albums_create_edit_label_type_video') }}</option>
                        <option value="LINK" @if (isset($album) && $album->type == "LINK"){{ "selected" }}@endif>{{ Lang::get('app.form_admin_albums_create_edit_label_type_link') }}</option>
                    </select>
                    {{ $errors->first('type', '<span class="help-block">:message</span>') }}
                </div>

                <div class="form-group" id="album-link">
                    <label class="control-label">{{ Lang::get('app.form_admin_albums_create_edit_label_link') }}</label>
                    <input type="text" name="link" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}" value="{{ Input::old('link', isset($album) ? $album->link : null) }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ Lang::get('app.common_button_confirm') }}</button>
                <button type="reset" class="btn btn-default">{{ Lang::get('app.common_button_reset') }}</button>
            </form>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function () {

            var showHideLink = function() {
                var type = $('#album-type option:selected').val();
                if (type == "LINK") {
                    $('#album-link').show();
                } else {
                    $('#album-link').hide();
                }
            };

            showHideLink();

            $('#image-file').on('change', function () {
                $('#name-image').text(this.files[0].name);
            });

            $('#album-type').on('change', function () {
                showHideLink();
            });

        });
    </script>
@stop