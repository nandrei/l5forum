<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
    <title>l5forum</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
<a name="top"></a>
<div id="bg-shadow">
    <div class="header">
        <div class="subheader">
            <a href="{{ route('homepage') }}">
                <div id="logo" title="L5forum.ro"></div>
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
                        <li class="fleft active"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="fleft"><a href="#">Cautare</a></li>
                        <li class="fleft"><a href="#">Members</a></li>
                        <li class="fleft"><a href="#">Regulament</a></li>
                        <li class="fleft"><a href="//github.com/nandrei">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>

    <div id="container">

        @yield('content')

    </div>

    <div id="footer">
        <table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
            <tr>
                <td colspan="4" height="28" align="center">
                    <span class="bold">Forum info (this data is based on activity from over 5 minutes ago)
                    </span>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle"><img src="" alt="Who is online"/></td>
                <td class="row1" align="left">
                    <span class="gensmall">
                        In total are <b>$k</b> online users : $k Registered, $k Hidden si $k Guests &nbsp;<br/>
                        The most connected users were <b>$k</b> on Thu Jul 13, 2006 6:53 pm<br/>
                        Today registered: $k
                    </span>
                </td>
                <td align="center" valign="middle"><img src="" alt="Forum status"/></td>
                <td class="row2" align="left">
                    <span class="gensmall">
                        The number of writen articles is <b>$k</b><br/>
                        We have <b>$k</b> registered users<br/>
                        The newest registered user is: <b><a href="">$x</a></b>
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div id="copyright">
        <div id="copyrightInner">
            <span class="small">
                <b>&copy; l5forum | 2016 | <a href="//github.com/nandrei">Contact</a></b>
            </span>
            <div id="copyrightInnerRight">
                <span class="small">
                    <a href="#top" class="gotop" title="Go Top"
                       onclick="$('html,body').animate({scrollTop:0},'slow');return false;">Go Top</a>
                </span>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
</div>
</body>
</html>
