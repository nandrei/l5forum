@extends('default')

@section('content')

    <div class="forum-innercontent">

        @include('partials.breadcrumbs')

        <div class="forum-header" style="margin-top: 55px">
            <span>{{ request()->segment(2) }}</span>
        </div>

        <div id="forummain" align="center">
            @if (isset($subcategories))
                @foreach($subcategories as $subcategory)
                    <div class="forumrow">
                        <div class="forumcell" align="left" style="width: 50%">
                            <span class="forumcellinside" style="padding: 5px">
                                <img src="{{ url('img/icons/forum-newposts.png') }}">
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
                                @if (isset($subcategory['no_posts']))
                                    <div>{{ $subcategory['no_posts'] }}</div>
                                    <div>posts</div>
                                @endif
                            </div>
                        </div>

                        <div class="forumcell" align="left"
                             style="width: 31%; padding-left: 10px; margin-left: 10px">
                            <div class="forumcellinside">
                                <div>
                                    @if(isset($subcategory['lasttopic_name']))
                                        <a href="../topic/{{ $subcategory['lasttopic_name'] }}?topic_id={{ $subcategory['lasttopic_id'] }}">
                                            <b>{{ $subcategory['lasttopic_name'] }}</b>
                                        </a>
                                    @endif
                                </div>
                                <div>
                                    @if (isset($subcategory['lastpost_date']))
                                        <span class="lastpostdate">{{ $subcategory['lastpost_date'] }} by</span>
                                        <span class="lastpostauthor">
                                                <a href="{{ url('userdetails') }}?id={{ $subcategory['lastpost_author_id'] }}">{{ $subcategory['lastpost_author'] }}</a>
                                        </span>
                                    @endif
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