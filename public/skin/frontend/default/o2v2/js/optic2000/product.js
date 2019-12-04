var is_lentille = false;
jQuery(document).ready(function() {
    function validate_lentille_options() {
        var qte = parseInt(jQuery("#qte_left").val())+parseInt(jQuery("#qte_right").val());
        if(qte === 0) {
            jQuery("#qte_left").addClass('form_error');
            jQuery("#qte_right").addClass('form_error');
        }
        jQuery("#options-lentille [id$=_select], #product_addtocart_form [id$=_OR]").removeClass('form_error');

        selector = new Array();
        if(jQuery('#qte_left').val() > 0) {
            selector.push('#options-lentille [id$=_select]');
        }
        if(jQuery('#qte_right').val() > 0) {
            selector.push('#options-lentille [id$=_OR]');
        }

        validate = jQuery(selector.join(', ')).length === 0 ? false : true;
        jQuery(selector.join(', ')).each(checkChoix);

        return validate;
    }        

    jQuery("#btn_add_cart").click(function(){
        var submit_button = jQuery(this);

        if(is_lentille) {
            if(!validate_lentille_options()) {
                return;
            }
        }

        jQuery.ajax({
            type: "GET",
            url: checkout_url,
            beforeSend: function() {
                submit_button.children('img').first().show();
                submit_button.attr('disabled', 'disabled')
                    .addClass('gris-fonce')
                    .removeClass('orange');
            
                submit_button.parents("form").find("input").attr("readonly", true);
                submit_button.parents("form").find("select").each(function(){
                    jQuery(this).data("default", jQuery(this).find(":selected"));
                });
                
                submit_button.parents("form").find("select").change(function(e) {
                    jQuery(jQuery(this).data("default")).attr("selected", true);
                });
            },
            success: function (response) {
                if(response.authorized == true) {
                    jQuery("#btn_force_add_cart").trigger("click");
                }
                else {
                    jQuery("#btn_force_add_cart").attr("name", "force_add").attr("value", 1);
                    jQuery.colorbox({
                        inline:true,
                        href:"#popin-alert-shipping-method",
                        opacity: 0.5,
                        transition: "fade",
                        maxWidth: "900px",
                        overlayClose : false,
                        onLoad: function()  {
                             jQuery("#popin-alert-shipping-method").show();
                         },
                         onCleanup: function() {
                             jQuery("#popin-alert-shipping-method").hide();
                         }
                    });
                }
            }
        });
    });
});