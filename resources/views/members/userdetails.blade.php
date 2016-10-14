@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg">
            <div class="myprofile">
                <p class="user_photo">
                    <img class="user_photo" src="{{ URL::asset("img/guest.png") }}" alt="user&#39;s Photo"/>
                </p>

                <ul class="tab-pane">
                    <li id="tab_info" class="tab_toggle active" data-tabid="user_info">
                        <a href="#">Info</a>
                    </li>
                    <li id="tab_topics" class=" tab_toggle" data-tabid="topics">
                        <a href="?tab=topics" title="View Topics">Topics</a>
                    </li>
                    <li id="tab_posts" class=" tab_toggle" data-tabid="posts">
                        <a href="?tab=posts" title="View Posts">Posts</a>
                    </li>
                </ul>
            </div>

            <div class="profile_content">
                <div class="profile_main">
                    <h1 class="username" style="font-size: large">
                        <b><span class="username">{{ $user[0]['name'] }}</span></b>
                    </h1>
                    Member Since - {{ $user[0]['created_at'] }}<br/>
                    <span data-tooltip="user status...">Online/Offline</span>
                    <span class="activity_date">Last Active - {{ session()->get('last_activity') }}</span>
                </div>

                <div class="profile_stats">
                    <ul class="data">
                        <li>
                            <div>
                                <span class="row_title">Class</span>
                                <span class="row_data">Member</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <span class="row_title">Active Posts</span>
                                <span class="row_data">0</span>
                            </div>
                        </li>
                        <li>
                            <span class="row_title">Profile Views</span>
                            <span class="row_data">0</span>
                        </li>

                        <li>
                            <div>
                                <span class="row_title">Member Title</span>
                                <span class="row_data">New member</span>
                            </div>
                        </li>

                        <li>
                            <div>
                                <span class="row_title">Country</span>
                                <span class="row_data">Romania</span>
                            </div>
                        </li>

                        <li>
                            <div>
                                <span class="row_title">Gender</span>
                                <span class="row_data"><img src="{{ URL::asset('img/icons/male-icon.png') }}"
                                                            alt="Male"/> Male
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
