$(document).ready(function () {
    $(this).scrollTop(0);
    $('.dropdown .dropdown-menu').on('click', function (e) {
        e.stopPropagation();
    });
    $('.login-toggle').click(function (event) {
        event.preventDefault();
        $('#login').click();
        return false;
    });

    var baseUrl = 'http://host1.hostmama.ro/~rowebsol/rowebsolutions.tk/andrei/l5forum/public';
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var toggleSearch = 0;
    var toggleNewTopic = 0;
    var toggleNewReply = 0;

    $('#search').click(function () {
        if (toggleSearch === 1) {
            $('#search_form').toggle();
        }
        else {
            var url = baseUrl + '/search';
            var data = {action: 'newsearch', _token: CSRF_TOKEN};
            var request = $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: 'html',
                data: JSON.stringify(data)
            });
            request.done(function (response) {
                $('#search_form').html(response);
            });
        }
        toggleSearch = 1;
    });

    $('#newtopic').click(function () {
        if (toggleNewTopic === 1) {
            $('#html_editor').toggle();
            if ($('#html_editor').is(":visible")) {
                scrollAt('#html_editor');
            }
        }
        else {
            var url = baseUrl + '/newtopic/create';
            var subcat_id = document.getElementById('subcat_id').value;
            //console.log('action', action, 'subcat_id', subcat_id);
            var data = {action: 'newtopic', subcat_id: subcat_id, _token: CSRF_TOKEN};
            var request = $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: 'html',
                data: JSON.stringify(data)
            });
            request.done(function (response) {
                $("#html_editor").html(response);
                scrollAt('#html_editor');
                //console.log('response server', response);
            });
        }
        toggleNewTopic = 1;
    });

    $('#newreply').click(function () {
        if (toggleNewReply === 1) {
            $('#html_editor').toggle();
            if ($('#html_editor').is(":visible")) {
                scrollAt('#html_editor');
            }
        }
        else {
            var url = baseUrl + '/newreply/create';
            var topic_id = document.getElementById('topic_id').value;
            var data = {action: 'newreply', topic_id: topic_id, _token: CSRF_TOKEN};
            var request = $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: 'html',
                data: JSON.stringify(data)
            });
            request.done(function (response) {
                $('#html_editor').html(response);
                scrollAt('#html_editor');
            });
        }
        toggleNewReply = 1;
    });

    var edited_post = '0';

    $('.editpost').click(this.value, function () {

        if (edited_post != this.value) {

            var url = baseUrl + '/editpost';
            var post_id = this.value;
            var data = {action: 'editpost', post_id: post_id, _token: CSRF_TOKEN};
            var request = $.ajax({
                url: url,
                type: 'POST',
                contentType: 'application/json; charset=utf-8',
                dataType: 'html',
                data: JSON.stringify(data)
            });
            request.done(function (response) {
                edit_post = '#edit_post' + post_id;
                $(edit_post).html(response);
            });

        }
        else {
            $(edit_post).toggle();
            post_id = this.value;
        }
        edited_post = post_id;
    });

    $('#cancel_edit').click(function () {
        // console.log('test');
        $('#html_editor').toggle();
        scrollAt('#top');
    });

    function scrollAt(elem_id) {
        console.log('test');
        $('html, body').animate({scrollTop: $(elem_id).offset().top - 50}, 'fast');
    }
});
