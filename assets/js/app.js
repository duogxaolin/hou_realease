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
        /***
         *
         * Chuyáº¿n bay
         */
        const departureFlatpickrConfig = {
            defaultDate: [Date.now()],
            mode: "single",
            locale: "vn",
            altInput: true,
            altFormat: altFormat,
            showMonths: 2,
            minDate: "today",
            onOpen: function(selectedDates, dateStr, instance) {
                dateDeparture.set('positionElement', $("#date-departure")[0]);
                dateDeparture.set("mode", "single");
            },
        };
        const returnFlatpickrConfig = {
            defaultDate: [Date.now()],
            mode: "single",
            locale: "vn",
            altInput: true,
            altFormat: altFormat,
            showMonths: 2,
            minDate: "today",
            onOpen: function(selectedDates, dateStr, instance) {
                dateDeparture.set('positionElement', $("#date-return")[0]);
                dateReturn.set("mode", "single");
            },
            onChange: function(selectedDates, dateStr, instance) {
                const [departure_val, return_val] = selectedDates;
                if (return_val) {
                    const checkOutDate = flatpickr.formatDate(return_val, altFormat);
                }
            },
        };

        let dateDeparture = $("#date-departure").flatpickr(departureFlatpickrConfig);

        let htmlRender = '';
        let dateReturn = '';
        $('input[name="choose-flight_chuyenbay"]').change(function(e) {
            if ($('#choose-flight-02:checked').length > 0) {
                htmlRender = `<div class="col-lg col-12" id="col-mark_chuyenbay__return">
							<div class="inner position-relative trigger-flat_chuyenbay row align-items-center no-gutters rowmb5" data-calendar="2">
								<label for="" class="col-form-label col-lg-12 col-5 col-sm-4">NgĂ y trá»Ÿ vá»</label>
								<div class="position-relative form-icon form-icon_left col-lg-12 col-7 col-sm-8">
								    <div class="form-button">
									    <i class="fas fa-calendar-alt"></i>
									</div>
									<input type="text" placeholder="Chá»n ngĂ y trá»Ÿ vá»"
									       class="form-control form-date flatpickr flatpickr-input"
									       id="date-return"/>
								</div>
							</div>
						</div>`;

                $('#col-mark_chuyenbay').after(htmlRender);
                dateReturn = $("#date-return").flatpickr(returnFlatpickrConfig);
            } else {
                htmlRender = ``;
                $('#col-mark_chuyenbay__return').remove();
            }
        });

        $(document).on('click', '.trigger-flat_chuyenbay', function() {
            if ($(this).data('calendar') == 1)
                dateDeparture.open();
            else
                dateReturn.open();
        });

        addEventCounterActions(
            ".passenger-event_chuyenbay",
            ".value-count-baby_chuyenbay",
            "#total-people_chuyenbay",
            plusCounterHandle,
            minusCounterHandle
        );

        function checkMaxPeople(
            inputCounterElement,
            count,
            countBaby,
            totalCount,
            maxPeople,
            maxBaby
        ) {
            if (
                (inputCounterElement.hasClass("value-count-baby_chuyenbay") && count >= maxBaby) ||
                (!inputCounterElement.hasClass("value-count-baby_chuyenbay") &&
                    totalCount - countBaby >= maxPeople)
            ) {
                return true;
            }

            return false;
        }

        function plusCounterHandle(
            inputCounterElement,
            htmlCounterElement,
            plusCounterElement,
            minusCounterElement,
            counterBabyElement,
            totalCounterElement
        ) {
            let count = inputCounterElement.val();
            let countBaby = counterBabyElement.val();
            let countText = htmlCounterElement.html();
            let totalCount = totalCounterElement.html();
            totalCount = Number(totalCount);
            count = Number(count);
            countBaby = Number(countBaby);

            if (
                checkMaxPeople(inputCounterElement, count, countBaby, totalCount, 9, 4)
            ) {
                return;
            }

            totalCount += 1;
            count += 1;
            countText = count;

            minusCounterElement.removeClass("disabled");

            inputCounterElement.val(count);
            htmlCounterElement.html(countText);
            totalCounterElement.html(totalCount);

            if (
                checkMaxPeople(inputCounterElement, count, countBaby, totalCount, 9, 4)
            ) {
                plusCounterElement.addClass("disabled");
            }
        }

        function minusCounterHandle(
            inputCounterElement,
            htmlCounterElement,
            plusCounterElement,
            minusCounterElement,
            counterBabyElement,
            totalCounterElement
        ) {
            let count = inputCounterElement.val();
            let countBaby = counterBabyElement.val();
            let countText = htmlCounterElement.html();
            let totalCount = totalCounterElement.html();
            totalCount = Number(totalCount);
            count = Number(count);
            countBaby = Number(countBaby);

            if (count <= 0 || totalCount <= 1) {
                return;
            }

            if (
                checkMaxPeople(inputCounterElement, count, countBaby, totalCount, 9, 4)
            ) {
                plusCounterElement.removeClass("disabled");
            }

            count -= 1;
            countText = count;
            totalCount -= 1;

            inputCounterElement.val(count);
            htmlCounterElement.html(countText);
            totalCounterElement.html(totalCount);

            if (count <= 0) {
                minusCounterElement.addClass("disabled");
            }
        }

        function prepareCounterElements(
            parentCounterElement,
            counterBabyElement,
            totalCounterElement,
            handleCounter
        ) {
            const inputCounterElement = parentCounterElement.find(
                ".value-passenger-counter_chuyenbay"
            );
            const htmlCounterElement = parentCounterElement.find(
                ".passenger-counter_chuyenbay"
            );

            const minusCounterElement = parentCounterElement.find(
                ".passenger-minus_chuyenbay"
            );

            const plusCounterElement = parentCounterElement.find(
                ".passenger-plus_chuyenbay"
            );

            return handleCounter(
                inputCounterElement,
                htmlCounterElement,
                plusCounterElement,
                minusCounterElement,
                counterBabyElement,
                totalCounterElement
            );
        }

        function addEventCounterActions(
            counterClass,
            counterBabyClass,
            totalCounterId,
            plusCounterHandle,
            minusCounterHandle
        ) {
            const totalCounterElement = $(totalCounterId);
            $(counterClass).on("click", ".passenger-plus_chuyenbay", function() {
                const parentCounterElement = $(this).parents(counterClass);
                const counterBabyElement = parentCounterElement
                    .parents(".passenger-dropdown-container")
                    .find(counterBabyClass);
                prepareCounterElements(
                    parentCounterElement,
                    counterBabyElement,
                    totalCounterElement,
                    plusCounterHandle
                );
            });
            $(counterClass).on("click", ".passenger-minus_chuyenbay", function() {
                const parentCounterElement = $(this).parents(counterClass);
                const counterBabyElement = parentCounterElement
                    .parents(".passenger-dropdown-container")
                    .find(counterBabyClass);
                prepareCounterElements(
                    parentCounterElement,
                    counterBabyElement,
                    totalCounterElement,
                    minusCounterHandle
                );
            });
        }

        /***
         * End Chuyáº¿n bay
         */

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