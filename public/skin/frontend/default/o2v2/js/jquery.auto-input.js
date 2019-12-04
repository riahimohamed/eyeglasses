;(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals.
        factory(jQuery);
    }
}(function ($) {

    $.fn.autoInput = function ($opts) {
        $(this).each(function () {
            var $input = $(this);
            var $options = $.extend({}, $.fn.autoInput.defaultOptions, $opts);
            var _FACTORY = {
                getInput: function () {
                    return this.input;
                },
                getOptions: function () {
                    return this.options;
                },
                getDropDownArea: function () {
                    if (typeof this.autoCompleteArea === 'undefined') {
                        this.autoCompleteArea = $('<div />', {
                            class: '_autocomplete-area',
                            style: 'min-width: ' + _FACTORY.getInput().width() + 'px;',
                        });
                        _FACTORY.getInput().after(this.autoCompleteArea);

                    }
                    return this.autoCompleteArea;
                },
                getDropDownAreaChildren: function () {
                    return _FACTORY.getDropDownArea().find('._auto-complete-item');
                },
                getDropDownAreaSelectedChild: function () {
                    return _FACTORY.getDropDownArea().find('._auto-complete-item.selected');
                },
                init: function ($input, $options) {
                    this.input = $input;

                    this.options = $options;

                    _FACTORY.handleInputKeyPress();

                    _FACTORY.handleDropDownBlur();

                    _FACTORY.handleDropDownKeyboard();
                },
                handleInputKeyPress: function () {
                    _FACTORY.getInput().on('keypress', function (event) {
                        if (typeof _FACTORY.requestTimer !== 'undefined') {
                            clearTimeout(_FACTORY.requestTimer);
                        }
                        _FACTORY.requestTimer = setTimeout(function () {
                            _FACTORY.performRequest();
                        }, _FACTORY.getOptions().requestDelay);
                    });

                    _FACTORY.getInput().on('click', function (event) {
                        if (_FACTORY.getDropDownArea().is(":visible")) {
                            setTimeout(function () {
                                _FACTORY.getDropDownArea().show();
                            }, 600);
                        }
                    });
                },
                handleDropDownBlur: function () {
                    $(document).on('click', '*', function (event) {
                        if (event.target !== _FACTORY.getDropDownArea() && event.target !== _FACTORY.getInput()) {
                            _FACTORY.getDropDownArea().hide();
                        }
                    });
                },
                handleDropDownKeyboard: function () {
                    _FACTORY.getInput().keydown(function (e) {
                        if (!_FACTORY.getDropDownArea().is(":visible")) {
                            _FACTORY.getDropDownArea().show();
                        }

                        if (e.keyCode === 13) { // enter
                            if (_FACTORY.getDropDownArea().is(":visible")
                            && _FACTORY.getDropDownAreaSelectedChild().length) {
                                //_FACTORY.preventSubmit = true;
                                _FACTORY.getDropDownAreaSelectedChild().trigger('click');
                                return false;
                            }
                        }
                        var $selectedItem = _FACTORY.getDropDownAreaSelectedChild();
                        if (e.keyCode === 38) { // up

                            var $prev = $selectedItem.prev();
                            _FACTORY.getDropDownAreaChildren().removeClass("selected");
                            if ($prev.length === 0) {
                                _FACTORY.getDropDownAreaChildren().last().addClass("selected");
                            } else {
                                $prev.addClass("selected");
                            }
                        } else if (e.keyCode === 40) { // down

                            var $next = $selectedItem.next();
                            _FACTORY.getDropDownAreaChildren().removeClass("selected");
                            if ($next.length === 0) {
                                _FACTORY.getDropDownAreaChildren().first().addClass("selected");
                            } else {
                                $next.addClass("selected");
                            }
                        }
                    });
                },
                performRequest: function () {
                    var $input = _FACTORY.getInput();
                    var $opts = _FACTORY.getOptions();
                    if ($input.val().trim().length >= $opts.minLengthQuery) {
                        $.ajax({
                            url: $opts.requestUrl + '?' + $opts.requestParamName + '=' + $input.val().trim(),
                            type: 'json',
                            success: function ($dataJson) {
                                _FACTORY.buildResponseHtml($dataJson);
                            },
                            error: function ($exception) {
                                throw $exception;
                            }
                        });
                    }
                },
                buildResponseHtml: function ($dataJson) {
                    var $data2Display = $dataJson.slice(0, _FACTORY.getOptions().maxResponseItems - 1);

                    // Build area autocomplete
                    _FACTORY.getDropDownArea().html('').show();

                    if (typeof $data2Display.length === 'undefined' || $data2Display.length === 0) {
                        if (_FACTORY.getOptions().responseEmptySentence) {
                            var $uiItem = _FACTORY.buildItemResponseHtml({
                                id: 0,
                                value: '',
                                label: _FACTORY.getOptions().responseEmptySentence,
                            });
                            _FACTORY.getDropDownArea().append($uiItem);
                        }else{
                            _FACTORY.getDropDownArea().hide();
                        }
                    } else {
                        $.each($data2Display, function (i, $itemData) {
                            var $uiItem = _FACTORY.buildItemResponseHtml($itemData);
                            _FACTORY.getDropDownArea().append($uiItem);
                            _FACTORY.onItemResponseSelect(_FACTORY, $uiItem, $itemData);
                        });
                    }


                },
                buildItemResponseHtml: function ($itemData) {
                    return $('<div />', {
                        "class": '_auto-complete-item',
                        "data-id": $itemData.id,
                        "data-value": $itemData.value,
                        "html": $itemData.label
                    });
                },
                onItemResponseSelect: function ($factory, $uiItem, $itemData) {
                    $uiItem.on('click', function (event) {
                        $factory.getOptions().onItemResponseSelect($factory, $uiItem, $itemData);
                    });
                }
            };
            _FACTORY.init($input, $options);
        });
    };

    $.fn.autoInput.defaultOptions = {
        minLengthQuery: 3,
        requestDelay: 500,
        requestUrl: null,
        requestParamName: 'term',
        responseEmptySentence: null,
        maxResponseItems: 10,
        onItemResponseSelect: function ($factory, $uiItem, $itemData) {
        }
    };
}));
