@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg" style="height: 410px; background-color: #22313f;">
            <div class="myprofile">
                <p class="user_photo">
                    <img class="user_photo" src="{{ url($user->avatar_path ?: 'img/icons/guest.png') }}" alt
                         title="{{ $user->name }}&#39;s Profile photo"/>
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
                        <b><span class="username">{{ $user->name }}</span></b>
                        @if(Auth::user()->id == $user->id)
                            <a href="{{ url('profile') }}">
                                <img style="height: 20px;" src="{{ url('img/icons/edit-profile.png') }}"
                                     title="Edit your profile"/>
                            </a>
                        @endif
                    </h1>
                    Member Since - {{ $user->created_at }}<br/>
                    @if ($user->user_status === 'online')
                        <span class="user_status" style="background: #7ba60d">Online</span>
                    @elseif ($user->user_status === 'offline')
                        <span class="user_status" style="background: gray">Offline</span>
                    @endif
                    <span class="activity_date">Last Active - {{ $user->last_activity_date }}</span>
                </div>

                <div class="tab-content">
                    <div id="user_info" class="tab-pane fade in active">
                        <ul class="data" style="margin: 0 auto">
                            <li>
                                <div class="inlined">
                                    <span class="label">Class:</span>
                                    <span class="row_data">{{ $user->class }}</span>
                                </div>
                                <hr class="style1">
                            </li>
                            <li>
                                <div class="inlined">
                                    <span class="label">Active Posts:</span>
                                    <span class="row_data">{{ $user->no_posts }}</span>
                                </div>
                                <hr class="style1">
                            </li>
                            <li>
                                <div class="inlined">
                                    <span class="label">Profile Views:</span>
                                    <span class="row_data">{{ $user->profile_views }}</span>
                                </div>
                                <hr class="style1">
                            </li>

                            <li>
                                <div class="inlined">
                                    <span class="label">Member Title:</span>
                                    <span class="row_data">{{ $user->member_title }}</span>
                                </div>
                                <hr class="style1">
                            </li>

                            <li>
                                <div class="inlined">
                                    <span class="label">Country:</span>
                                    <span class="row_data">{{ $user->country }}</span>
                                </div>
                                <hr class="style1">
                            </li>

                            <li>
                                <div class="inlined">
                                    <span class="label">Gender:</span>
                                    <span class="row_data">
                                        <img style="top: 2px" src="{{ url('img/icons/male-icon.png') }}"
                                             alt="Male"/> {{ $user->gender }}
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
