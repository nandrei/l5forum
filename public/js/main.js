$(document).ready(function () {
    $('.dropdown .dropdown-menu').on('click', function (e) {
        e.stopPropagation();
    });
    $('.login-toggle').click(function (event) {
        event.preventDefault();
        $('#login').click();
        return false;
    });
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
            $("#search_form").html(response);
        });
    }
    toggleSearch = 1;
});

$('#newtopic').click(function () {
    if (toggleNewTopic === 1) {
        $('#html_editor').toggle();
        if ($("#html_editor").is(":visible")) {
            scrollTo("#html_editor");
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
            scrollTo("#html_editor");
            //console.log('response server', response);
        });
    }
    toggleNewTopic = 1;
});

$('#newreply').click(function () {
    if (toggleNewReply === 1) {
        $('#html_editor').toggle();
        if ($("#html_editor").is(":visible")) {
            scrollTo("#html_editor");
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
            $("#html_editor").html(response);
            scrollTo("#html_editor");
        });
    }
    toggleNewReply = 1;
});

$('#cancel_edit').click(function () {
    $('#html_editor').toggle();
    scrollTo("#top");
});

function scrollTo(elem_id) {
    $('html, body').animate({scrollTop: $(elem_id).offset().top}, 'fast');
}

