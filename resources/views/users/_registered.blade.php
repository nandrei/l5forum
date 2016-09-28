<div class="user_avatar">
    <a href="#">
        <img src="{{ URL::asset('img/guest.png') }}" title="View user status">
    </a>
</div>

<div class="user_info">
    <div style="padding-top: 12px">Welcome, <a href="#"><span> {{ Auth::user()->name }} </span></a>
        <span></span>
    </div>
    <div style="padding-top: 8px">
        <a href="#messages"><span>0</span>
            <span>
                <img src="{{ URL::asset('img/icons/messages.png') }}" alt title="View your messages">
            </span>
        </a>
        &ensp;
        <a href="#friends">
            <span>
                <img src="{{ URL::asset('img/icons/friends.png') }}" alt title="Open friends list">
            </span>
        </a>
        &ensp;
        <a href="#profile">
            <span>
                <img src="{{ URL::asset('img/icons/profile.png') }}" alt title="Edit your profile"> Profile
            </span>
        </a>
        &ensp;
        <a href="{{ url('/logout') }}"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <span>
                <img src="{{ URL::asset('img/icons/logout.png') }}" alt title="Log out"> Logout
            </span>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        &ensp;
    </div>
    <div class="clearfix"></div>
</div>

