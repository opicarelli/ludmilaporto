<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            {{{ Lang::get('app.title_admin_login') }}}
        </title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.css')}}">
        <link rel="stylesheet" href="{{asset('assets/font-awesome-4.1.0/css/font-awesome.min.css')}}">
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{{ Lang::get('app.form_login_label_please_sign_in') }}}</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" id="email" name="email" type="text" value="{{ Input::old('email') }}" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" id="password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="remember" value="0">
                                            <input type="checkbox" name="remember" tabindex="4" value="1">Remember Me
                                        </label>
                                    </div>
                                    
                                    @if ( Session::get('error') )
                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                    @endif

                                    @if ( Session::get('notice') )
                                    <div class="alert">{{ Session::get('notice') }}</div>
                                    @endif

                                    <button tabindex="3" type="submit" class="btn btn-lg btn-primary btn-block">{{ Lang::get('confide::confide.login.submit') }}</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
