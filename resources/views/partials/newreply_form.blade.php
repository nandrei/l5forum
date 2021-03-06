{!! Form::open(array('route' => 'newreply')) !!}
<div class="editor-box">
    <div class="forum-header" style="margin-top: 25px; width:854px;">
        Replying to {{ $topic->name }}
    </div>
    {!! Form::hidden('action', 'savereply' ) !!}
    {!! Form::hidden('topic_id', $topic->id ) !!}
    <div class="form-group">
        {!! Form::textarea('post_content',null, array('class' => 'form-control', 'id' => 'editor')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add reply', array('class' => 'btn btn-primary btn-sm')) !!}
        <input type="button" class="btn btn-default btn-sm" value="Cancel" onclick="window.location.reload()">
    </div>
</div>
{!! Form::close() !!}