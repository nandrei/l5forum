@extends('default')

@section('content')

    <div class="forum-innercontent">
        <div class="forum-quicknav" style="margin-bottom: 50px">
            <span>
                <a href="{{ url('/') }}"> lforum </a> >
                <a href="{{ request()->segment(2) }}?cat_id={{ $cat_id }}">{{ request()->segment(2) }}</a>
            </span>
        </div>
        <div class="forum-header">
            <span> {{ request()->segment(2) }} </span>
        </div>

        <div id="forummain" align="center">
            @if (isset($subcateg))
                @foreach($subcateg as $subcategory)
                    <div class="forumrow">
                        <div class="forumcell" align="left" style="width: 50%">
                            <span class="forumcellinside" style="padding: 5px">
                                <img src="{{ URL::asset('img/icons/forum-newposts.png') }}">
                            </span>
                            <div class="forumcellinside">
                                <div>
                                    <a href="../subcategory/{{ $subcategory['name'] }}?subcat_id={{ $subcategory['id'] }}">
                                        {{ $subcategory['name'] }}</a>
                                </div>

                                <div>{{ $subcategory['description'] }}</div>

                                <div style="font-size: 10px">Moderators: {{ $subcategory['moderators'] }}</div>
                            </div>
                        </div>

                        <div class="forumcell" align="center" style="width: 8%; font-size: 10px">
                            <div class="forumcellinside">
                                <div>{{ $subcategory['no_topics'] }}</div>
                                <div>topics</div>
                            </div>
                        </div>

                        <div class="forumcell" align="center" style="width: 8%; font-size: 10px">
                            <div class="forumcellinside">
                                <div>{{ $subcategory['no_posts'] }}</div>
                                <div>posts</div>
                            </div>
                        </div>

                        <div class="forumcell" align="left"
                             style="width: 31%; padding-left: 10px; margin-left: 10px">
                            <div class="forumcellinside">
                                <div>
                                    <a href="../topic/{{ $subcategory['lasttopic_name'] }}?topic_id={{ $subcategory['lasttopic_id'] }}">
                                        <b>{{ $subcategory['lasttopic_name'] }}</b>
                                    </a>
                                </div>
                                <div>
                                    <span class="lastpostdate">{{ $subcategory['lastpost_date'] }} by</span>
                                    <span class="lastpostername">{{ $subcategory['lastpost_author'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection