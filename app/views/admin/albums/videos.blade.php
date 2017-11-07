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
            <form role="form" method="post" action="{{ URL::to('admin/albums/' . $album->id . '/videos') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group">
                    <label>{{ Lang::get('app.form_admin_albums_manage_videos_label_description') }}</label>
                    <input type="text" name="description" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}">
                </div>

                <div class="form-group">
                    <label>{{ Lang::get('app.form_admin_albums_manage_videos_label_link') }}</label>
                    <input type="text" name="link" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ Lang::get('app.common_button_add') }}</button>
                <button type="reset" class="btn btn-default">{{ Lang::get('app.common_button_reset') }}</button>

            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Lang::get('app.form_admin_albums_manage_videos_table_title') }}</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ Lang::get('app.form_admin_albums_manage_videos_table_description') }}</th>
                                <th>{{ Lang::get('app.form_admin_albums_manage_videos_table_link') }}</th>
                                <th>{{ Lang::get('app.form_admin_albums_manage_videos_table_actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($album->videos()->get() as $v)
                                <tr>
                                    <td>{{ $v->order }}</td>
                                    <td>{{ $v->description }}</td>
                                    <td>{{ $v->link }}</td>
                                    <td>-</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop