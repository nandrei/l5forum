<div class="border">
    <div class="blue_bg">
        {{ Form::open(array('route' => 'search')) }}
        <div align="center">
            <h1>Forum Search</h1>
        </div>
        <div class="form-group" {{ $errors->has('keywords') ? 'has-error' : ''}} style="width: 300px; margin: 0 auto">
            {{ Form::hidden('action', 'search') }}
            {{ Form::text('keywords', null, array('class' => 'keywords', 'size' => '50')) }}
            {!! $errors->first('keywords', '<span class="input-group-addon">:message</span>') !!}
        </div>
        <div class="form-group" style="width: 300px; margin: 0 auto">
            {{ Form::submit('Search', array('class' => 'btn btn-primary btn-sm')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
