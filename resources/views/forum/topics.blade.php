@extends('default')

@section('content')

    <div class="forum-innercontent">

        @include('partials.breadcrumbs')

        <div align="left" style="float:left;margin:10px 0 5px 25px;">
            <div class="forumpager">
                <span><a>&laquo;</a></span>&nbsp;
                <span class="current">1</span>&nbsp;
                <span><a>&raquo;</a></span>
            </div>
        </div>
        <div style="float:right;margin:14px 25px 0 0;">
            @if(Auth::user())
                <form method="get" action="{{ route('newtopic') }}">
                    <input type="hidden" name="action" value="newtopic">
                    <input type="hidden" name="subcat_id" value="{{ $subcat_id }}">
                    <input type=submit value="New topic" alt="Create new topic" class="btn"/>
                </form>
            @else
                <input id="login-toogle" type=button value="Log in to create new topic" class="btn"/>
            @endif
        </div>
        <div class="clearfix"></div>

        <form action="?" method="post" name="multiact">
            <div id="viewforum">
                <div class="viewforumheader">
                    <div class="viewforumcell" align="left" style="width:50%"><b>Topics</b></div>
                    <div class="viewforumcell" align="center" style="width:15%"><b>Replies</b></div>
                    <div class="viewforumcell" align="center" style="width:15%"><b>Views</b></div>
                    <div class="viewforumcell" align="center" style="width:20%"><b>Last post</b></div>
                    <div class="clearfix"></div>
                </div>
                @foreach($topics as $topic)
                    <div class="viewforumrow">
                        <div class="viewforumcell" align="left" style="width:50%">
                            <div class="viewforumcellinside" style="padding:0 15px 0 5px">
                                <img src={{ url('img/icons/forum-newposts.png') }} alt=""/>
                            </div>
                            <div class="viewforumcellinside">
					        <div>
                                <a href="../topic/{{ $topic['name'] }}?topic_id={{ $topic['id'] }}">
                                    <b>{{ $topic['name'] }}</b>
                                </a>
                            </div>
                                <div style="margin-top:2px" class="startedby">
                                    <span>Started by
                                        <a href="{{ url('userdetails') }}?id={{ $topic['author_id'] }}">
                                            <b>{{ $topic['author_name'] }}</b>
                                        </a></span>
                                    <span style="margin-left:15px">
                                        <span class="minipager">
                                            <span><a href=&page=1>1</a></span>
                                            <span><a href=&page=2>2</a></span>
                                            <span><a href=&page=3>3</a></span>
                                            <span class="gotopage"><a href=?action&gotopage>...</a></span>
                                            <span><a href=&page=last>x</a></span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="viewforumcell" align="center" style="width:15%; font-size:10px">
                            <div class="viewforumcellinside">
                                <div>{{ $topic['replies'] }}</div>
                            </div>
                        </div>
                        <div class="viewforumcell" align="center" style="width:15%; font-size:10px">
                            <div class="viewforumcellinside">
                                <div>{{ $topic['views'] }}</div>
                            </div>
                        </div>
                        <div class="viewforumcell" align="center" style="width:20%">
                            <div class="viewforumcellinside">
                                <div>
                                    <a href="{{ url('userdetails') }}?id={{ $topic['lastpost_author_id'] }}">
                                        <b>{{ $topic['lastpost_author'] }}</b>
                                    </a>
                                </div>
                                <div class="lastpost_date">{{ $topic['lastpost_date'] }}</div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </form>
    </div>

@endsection