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
        <div class="col-lg-12">
            <h3>Upload new pictures</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{ Form::open(array('url' => URL::to('admin/albums/' . $album->id . '/pictures'), 'method' => 'post', 'id' => 'upload-image', 'enctype' => 'multipart/form-data', 'files' => true)) }}

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group">
                    <span class="btn btn-primary fileinput-button">
                        <i class="glyphicon glyphicon-picture"></i>
                        <span>{{ Lang::get('app.common_button_select_images') }}</span>
                        <input type="file" id="multiple-files" name="file[]" multiple="multiple" accept="image/*">
                    </span>
                </div>

                <div class="form-group" id="panel-files">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> {{ Lang::get('app.form_admin_albums_manage_pictures_panel_title') }}
                        </div>
                        <div class="panel-body">
                            <div id="pictures"></div>

                            <div id="form-buttons">
                                <button type="submit" class="btn btn-success start">
                                    <i class="glyphicon glyphicon-upload"></i>
                                    <span>{{ Lang::get('app.common_button_start_upload') }}</span>
                                </button>
                                <button type="reset" id="reset" class="btn btn-warning cancel">
                                    <i class="glyphicon glyphicon-ban-circle"></i>
                                    <span>{{ Lang::get('app.common_button_cancel_upload') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            {{ Form::close() }}

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3>Uploaded pictures</h3>
        </div>
    </div>

    <div class="row">
        @foreach($album->pictures()->get() as $p)
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="{{ URL::to('uploads/images/album/picture/' . $p->image_src) }}" alt="">
                <div class="caption">
                    <p>{{$p->description}}</p>
                    <p>
                        <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#deleteModal"
                                data-pictureurl="{{ URL::to('admin/albums/' . $album->id . '/pictures/' . $p->id . '/delete') }}">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>{{ Lang::get('app.common_button_delete') }}</span>
                        </button>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ Lang::get('app.common_button_close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>{{ Lang::get('app.form_admin_albums_manage_pictures_confirm_delete') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('app.common_button_cancel') }}</button>
                    <a class="btn btn-primary" href="#">{{ Lang::get('app.common_button_confirm') }}</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#form-buttons').hide();
            $('#panel-files').hide();

            $('#multiple-files').on('change', function () {
                $('#form-buttons').show();
                $('#panel-files').show();
                $('#notifications').hide();

                var picturesDiv = $('#pictures');
                picturesDiv.html('');
                $.each(this.files, function(idx, obj) {
                    var div = $("<div class='form-group'>");
                    var lbl = $("<label>");
                    lbl.text(obj.name);
                    var input = $("<input class='form-control' placeholder='Enter description here' name='description[]' maxlength='45'>");
                    div.append(lbl).append(input);
                    picturesDiv.append(div);
                });
            });

            $('#reset').on('click', function () {
                $('#pictures').html('');
                $('#panel-files').hide();
                $('#form-buttons').hide();
            });

            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var pictureUrl = button.data('pictureurl');
                var modal = $(this);
                modal.find('a.btn-primary').attr('href', pictureUrl);
            })
        });
    </script>
@stop