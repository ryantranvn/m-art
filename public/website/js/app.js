/**
 * Copyright 2018
 **/
;(function ($) {
    $.isMobileTablet = function(){
        if(navigator.userAgent.match(/Android/i)|| navigator.userAgent.match(/webOS/i)|| navigator.userAgent.match(/iPhone/i)|| navigator.userAgent.match(/iPad/i)|| navigator.userAgent.match(/iPod/i)|| navigator.userAgent.match(/BlackBerry/i)|| navigator.userAgent.match(/Windows Phone/i)|| navigator.userAgent.match(/bada/i)|| navigator.userAgent.match(/Bada/i)||(navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i)))
            return 1;
        return 0;
    };

    /*Check if component exists*/
    $.fn.isExists = function() {
        return this.length > 0;
    };

    // ==== Check is Mobile
    $.isMobile = function(widthScreen) {
        if(widthScreen < 768)
            return 1;
        return 0;
    };

    $.isDevice = function() {
        if($('html').hasClass('mobile'))
            return 1;
        return 0;
    };

    $.fn.outerHTML = function() {
        // IE, Chrome & Safari will comply with the non-standard outerHTML, all others (FF) will have a fall-back for cloning
        return (!this.length) ? this : (this[0].outerHTML || (
            function(el){
                var div = document.createElement('div');
                div.appendChild(el.cloneNode(true));
                var contents = div.innerHTML;
                div = null;
                return contents;
            })(this[0]));

    };

    $.createDotDotDot = function(target){
        if($(target).length > 0) {
            $(target).dotdotdot();
        }
    };

    $.createTonggleDropdown = function(index, element) {
        if (!jQuery(element).is(index.target) && jQuery(element).has(index.target).length === 0) {
            $(element).find('.block-title').removeClass('active');
            $(element).find('.block-content').removeClass('selected');
        }
    };

    /* Begin Tabs */
    $.fn.createTabs = function() {
        var selector = this;
        this.each(function() {
            var obj = $(this);
            $(obj.attr('href')).hide();

            $(obj).bind('click', function() {
                $(selector).removeClass('selected');

                $(selector).each(function(i, element) {
                    $($(element).attr('href')).removeClass('selected');
                    $($(element).attr('href')).hide();
                });

                $(this).addClass('selected');
                $($(this).attr('href')).addClass('selected');

                $($(this).attr('href')).show(50, function () {
                    setTimeout(function() {
                        if ($("#user-actived").length > 0) {
                            var ranking_active = $("#user-actived").offset().top - 105;
                            $('#containers').animate({scrollTop: ranking_active});
                        }

                        if ($('.block-search-result .btn-back').length > 0) {
                            $('.btn-back').trigger('click');
                        }
                    }, 100);
                });

                return false;
            });
        });

        $(this).show(50);
        $(this).first().click();
    };
})(jQuery);

$(document).ready(function () {
    /* Check Browser */
    if(navigator.userAgent.indexOf('Mac') > 0) {
        $(document.body).addClass('mac-os');
    }
    if (navigator.userAgent.indexOf('Safari') > 0) {
        $(document.body).addClass('safari-browser');
    }
    if (navigator.userAgent.indexOf("Chrome") != -1) {
        $(document.body).addClass('chrome-browser');
    }
    if((navigator.userAgent.indexOf("Opera") || navigator.userAgent.indexOf('OPR')) != -1 ) {
        $(document.body).addClass('opera-browser');
    }
    if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) /*IF IE > 10*/ {
        $(document.body).addClass('IE-browser');
    }
    if(navigator.userAgent.indexOf("Firefox") != -1 ) {
        $(document.body).addClass('firefox-browser');
    }

    /* Skip Links */
    var skipLinks = $('.skip-link');
    var skipContents = $('.skip-content');

    skipLinks.bind('click', function (e) {
        e.preventDefault();

        var self = $(this);
        var target = self.attr('data-target-element') ? self.attr('data-target-element') : self.attr('href');
        var elem = $(target);
        var isSkipContentOpen = elem.hasClass('skip-active') ? 1 : 0;

        skipLinks.removeClass('skip-active');
        skipContents.removeClass('skip-active');

        if (isSkipContentOpen) {
            self.removeClass('skip-active');
        } else {
            self.addClass('skip-active');
            elem.addClass('skip-active');
        }
    });

    // Click outSite hide Element
    $(document).mouseup(function (e){
        if(!$(e.target).closest(skipLinks).length && !$(e.target).closest(skipContents).length){
            skipLinks.removeClass('skip-active');
            skipContents.removeClass('skip-active');
        }
    });
});

window.Clipboard = (function(window, document, navigator) {
    var textArea,
        copy;

    function isOS() {
        return navigator.userAgent.match(/ipad|iphone/i);
    }

    function createTextArea(text) {
        textArea = document.createElement('textArea');
        textArea.value = text;
        document.body.appendChild(textArea);
    }

    function selectText() {
        var range,
            selection;

        if (isOS()) {
            range = document.createRange();
            range.selectNodeContents(textArea);
            selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            textArea.setSelectionRange(0, 999999);
        } else {
            textArea.select();
        }
    }

    function copyToClipboard() {
        document.execCommand('copy');
        document.body.removeChild(textArea);
    }

    copy = function(text) {
        createTextArea(text);
        selectText();
        copyToClipboard();
    };

    return {
        copy: copy
    };
})(window, document, navigator);