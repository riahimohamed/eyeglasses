/* 
 * © Optic2000
 * Tel 01.41.23.76.76
 */
(function($) {
    $.fn.validate = function(options) {
        if(!$(this).is('form')) {
           return false;
        }
        $(this).submit(function(){
            var errors = new Array();
            var fields = $('#' + $(this).attr('id') + ' input[type!="hidden"], input[form=' + $(this).attr('id') + '], select[form=' + $(this).attr('id') + '], textarea[form=' + $(this).attr('id') + ']');
            fields.removeClass('error-field');
            $(options.errorContainer).empty();
            fields.each(function (){
                if($(this).is(':hidden')) {
                    return;
                }
                // Required
                if(Boolean($('#' + $(this).attr('id') + '[validate-required]').length) && $(this).val() === "") {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" est obligatoire');
                    $(this).addClass('error-field');
                }
                // Alpha
                if(Boolean($('#' + $(this).attr('id') + '[validate-alpha]').length) && $(this).val() && !!($(this).val().match(/[^a-zA-Z- öäüÖÄÜáàâéèêúùûóòôÁÀÂÉÈÊÚÙÛÓÒÔ']/ig))) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" n\'accepte que les caractères');
                    $(this).addClass('error-field');
                }
                // Num
                if(Boolean($('#' + $(this).attr('id') + '[validate-num]').length) && $(this).val() && !!($(this).val().match(/[^0-9']/ig))) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" n\'accepte que les chiffres');
                    $(this).addClass('error-field');
                }
                // Email
                if(Boolean($('#' + $(this).attr('id') + '[validate-email]').length) && $(this).val() && !($(this).val().match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm))) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit être un mail valide');
                    $(this).addClass('error-field');
                }
                // Tel
                if(Boolean($('#' + $(this).attr('id') + '[validate-tel]').length) && $(this).val()) {
                    var reg_tel = $(this).attr('validate-tel') === 'fixe' ? /^(01|02|03|04|05|08|09)[0-9]{8}$/ : /^(06|07)[0-9]{8}$/;
                    if(!($(this).val().match(reg_tel))) {
                        errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit être valide');
                        $(this).addClass('error-field');
                    }
                }
                // Date
                if(Boolean($('#' + $(this).attr('id') + '[validate-date]').length) && $(this).val() && $(this).datepicker("getDate") === null) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit être une date valide');
                    $(this).addClass('error-field');
                }
                // Length
                if(Boolean($('#' + $(this).attr('id') + '[validate-length]').length) && $(this).val() && $(this).val().length !== parseInt($(this).attr('validate-length'))) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit avoir ' + $(this).attr('validate-length') + ' caractère(s)');
                    $(this).addClass('error-field');
                }
                // Min
                if(Boolean($('#' + $(this).attr('id') + '[validate-min]').length) && $(this).val() && $(this).val().length < parseInt($(this).attr('validate-min'))) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit avoir au moins ' + $(this).attr('validate-min') + ' caractère(s)');
                    $(this).addClass('error-field');
                }
                // Max
                if(Boolean($('#' + $(this).attr('id') + '[validate-max]').length) && $(this).val() && $(this).val().length > parseInt($(this).attr('validate-max'))) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit avoir au plus ' + $(this).attr('validate-max') + ' caractère(s)');
                    $(this).addClass('error-field');
                }
                // Confirmation
                if(Boolean($('#' + $(this).attr('id') + '[validate-confirm]').length) && $(this).val() && $(this).val() !== $('#' + $(this).attr('validate-confirm')).val()) {
                    errors.push('Le champ "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" doit être égale au champ  "' + $('label[for="' + $('#' + $(this).attr('validate-confirm')).attr('id') + '"]').text() + '"');
                    $(this).addClass('error-field');
                }
                // Required one
                if(Boolean($('#' + $(this).attr('id') + '[validate-required-one]').length) && $(this).val() === "" && $('#' + $(this).attr('validate-required-one')).val() === "") {
                    errors.push('Au moins un de ces 2 champs est obligatoire : "' + $('label[for="' + $(this).attr('id') + '"]').text() + '" ou "' + $('label[for="' + $('#' + $(this).attr('validate-required-one')).attr('id') + '"]').text() + '"');
                    $(this).addClass('error-field');
                    $('#' + $(this).attr('validate-required-one')).addClass('error-field');
                }
            });

            _populateErrors(errors, options.errorContainer);

            if(errors.length > 0) {
                return false;
            }

            return true;
        });
    };

    function _populateErrors(errors, element) {
        if(errors.length > 0 && !Boolean($(element).has('ul').length)) {
            $(element).append('<ul></ul>');
        }
        
        for(i = 0; i < errors.length; i++) {
            $(element).children('ul').first().append('<li>' + errors[i] + '</li>');
        }
    }
}(jQuery));