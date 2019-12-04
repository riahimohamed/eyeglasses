;
(function ($) {
    // Activation code
    $.fn.fidActivationCode = function (opt) {
        var $self = this;
        var options = $.extend({}, $.fn.fidActivationCode.defaultOptions, opt);

        var _factory = {
            init: function () {
                if (!options.formElement || !options.formElement.length) {
                    options.formElement = $self.find('form:first');
                    if (!options.formElement || !options.formElement.length) {
                        throw 'No form element where found.'
                    }
                }

                if (options.validateAction) {
                    options.formElement.attr('action', options.validateAction);
                }

                if (!options.validateAction) {
                    options.validateAction = options.formElement.attr('action');
                    if (!options.validateAction) {
                        throw 'Validate action is not set.'
                    }
                }

                $self.formElement = options.formElement;

                // Initialize events
                _factory.initEvents();

                // Initialize area
                _factory.initAreas();

                // Initialize form
                _factory.initForm();

                return $self;
            },
            initEvents: function () {
                $.each(_factory.eventsName, function (i, eventName) {
                    if (typeof options[eventName] === 'function') {
                        $self.on('fidActivationCode.' + eventName, options[eventName]);
                    }
                });

                return $self;
            },

            initAreas: function () {
                $self._areas = {
                    message: $('<div/>', {class: 'area-message'}).hide(),
                    loader: $('<div/>', {class: 'area-loader'}).hide()
                };

                $self._areas.message.prependTo(options.formElement);
                $self._areas.loader.appendTo(options.formElement);

                return $self;
            },
            resetMessagesAreas: function ($self) {
                $self._areas.message
                    .removeClass('success')
                    .removeClass('error')
                    .html('');

                $self.formElement.find('[data-message-field]')
                    .removeClass('success')
                    .removeClass('error');

                $self.formElement.find('[data-message-area]')
                    .removeClass('success')
                    .removeClass('error')
                    .html('');

                return $self;
            },
            initForm: function () {
                options.formElement.on('submit', function () {
                    _factory.onBeforeValidate($self);
                    $self.trigger('fidActivationCode.onBeforeValidate', [$self]);

                    $.ajax({
                        url: options.validateAction,
                        type: 'POST',
                        data: options.formElement.serializeArray(),
                        dataType: 'json',
                        success: function ($dataJson) {
                            _factory.onSuccessResponse($self, $dataJson);
                            $self.trigger('fidActivationCode.onSuccessResponse', [$self, $dataJson]);
                        },
                        error: function ($exception) {
                            _factory.onErrorResponse($self, $exception);
                            $self.trigger('fidActivationCode.onErrorResponse', [$self, $exception]);
                        },
                        complete: function ($dataJson) {
                            _factory.onAfterValidate($self, $dataJson);
                            $self.trigger('fidActivationCode.onAfterValidate', [$self, $dataJson]);
                        }
                    });

                    return false;
                });

                return $self;
            },
            onBeforeValidate: function ($self) {
                // Add loader
                $self._areas.loader.show();

                // Reset Area Messages
                _factory.resetMessagesAreas($self);
            },
            onAfterValidate: function ($self) {
                // remove loader
                $self._areas.loader.hide();
            },
            onSuccessResponse: function ($self, $dataJson) {
                // Display success message from server
                if (typeof $dataJson.message !== 'undefined') {

                    if (typeof $dataJson.message_area !== 'undefined' && $dataJson.message_area) {
                        var $container = $self.formElement.find('[data-message-field="' + $dataJson.message_area + '"]');
                        var $messageArea = $self.formElement.find('[data-message-area="' + $dataJson.message_area + '"]');

                        $container
                            .removeClass('success')
                            .removeClass('error')
                            .addClass(($dataJson.status ? 'success' : 'error'));

                        $messageArea
                            .removeClass('success')
                            .removeClass('error')
                            .addClass(($dataJson.status ? 'success' : 'error'))
                            .html($dataJson.message);

                    } else {
                        $self._areas.message
                            .removeClass('success')
                            .removeClass('error')
                            .addClass(($dataJson.status ? 'success' : 'error'))
                            .html($dataJson.message)
                            .fadeIn();
                    }

                    setTimeout(function () {
                        $self._areas.message.fadeOut();
                    }, 5000);
                }
            },
            onErrorResponse: function ($self, $exception) {
                // Display error message from server
                if (typeof $exception !== 'undefined') {
                    $self._areas.message
                        .removeClass('success')
                        .addClass('error')
                        .html($exception)
                        .fadeIn();
                    setTimeout(function () {
                        $self._areas.message.fadeOut();
                    }, 5000);
                }
            },
            eventsName: [
                'onBeforeValidate',
                'onAfterValidate',
                'onSuccessResponse',
                'onErrorResponse'
            ]
        };

        // Run It
        _factory.init();
    };
    $.fn.fidActivationCode.defaultOptions = {
        formElement: false,
        validateAction: false,
        onBeforeValidate: false,
        onAfterValidate: false,
        onSuccessResponse: false,
        onErrorResponse: false
    };

    // Related fields
    $.fn.twoFieldsInput = function (opts) {

        var $self = this;
        var options = $.extend({}, $.fn.twoFieldsInput.defaultOptions, opts);

        var _factory = {
            init: function () {
                if (typeof options.firstField === 'undefined' || typeof options.secondField === 'undefined') {
                    throw 'firstField and secondField options are required.';
                }

                if (!options.firstField
                    || !options.firstField.length
                    || !options.secondField
                    || !options.secondField.length) {
                    return $self;
                }

                options.firstField.on('keyup', function () {
                    var el = $(this);
                    var firstVal = originVal = el.val();

                    if (firstVal.length < options.maxLength) {
                        firstVal = firstVal.replace(options.firstFieldRegex, '');
                        el.val(firstVal);
                    } else {
                        if (firstVal.length === options.maxLength) {
                            options.secondField.focus();
                            firstVal = firstVal.replace(options.firstFieldRegex, '');
                            el.val(firstVal);

                        } else {

                            firstVal = firstVal.substr(0, options.maxLength - 1);
                            firstVal = firstVal.replace(options.firstFieldRegex, '');
                            el.val(firstVal);

                            var secondVal = originVal.substr(options.maxLength, originVal.length - 1);
                            options.secondField.val(secondVal);

                            options.secondField.trigger('keyup');

                            options.secondField.trigger('focus');

                        }
                    }
                });

                options.secondField.on('keyup', function () {
                    var el = $(this);
                    var secondVal = el.val();
                    secondVal = secondVal.replace(options.secondFieldRegex, '');
                    el.val(secondVal);

                });

            }
        };

        _factory.init();
    };
    $.fn.twoFieldsInput.defaultOptions = {
        firstField: false,
        secondField: false,
        firstFieldRegex: new RegExp('[^a-zA-Z]+', 'i'),
        secondFieldRegex: new RegExp('[^0-9]+', 'i'),
        maxLength: 4
    };

    // gMap init
    $.fn.googleMapInit = function (opts) {
        var $self = this;
        var options = $.extend({}, $.fn.googleMapInit.defaultOptions, opts);

        var _call = {
            init: function () {
                if(typeof options.height === 'undefined' || options.height === false)  {
                    $self.css({width: options.width});
                }else{
                    $self.css({width: options.width, height: options.height});
                }


                $self.map = new google.maps.Map(document.getElementById($self.attr('id')), {
                    center: options.center,
                    zoom: 12
                });

                $self.marker = new google.maps.Marker({
                    position: options.center,
                    map: $self.map,
                    title: options.title,
                    icon: options.marker.icon
                });

                $self.infowindow = new google.maps.InfoWindow({
                    content: options.marker.infowindow
                });

                // $self.marker.addListener('click', function() {
                //     $self.infowindow.open($self.map, $self.marker);
                // });
            }
        };

        _call.init.bind($self);
        _call.init();
    };
    $.fn.googleMapInit.defaultOptions = {
        width: '100%',
        // height: 400,
        center: {
            lat: 0,
            lng: 0
        },
        title: ''
    };

    // add data
    $.fn.dataAttr = function ($key, $val) {
        var $this = $(this);

        if (typeof $val !== 'undefined') {
            $this.attr('data-' + $key, $val);

            return $this;
        }

        return $this.attr('data-' + $key);
    };

    // infobull
    $.fn.infobull = function (opts) {
        var $self = this;
        var options = $.extend({}, $.fn.infobull.defaultOptions, opts);
        var _factory = {
            init: function ($self) {
                $($self).each(function () {
                    var $this = $(this);
                    _factory.getRegistry().push($this);
                });

                // Each infobull
                $($self).each(function () {
                    var $this = $(this);
                    var $iconEl = _factory.getIconEl($this);

                    $iconEl.click(function () {
                        var $thisPopupEl = _factory.getPopupEl($this);

                        // Hide & stop
                        if (parseInt($thisPopupEl.dataAttr('infobull-visibilty')) === 1) {
                            $thisPopupEl.dataAttr('infobull-visibilty', 0).hide();

                            return false;
                        }

                        $thisPopupEl.dataAttr('infobull-toshow', 1);

                        $.each(_factory.getRegistry(), function (i, e) {
                            var $popupEl = _factory.getPopupEl(e);
                            $popupEl.dataAttr('infobull-toshow') != 1 && $popupEl.dataAttr('infobull-visibilty', 0).hide();
                        });

                        // Show element
                        $thisPopupEl.dataAttr('infobull-visibilty') != 1 &&
                        $thisPopupEl
                            .dataAttr('infobull-toshow', 0)
                            .dataAttr('infobull-visibilty', 1).fadeIn();
                    });
                });
            },
            getIconEl: function ($el) {
                return $el.find(options.iconElSelector);
            },
            getPopupEl: function ($el) {
                return $el.find(options.popupElSelector);
            },
            getRegistry: function () {
                // create registry
                window._infobulRegistry = typeof window._infobulRegistry !== 'undefined' ? window._infobulRegistry : [];
                return window._infobulRegistry;
            }
        };

        _factory.init($self);
    };

    $.fn.infobull.defaultOptions = {
        iconElSelector: '.infobull-icon',
        popupElSelector: '.infobull-content'
    };


    window.updateOpticien = function (store) {
        $.ajax({
            url: window.opticianConfig.changeCodeMagasinUrl,
            dataType: 'json',
            data: {code: store.code},
            success: function (dataJson) {
                if(typeof window.opticianConfig.changeCodeMagasinSuccess === 'function'){
                    window.opticianConfig.changeCodeMagasinSuccess(dataJson);
                    return;
                }
                alert(dataJson.message);
            },
            error: function (e) {
                throw e;
            }
        });

        return false;
    };

    // init
    $(function () {
        $('[data-infobull]').infobull();
    });

})(jQuery);