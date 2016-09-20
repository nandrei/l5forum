<div class='dropdown-box'>
    <div class='dropdown-arrow arrowtop'></div>
    <div class="heading">Reset Password</div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form id="userlogin" method="post" action="{{ url('/password/email') }}">

        <div class="inlined {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="name"> E-Mail Address: </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <input class="submit" type="submit" value="Send Password Reset Link" style="margin-left: 66px">
        {{ csrf_field() }}
    </form>
</div>