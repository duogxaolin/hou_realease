;
(function($) {
    'use strict';
    let windowWidth = $(window).width();



    let initFormFloating = function() {
        if ($('.form-floating').length) {
            $('.form-floating .form-control').blur(function() {
                if ($(this).val() != "") {
                    $(this).addClass("valid");
                } else {
                    $(this).removeClass("valid");
                }
            });
        }
    }



    let initClipboardCopy = function(value) {
        let createTextarea = document.createElement('textarea');
        createTextarea.style.cssText = 'position: absolute; left: -99999px';
        createTextarea.setAttribute("id", "textareaCopy");
        document.body.appendChild(createTextarea);
        let textareaElm = document.getElementById('textareaCopy');
        textareaElm.value = value;
        textareaElm.select();
        textareaElm.setSelectionRange(0, 99999);
        document.execCommand("copy");
        textareaElm.remove();
    }



    $(function() {

        initFormFloating();
        $(document).on('click', '.copy-value', function() {
            if ($(this).attr('data-value') != undefined) {
                initClipboardCopy($(this).attr('data-value'));
            } else {
                initClipboardCopy($(this).parent().find('input').val());
            }
        });

        $('.updateInformation').click(function() {
            initUpdateInformation($(this).data('form'));
        });

        /****
         * Scripts VĂ©
         */

        // Äá»‹a Ä‘iá»ƒm - Äi & Ä‘áº¿n
        let dropdownParent = ''
        $('.flight-select').each(function() {
            dropdownParent = $(this).parents('.inner');
            $(this).select2({
                dropdownParent: dropdownParent,
                placeholder: "Chá»n Ä‘á»‹a Ä‘iá»ƒm",
                templateResult: styleSelect,
                width: '100%',
            });
        });

        function styleSelect(attrElm) {
            if (!attrElm.id) {
                return attrElm.text;
            }
            let html = $(`<div class="d-flex align-items-center">
                        <div class="sel-icon">
                            <i class="fal ${attrElm.title.split("|")[3]} mb-0 h6"></i>
                        </div>
                        <div class="sel-content">
                            <div class="sel-title font-weight-bold">${attrElm.title.split("|")[0]}</div>
                            <div class="text-muted sel-subtitle">${attrElm.title.split("|")[1]}</div>
                        </div>
	                    <div class="sel-code text-right">
	                        ${attrElm.title.split("|")[2]}
	                    </div>
                    </div>`);

            return html;
        }

        const altFormat = "d-m-Y";

        $(".passenger-dropdown").click(function() {
            $(".passenger-dropdown-content").fadeIn();
        });

        $(".passenger-close").click(function(e) {
            e.stopPropagation();
            $(".passenger-dropdown-content").fadeOut();
        });

        $(document).on("mouseup", function(e) {
            var o = $(".form-choose-people");
            o.is(e.target) || 0 !== o.has(e.target).length || (
                $(".passenger-dropdown .passenger-dropdown-content").fadeOut())
        });

        $('.trigger-select').on("click", function() {
            $(this).find('.box-inner select').select2('open');
        });

        $('.handlePrevent').each(function() {
            $(this).click(function(e) {
                e.preventDefault();
            })
        });
    });
})(jQuery);