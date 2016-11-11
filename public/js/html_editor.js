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
        imageUploadURL: "img", // A custom URL where to save the uploaded image.
        imageUploadParams: {id: 'editor'}, // Additional upload params.
        imageUploadMethod: 'POST', // Set request type.
        imageMaxSize: 5 * 1024 * 1024, // Set max image size to 5MB.
        imageAllowedTypes: ['jpeg', 'jpg', 'png'], // Allow to upload PNG and JPG.
        inlineMode: true, // Enable or disable inline mode.
        placeholder: "Content", // Set a custom placeholder to be used when the editor body is empty.
        spellcheck: false, // Enables spellcheck.
        typingTimer: 250, // Time in milliseconds to define how long the typing pause may be without the change to be saved in the undo stack.
        width: "auto" // Set a custom width for the editor element.
    })
        .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
            // Return false if you want to stop the image upload.
        })
        .on('froalaEditor.image.uploaded', function (e, editor, response) {
            // Image was uploaded to the server.
        })
        .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
            // Image was inserted in the editor.
        })
        .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
            // Image was replaced in the editor.
        })
        .on('froalaEditor.image.error', function (e, editor, error, response) {

            // Bad link.
            if (error.code == 1) {
            }

            // No link in upload response.
            else if (error.code == 2) {
            }

            // Error during image upload.
            else if (error.code == 3) {
            }

            // Parsing response failed.
            else if (error.code == 4) {
            }

            // Image too text-large.
            else if (error.code == 5) {
            }

            // Invalid image type.
            else if (error.code == 6) {
            }

            // Image can be uploaded only to same domain in IE 8 and IE 9.
            else if (error.code == 7) {
            }

            // Response contains the original server response to the request if available.
        });
});