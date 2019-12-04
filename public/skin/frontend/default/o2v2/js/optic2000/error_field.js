(function ($) {
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
                    $field = $($field);
                    var $key = $field.attr($options.fieldSelector);
                    if (typeof $options.errors[$key] !== 'undefined') {

                        var $errMessage = $options.errors[$key];
                        $field.addClass($options.errCssClass);
                        $field.append($('<span/>', {
                            html: $errMessage
                        }).css('display', 'block'));

                        // Show Parent Container
                        if (typeof $options.afterErrorPrint === 'function') {
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
})(jQuery);