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
            <li class="active">
                <i class="fa fa-edit"></i> {{ $title }}
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" action="{{ URL::to('admin/profile/edit') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group">
                    <label>{{ Lang::get('app.form_admin_users_edit_profile_label_name') }}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}" value="{{ Input::old('name', isset($user) ? $user->name : null) }}">
                </div>
                <div class="form-group">
                    <label>{{ Lang::get('app.form_admin_users_edit_profile_label_username') }}</label>
                    <input type="text" name="username" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}" value="{{ Input::old('username', isset($user) ? $user->username : null) }}">
                </div>
                <div class="form-group">
                    <label>{{ Lang::get('app.form_admin_users_edit_profile_label_email') }}</label>
                    <input type="text" name="email" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}" value="{{ Input::old('email', isset($user) ? $user->email : null) }}">
                </div>
                <div class="form-group">
                    <label>{{ Lang::get('app.form_admin_users_edit_profile_label_birthdate') }}</label>
                    <input type="text" name="birthdate" class="form-control" placeholder="{{ Lang::get('app.common_message_placeholder_enter_text') }}" value="{{ Input::old('birthdate', isset($user) ? $user->birthdate : null) }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ Lang::get('app.common_button_confirm') }}</button>
                <button type="reset" class="btn btn-default">{{ Lang::get('app.common_button_reset') }}</button>
            </form>
        </div>
    </div>

@stop