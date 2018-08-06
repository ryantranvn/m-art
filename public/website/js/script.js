/* Copyright 2018 */

if (typeof Scripts == "undefined") {
    var Scripts = {};
}

Scripts.Modules = {
    winWidth: $(window).width(),
    winHeight: $(window).height(),
    scrollToTop: $(window).scrollTop(),
    init: function () {
        //this.createQtyCart();
        this.productSliderImageZoom();

        if ($('.block-product-slider').length > 0) {
            $('.block-product-slider').each(function () {
                var element = $(this).attr('data-id');

                $('.product-sliders-' + element).slick({
                    speed: 300,
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    appendArrows: ".block-product-" + element + " .session-wrapper .session-inner",
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });

                //console.log(element);
            });
        }
    },
    createQtyCart: function () {
        if ($('.product-quantity').length > 0) {
            $('.qtyplus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment only if value is < 20
                    if (currentVal < 20)
                    {
                        $('input[name='+fieldName+']').val(currentVal + 1);
                        $('.qtyminus').val("-").removeAttr('style');
                    }
                    else
                    {
                        $('.qtyplus').val("+").css('color','#aaa');
                        $('.qtyplus').val("+").css('cursor','not-allowed');
                    }
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(1);

                }
            });

            $(".qtyminus").click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name='+fieldName+']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 1) {
                    // Decrement one only if value is > 1
                    $('input[name='+fieldName+']').val(currentVal - 1);
                    $('.qtyplus').val("+").removeAttr('style');
                } else {
                    // Otherwise put a 0 there
                    $('input[name='+fieldName+']').val(1);
                    $('.qtyminus').val("-").css('color','#aaa');
                    $('.qtyminus').val("-").css('cursor','not-allowed');
                }
            });
        }

    },
    productSliderImageZoom: function () {
        if ($('.product-view .product-img-box').length > 0) {
            /*$(".gallery-image").elevateZoom({
                gallery: "gallery_09",
                galleryActiveClass: "active"
            });*/

            // Main
            $('.product-image-sliders').slick({
                fade: true,
                dots: false,
                arrows: false,
                infinite: true,
                autoplay: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplaySpeed: 5000,
                asNavFor: ".product-image-thumbs-sliders"
            });

            // Thumbs
            $('.product-image-thumbs-sliders').slick({
                dots: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                focusOnSelect: true,
                appendArrows: '.more-views .more-view-wrap',
                asNavFor: ".product-image-sliders"
            });

            if($('.product-image-thumbs-sliders .item').length > 3) {
                $('.more-views .more-view-wrap').addClass('more-three-item');
            } else {
                $('.more-views .more-view-wrap').removeClass('more-three-item');
            }
        }
    }
};

$(document).ready(function () {
    Scripts.Modules.winWidth = $(window).width();
    Scripts.Modules.init();

    /**/
    if ($('.add-to-cart-success').length > 0) {
        $('.add-to-cart-success .close').on('click', function () {
            $(this).parent().hide(100);
        });
    }
});

var windowResize;

$(window).resize(function () {
    var winNewWidth = $(window).width();
    var winNewHeight = $(window).height();

    if (Scripts.Modules.winWidth != winNewWidth || Scripts.Modules.winHeight != winNewHeight) {
        clearTimeout(windowResize);

        windowResize = setTimeout(function() {
            Scripts.Modules.winWidth = winNewWidth;
        }, 50);
    }
});
