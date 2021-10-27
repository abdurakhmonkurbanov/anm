$.validator.methods.number = function (value, element) {
    return this.optional(element) || Globalize.parseFloat(value) != NaN;
}

$.validator.methods.date = function (value, element) {
    var patterns = Globalize.culture().calendars.standard.patterns;
    var format = patterns.d + ' ' + patterns.t;

    return this.optional(element) || Globalize.parseDate(value) || Globalize.parseDate(value, format);
}

$(function () {
    jQuery.extend(jQuery.validator.methods, {
        range: function (value, element, param) {
            var val = $.global.parseFloat(value);
            return this.optional(element) || (val >= param[0] && val <= param[1]);
        }
    });
});