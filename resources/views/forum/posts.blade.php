@extends('default')

@section('content')

    <div class="forum-innercontent">
        <div class="forum-nav">
            <span>
                <a href="{{ url('/') }}"> lforum </a> >
                <a href="#"> Category </a> >
                <a href="#"> Subcategory </a> >
                <a href="#"> Topic </a>
            </span>
        </div>
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
                        <span class="small">#postnumber by</span>
                        <a href="#userdetails"><b><span class="userclasscolor">username</span></b></a>
                        <span style="position:relative; bottom:2px"></span>
                        <span class="small">at date - time GMT </span>
                        <span style="float:right"></span>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="120" align="center">
                        <img style="width:120px; max-height:180px" src="{{ URL::asset('img/guest.png') }}">
                        <div align="left" style="margin-bottom: 5px">
                            <div style="margin: 2px 5px">
                            <span class="small">
                                <b>Class: member</b>
                            </span>
                            </div>
                            <div style="margin: -2px 5px">
                            <span class="small">
                                <b>Posts: $x</b>
                            </span>
                            </div>
                            <div style="margin: -2px 5px">
                            <span class="small">
                                <b>Join date: <span class="small">date</span></b>
                            </span>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 10px">{{ $post['content'] }}</td>
                </tr>
            </table>
        @endforeach
    </div>

@endsection