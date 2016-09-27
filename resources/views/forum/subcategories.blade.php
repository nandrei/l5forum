@extends('default')

@section('content')

    <div class="forum-innercontent">
        <div class="forum-nav" style="margin-bottom: 50px">
            <span>
                <a href="{{ url('/') }}"> lforum </a> >
                <a href="#"> Category </a> >
            </span>
        </div>
        <div class="forum-header">
            <span>$category['name']</span>
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
                                    <a href="subcategory?subcat_id={{ $subcategory['id'] }}">{{ $subcategory['name'] }}</a>
                                </div>

                                <div>Description</div>

                                <div style="font-size: 10px">Moderators:</div>
                            </div>
                        </div>

                        <div class="forumcell" align="center" style="width: 8%; font-size: 10px">
                            <div class="forumcellinside">
                                <div>$x</div>
                                <div>topics</div>
                            </div>
                        </div>

                        <div class="forumcell" align="center" style="width: 8%; font-size: 10px">
                            <div class="forumcellinside">
                                <div>$x</div>
                                <div>posts</div>
                            </div>
                        </div>

                        <div class="forumcell" align="left"
                             style="width: 31%; padding-left: 10px; margin-left: 10px">
                            <div class="forumcellinside">
                                <div>
                                    <a href="#last topic"><b>Last topic</b></a>
                                </div>
                                <div>
                                    <span class="lastpostdate">date - time</span>
                                    <span class="lastpostername">by username</span>
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