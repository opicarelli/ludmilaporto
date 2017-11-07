<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="ludmila porto, livros objetos" />
        <meta name="author" content="Ludmila Porto" />
        <meta name="description" content="Trabalhos de Ludmila Porto" />

        <title>Ludmila Porto</title>

        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

        <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
    </head>
    <body>
        <div id="container-works">
            <div id="header-works">
                <div id="logo-title-works">
                    <a href="index.html">Ludmila Porto</a>
                </div>
                <div id="logo-social-networking">
                    <ul>
                        <li class="facebook"><a href="https://pt-br.facebook.com/ludmila.porto.58" target="_blank">Facebook</a></li>
                        <li class="gmail"><a href="mailto:lud.porto.cioffi@gmail.com" target="_blank">Gmail</a></li>
                        <li class="linkedin"><a href="http://www.linkedin.com/pub/ludmila-porto/26/97/569" target="_blank">Linkedin</a></li>
                    </ul>
                </div>
            </div>
            <div id="page-works">
                <div id="image-set-works" class="presentation">
                    <ul>
                    @foreach($albums as $a)
                        <li>
                            <a class="works-image-link" href="@if($a->type == "LINK"){{ $a->link }}@else{{ URL::to($a->slug) }}@endif">
                                <img class="works-image" src="{{ URL::to('uploads/images/album/' . $a->image_src) }}" width="150" height="150"/>
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div id="footer">
            </div>
        </div>
    </body>
</html>