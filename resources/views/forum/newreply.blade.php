{{Form::open(['route' => 'post.store'])}}
<div class="box-body">
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Title'))}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Content')}}
        {{Form::textarea('body',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'technig'))}}
    </div>
    <div class="form-group">
        {{Form::submit('Publish',array('class' => 'btn btn-primary btn-sm'))}}
    </div>
</div>
{{Form::close()}}

