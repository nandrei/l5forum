@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg">
            <div align="center">
                <h1>Forum Search</h1>
            </div>
            <div align="center">
                <b>{{ $no_results }} results for "{{ $keywords }}"</b>
            </div>

            <div align="left" style="float:left;margin:10px 0 5px 25px;">
                <div class="forumpager">
                    <span><a>&laquo;</a></span>&nbsp;
                    <span class="current">1</span>&nbsp;
                    <span><a>&raquo;</a></span>
                </div>
            </div>
            <div class="clearfix"></div>

            <table id="searchresults" width="70%" cellspacing="0" cellpadding="5">
                <tbody>
                <tr>
                    <td class="colhead" width="5%"></td>
                    <td class="colhead">Forum</td>
                    <td class="colhead">Topic</td>
                    <td class="colhead">Author</td>
                    <td class="colhead">Last post</td>
                </tr>
                @if(isset($results))
                    @foreach($results as $result)
                        <tr>
                            <td>
                                <img src={{ url('img/icons/forum-newposts.png') }} alt=""/>
                            </td>
                            <td align="left">
                                <a href="{{ url('subcategory') }}/{{ $result['subcat_name'] }}?subcat_id={{ $result['subcat_id'] }}">
                                    {{ $result['subcat_name'] }}
                                </a>
                            </td>
                            <td align="left">
                                <a href="{{ url('topic') }}/{{ $result['topic_name'] }}?topic_id={{ $result['id'] }}">
                                    {{ $result['topic_name'] }}
                                </a>
                            </td>
                            <td align="left">
                                <a href="{{ url('userdetails') }}?id={{ $result['author_id'] }}">
                                    {{ $result['author_name'] }}
                                </a>
                            </td>
                            <td align="left">
                                <a href="{{ url('userdetails') }}?id={{ $result['lastpost_author_id'] }}">
                                    <b>{{ $result['lastpost_author'] }}</b>
                                </a>
                                <br>
                                <span class="small">{{ $result['lastpost_date'] }}</span>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <div align="left" style="float:left;margin:10px 0 5px 25px;">
                <div class="forumpager">
                    <span><a>&laquo;</a></span>&nbsp;
                    <span class="current">1</span>&nbsp;
                    <span><a>&raquo;</a></span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@endsection