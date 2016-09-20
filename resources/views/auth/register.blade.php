<div class='dropdown-box'>
    <div class='dropdown-arrow arrowtop'></div>
    <div class="heading">Register</div>

    <form id="user-reg" method="post" action="{{ url('/register') }}">
        <div class="inlined {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name"> Name: </label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="inlined {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="name"> Email: </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="inlined {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="name"> Password: </label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="inlined {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="name"> Confirm <br> Password: </label>
            <input id="password-confirm" type="password" name="password_confirmation" required><br><br>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
        <input class="submit" type="submit" value="Register" style="width: 100px">
        {{ csrf_field() }}
    </form>
</div>



