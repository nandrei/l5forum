<table class="foruminfo" width="100%" cellpadding="3" cellspacing="1" border="0">
    <tr>
        <td colspan="4" height="28" align="center">
            <span class="bold">Forum info</span>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <img src="{{ URL::asset('img/icons/connected.png') }}" alt="Who is online"/>
        </td>
        <td class="row1" align="left">
                    <span class="small">
                        In total are <b>{{ 0 | Cache::get('onlineusers') }}</b> online users : {{ 0 | Cache::get('registered') }}
                        Registered and {{ 0 | Cache::get('guests') }} Guests<br/>
                        The highest no. of connected users were <b>$k</b> on date time<br/>
                        Today registered: $k
                    </span>
        </td>
        <td align="center" valign="middle"><img src="{{ URL::asset('img/icons/forumstats.png') }}"
                                                alt="Forum stats"/></td>
        <td class="row2" align="left">
                    <span class="small">
                        Total number of articles is <b>$k</b><br/>
                        We have <b>$k</b> registered users<br/>
                        The newest registered user is: <b><a href="">$x</a></b>
                    </span>
        </td>
    </tr>
</table>