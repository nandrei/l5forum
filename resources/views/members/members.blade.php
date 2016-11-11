@extends('default')

@section('content')

    <div class="border">
        <div class="blue_bg">
            <div align="left" style="float:left;margin:10px 0 5px 25px;">
                <div class="forumpager">
                    <span><a>&laquo;</a></span>&nbsp;
                    <span class="current">1</span>&nbsp;
                    <span><a>&raquo;</a></span>
                </div>
            </div>
            <div class="clearfix"></div>

            <table class="memberslist" width="80%" cellpadding="3" cellspacing="1" border="0">
                <tr>
                    <th nowrap="nowrap" height="30">#</th>
                    <th nowrap="nowrap">Member</th>
                    <th nowrap="nowrap">&nbsp;PM&nbsp;</th>
                    <th nowrap="nowrap">Country</th>
                    <th nowrap="nowrap">Email</th>
                    <th nowrap="nowrap">Posts</th>
                    <th nowrap="nowrap">Member since</th>
                </tr>
                <?php $i = 0; $n = 0; ?>
                @foreach($users as $user)
                    <tr class="{{ 'row' . ($i++ % 2) }}">
                        <td align="center">
                            <span>&nbsp;{{ $n += 1 }}&nbsp;</span>
                        </td>
                        <td align="center">
                        <span>
                            <a href="{{ url('userdetails') }}?id={{ $user['id'] }}">{{ $user['name'] }}</a>
                        </span>
                        </td>
                        <td align="center">
                            <a href="">
                                <img src="{{ url('img/icons/messages.png') }}" alt="Send a private message" border="0"/>
                            </a>
                        </td>
                        <td align="center" valign="middle">
                            <span>{{ $user['country'] }}</span>
                        </td>
                        <td align="center" valign="middle">{{ $user['email'] }}</td>
                        <td align="center" valign="middle">
                            <span>{{ $user['no_posts'] }}</span>
                        </td>
                        <td align="center" valign="middle">
                            <span>{{ $user['created_at'] }}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection