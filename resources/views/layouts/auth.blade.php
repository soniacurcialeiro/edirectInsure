<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>EDirectInsure</title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
</head>
<body>

<main id="content-wrapper">
    <div class="awe-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><a href="{{ url('/') }}" title="Home"><img src="imgs/edirect.png" /></a></div>
            </div>
            <div class="awe-page-title">
                @yield('title')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            @if(Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer id="footer" class="footer">
    <div class="container">
        <span>Sónia Fernandes</span>
        <span>© 2016</span>
    </div>
</footer>

@yield('scripts')
</body>
</html>
