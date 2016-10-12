@extends('default')

@section('content')

    <div class="forum-innercontent">
        @foreach($categories as $category)
            <div class="forum-header">
                <a href="category/{{ $category['name'] }}?cat_id={{ $category['id'] }}">
                    <span>{{ $category['name'] }}</span>
                </a>
            </div>

            <div id="forummain" align="center">
                @if (isset($category['subcategories']))
                    @foreach($category['subcategories'] as $subcategory)
                        <div class="forumrow">
                            <div class="forumcell" align="left" style="width: 50%">
                                <div class="forumcellinside" style="padding: 5px">
                                    <img src="{{ URL::asset('img/icons/forum-newposts.png') }}">
                                </div>
                                <div class="forumcellinside">
                                    <div>
                                        <a href="subcategory/{{ $subcategory['name'] }}?subcat_id={{ $subcategory['id'] }}">{{ $subcategory['name'] }}</a>
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
                                            <a href="topic/{{ $subcategory['lasttopic_name'] }}?topic_id={{ $subcategory['lasttopic_id'] }}">
                                                <b>{{ $subcategory['lasttopic_name'] }}</b>
                                            </a>
                                        @endif
                                    </div>
                                    <div>
                                        @if (isset($subcategory['lastpost_date']))
                                            <span class="lastpostdate">{{ $subcategory['lastpost_date'] }} by</span>
                                            <span class="lastpostername">{{ $subcategory['lastpost_author'] }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>

@endsection