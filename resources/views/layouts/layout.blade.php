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
                <div>
                    <div class="col-md-12">
                        <a href="{{ url('/') }}" title="Home"><img src="/imgs/edirect.png" /></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @if (!Auth::user())
                <div class="pull-right">
                    <div class="col-md-12">
                        <a href="{{ url('/login') }}">Login</a> |
                        <a href="{{ url('/register') }}">Register</a>
                    </div>
                </div>
            @else
                <div class="pull-right">
                    <div class="col-md-12">
                        <a href="{{ url('/projects') }}">My Projects</a> |
                        <a href="{{ url('/logout') }}">Logout</a>
                    </div>
                </div>
            @endif
            <div class="col-md-12 awe-page-title"><br>
                <h1>@yield('title')</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12"><br><br>
                        <div class="panel panel-default">
                            @yield('header')

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
            <div class="pull-right">
                <div class="col-md-12">
                    <span>Sónia Fernandes</span>
                    <span>© 2016</span>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
