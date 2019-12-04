jQuery(document).ready(function () {
    /* Menu burger */
    var burger = jQuery('.menumobile-container .top div.burger');
    var burgerMenu = jQuery('.menumobile-container .top div.burgermenu');
    var closeBurgerMenu = jQuery('.menumobile-container .top div.burgermenu .close-burgermenu');

    burger.click(function () {
        burgerMenu.addClass('show');
    });

    closeBurgerMenu.click(function () {
        burgerMenu.removeClass('show');
    });

    /* Sub-menu display on hover */
    var allSubMenus = jQuery('.navigation-sub-menu>div');

    jQuery('.menu-container .menu ul.links>li>a').mouseenter(function () {
        var link = jQuery(this);
        allSubMenus.hide();
        if (link.data('showSubMenu')) {
            jQuery('#' + link.data('showSubMenu')).show();
        }
    });

    jQuery('#mainheader').mouseleave(function () {
        allSubMenus.hide();
    });

    jQuery('.menu-container .menu ul.links>li>span').click(function () {
        var link = jQuery(this);
        allSubMenus.each(function (i, subMenu) {
            var subMenu = jQuery(subMenu);
            if (subMenu.attr('id') != link.data('showSubMenu')) {
                subMenu.hide();
            }
        });

        jQuery('#' + link.data('showSubMenu')).toggle();
    });

    jQuery(window).click(function(e) {
        var color;
        var nativeColorRGB = "rgb(207, 202, 196)";
        var nativeColorHEX = "#cfcac4";
        var span = jQuery('.menu-container .menu ul.links>li>span');
        if((!(color = jQuery(e.target).attr("data-color")))
            || (jQuery(e.target).attr("data-color") == nativeColorRGB)
            || (jQuery(e.target).attr("data-color") == nativeColorHEX)) {
            span.css("background-color", nativeColorRGB);
        } else {
            if(jQuery(e.target).css("background-color") != nativeColorRGB){
                span.css("background-color", nativeColorRGB);
            } else {
                span.css("background-color", nativeColorRGB);
                jQuery(e.target).css("background-color", color);
            }
        }
    });

    if(jQuery('#search_mini_form').length) {
        /* Search Autocomplete */
        var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Je recherche une marque, une référence...');
        var searchInput = $('search');
        var divSearchAutocomplete = $('search_autocomplete');
        var divSearchModal = $('search_modal');

        var keyIgnored = [
            16, 17, 19, 20, 32, 44, 145, Event.KEY_TAB, Event.KEY_RETURN, Event.KEY_INSERT, Event.KEY_ESC, Event.KEY_LEFT,
            Event.KEY_UP, Event.KEY_RIGHT, Event.KEY_DOWN, Event.KEY_HOME, Event.KEY_END, Event.KEY_PAGEUP, Event.KEY_PAGEDOWN
        ];

        Array.prototype.inArray = function (needle) {
            for (i = 0; i < this.length; i++) {
                if (this[i] == needle) {
                    return true;
                }
            }
            return false;
        };

        var queue = new Array();

        Ajax.Request.prototype.abort = function () {
            this.transport.onreadystatechange = Prototype.emptyFunction;
            this.transport.abort();
            Ajax.activeRequestCount--;
        };

        Event.observe(searchInput, 'keyup', function (event) {
            if (keyIgnored.inArray(event.keyCode)) {
                Event.stop(event);
                return;
            }
            for (i = 0; i < queue.length; i++) {
                queue[i].abort();
            }
            queue = [];

            if (searchInput.value.length > 2) {
                $('searchButton').addClassName('loadingSearch');
                var url = '/autocomplet/search?q=' + searchInput.value;
                queue.push(new Ajax.Request(url, {
                    method: 'get',
                    onSuccess: function (transport) {
                        if (transport.responseText.length > 0) {
                            divSearchAutocomplete.update(transport.responseText);
                            new Effect.Appear(divSearchAutocomplete, {duration: 0.5});
                            new Effect.Appear(divSearchModal, {duration: 0.5, from: 0, to: 0.4});
                        } else {
                            new Effect.Fade(divSearchAutocomplete, {duration: 0.5});
                            new Effect.Fade(divSearchModal, {duration: 0.5});
                        }
                        $('searchButton').removeClassName('loadingSearch');
                    }
                }));
            }
            if (queue.length == 0) {
                $('searchButton').removeClassName('loadingSearch');
            }
        });

        Event.observe(searchInput, 'focus', function (event) {
            if (divSearchAutocomplete.innerHTML != '') {
                new Effect.Appear(divSearchAutocomplete, {duration: 0.5});
                new Effect.Appear(divSearchModal, {duration: 0.5, from: 0, to: 0.4});
            }
        });

        Event.observe(divSearchModal, 'click', function (event) {
            if (divSearchAutocomplete.style.display != 'none' ||
                divSearchModal.style.display != 'none'
            ) {
                new Effect.Fade(divSearchAutocomplete, {duration: 0.5});
                new Effect.Fade(divSearchModal, {duration: 0.5});

            }
        });
    }
});
