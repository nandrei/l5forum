<div class='dropdown-box'>
    <div class='dropdown-arrow arrowtop'></div>
    <div class="heading">Login</div>
    <form id="userlogin {{ $errors->has('email', 'password') ? ' has-error' : '' }}" method="post"
          action="{{ url('/login') }}">
        {{ csrf_field() }}

        <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
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
    </form>
</div>
