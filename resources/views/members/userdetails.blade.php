@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg" style="height: 410px; background-color: #22313f;">
            <div class="myprofile">
                <p class="user_photo">
                    <img class="user_photo" src="{{ URL::asset("img/guest.png") }}" alt="user&#39;s Photo"/>
                </p>

                <ul class="tab-pane">
                    <li id="tab_info" class="active"><a data-toggle="tab" href="#user_info">Info</a></li>
                    <li id="tab_topics"><a data-toggle="tab" href="#topics">Topics</a></li>
                    <li id="tab_posts"><a data-toggle="tab" href="#posts">Posts</a></li>
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

                <div class="tab-content">
                    <div id="user_info" class="tab-pane fade in active">
                        <ul class="data" style="margin: 0 auto">
                            <li>
                                <div class="inlined">
                                    <span class="label">Class:</span>
                                    <span class="row_data">{{ $user[0]['class'] }}</span>
                                </div>
                                <hr class="style1">
                            </li>
                            <li>
                                <div class="inlined">
                                    <span class="label">Active Posts:</span>
                                    <span class="row_data">0</span>
                                </div>
                                <hr class="style1">
                            </li>
                            <li>
                                <div class="inlined">
                                    <span class="label">Profile Views:</span>
                                    <span class="row_data">0</span>
                                </div>
                                <hr class="style1">
                            </li>

                            <li>
                                <div class="inlined">
                                    <span class="label">Member Title:</span>
                                    <span class="row_data">{{ $user[0]['member_title'] }}</span>
                                </div>
                                <hr class="style1">
                            </li>

                            <li>
                                <div class="inlined">
                                    <span class="label">Country:</span>
                                    <span class="row_data">{{ $user[0]['country'] }}</span>
                                </div>
                                <hr class="style1">
                            </li>

                            <li>
                                <div class="inlined">
                                    <span class="label">Gender:</span>
                                    <span class="row_data">
                                        <img style="top: 2px" src="{{ URL::asset('img/icons/male-icon.png') }}"
                                             alt="Male"/> {{ $user[0]['gender'] }}
                                    </span>
                                </div>
                                <hr class="style1">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
