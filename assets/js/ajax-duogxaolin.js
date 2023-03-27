var lightbox = GLightbox();
lightbox.on('open', (target) => {
    console.log('lightbox opened');
});
var lightboxDescription = GLightbox({
    selector: '.glightbox2'
});
var lightboxVideo = GLightbox({
    selector: '.glightbox3'
});
lightboxVideo.on('slide_changed', ({
    prev,
    current
}) => {
    console.log('Prev slide', prev);
    console.log('Current slide', current);

    const {
        slideIndex,
        slideNode,
        slideConfig,
        player
    } = current;

    if (player) {
        if (!player.ready) {
            // If player is not ready
            player.on('ready', (event) => {
                // Do something when video is ready
            });
        }

        player.on('play', (event) => {
            console.log('Started play');
        });

        player.on('volumechange', (event) => {
            console.log('Volume change');
        });

        player.on('ended', (event) => {
            console.log('Video ended');
        });
    }
});

var lightboxInlineIframe = GLightbox({
    selector: '.glightbox4'
});


$(document).ready(function() {
    $("form[submit-ajax=duogxaolin]").submit(function(e) {
        e.preventDefault();
        let _this = this;
        let url = $(_this).attr("action");
        let method = $(_this).attr("method");
        let enctype = "multipart/form-data";
        let href = $(_this).attr("href");
        let data = $(_this).serialize();
        let button = $(_this).find("button[type=submit]");
        if (button.attr("order")) {
            Swal.fire({
                title: "Xác nhận thanh toán!",
                text: button.attr("order"),
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Tôi đồng ý",
                cancelButtonText: "Đóng",
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm(url, method, enctype, href, data, button);
                }
            });
        } else {
            submitForm(url, method, href, data, button);
        }
    });

});


function submitForm(url, method, href, data, button) {
    let textButton = button.html().trim();
    let setting = {
        type: method,
        url,
        data,
        dataType: "json",
        beforeSend: function() {
            button
                .prop("disabled", !0)
                .html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');
        },
        complete: function() {
            button.prop("disabled", !1).html(textButton);
        },
        success: (data) => {
            if (data.error) {
                Swal.fire('Thông báo', data.msg, "error");
            } else {
                Swal.fire('Thông báo', data.msg, "success");
                if (!data.href) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 500);
                } else {
                    setTimeout(function() {
                        window.location.href = data.href;
                    }, 500);
                }
            }
        }
    };

    $.ajax(setting);
}