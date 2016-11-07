{{ Form::open(array('route' => 'newtopic')) }}
<div class="editor-box">
    <div class="forum-header" style="margin-top: 25px; width:854px;">
        {{ $subcategory->name }} - create new topic
    </div>
    {{ Form::hidden('action', 'savetopic' ) }}
    {{ Form::hidden('subcat_id', $subcategory->id ) }}
    <div class="form-group">
        {{ Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Topic title')) }}
    </div>

    <div class="form-group">
        {{ Form::textarea('post_content',null,array('class' => 'form-control', 'id' => 'editor')) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Add topic', array('class' => 'btn btn-primary btn-sm')) }}
        {{ Form::submit('Cancel', array('class' => 'btn btn-default btn-sm', 'id' => 'cancel_edit')) }}
    </div>
</div>
{{ Form::close() }}