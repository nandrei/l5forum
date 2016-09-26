@extends('default')

@section('content')

    <div style="padding: 20px">
        <h2>Subcategory name</h2>
        <form method="post" action="{{ url('subcategory/newtopic') }}">
            <input type="hidden" name="action" value="savetopic">
            <input type="hidden" name="subcat_id" value="{{ $subcat_id }}">
            <label for="topic">Topic</label>
            <input type="text" name="topic"><br>
            <label for="post">Post</label>
            <textarea name="post"></textarea><br><br>
            <input type="hidden" id="csrftoken" name="_token" value="{{ csrf_token() }}">
            <input type=submit value="Create topic" class="btn"/>
        </form>
    </div>

@endsection