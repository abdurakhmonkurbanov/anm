$(function () {
    if (typeof (ko) != 'undefined') {
        enableKnockOutDateTime();
        enableKnockOutAutoComplete();
        enableKnockoutExpandable();
        enableKnockOutSelect2Integration();
        enableKoCkEditor();
        enablekeyevents();
    }
});

function enableKnockOutDateTime() {
    ko.bindingHandlers.datepicker = {
        init: function (element, valueAccessor, allBindingsAccessor) {
            var obj = valueAccessor(),
                allBindings = allBindingsAccessor(),
                lookupKey = allBindings.lookupKey;
            $(element).datepicker($.extend(obj, { autoclose: true }));
            if (lookupKey) {
                var value = ko.utils.unwrapObservable(allBindings.value);
                $(element).datepicker('value', ko.utils.arrayFirst(obj.data.results, function (item) {
                    return item[lookupKey] === value;
                }));
            }

            ko.utils.domNodeDisposal.addDisposeCallback(element, function () {
                $(element).datepicker('destroy');
            });
        },
        update: function (element) {
            $(element).trigger('change');
        }
    };
    if (typeof $.fn.tDatePicker != 'undefined') {
        ko.bindingHandlers.tDatePicker = {
            init: function (element, valueAccessor, allBindingsAccessor) {
                var obj = valueAccessor(),
                    allBindings = allBindingsAccessor(),
                    lookupKey = allBindings.lookupKey;
                $(element).tDatePicker(obj);
                if (lookupKey) {
                    var value = ko.utils.unwrapObservable(allBindings.value);
                    $(element).tDatePicker('value', ko.utils.arrayFirst(obj.data.results, function (item) {
                        return item[lookupKey] === value;
                    }));
                }

                ko.utils.domNodeDisposal.addDisposeCallback(element, function () {
                    $(element).tDatePicker('destroy');
                });
            },
            update: function (element, valueAccessor, allBindingsAccessor) {
                var value = allBindingsAccessor().value();
                $(element).tDatePicker("value", Globalize.parseDate(value));
            }
        };
    }
}

function enableKnockOutAutoComplete() {
    ko.bindingHandlers.autocomplete = {
        init: function (element, valueAccessor, allBindingsAccessor) {
            var obj = valueAccessor(),
                allBindings = allBindingsAccessor(),
                lookupKey = allBindings.lookupKey;
            $(element).typeahead(obj);
            if (lookupKey) {
                var value = ko.utils.unwrapObservable(allBindings.value);
                $(element).typeahead('value', ko.utils.arrayFirst(obj.data.results, function (item) {
                    return item[lookupKey] === value;
                }));
            }

            ko.utils.domNodeDisposal.addDisposeCallback(element, function () {
                $(element).unbind();
            });
        },
        update: function (element) {
            $(element).trigger('change');
        }
    };
}

function enableKnockoutExpandable() {
    ko.bindingHandlers.expandable = {
        init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
            if ($(element).hasClass('ui-expander')) {
                var expander = element;
                var head = $(expander).find('.ui-expander-head');
                var content = $(expander).find('.ui-expander-content');

                $(head).click(function () {
                    $(head).toggleClass('ui-expander-head-collapsed');
                    $(content).toggle("fast");
                });
            }
        }
    };
}

function enableKnockOutSelect2Integration() {
    ko.bindingHandlers.select2 = {
        init: function (element, valueAccessor, allBindingsAccessor) {
            var obj = valueAccessor(),
                allBindings = allBindingsAccessor(),
                lookupKey = allBindings.lookupKey;
            $(element).select2(obj);
            if (lookupKey) {
                var value = ko.utils.unwrapObservable(allBindings.value);
                $(element).select2('data', ko.utils.arrayFirst(obj.data.results, function (item) {
                    return item[lookupKey] === value;
                }));
            }

            ko.utils.domNodeDisposal.addDisposeCallback(element, function () {
                $(element).select2('destroy');
            });
        },
        update: function (element) {
            $(element).trigger('change');
        }
    };
}
function enableKoCkEditor() {
    ko.bindingHandlers.ckEditor = {

        init: function (element, valueAccessor, allBindingsAccessor, viewModel) {
            var txtBoxID = $(element).attr("id");
            var options = allBindingsAccessor().richTextOptions || {};
            //about,a11yhelp,basicstyles,bidi,blockquote,button,clipboard,colorbutton,colordialog,contextmenu,dialogadvtab,div,elementspath,enterkey,entities,filebrowser,find,flash,font,format,forms,horizontalrule,htmldataprocessor,iframe,image,indent,justify,keystrokes,link,list,liststyle,maximize,newpage,pagebreak,pastefromword,pastetext,popup,preview,print,removeformat,resize,save,scayt,showblocks,showborders,smiley,sourcearea,specialchar,stylescombo,tab,table,tabletools,templates,toolbar,undo,wsc,wysiwygarea
            options.toolbar_Full = [
    { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','-','Templates' ] },
    { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
    { name: 'editing', items : [ 'Find','Replace','-','SelectAll'] },
    '/',
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
    //{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
   // { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
    
    { name: 'styles', items : ['Format','Font','FontSize' ] },
    { name: 'colors', items : [ 'TextColor','BGColor' ] },
    { name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] }
]

            // handle disposal (if KO removes by the template binding)
            ko.utils.domNodeDisposal.addDisposeCallback(element, function () {
                if (CKEDITOR.instances[txtBoxID]) {
                    CKEDITOR.remove(CKEDITOR.instances[txtBoxID]);
                }
            });

            $(element).ckeditor(options);

            // wire up the blur event to ensure our observable is properly updated
            CKEDITOR.instances[txtBoxID].focusManager.blur = function () {
                var observable = valueAccessor();
                observable($(element).val());
            };
        },
        update: function (element, valueAccessor, allBindingsAccessor, viewModel) {
            var val = ko.utils.unwrapObservable(valueAccessor());
            $(element).val(val);
        }
    }
}
function enablekeyevents() {
    ko.bindingHandlers.enterkey = {
        init: function (element, valueAccessor, allBindings, viewModel) {
            var callback = valueAccessor();
            $(element).keypress(function (event) {
                var keyCode = (event.which ? event.which : event.keyCode);
                if (keyCode === 13) {
                    callback.call(viewModel);
                    return false;
                }
                return true;
            });
        }
    };
}

