jQuery(document).ready(function () {

    /** BLOCK PRODUIT **/
    jQuery('div.top-title p').on('click', function () {
        var $this = jQuery(this);
        var topId = $this.data('topId');

        jQuery('div.top-title p').removeClass('active');

        jQuery('div.top-product').hide();
        jQuery('#' + topId).fadeIn('slow', function () {
            $this.addClass('active');
        });
    });
    jQuery('div.top-title p').first().click();

    jQuery('select.top-title').on('change', function () {
        var $this = jQuery(this);
        var topId = $this.val();

        jQuery('div.top-product').hide();
        jQuery('#' + topId).show();
        jQuery('#' + topId + ' .product-slider').bxSlider({
            auto: false,
            pause: 4000,
            controls: true,
            autoControls: false,
            pager: false,
            autoHover: true,
            adaptiveHeight: false
        });
    });
    jQuery('select.top-title').change();

    /** BLOCK REASSURANCE **/
    jQuery('.reinsurance-slider').bxSlider({
        auto: false,
        pause: 4000,
        controls: true,
        autoControls: false,
        pager: false,
        autoHover: true
    });

    /** BLOCK SLIDER **/
    var bxSliderConfig = function(){
        var config1 = {
            auto: true,
            pause: 4000,
            speed: 800,
            controls: false,
            autoControls: false,
            pager: true,
            autoHover: true,
            adaptiveHeight: false,
            mode: 'horizontal',
            touchEnabled: true,
            swipeThreshold: 100
        };
        var config2 = {
            auto: true,
            pause: 4000,
            speed: 800,
            controls: false,
            autoControls: false,
            pager: true,
            autoHover: true,
            adaptiveHeight: false,
            mode: 'fade',
            touchEnabled: true,
            swipeThreshold: 50
        };

        return window.innerWidth < 768 ? config2 : config1;
    };

    jQuery('.hp-slider').bxSlider(bxSliderConfig());

    /** BLOCK BRAND **/
    var bxBrandConfig = function(){
        var config1 = {
            auto: false,
            pause: 400,
            controls: true,
            autoControls: false,
            pager: false,
            autoHover: true,
            touchEnabled: true,
            swipeThreshold: 50,
            slideWidth: 300,
            minSlides: 6,
            maxSlides: 6,
            moveSlides: 1,
            slideMargin: 10
        };
        var config2 = {
            auto: false,
            pause: 400,
            controls: true,
            autoControls: false,
            pager: false,
            autoHover: true,
            touchEnabled: true,
            swipeThreshold: 50,
            slideWidth: 300,
            minSlides: 2,
            maxSlides: 2,
            moveSlides: 1,
            slideMargin: 10,
            oneToOneTouch: true
        };

        return window.innerWidth < 768 ? config2 : config1;
    };

    jQuery('.brand-slider').bxSlider(bxBrandConfig());

    jQuery(window).bind("load", function() {
        setProductFamilyTitlePosition();
    });

    jQuery(window).resize(function() {
        setProductFamilyTitlePosition();
    });

});

/**
 * Set the middle position of product-family-block title
 */
function setProductFamilyTitlePosition()
{
    jQuery('.product-family-block .item-url').has('h2.pos-2').each(function () {
        var blockHeight = jQuery(this).height();
        jQuery(this).find('h2.pos-2').each(function () {
            var title = jQuery(this);
            var position = parseInt((blockHeight - title.height())/2);
            position = (position < 0) ? 0 : position;
            title.css('top', position);
        });
    });
}
