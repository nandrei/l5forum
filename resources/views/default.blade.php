<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('favicon.png') }}" type="image/x-icon">
    <title>lforum.tk</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

</head>

<body>
<a name="top"></a>
<div id="bg-shadow">
    <div class="header">
        <div class="subheader">
            <a href="{{ route('homepage') }}">
                <div id="logo" title="Lforum.tk"></div>
            </a>

            <div class="userbar">
                @if (Auth::guest())
                    @include('users._guest')
                @else
                    @include('users._registered')
                @endif
            </div>

            <div id="navigation">
                <div id="nav">
                    <ul>
                        <li class="fleft"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="fleft"><a href="#" id="search">Search</a></li>
                        <li class="fleft"><a href="{{ url('/members') }}">Members</a></li>
                        <li class="fleft"><a href="#">Rules</a></li>
                        <li class="fleft"><a target='_blank' href="//github.com/nandrei">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>

    <div id="container">

        <div id="search_form"></div>
        @yield('content')

    </div>

    <div id="footer">

        @include('footer')

    </div>

    <div id="copyright">
        <div id="copyrightInner">
            <span class="small">
                <b>&copy; l5forum | 2016 | <a target='_blank' href="//github.com/nandrei">Contact</a></b>
            </span>
            <div id="copyrightInnerRight">
                <span class="small">
                    <a href="#top" class="gotop" title="Go Top"
                       onclick="$('html,body').animate({scrollTop:0},'slow');return false;">Go Top</a>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="//code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="{{ url('js/app.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

</body>
</html>
