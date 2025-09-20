$(function () {
    $(".lotto-box").slice(0, 1).show();
    $("body").on('click touchstart', '.load-more', function (e) {
        e.preventDefault();
        $(".lotto-box:hidden").slice(0, 1).slideDown();
        if ($(".lotto-box:hidden").length == 0) {
            $(".load-more").css('visibility', 'hidden');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1000);
    });
});