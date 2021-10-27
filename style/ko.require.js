(function (ko) {
    ko.require = function (components, complete) {
        var data = {
            scripts: [],
            templates: []
        };
        var tempArr = [];
        for (var i = 0; i < components.length; i++) {
            addItem(components[i]);
        }
        delete tempArr;
        function addItem(name)
        {
            if (tempArr.indexOf(name) > -1) return;
            tempArr.push(name);
            var item = ko.COMPONENTS[name];
            if (item) {
                if (typeof item.scripts != 'undefined') {
                    for (var j = 0; j < item.scripts.length; j++) {
                        data.scripts.unshift(item.scripts[j]);
                    }
                }
                if (typeof item.templates != 'undefined') {
                    for (var j = 0; j < item.templates.length; j++) {
                        data.templates.push(item.templates[j]);
                    }
                }
                if (typeof item.related != 'undefined') {
                    for (var j = 0; j < item.related.length; j++) {
                        addItem(item.related[j]);
                    }
                }
            }
            else {
                console.log(name+ " Not found!");
            };
        }

        var counter = ko.observable(data.scripts.length + data.templates.length);
        counter.subscribe(function (val) {
            if (val == 0) complete();
        });

        ko.utils.arrayForEach(data.scripts, function (item) {
            if (!isLoaded(item.type)) {
                $.getScript(item.url, function (js) {
                    //$("body").append("<script type=\"text/javascript\">" + js + "<\/script>");
                }).done(function () {
                    counter(counter() - 1);
                }).error(function (e) { console.log(e); });
            } else {
                counter(counter() - 1);
            }
        });

        ko.utils.arrayForEach(data.templates, function (template) {
            if (!$("#" + template.id).is('*')) {
                //var url = template.url + ".html";
                //if (Application.defaultCulture !== Globalize.cultureSelector) {
                //    url = template.url + "." + Globalize.cultureSelector + ".html";
                //    if (!UrlExists(url))
                //        url = template.url + ".html";
                //}
                $.get(template.url, null, function (templ) {
                    $("body").append("<script id='" + template.id + "' type=\"text/html\">" + templ + "<\/script>");
                }).done(function () {
                    counter(counter() - 1);
                });
            } else {
                counter(counter() - 1);
            }
        });

        function isLoaded(name) {
            var parts = name.split('.');
            var root = window;
            for (var i = 0; i < parts.length; i++) {
                var obj = root[parts[i]];
                if (typeof obj == 'undefined') {
                    return false;
                } else {
                    root = obj;
                }
            }
            return true;
        }
        //function UrlExists(url) {
        //    var http = new XMLHttpRequest();
        //    http.open('HEAD', url, false);
        //    http.send();
        //    return http.status != 404;
        //}
    };

}(ko));