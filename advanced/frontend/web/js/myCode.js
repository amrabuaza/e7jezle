

$(document).ready(function ()
{
    $('.logout').click(function () {
        $.post('/E7jezle/advanced/frontend/web/site/logout');
    });


    $('.pass-in').hide();
    $('.password-click').click(function () {
        $('.pass-in').toggle(500);
    });

    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });


    $("#top-container").css("height",$(window).height());
    $(".body_login").css("height",$(window).height());


});



