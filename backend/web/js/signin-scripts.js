jQuery(document).ready(function () {
    var $ = window.jQuery;

    /*
     Fullscreen background
     */
    // $.backstretch([
    //     "/img/signin/2.jpg",
    //     "/img/signin/3.jpg",
    //     "/img/signin/1.jpg"
    // ], {duration: 3000, fade: 750});

    $.backstretch(window.bgConfig.Url,window.bgConfig.config);
    /*
     Form validation
     */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function () {
        $(this).removeClass('input-error');
    });

    $('.login-form').on('submit', function (e) {

        $(this).find('input[type="text"], input[type="password"], textarea').each(function () {
            if ($(this).val() == "") {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });

    });


});
