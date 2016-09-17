<div class="user_avatar">
    <a href="#">
        <img src="{{ URL::asset('img/guest.png') }}" title="Guest">
    </a>
</div>

<div class="user_info">
    <div style="padding-top: 12px">Welcome, <a href="#"><span>Guest</span></a>
    </div>
    <div style="padding-top: 8px">
        <div class="dropdown" style="float: left; margin-right: 8px">
            <a href="#log" class="dropdown-tooggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
                @include('auth.passwords.email')
            </ul>
        </div>&ensp;
    </div>
    <div class="clearfix"></div>
</div>