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

        @foreach($posts as $post)
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="colhead" colspan="2">
                        <span class="small">#{{ $post['postnumber'] }} by</span>
                        <a href="{{ url('userdetails') }}?id={{ $post['author_id'] }}">
                            <b><span class="userclasscolor">{{ $post['author'] }}</span></b></a>
                        <span style="position:relative; bottom:2px"></span>
                        <span class="small">at {{ $post['post_date'] }} - GMT</span>
                        <span style="float:right"></span>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="120" align="center">
                        <img style="width:120px; max-height:180px" src="{{ URL::asset('img/guest.png') }}">
                        <div align="left" style="margin-bottom: 5px">
                            <div style="margin: 2px 5px">
                                <span class="small"><b>Class: member</b></span>
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
                    <td style="padding: 10px">{{ $post['content'] }}</td>
                </tr>
            </table>
        @endforeach
    </div>

@endsection