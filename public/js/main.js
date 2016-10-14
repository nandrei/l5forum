$(document).ready(function () {
    $('.dropdown .dropdown-menu').on('click', function (e) {
        e.stopPropagation();
    });
});