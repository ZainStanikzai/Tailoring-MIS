$(document).ready(function () {
    Waves.init();
    $(".rightBarClose").click(function(e) {
        $("body").removeClass('right-bar-enabled');
    });
    $(document).on("click", "body", function(t) {
        0 < $(t.target).closest(".right-bar-toggle, .right-bar").length ||
            $("body").removeClass("right-bar-enabled");
    })
    $(".metismenu li a").click(function (e) { 
        e.preventDefault();
        $($(this).next()).toggleClass('mm-show');
        console.log($($(this).parent()).toggleClass('mm-active'));
    });
    $("#sidebar-menu a").each(function() {
        var t = window.location.href.split(/[?#]/)[0];
        this.href == t &&
            ($(this).addClass("active"),
                $(this).parent().addClass("mm-active"),
                $(this).parent().parent().addClass("mm-show"),
                $(this).parent().parent().prev().addClass("mm-active"),
                $(this).parent().parent().parent().addClass("mm-active"),
                $(this).parent().parent().parent().parent().addClass("mm-show"),
                $(this)
                .parent()
                .parent()
                .parent()
                .parent()
                .parent()
                .addClass("mm-active"));
    })
});