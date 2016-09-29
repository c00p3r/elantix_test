<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    @yield('head')

</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="navbar-btn">
                        <div class="btn-group">
                            <a href="{{ action('UserController@show', Auth::id()) }}"
                               class="btn btn-default">{{ Auth::user()->username }}</a>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    {!! Form::open(['url' => '/logout', 'id' => 'logout-form', 'class' => 'hidden']) !!}
                                    {{ Form::close() }}
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="messages-container">
    @if (Session::has('messages'))
        @foreach(Session::get('messages') as $message)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-{{ $message['type'] }} alert-dismissible">
                        <button class="close" data-dismiss="alert">&times;</button>
                        {{ $message['text'] }}
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

@yield('content')

<script src="/js/vendors.js"></script>

@yield('footer')

</body>
</html>
