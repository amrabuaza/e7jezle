$(document).ready(function ()
{
    $('.pass-in').hide();
    $('.password-click').click(function () {
        $('.pass-in').toggle(500);
    });

    $('.logout').click(function () {
    $.post('/E7jezle/advanced/backend/web/site/logout');
    });
});