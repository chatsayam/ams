!function($, wysi) {
    "use strict";

    var templates = {

        "emphasis":    "<li>" +
                           "<div class='btn-group'>" +
                               "<a class='btn btn-default' data-wysihtml5-command='bold' title='CTRL+B'>หนา</a>" +
                               "<a class='btn btn-default' data-wysihtml5-command='italic' title='CTRL+I'>เอียง</a>" +
                               "<a class='btn btn-default' data-wysihtml5-command='underline' title='CTRL+U'>เส้นใต้</a>" +
                           "</div>" +
                       "</li>",
        

        "html":
                       "<li>" +
                           "<div class='btn-group'>" +
                               "<a class='btn' data-wysihtml5-action='change_view' title='Edit HTML'><i class='icon-pencil'></i></a>" +
                           "</div>" +
                       "</li>"
    };

    var defaultOptions = {
        "font-styles": true,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": true,
        "image": true,
        events: {},
        parserRules: {
            tags: {
                "b":  {},
                "i":  {},
                "br": {},
                "ol": {},
                "ul": {},
                "li": {},
                "h1": {},
                "h2": {},
                "u": 1,
                "img": {
                    "check_attributes": {
                        "width": "numbers",
                        "alt": "alt",
                        "src": "url",
                        "height": "numbers"
                    }
                },
                "a":  {
                    set_attributes: {
                        target: "_blank",
                        rel:    "nofollow"
                    },
                    check_attributes: {
                        href:   "url" // important to avoid XSS
                    }
                }
            }
        },
        stylesheets: []
    };

    var Wysihtml5 = function(el, options) {
        this.el = el;
        this.toolbar = this.createToolbar(el, options || defaultOptions);
        this.editor =  this.createEditor(options);

        window.editor = this.editor;

        $('iframe.wysihtml5-sandbox').each(function(i, el){
            $(el.contentWindow).off('focus.wysihtml5').on({
              'focus.wysihtml5' : function(){
                 $('li.dropdown').removeClass('open');
               }
            });
        });
    };

    Wysihtml5.prototype = {

        constructor: Wysihtml5,

        createEditor: function(options) {
            options = $.extend(defaultOptions, options || {});
		    options.toolbar = this.toolbar[0];

		    var editor = new wysi.Editor(this.el[0], options);

            if(options && options.events) {
                for(var eventName in options.events) {
                    editor.on(eventName, options.events[eventName]);
                }
            }

            return editor;
        },

        createToolbar: function(el, options) {
            var self = this;
            var toolbar = $("<ul/>", {
                'class' : "wysihtml5-toolbar",
                'style': "display:none"
            });

            for(var key in defaultOptions) {
                var value = false;

                if(options[key] !== undefined) {
                    if(options[key] === true) {
                        value = true;
                    }
                } else {
                    value = defaultOptions[key];
                }

                if(value === true) {
                    toolbar.append(templates[key]);

                    if(key == "html") {
                        this.initHtml(toolbar);
                    }

                    if(key == "link") {
                        this.initInsertLink(toolbar);
                    }

                    if(key == "image") {
                        this.initInsertImage(toolbar);
                    }
                }
            }

            toolbar.find("a[data-wysihtml5-command='formatBlock']").click(function(e) {
                var el = $(e.srcElement);
                self.toolbar.find('.current-font').text(el.html());
            });

            this.el.before(toolbar);

            return toolbar;
        },

        initHtml: function(toolbar) {
            var changeViewSelector = "a[data-wysihtml5-action='change_view']";
            toolbar.find(changeViewSelector).click(function(e) {
                toolbar.find('a.btn').not(changeViewSelector).toggleClass('disabled');
            });
        },

        initInsertImage: function(toolbar) {
            var self = this;
            var insertImageModal = toolbar.find('.bootstrap-wysihtml5-insert-image-modal');
            var urlInput = insertImageModal.find('.bootstrap-wysihtml5-insert-image-url');
            var insertButton = insertImageModal.find('a.btn-primary');
            var initialValue = urlInput.val();

            var insertImage = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.composer.commands.exec("insertImage", url);
            };

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertImage();
                    insertImageModal.modal('hide');
                }
            });

            insertButton.click(insertImage);

            insertImageModal.on('shown', function() {
                urlInput.focus();
            });

            insertImageModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=insertImage]').click(function() {
                insertImageModal.modal('show');
                insertImageModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
					e.stopPropagation();
				});
                return false;
            });
        },

        initInsertLink: function(toolbar) {
            var self = this;
            var insertLinkModal = toolbar.find('.bootstrap-wysihtml5-insert-link-modal');
            var urlInput = insertLinkModal.find('.bootstrap-wysihtml5-insert-link-url');
            var insertButton = insertLinkModal.find('a.btn-primary');
            var initialValue = urlInput.val();

            var insertLink = function() {
                var url = urlInput.val();
                urlInput.val(initialValue);
                self.editor.composer.commands.exec("createLink", {
                    href: url,
                    target: "_blank",
                    rel: "nofollow"
                });
            };
            var pressedEnter = false;

            urlInput.keypress(function(e) {
                if(e.which == 13) {
                    insertLink();
                    insertLinkModal.modal('hide');
                }
            });

            insertButton.click(insertLink);

            insertLinkModal.on('shown', function() {
                urlInput.focus();
            });

            insertLinkModal.on('hide', function() {
                self.editor.currentView.element.focus();
            });

            toolbar.find('a[data-wysihtml5-command=createLink]').click(function() {
                insertLinkModal.modal('show');
                insertLinkModal.on('click.dismiss.modal', '[data-dismiss="modal"]', function(e) {
					e.stopPropagation();
				});
                return false;
            });


        }
    };

    $.fn.wysihtml5 = function (options) {
        return this.each(function () {
            var $this = $(this);
            $this.data('wysihtml5', new Wysihtml5($this, options));
        });
    };

    $.fn.wysihtml5.Constructor = Wysihtml5;

}(window.jQuery, window.wysihtml5);
