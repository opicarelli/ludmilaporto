<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--
        <meta name="keywords" content="@yield('keywords')" />
        <meta name="author" content="@yield('author')" />
        <meta name="description" content="@yield('description')" />
        <title>
            @section('title')
                Administration
            @show
        </title>
        -->

        <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters 
        <meta name="google-site-verification" content="">
        -->

        <!-- Dublin Core Metadata : http://dublincore.org/
        <meta name="DC.title" content="Project Name">
        <meta name="DC.subject" content="@yield('description')">
        <meta name="DC.creator" content="@yield('author')">
        -->

        <!--  Mobile Viewport Fix -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/plugins/metisMenu/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.css')}}">
        <link rel="stylesheet" href="{{asset('assets/font-awesome-4.1.0/css/font-awesome.min.css')}}">
        @yield('styles')

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/js/sb-admin-2.js')}}"></script>
        @yield('scripts')

    </head>

    <body>
        <div id="wrapper">
    
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{{ URL::to('admin') }}}">Ludmila Porto :: Admin</a>
                </div>
    
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{{ URL::to('admin/profile/show') }}}"><i class="fa fa-user fa-fw"></i> {{ Lang::get('app.common_menu_user_profile') }}</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{{ URL::to('user/logout') }}}"><i class="fa fa-sign-out fa-fw"></i> {{ Lang::get('app.common_menu_logout') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
    
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a {{ (Request::is('admin') ? ' class="active"' : '') }} href="{{{ URL::to('admin') }}}"><i class="fa fa-dashboard fa-fw"></i> {{ Lang::get('app.title_admin_dashboard') }}</a>
                            </li>
                            <li>
                                <a {{ (Request::is('admin/albums*') ? ' class="active"' : '') }} href="{{{ URL::to('admin/albums') }}}"><i class="fa fa-edit fa-fw"></i> {{ Lang::get('app.title_admin_albums') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
