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
{{--<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/quick_insert.css') !!}">--}}
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/table.css') !!}">
<link rel="stylesheet" href="{!! asset('../resources/assets/froala_editor/css/plugins/video.css') !!}">

<!-- Include Forms for creating topics or replies. -->
@if (isset($subcategory))
    @include('partials.newtopic_form')
@elseif(isset($topic))
    @include('partials.newreply_form')
@endif

<!-- Include JS files. -->
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/froala_editor.min.js') !!}"></script>

<!-- Include Code Mirror. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

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
<script type="text/javascript"
        src="{!! asset('../resources/assets/froala_editor/js/plugins/entities.min.js') !!}"></script>
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
{{--<script type="text/javascript"--}}
{{--src="{!! asset('../resources/assets/froala_editor/js/plugins/quick_insert.min.js') !!}"></script>--}}
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
            autosave: true, // Enable autosave option. Enabling autosave helps preventing data loss.
            autosaveInterval: 1000, // Time in milliseconds to define when the autosave should be triggered.
            saveURL: null, // Defines where to post the data when save is triggered. The editor will initialize a POST request to the specified URL passing the editor content in the body parameter of the HTTP request.
            blockTags: ["n", "p", "blockquote", "pre", "h1", "h2", "h3", "h4", "h5", "h6"], // Defines what tags list to format a paragraph and their order.
            borderColor: "#252528", // Customize the appearance of the editor by changing the border color.
//        buttons: ["bold", "italic", "underline", "strikeThrough", "fontSize", "color", "sep", "formatBlock", "align", "insertOrderedList", "insertUnorderedList", "outdent", "indent", "sep", "selectAll", "createLink", "insertImage", "undo", "redo", "html"], // Defines the list of buttons that are available in the editor.
            crossDomain: false, // Make AJAX requests using CORS.
            direction: "ltr", // Sets the direction of the text.
            editorClass: "", // Set a custom class for the editor element.
            height: "auto", // Set a custom height for the editor element.
            heightMin: 150,
            heightMax: 300,
            imageMargin: 20, // Define a custom margin for image. It will be visible on the margin of the image when float left or right is active.
            imageErrorCallback: false,
            imageUploadParam: "img", // Customize the name of the param that has the image file in the upload request.
            imageUploadURL: "{!! asset('img') !!}", // A custom URL where to save the uploaded image.
            inlineMode: true, // Enable or disable inline mode.
            placeholder: "Content", // Set a custom placeholder to be used when the editor body is empty.
            spellcheck: false, // Enables spellcheck.
            typingTimer: 250, // Time in milliseconds to define how long the typing pause may be without the change to be saved in the undo stack.
            width: "auto" // Set a custom width for the editor element.
        })
    });
</script>