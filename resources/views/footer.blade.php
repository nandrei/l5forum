<table class="foruminfo" width="100%" cellpadding="3" cellspacing="1" border="0">
    <tr>
        <td colspan="4" height="28" align="center">
            <span class="bold">Forum info</span>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <img src="{{ url('img/icons/connected.png') }}" alt="Who is online"/>
        </td>
        <td class="row1" align="left">
                    <span class="small">
                        In total are <b>{{ 0 | Session::get('online_users') }}</b> online users : {{ 0 | Session::get('members') }}
                        members and {{ 0 | Session::get('guests') }} guests<br/>
                        The highest no. of online users were <b>{{ Session::get('hi_no_online') }}</b> on {{ Session::get('hi_no_online_date') }}
                        <br/>
                        Today registered: {{ 0 | Session::get('today_registered') }}
                    </span>
        </td>
        <td align="center" valign="middle"><img src="{{ url('img/icons/forumstats.png') }}"
                                                alt="Forum stats"/></td>
        <td class="row2" align="left">
                    <span class="small">
                        Total number of posts is <b>{{ 0 | Session::get('total_posts') }}</b><br/>
                        We have <b>{{ 0 | Session::get('total_members') }}</b> members<br/>
                        The newest member is: <b><a
                                    href="{{ url('userdetails') }}?id={{ Session::get('last_member_id') }}">{{ Session::get('last_member_name') }}</a></b>
                    </span>
        </td>
    </tr>
</table>