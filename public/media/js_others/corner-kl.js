jQuery(document).ready(function() {
    jQuery(window).scroll(function () {
        if(jQuery(this).scrollTop() > 650) {
            jQuery('div#kl #nav').addClass('scrolling');
        } else {
            jQuery('div#kl #nav').removeClass('scrolling');
        }
    });

    jQuery('div#kl #nav a').click(function() {
        var anchor = jQuery(this).attr("href");
        jQuery('html, body').animate({scrollTop: jQuery(anchor).offset().top }, 'slow');
        return false;
    });

    jQuery('#gallery a').colorbox({
        rel: 'gallery',
        opacity: 0.8,
        next: '',
        previous: '',
        close: '',
        scrolling: true,
        current: false,
        transition: 'none'
    });

});
