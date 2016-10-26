<div class="user_avatar">
    <a href="{{ url('userdetails') }}?id={{ Auth::user()->id }}">
        <img style="width: 52px; height: 58px" src="{{ url(Auth::user()->avatar_path ?: 'img/guest.png') }}"
             title="View user status">
    </a>
</div>

<div class="user_info">
    <div style="padding-top: 12px">
        Welcome, <a href="{{ url('userdetails') }}?id={{ Auth::user()->id }}">
            <span> {{ Auth::user()->name }} </span>
        </a>
        <span class="class_color">
                [ ]
            </span>
    </div>
    <div style="padding-top: 8px">
        <a href="#messages">
            <span>
                0
            </span>
            <span>
                <img src="{{ url('img/icons/messages.png') }}" alt title="View your messages">
            </span>
        </a>
        &ensp;
        <a href="#friends">
            <span>
                <img src="{{ url('img/icons/friends.png') }}" alt title="Open friends list">
            </span>
        </a>
        &ensp;
        <a href="{{ url('profile') }}">
            <span>
                <img src="{{ url('img/icons/profile.png') }}" alt title="Edit your profile"> Profile
            </span>
        </a>
        &ensp;
        <a href="{{ url('/logout') }}"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <span>
                <img src="{{ url('img/icons/logout.png') }}" alt title="Log out"> Logout
            </span>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        &ensp;
    </div>
    <div class="clearfix"></div>
</div>

