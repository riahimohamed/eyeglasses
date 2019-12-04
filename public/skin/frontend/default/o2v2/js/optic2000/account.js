jQuery(document).ready(function(){
    if(typeof jQuery.datepicker !== 'undefined') {
        jQuery.datepicker.setDefaults(jQuery.datepicker.regional["fr"]);
        jQuery.datepicker.setDefaults({
            showOn: "both",
            buttonImageOnly: true,
            buttonImage: "/skin/frontend/default/o2v2/images/tunnel/calendar.png",
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            firstDay: 1,
            changeMonth: true,
            changeYear: true,
            yearRange :  "c-100:c",
            maxDate: 0
        });

        jQuery("#date-of-birth").datepicker({dateFormat: "dd/mm/yy"});
    }
    
    // Validate inscription form
    /*if(typeof jQuery().validate !== 'undefined') {
        jQuery("#register-customer-form").validate({errorContainer: jQuery('#register-customer-form ul.messages>li.error-msg')});
    }*/

    function validateEmail(email) {
        var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.([a-zA-Z]{2,4})$/;
        return filter.test(String(email));
    }

    jQuery('#email').blur(function(){
        jQuery('#confirmation_email').val(jQuery(this).val());
    });

    jQuery('#email').change(function(){
        if (validateEmail(this.value)) {
            jQuery(this).removeClass("validation-ko").addClass("validation-ok");
        }else{
            jQuery(this).removeClass("validation-ok").addClass("validation-ko");
        }
    });

    //for the section accordeon in my-account
    jQuery('div.customer-section-in').children('div.customer-section-header').click(function(){
        if(jQuery(this).parent('div.customer-section-in').children('.customer-section-content').is(':visible')){
            jQuery(this).removeClass('open').parent('div.customer-section-in').children('.customer-section-content').hide();
        }else{
            jQuery(this).addClass('open').parent('div.customer-section-in').children('.customer-section-content').show();
        }
    });

    //get the accorderon open when the url contains an anchor
    var oldhash = '';
    window.setInterval(function () {
        if (window.location.hash != oldhash ) {
            jQuery(window.location.hash).children('div.customer-section-in').children('.customer-section-content').show();
            jQuery(window.location.hash).children('div.customer-section-in').children('.customer-section-header').addClass('open');
            oldhash = window.location.hash;
        }
    }, 200);

    if(typeof Fb != 'undefined') {
        FitPhotoAPI = Fb.FitPhotoAPI.GetInstance({FitPhotoAPI:{ container:'#myFitPhoto' }});
        FitPhotoAPI.SetModel(model, generateRenders);
    }

    jQuery("input[type='text']").on("autocompleteselect", function(event){
        var target = jQuery(event.target);
        if (target.attr('id') == target.attr('id') || (target.hasClass("ui-autocomplete-input") && !target.parent("li").find("#cap-error-msg").length)) {
            target.removeClass("validation-ko").addClass("validation-ok");
        }
    }).on("autocompleteresponse", function(event, ui){
        var target = jQuery(event.target);
        if (    ui.content.length &&
                (
                    target.attr('id') == target.attr('id')
                    || (target.hasClass("ui-autocomplete-input") && target.parent("li").find("#cap-error-msg").length)
                    || target.val() == ""
                )
        ) {
            if (validateEmail(target.val())) {
                target.removeClass("validation-ko").addClass("validation-ok");
            }else {
                target.removeClass("validation-ok").addClass("validation-ko");
            }
        }
    });
});

var FitPhotoAPI = null;
var generateRenders = function(){
    for(i = 0;i < skus.length;i++){
        var render = new Image();
        render.src = FitPhotoAPI.GetImageURL(skus[i]);
        render.style.cssText = 'margin:10px;width:192px;height:256px; background:url(' + FitPhotoAPI._CurrentModel.url + ') no-repeat center center; background-size: contain;';
        jQuery(render).appendTo(FitPhotoAPI._Container);
    }
};