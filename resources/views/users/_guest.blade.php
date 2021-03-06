<div class="user_avatar">
    <a class="login-toggle" href="#">
        <img src="{{ url('img/guest.png') }}" title="Guest">
    </a>
</div>

<div class="user_info">
    <div style="padding-top: 12px">Welcome, <a class="login-toggle" href="#"><span>Guest</span></a>
    </div>
    <div style="padding-top: 8px">
        <div class="dropdown" style="float: left; margin-right: 8px">
            <a id="login" href="#log" class="dropdown-tooggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                Login
            </a>
            <ul class="dropdown-menu" role="menu">
                @include('auth.login')
            </ul>
        </div>

        <div class="dropdown" style="float: left; margin-right: 8px">
            <a href="#reg" class="dropdown-tooggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Register
            </a>
            <ul class="dropdown-menu" role="menu">
                @include('auth.register')
            </ul>
        </div>

        <div class="dropdown" style="float: left">
            <a href="#reset" class="dropdown-tooggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Forgot password?
            </a>
            <ul class="dropdown-menu" role="menu">
                @include('auth.passwords._email')
            </ul>
        </div>&ensp;
    </div>
    <div class="clearfix"></div>
</div>