<!-- Include Font Awesome. -->
<link href="{!! asset('../vendor/fortawesome/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet"
      type="text/css"/>

<!-- Include Editor style. -->
<link href="{!! asset('../resources/assets/froala_editor/css/froala_editor.min.css') !!}" rel="stylesheet"
      type="text/css"/>
<link href="{!! asset('../resources/assets/froala_editor/css/froala_style.min.css') !!}" rel="stylesheet"
      type="text/css"/>

<!-- Include Code Mirror style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

<!-- Include Editor Plugins style. -->
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/char_counter.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/code_view.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/colors.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/emoticons.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/file.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/image.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/image_manager.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/line_breaker.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/quick_insert.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/table.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/video.css') !!}">

{{ Form::open(['route' => 'newreply']) }}
<div class="editor-box">
    {{--<div class="form-group">--}}
    {{--{{ Form::label('title', 'Title') }}--}}
    {{--{{ Form::text('title',null,array('class' => 'form-control', 'placeholder'=>'Title')) }}--}}
    {{--</div>--}}
    <div class="forum-header" style="margin-top: 25px; width:854px;">
        Replying to {{ $topic->name }} topic
    </div>
    <div class="form-group">
        {{ Form::textarea('body',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'editor')) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Add reply', array('class' => 'btn btn-primary btn-sm')) }}
        <input id="cancel" type=button value="Cancel" class="btn btn-default btn-sm"/>
    </div>

</div>
{{ Form::close() }}

<!-- Include JS files. -->
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/froala_editor.min.js') !!}"></script>

<!-- Include Code Mirror. -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

<!-- Include Plugins. -->
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/align.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/char_counter.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/code_beautifier.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/code_view.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/colors.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/emoticons.min.js') !!}"></script>
{{--<script type="text/javascript" src="{!! asset('../resources/assets/froala_editor/js/plugins/entities.min.js') !!}"></script>--}}
<script type="text/javascript" src="{!! asset('../resources/assets/froala_editor/js/plugins/file.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/font_family.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/font_size.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/image.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/image_manager.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/inline_style.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/line_breaker.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('../resources/assets/froala_editor/js/plugins/link.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/lists.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/paragraph_format.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/paragraph_style.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/quick_insert.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/quote.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/table.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('../resources/assets/froala_editor/js/plugins/save.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('../resources/assets/froala_editor/js/plugins/url.min.js') !!}"></script>
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/video.min.js') !!}"></script>

<!-- Include Language file if we want to use it. -->
<script type="text/javascript" src="{!! asset('../resources/assets/froala_editor/js/languages/ro.js') !!}"></script>

<!-- Initialize the editor. -->
<script>
    $(function () {
        $('#editor').froalaEditor({
            key: 'ACTIVATION_KEY',
            height: 200
        });
    });
</script>