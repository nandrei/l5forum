@extends('default')

@section('content')

    <div class="forum-innercontent">
        @foreach($categ as $category)
            <div class="forum-header">
                <a href="category?cat_id={{ $category['id'] }}">
                    <span>{{ $category['name'] }}</span>
                </a>
            </div>

            <div id="forummain" align="center">
                @if (isset($category['subcateg']))
                    @foreach($category['subcateg'] as $subcategory)
                        <div class="forumrow">
                            <div class="forumcell" align="left" style="width: 50%">
                        <span class="forumcellinside" style="padding: 5px">
                            <img src="{{ URL::asset('img/forum-newposts.png') }}">
                        </span>
                                <span class="forumcellinside">
                            <div>
                                <a href="subcategory?subcat_id={{ $subcategory['id'] }}">{{ $subcategory['name'] }}</a>
                            </div>

                            <div>Description</div>

                            <div style="font-size: 10px">Moderators:</div>
                        </span>
                            </div>

                            <div class="forumcell" align="center" style="width: 8%; font-size: 10px">
                        <span class="forumcellinside">
                            <div>$x</div>
                            <div>topics</div>
                        </span>
                            </div>

                            <div class="forumcell" align="center" style="width: 8%; font-size: 10px">
                        <span class="forumcellinside">
                            <div>$x</div>
                            <div>posts</div>
                        </span>
                            </div>

                            <div class="forumcell" align="left"
                                 style="width: 31%; padding-left: 10px; margin-left: 10px">
                        <span class="forumcellinside">
                            <div>
                                <a href="#last topic"><b>Last topic</b></a>
                            </div>
                            <div>
                                <span class="lastpostdate">date - time</span>
                                <span class="lastpostername">by username</span>
                            </div>
                        </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>

@endsection