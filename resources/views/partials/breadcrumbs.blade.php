<div class="forum-quicknav">
    <a href="{{ url('/') }}">lforum</a> >
    @foreach($GLOBALS['navlinks'] as $k => $link)
        <a href="{{ url($link['url']) }}">{{$link['name']}}</a> >
    @endforeach
</div>