//<![CDATA[
;(function ($) {
    $(document).ready(function () {
        // Evenement de clique sur l'image
        $('#view-image a').click(function () {
            lightbox($(this).data('zoom'));
        });

        // Evenement de changement de l'image affiché
        $('#more-views a').click(function () {
            if ($(this).data('small')) {
                $("#view-image img").attr("src", $(this).data('small'));
                $("#view-image a").data("zoom", $(this).data('big'));
                $('#more-views li').removeClass('selected');
                $(this).parent('li').addClass('selected');
            }
        });

        // Ouvrir le lightbox colorbox pour zoomer l'image
        function lightbox(url) {
            $.colorbox({
                href: url,
                opacity: 0.5,
                transition: "fade",
                maxWidth: "1300px",
                onLoad: function () {
                    $('.FBXSuperCont').css('z-index', 0);
                },
                onCleanup: function () {
                    $('.FBXSuperCont').css('z-index', 10);
                }
            });
        }

        // Ouvrir le popin 360°
        $("#view-360").colorbox({
            opacity: 0.5,
            // innerWidth: 699,
            // innerHeight: 280,
            maxWidth: "1300px"
        });

        function setMiniature() {
            if (!$("#product-fitphoto-link").data('has-fitbox-photo')) {
                var src = FitPhoto.getImageURL(sku);
                if (src !== false) {
                    var miniature = new Image();
                    miniature.src = src;
                    miniature.width = 100;

                    $("#product-fitphoto-link").hide()
                        .prepend(miniature)
                        .fadeIn();

                    $("#product-fitphoto-link").data('has-fitbox-photo', 1);

                    $("#product-fitphoto-link .fitphoto-loading").remove();
                    $(".FBXSuperCont").remove();
                    return true;
                } else {
                    setTimeout(setMiniature, 100);
                    return false;
                }
            } else {
                $("#product-fitphoto-link").remove();
                $("#fitphotoContainer").remove();
                return false;
            }
        }

        // $("#product-fitphoto-link").colorbox({
        //     opacity: 0.5,
        //     innerWidth: 1024,
        //     onCleanup: function () {
        //         $(".FBXSuperCont").remove();
        //     }
        // });

        $("#product-fitphoto-link").click(function (e) {
            e.preventDefault();
            // Append To Image media gallery
            var popinFitPhotoUrl = $(this).attr('href');
            $.ajax({
                url: popinFitPhotoUrl,
                success: function ($dataHtml) {
                    $('#viewImageProduct').fadeOut();
                    $('#viewImageFitBox')
                        .hide()
                        .html(
                            $('<span/>', {
                                id: 'fitboxPopupClose',
                                class: 'popup-close',
                                title: 'Fermer',
                                html: 'X'
                            })
                                .hide()
                                .click(function () {
                                    $('#viewImageProduct').fadeIn();
                                    $('#more-views').fadeIn();
                                    $('#viewImageFitBox').fadeOut().html('');
                                    $('#more-views-popup-close').remove();
                                })
                        )
                        .append($dataHtml)
                        .fadeIn();

                    $('#more-views').append(
                        $('<span/>', {
                            id: 'more-views-popup-close',
                            class: 'more-views-popup-close'
                        }).click(function () {
                            $('#fitboxPopupClose').trigger('click');
                            $(this).remove();
                        })
                    );
                },
                error: function ($e) {
                    console.error($e);
                }
            });
        });

        $("#type-verre").change(function (event) {
            $(".product-price-container span.product-price").removeClass("product-price-second");
            $("#" + $("#type-verre :not(option:selected)").attr("data-verre") + " span.product-price").addClass("product-price-second");
        });

        $(".reseaux-sociaux a").click(function (event) {
            window.open($(this).attr('data-link'), '', 'width=1024,height=768,scrollbars=yes');
        });

        $('.product-recap a.link').click(function () {
            var anchor = $(this).attr("href");
            $('html, body').animate({scrollTop: $(anchor).offset().top}, 'slow');
            return false;
        });

        $("#product-cgu").colorbox({
            opacity: 0.5,
            innerWidth: 800,
            innerHeight: 600
        });

        if ($('#vente-flash-compteur').length > 0) {
            to_date = $('#vente-flash-compteur').attr('data-date').split(/[-: ,]+/);
            $('#vente-flash-compteur').countdown({
                tplCounter: '<span class="counter">DD</span> <span>J</span> <span class="counter">HH</span> <span>H</span> <span class="counter">MM</span> <span>M</span> <span class="counter">SS</span> <span>S</span>',
                year: to_date[0],
                month: to_date[1] - 1,
                day: to_date[2],
                hour: to_date[3],
                minute: to_date[4],
                seconde: to_date[5]
            });
        }

    });
})(jQuery);
//]]>
