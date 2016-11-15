<table class="foruminfo" width="100%" cellpadding="3" cellspacing="1" border="0">
    <tr>
        <td colspan="4" height="28" align="center">
            <span class="bold">Forum info</span>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <img src="{{ url('img/icons/connected.png') }}" title="Who is online"/>
        </td>
        <td align="left">
                    <span class="small">
                        In total are <b>{{ 0 | $GLOBALS['foruminfo']['online_users'] }}</b> online users : {{ 0 | $GLOBALS['foruminfo']['members'] }}
                        members and {{ 0 | $GLOBALS['foruminfo']['guests'] }} guests<br/>
                        The highest no. of online users were <b>{{ $GLOBALS['foruminfo']['hi_no_online'] }}</b> on {{ $GLOBALS['foruminfo']['hi_no_online_date'] }}
                        <br/>
                        Today registered: {{ 0 | $GLOBALS['foruminfo']['today_registered'] }}
                    </span>
        </td>
        <td align="center" valign="middle"><img src="{{ url('img/icons/forumstats.png') }}"
                                                title="Forum stats"/></td>
        <td align="left">
                    <span class="small">
                        Total number of posts is <b>{{ 0 | $GLOBALS['foruminfo']['total_posts'] }}</b><br/>
                        We have <b>{{ 0 | $GLOBALS['foruminfo']['total_members'] }}</b> members<br/>
                        The newest member is: <b><a
                                    href="{{ url('userdetails') }}?id={{ $GLOBALS['foruminfo']['last_member_id'] }}">{{ $GLOBALS['foruminfo']['last_member_name'] }}</a></b>
                    </span>
        </td>
    </tr>
</table>