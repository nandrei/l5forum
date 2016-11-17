<div class='dropdown-box'>
    <div class='dropdown-arrow arrowtop'></div>
    <div class="heading">Login</div>
    <form id="userlogin " method="post" action="{{ url('/login') }}">
        <p>
            {{ $errors->has('email', 'password') ? ' has-error' : '' }}
        </p>
        <input id="name" type="text" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif

        <input id="password" type="password" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
        @endif

        <input type="checkbox" style="width: 13px; margin-right: 96px; float: right" name="remember">
        <span style="padding: 5px"> Remember Me </span><br><br>

        <input class="submit" type="submit" value="Login" style="width: 100px">
        {{ csrf_field() }}
    </form>
</div>
