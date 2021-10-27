$(function () {
    Application.init();

    $(".select2-el")
        .live("select2-open", function () {
            $(this).parent().find('.btn-success').addClass('db');
        })
        .live("select2-close", function () {
            $(this).parent().find('.btn-success').removeClass('db');
            //$(this).parent().find('.select2-container').removeClass('select2-container-active');
        });
});

(function ($) {
    $.fn.disableSelection = function () {
        return this
                 .attr('unselectable', 'on')
                 .css('user-select', 'none')
                 .on('selectstart', false);
    };
})(jQuery);

var Application = function () {
    return {
        init: init,
        AjaxLoader: ' <i class="fa fa-spinner fa-spin"></i>',
        Select2PageLimit: 20,
        getWeekNumber: getWeekNumber,
        clearValidationSummary: clearValidationSummary,
        setErrorsToValidationSummary: setErrorsToValidationSummary,
        dateFormat: dateFormat,
        kendoDateFormat: kendoDateFormat,
        kendoDateTimeFormat: kendoDateTimeFormat,
        kendoTimeFormat: kendoTimeFormat,
        addLoaderToButton: addLoaderToButton,
        removeLoaderFromButton: removeLoaderFromButton,
        defaultCulture: 'ru-RU',
        printElement: printElement,
        dataSource: dataSource,
        manualGetByName: manualGetByName,
        select2Editor: select2Editor
    }
    function select2Source(opt) {
        var options = {
            multiple: false,
            actionName: "",
            query:[]
        };
        $.extend(options, opt);
        return {
            minimumInputLength: 0,
            allowClear: true,
            multiple: options.multiple,
            placeholder: Lang.PleaseSelect,
            ajax: {
                url: '/' + Globalize.cultureSelector + '/Manual/' + options.actionName,
                type: 'GET',
                dataType: 'json',
                data: function (term, page) {
                    var q = {
                        term: term,
                        limit: Application.Select2PageLimit,
                        page: page,
                    };
                    $.each(options.query, function (key, value) {
                        $.each(value, function (key, value) {
                            q[key] = value;
                        });
                    });

                    return q;
                },
                results: function (data, page) {
                    var more = (page * Application.Select2PageLimit) < data.total;
                    return { results: data.result, more: more };
                }
            },
            initSelection: function (element, callback) {

                if (options.multiple) {
                    $.ajax({
                        url: '/' + Globalize.cultureSelector + '/Manual/' + options.actionName,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            MultipleId: element.val(),
                            IsMultiple: true

                        },
                        success: function (data) {
                            callback(data);
                        }
                    });
                }
                else {
                    $.ajax({
                        url: '/' + Globalize.cultureSelector + '/Manual/' + options.actionName,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            Id: element.val(),
                        },
                        success: function (data) {
                            callback(data);
                        }
                    });
                }
            }
        };
    }
    function select2Editor(actionName) {
       
        var result = function _select2Editor(container, options) {
            var editor = $('<input type="hidden" style="width:90%" name="' + options.field + '" data-bind="value:' + options.field + '" value="' + options.model[options.field] + '" class="form-control"/>')
                  .appendTo(container).select2(select2Source({ actionName: actionName }));
        }
        return result;
    };
    function manualGetByName(name) {
        var _data = null;
        $.ajax({
            url: '/' + Globalize.cultureSelector + '/Manual/' + name,
            type: 'GET',
            dataType: 'json',
            async:false,
            success: function (data) {
                _data = data;
            }
        });
        return _data;
    }
    function dataSource(url, model, options) {
        options = options || {};
        return new kendo.data.DataSource({
            transport: {
                read:
                {
                    url: url,
                    type: "GET",
                    contentType: "application/json"
                },
                destroy:
                {
                    url: url,
                    type: "DELETE",
                    contentType: "application/json"
                },
                create:
                {
                    url: url,
                    type: "POST",
                    contentType: "application/json"
                },
                update:
                {
                    url: url,
                    type: "PUT",
                    contentType: "application/json"


                },
                parameterMap: function (data, operation) {
                    return JSON.stringify(data);
                }
            },
            serverPaging: true,
            serverSorting: true,
            serverFiltering: true,
            sortable: true,
            pageSize:options.pageSize|| 10,
            schema:
            {
                model: model,
                data: function (data) { return data.Data; },
                total: function (data) { return data.Total; },

            },
            filter:options.filter,
            errors: "Ошибка !!!",
            error: function (e) {
             
                var response = e.xhr.responseJSON;
                if (response) {
                    var errors = "";
                    $.each(response, function (value, key) {
                        errors += "<p>" + key.ErrorMessage + "</p>";
                       
                    });
                  
                }
                Notify(errors, 'top-right', '5000', 'danger', 'fa-ban', true);


            },
        });
    };
    function printElement(elem) {
        var domClone = elem.cloneNode(true);

        var $printSection = document.getElementById("printSection");

        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }

        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }
    function addLoaderToButton(button) {
        $.each(button, function (index, item) {
            var btn = $(item);
            btn.addClass("disabled");
            btn.append(Application.AjaxLoader);
        });
    }

    function removeLoaderFromButton(button) {
        $.each(button, function (index, item) {
            var btn = $(item);
            if (btn.hasClass('disabled')) {
                btn.removeClass("disabled");
                btn.find("i.fa").remove();
            }
        });
    }

    function dateFormat(stringOrJsonDate, format) {
        if (!stringOrJsonDate)
            return null;
        if (typeof format == 'undefined')
            format = 'd';
        return Globalize.format(new Date(stringOrJsonDate.indexOf("/Date(") > -1 ? Globalize.parseInt(stringOrJsonDate.substr(6).replace(')/', '')) : stringOrJsonDate), format);
    }

    function kendoDateFormat(strDate) {
        if (typeof kendo == 'undefined') {
            return null;
        } else {
            return strDate == null ? '' : kendo.format('{0:d}', new Date(strDate));
        }
    }

    function kendoDateTimeFormat(strDateTime) {
        if (typeof kendo == 'undefined') {
            return null;
        } else {
            return strDateTime == null ? '' : kendo.format('{0:d} {0:t}', new Date(strDateTime));
        }
    }
    function kendoTimeFormat(strDateTime) {
        if (typeof kendo == 'undefined') {
            return null;
        } else {
            return strDateTime == null ? '' : kendo.format('{0:t}', new Date(strDateTime));
        }
    }
    function init() {
        Date.prototype.getWeek = function () {
            var onejan = new Date(this.getFullYear(), 0, 1);
            var week = Math.ceil((((this - onejan) / 86400000) + onejan.getDay() + 1) / 7);

            return week.getDay() == 7 ? week - 1 : week;
        }

        Array.prototype.equals = function (array) {
            // if the other array is a falsy value, return
            if (!array)
                return false;

            // compare lengths - can save a lot of time 
            if (this.length != array.length)
                return false;

            for (var i = 0, l = this.length; i < l; i++) {
                // Check if we have nested arrays
                if (this[i] instanceof Array && array[i] instanceof Array) {
                    // recurse into the nested arrays
                    if (!this[i].equals(array[i]))
                        return false;
                }
                else if (this[i] != array[i]) {
                    // Warning - two different object instances will never be equal: {x:20} != {x:20}
                    return false;
                }
            }
            return true;
        }

    };

    /* For a given date, get the ISO week number
        *
        * Based on information at:
        *
        *    http://www.merlyn.demon.co.uk/weekcalc.htm#WNR
        *
        * Algorithm is to find nearest thursday, it's year
        * is the year of the week number. Then get weeks
        * between that date and the first day of that year.
        *
        * Note that dates in one year can be weeks of previous
        * or next year, overlap is up to 3 days.
        *
        * e.g. 2014/12/29 is Monday in week  1 of 2015
        *      2012/1/1   is Sunday in week 52 of 2011
        */
    function getWeekNumber(d) {
        // Copy date so don't modify original
        d = new Date(+d);
        d.setHours(0, 0, 0);
        // Set to nearest Thursday: current date + 4 - current day number
        // Make Sunday's day number 7
        d.setDate(d.getDate() + 4 - (d.getDay() || 7));
        // Get first day of year
        var yearStart = new Date(d.getFullYear(), 0, 1);
        // Calculate full weeks to nearest Thursday
        var weekNo = Math.ceil((((d - yearStart) / 86400000) + 1) / 7)
        // Return array of year and week number
        return [d.getFullYear(), weekNo];
    }

    function clearValidationSummary(context) {
        var validationSummary = $("[class^='validation-summary']", context);

        if (validationSummary.hasClass("validation-summary-errors"))
            validationSummary.removeClass("validation-summary-errors");
        validationSummary.addClass("validation-summary-valid");
        $("ul", validationSummary).html('');
        $("<li/>", { style: 'display: none' }).appendTo($("ul", validationSummary));
        $("input.input-validation-error").removeClass('input-validation-error');
    };

    function setErrorsToValidationSummary(errors, context) {
        var validationSummary = $("[class^='validation-summary']", context);

        if (validationSummary.hasClass("validation-summary-valid"))
            validationSummary.removeClass("validation-summary-valid");
        validationSummary.addClass("validation-summary-errors");
        $("ul", validationSummary).text('');
        $.each(errors, function (index, error) {
            if (error.key)
                context.find("input[name='" + error.key + "']").addClass("input-validation-error");
            $.each(error.values, function (i, e) {
                $("<li/>", { text: e }).appendTo($("ul", validationSummary));
            })
        });

    };

}();