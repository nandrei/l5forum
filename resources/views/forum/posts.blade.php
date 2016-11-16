@extends('default')

@section('content')

    <div class="forum-innercontent">
        <!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. -->
        <link href="{!! asset('../resources/assets/froala_editor/css/froala_style.min.css') !!}" rel="stylesheet"
              type="text/css"/>

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
                <input id="topic_id" type="hidden" name="topic_id" value="{{ $topic_id }}">
                <input id="newreply" type="button" value="Reply to this topic" class="btn"/>
            @else
                <input class="login-toggle" type=button value="Log in to reply" class="btn"/>
            @endif
        </div>
        <div class="clearfix"></div>

        @foreach($posts as $post)
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="colhead" colspan="2">
                        <span class="small">#{{ $post['postnumber'] }} by</span>
                        <a href="{{ url('userdetails') }}?id={{ $post['author_id'] }}">
                            <b><span class="userclasscolor">{{ $post['author_name'] }}</span></b>
                        </a>
                        <span style="position:relative; bottom:2px"></span>
                        <span class="small">at {{ $post['post_date'] }} - GMT</span>
                        <span class="small" style="float:right">
                            @if(Auth::user())
                                @if(Auth::user()->id == $post['author_id'])
                                    <button class="editpost" value="{{ $post['post_id'] }}" title="Edit post"></button>
                                    {{--<img class="editpost" style="height: 20px; margin-right: 15px; cursor:pointer" src="{{ url('img/icons/edit-post.png') }}" title="Edit post"/>--}}
                                @endif
                            @endif
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="120" align="center">
                        <img style="width:120px; max-height:180px"
                             src="{{ url($post['avatar_path'] ?: 'img/icons/guest.png') }}">
                        <div align="left" style="margin-bottom: 5px">
                            <div style="margin: 2px 5px">
                                <span class="small"><b>Class: {{ $post['class'] }}</b></span>
                            </div>
                            <div style="margin: -2px 5px">
                                <span class="small"><b>Posts: {{ $post['no_posts'] }}</b></span>
                            </div>
                            <div style="margin: -2px 5px">
                                <span class="small"><b>Member since: </b></span>
                            </div>
                            <div style="margin: -2px 5px">
                                <span class="small"><b>{{ $post['join_date'] }}</b></span>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 10px">
                        <div class="post_content">
                            <div class="fr-view">
                                {!! $post['content'] !!}
                            </div>

                            @if(isset($post['is_edited']))
                                <div class="small">
                                    Last edited by {{ $post['author_name'] }} on {{ $post['edit_date'] }}
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
            @if(Auth::user())
                @if(Auth::user()->id == $post['author_id'])
                    <div id="edit_post{{ $post['post_id'] }}"></div>
                @endif
            @endif
        @endforeach
        <div id="html_editor"></div>
    </div>

@endsection