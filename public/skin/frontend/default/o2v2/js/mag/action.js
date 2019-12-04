jQuery(document).ready(function () {
    /*** init ***/
    var mag_action = jQuery(".mag_action"),
        mag_zones = jQuery(".mag_large"),
        mag_close = jQuery(".mag_close");

    jQuery(window.document).on('click', function (event) {
        if (jQuery(".mag_article:visible").length > 0
            && jQuery(event.target).attr('id') != jQuery(".mag_article:visible").first().attr('id')
            && !jQuery(event.target).parents('#' + jQuery(".mag_article:visible").first().attr('id')).length
            && !jQuery(event.target).parents("div[data-rel='"  + jQuery(".mag_article:visible").first().attr('id') + "']").length
        ) {
            closeArticle();
        }
    });

    function action() { // ouvre l'article
        mag_action.click(function (event) {
            event.stopPropagation();
            mag_zones.css({opacity: 0.3}).off();
            mag_action.css({cursor: "auto"}).off();
            jQuery(this).find('.zoom_mag').removeClass('zoom_transition');
            jQuery("#" + jQuery(this).data("rel")).slideDown();
            jQuery(this).css({opacity: 1});
        });
    }

    /** Action d'evevenement **/
    action();

    mag_close.click(closeArticle);

    function closeArticle() {
        mag_zones.css({opacity: 1});
        mag_action.css({cursor: "pointer"});
        jQuery(".mag_article:visible").slideUp();
        action();
        zoom();
    }

    /******************* zoom bloc *******************/
    function zoom() {
        mag_zones.hover(function () {
            jQuery(this).find('.zoom_mag').addClass('zoom_transition');
        }, function () {
            jQuery(this).find('.zoom_mag').removeClass('zoom_transition');
        });
    }

    zoom();

    /*****************************  MAG slider *****************************/
    // init
    var slider = jQuery(".mag_slider > ul"),
        active_slide = jQuery(".active_slide"),
        nav_previews_slide = jQuery(".nav_previews_slide"),
        nav_next_slide = jQuery(".nav_next_slide")
    ;
    // init Nav
    clearNav();

    //action
    nav_previews_slide.click(function(){
        active_slide.prev().addClass("active_slide");
        active_slide.prev().next().removeClass("active_slide");
        active_slide = jQuery('.active_slide'); //l'element courant
        clearNav();
    });

    nav_next_slide.click(function(){
        active_slide.next().addClass("active_slide");
        active_slide.next().prev().removeClass("active_slide");
        active_slide = jQuery('.active_slide'); //l'element courant
        clearNav();
    });

    function clearNav() {
        slider.css({
            left : 85 - active_slide.position()
        });

        if(!active_slide.next().size()){
            nav_next_slide.addClass("hide_nav");
        } else {
            nav_next_slide.removeClass("hide_nav");
        }

        if(!active_slide.prev().size()){
            nav_previews_slide.addClass("hide_nav");
        } else {
            nav_previews_slide.removeClass("hide_nav");
        }
    }

    /******************* Social ***********************/
    jQuery(".mag_social a").click(function(event){
        w = 640;
        h = 320;
        wLeft = window.screenLeft ? window.screenLeft : window.screenX;
        wTop = window.screenTop ? window.screenTop : window.screenY;

        var left = wLeft + (window.innerWidth / 2) - (w / 2);
        var top = wTop + (window.innerHeight / 2) - (h / 2);
        window.open(jQuery(this).data('link'), '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ',height=' + h + ', top=' + top + ', left=' + left);
    });
});

