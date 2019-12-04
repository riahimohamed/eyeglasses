(function ($) {

    // Define fcts :
    $.fn.formValidating = function ($opts) {
        var $self = this;
        var $options = $.extend({}, $.fn.formValidating.defaultOptions, $opts);

        var _factory = {
            init: function () {
                $($self).each(function (i, $el) {
                    $el = $($el);
                    _factory.initElement($el);
                });
            },
            initElement: function ($formWrapper) {
                var $fields = $formWrapper.find('[' + $options.fieldSelector + ']');

                $fields.each(function (i, $field) {
                    $field= $($field);
                    var $key = $field.attr($options.fieldSelector);
                    if (typeof $options.errors[$key] !== 'undefined') {

                        var $errMessage = $options.errors[$key];
                        $field.addClass($options.errCssClass);
                        $field.append($('<span/>', {
                            html:$errMessage
                        }).css('display', 'block'));

                        // Show Parent Container
                        if(typeof $options.afterErrorPrint === 'function'){
                            $options.afterErrorPrint($formWrapper);
                        }
                    }
                });
            }
        };

        _factory.init();
    };

    $.fn.formValidating.defaultOptions = {
        errors: null,
        fieldSelector: 'data-field',
        errCssClass: 'error-input',
        afterErrorPrint: function ($formWrapper) {
            $formWrapper.show();
        }
    };

    // Init scripts
    jQuery(document).ready(function () {

        // Toutes les pages : scrolltop
        jQuery('a[data-scroll="smooth"]').click(function () {
            var anchor = jQuery(this).attr("href");
            jQuery('html, body').animate({
                scrollTop: jQuery(anchor).offset().top
            }, 'slow');
            return false;
        });

        // Page accueil block reservations : slider
        if (jQuery('.ace-accueil-block-reservation-slider').length !== 0) {
            jQuery('.ace-accueil-block-reservation-slider-slides').slick({
                dots: true,
                draggable: false,
                prevArrow: '<span class="small-icon o2k-interface-fleche-petit-gauche"></span>',
                nextArrow: '<span class="small-icon o2k-interface-fleche-petit"></span>',
                appendDots: jQuery('.ace-accueil-block-reservation-slider-pagination'),
                customPaging: function (slider, pageIndex) {
                    return jQuery(
                        '<span class="ace-accueil-block-reservation-slider-pagination-dot"></span>'
                    ).text(slider.$slider.data('buttonlabel'));
                }
            });
            jQuery('.ace-accueil-block-reservation-slider').on('click', function (e) {
                var currentSlideIndex = jQuery('.slick-current').attr('data-slick-index');
                var dotSelector = jQuery('.ace-accueil-block-reservation-slider-pagination-dot');
                var innedDotSelector = jQuery('.ace-accueil-block-reservation-slider-pagination-dot-inner');
                innedDotSelector.hide();
                dotSelector[currentSlideIndex].innerHTML = '<span class="ace-accueil-block-reservation-slider-pagination-dot-inner"></span>';
            });
            jQuery('.ace-accueil-block-reservation-slider-pagination-dot').first().click();
        }

        // Page optic2000etmoi block mentions légales : accordéon
        jQuery("div.ace-optic2000etmoi-block-mentions-legales").click(function () {
            var $this = jQuery(this);
            var others = jQuery("div.ace-optic2000etmoi-block-mentions-legales");

            $this.addClass('is-click-run');
            var _toogleFct = function (elem) {
                var target = elem.find("span.small-icon");

                if (target.hasClass('o2k-interface-bas')) {
                    target.removeClass("o2k-interface-bas").addClass("o2k-interface-haut");
                    elem.find("span.mentions-display").html("Masquer");
                    elem.find("div.ace-optic2000etmoi-block-mentions-content").slideDown();
                } else {
                    target.removeClass("o2k-interface-haut").addClass("o2k-interface-bas");
                    elem.find("span.mentions-display").html("Afficher");
                    elem.find("div.ace-optic2000etmoi-block-mentions-content").slideUp();
                }
            };
            var _closeFct = function (elem) {
                var target = elem.find("span.small-icon");
                target.removeClass("o2k-interface-haut").addClass("o2k-interface-bas");
                elem.find("span.mentions-display").html("Afficher");
                elem.find("div.ace-optic2000etmoi-block-mentions-content").slideUp();
            };

            // Call
            others.each(function(){
                var $this = jQuery(this);
                if($this.hasClass('is-click-run')){
                    return;
                }
                _closeFct($this);
            });
            _toogleFct($this);
            $this.removeClass('is-click-run');

        })

        // Page opticien storelocator
        // (Show/Hide Map all optician)
        jQuery(".stores-map-link").colorbox({
            opacity: 0.8,
            innerWidth: 1024,
            innerHeight: 780,
            maxWidth: "1200px",
            inline: true,
            onComplete: function () {
                if (storelocatoreMap) {
                    var center = storelocatoreMap.getCenter();
                    google.maps.event.trigger(storelocatoreMap, 'resize');
                    storelocatoreMap.setCenter(center);
                }
            }
        });

        // Page "Mes Conseils Vision", block "Tous les conseils pour prendre soin de vos lentilles" : accordéon
        jQuery(".o2k-interface-haut").click(function () {
            jQuery(this).parents(".collapseable-content").slideUp("easing");
            jQuery(".o2k-interface-bas").show("slow");
            jQuery(".collapseable-content").data("open", false);
        });

        jQuery(".toggle-interface").click(function () {
            var target = jQuery(jQuery(this).data("target"));
            if (target.data("open") === false) {
                jQuery(".collapseable-content").slideUp("easing").data("open", false);
                jQuery(".o2k-interface-bas").show("slow");
                target.slideDown("easing").data("open", true);
                jQuery(this).find(".o2k-interface-bas").hide("slow");
            }
        });


        // Page "Mes Conseils Vision", block "Le calendrier de ma vue"
        var calendarChangeStep = function (event) {
            var step = jQuery(event.target);
            if (step.hasClass("step")) {
                jQuery(".timeline .step").removeClass("active");
                jQuery(event.target).addClass("active");
            }
        };
        jQuery(".timeline .step").click(calendarChangeStep).hover(calendarChangeStep);


        // page information account
        $('[data-toggle="ace-collapse"]').click(function (e) {
            e.preventDefault();
            var content = $(this).data('target');
            var target = $('[data-id="' + content + '"]');

            target.toggle();
            if ($(this).data('display') !== false) {
                $(this).hide();
            }

            var icon = $(this).find("span");
            if(icon.hasClass('o2k-interface-bas')) {
                icon.removeClass('o2k-interface-bas').addClass('o2k-interface-haut');
            } else if (icon.hasClass('o2k-interface-haut')) {
                icon.removeClass('o2k-interface-haut').addClass('o2k-interface-bas')
            }
        });

        // Page "Mes e-reservations" : slider pagination
        function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

        var Pagination = function () {
            function Pagination($pagination) {
                _classCallCheck(this, Pagination);

                this.target = $pagination;
                this.nbPages = this.target.find('.page').length;
                this.pageItems = this.target.find('.page');
                this.currentPage = 1;
                this.paginations = $('[data-page]');
                this.numberPagination = this.target.find('.page-item ');

                this.init();
            }

            Pagination.prototype.init = function init() {

                var self = this;
                this.paginations.click(function (e) {
                    e.preventDefault();
                    var target = $(this);
                    var page = target.data('page');

                    switch (page) {
                        case "previous":
                            page = self.currentPage - 1;
                            break;
                        case "next":
                            page = self.currentPage + 1;
                            break;
                        case "first":
                            page = 1;
                            break;
                        case "last":
                            page = self.nbPages;
                            break;
                    }

                    if (page < 1 || page > self.nbPages) {
                        return false;
                    }
                    self.changePage(page);
                });
            };

            Pagination.prototype.changePage = function changePage(page) {
                var _this = this;

                this.numberPagination.removeClass('active-page');
                this.pageItems.each(function (index, element) {
                    if (page === index + 1) {
                        element.show();
                        _this.currentPage = page;
                        $(_this.numberPagination[index]).addClass('active-page');
                    } else {
                        element.hide();
                    }
                });
            };

            return Pagination;
        }();

        new Pagination($('[data-pagination]'));


    });


})(jQuery);