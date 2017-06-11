<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Stores App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{--<link rel="stylesheet" href="/css/app.css">--}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <nav>
        <div class="nav-wrapper cyan darken-1">
            <a href="/" class="brand-logo center">Stores App</a>
            {{--<ul id="nav-mobile" class="left hide-on-med-and-down">--}}
                {{--<li><a href="sass.html">Sass</a></li>--}}
                {{--<li><a href="badges.html">Components</a></li>--}}
                {{--<li><a href="collapsible.html">JavaScript</a></li>--}}
            {{--</ul>--}}
        </div>
    </nav>
    @yield('content')
    <footer class="page-footer cyan darken-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    @yield('footer-content')
                </div>
                <div class="col l4 offset-l2 s12">
                    @yield('footer-link')
                    {{--<h5 class="white-text">Links</h5>--}}
                    {{--<ul>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>--}}

                    {{--</ul>--}}
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                @yield('footer-copyright')
                {{--© 2014 Copyright Text--}}
                {{--<a class="grey-text text-lighten-4 right" href="#!">More Links</a>--}}
            </div>
        </div>
    </footer>
    <script src="//code.jquery.com/jquery-3.2.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="/js/app.js"></script>
    @yield('js')
    </body>
</html>
