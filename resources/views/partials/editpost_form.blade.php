{!! Form::open(array('route' => 'editpost')) !!}
<div class="editor-box">
    <div class="forum-header" style="margin-top: 25px; width:854px;">
        Edit post in {{ $post->topic_name }} topic
    </div>
    {!! Form::hidden('action', 'savepost' ) !!}
    {!! Form::hidden('post_id', $post->id ) !!}
    <div class="form-group">
        {!! Form::textarea('post_content', $post->content, array('class' => 'form-control', 'id' => 'editor')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', array('class' => 'btn btn-primary btn-sm')) !!}
        <input type="button" class="btn btn-default btn-sm" value="Cancel" onclick="window.location.reload()">
    </div>
</div>
{!! Form::close() !!}