$(document).ready(function () {
    $('.dropdown .dropdown-menu').on('click', function (e) {
        e.stopPropagation();
    });
});

var baseUrl = 'http://host1.hostmama.ro/~rowebsol/rowebsolutions.tk/andrei/l5forum/public';
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$('#newtopic').click(function () {
    $('html, body').animate({
        scrollTop: $("#topic_editor").offset().top
    }, 'fast');
    var url = baseUrl + '/newtopic/create';
    var action = document.getElementById('action').value;
    var subcat_id = document.getElementById('subcat_id').value;
    //console.log('action', action, 'subcat_id', subcat_id);
    var data = {action: action, subcat_id: subcat_id, _token: CSRF_TOKEN};
    var request = $.ajax({
        url: url,
        type: 'POST',
        contentType: 'application/json; charset=utf-8',
        dataType: 'html',
        data: JSON.stringify(data)
    });
    request.done(function (response) {
        $("#topic_editor").html(response);
        //console.log('response server', response);
    });
});

$('#newreply').click(function () {
    $('html, body').animate({
        scrollTop: $("#reply_editor").offset().top
    }, 'fast');
    var url = baseUrl + '/newreply/create';
    var action = document.getElementById('action').value;
    var topic_id = document.getElementById('topic_id').value;
    var data = {action: action, topic_id: topic_id, _token: CSRF_TOKEN};
    var request = $.ajax({
        url: url,
        type: 'POST',
        contentType: 'application/json; charset=utf-8',
        dataType: 'html',
        data: JSON.stringify(data)
    });
    request.done(function (response) {
        $("#reply_editor").html(response);
    });
});