$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getParams(k) {
        var p={};
        location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v});
        return k?p[k]:p;
    }

    $(".positiveNumber").on("keypress keyup blur",function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    // input-mask
    if ($('body').find('.currencyPositive').length > 0) {
        currencyPositive();
    }

    function currencyPositive() {
        $('body').find('.currencyPositive').inputmask({
            'alias': 'numeric',
            'groupSeparator': ',',
            'autoGroup': true,
            'digits': 0,
            'digitsOptional': false,
            'prefix': '',
            'allowMinus': false,
            removeMaskOnSubmit: true
        });
    }

    if ($('.product-quantity').length>0) {
        $('body').on('click', '.qtyplus', function(e) {
            e.preventDefault();
            var btnPlus = $(this);
            var wrap = btnPlus.parent('.product-quantity');
            var input = wrap.find('input[name="qty"]');
            var btnMinus = wrap.find('.qtyminus');
            var currentQuantity = parseInt(input.val());
            if (currentQuantity<maxQuantity) {
                btnMinus.prop('disabled', false);
                input.val(currentQuantity + 1).trigger("change");
                if (input.val() >= maxQuantity) {
                    btnPlus.prop('disabled', true);
                }
            }
        });
        $('body').on('click', '.qtyminus', function() {
            var btnMinus = $(this);
            var wrap = btnMinus.parent('.product-quantity');
            var input = wrap.find('input[name="qty"]');
            var btnPlus = wrap.find('.qtyplus');
            var currentQuantity = parseInt(input.val());
            if (currentQuantity>1) {
                btnPlus.prop('disabled', false);
                input.val(currentQuantity - 1).trigger("change");
                if (input.val()<=1) {
                    btnMinus.prop('disabled', true);
                }
            }
        });

        var prevQuantity = 0;
        $('body').on('focus', 'input[name="qty"]', function(e) {
            prevQuantity = $(this).val();
        });

        $('body').on('change', 'input[name="qty"]', function(e) {
            var input = $(this);
            var wrap = input.parent('.qty').parent('.product-quantity');
            var btnPlus = wrap.find('.qtyplus');
            var btnMinus = wrap.find('.qtyminus');
            var currentQuantity = parseInt(input.val());
            if (input.val() == "" || currentQuantity <= 0 || currentQuantity > maxQuantity) {
                input.val(prevQuantity);
                openModal(trans.require_max_20);
            }
            else {
                if (currentQuantity == 1) {
                    btnPlus.prop('disabled', false);
                    btnMinus.prop('disabled', true);
                }
                else if (currentQuantity == maxQuantity) {
                    btnPlus.prop('disabled', true);
                    btnMinus.prop('disabled', false);
                }
                if (wrap.hasClass('inCart')) {
                    updateCart(wrap, true);
                }
            }
        });
    }

    if ($('.btn-addCartOne').length>0) {
        $('.btn-addCartOne').click( function() {
            var productId = $(this).attr('data-product-id');
            var quantity = 1;
            var inCart = false;
            // wrap = '' because not use
            ajaxAddCart('', productId, quantity, inCart);
        });
    }

    if ($('#frmSearch').length>0) {
        $('#frmSearch').validate({
            rules: {
                search: {
                    required : true,
                    maxlength: 255
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    }

    if ($('.sortProduct').length>0) {
        $('.sortProduct').change( function() {
            var sortBy = $(this).val();
            var urlFull = window.location.href;
            var url = window.location.pathname;
            var params = getParams();

                if ($.isEmptyObject(params)) {
                    window.location.href = urlFull.replace("price=asc", "price=desc");
                }
                else {
                    if (params.price == undefined || params.price==="") {
                        window.location.href = urlFull + '&price=' + sortBy;
                    }
                    else {
                        switch (sortBy)
                        {
                            case 'default':
                                delete(params.price);
                                var paramStr = '';
                                $.each(params, function(index, item) {
                                    paramStr += index + '=' + item;
                                });
                                window.location.href = url + '?' + paramStr;
                                break;
                            case 'asc':
                                window.location.href = urlFull.replace("price=desc", "price=asc");
                                break;
                            case 'desc':
                                window.location.href = urlFull.replace("price=asc", "price=desc");
                                break;
                        }
                    }
                }
        });
    }

    if ($('#frmSubscribe').length>0) {
        $('#frmSubscribe').validate({
            rules: {
                subscribe_email: {
                    required : true,
                    email: true,
                    maxlength: 255
                }
            },
            submitHandler: function(form) {
                var subscribe_email = $('input[name="subscribe_email"]').val().trim();
                $.ajax({
                    url: '/ajax/subscribe',
                    dataType: 'json',
                    method: 'post',
                    data: {
                        subscribe_email : subscribe_email
                    },
                    success: function (data) {
                        if (data.error == 0) {
                            $('#modal').find('.modal-body').html('<p>Thank you ! We will send subscribe news to you.</p>')
                            $('#modal').modal();
                            $('input[name="subscribe_email"]').val('');
                            $('#subscribe_email-error').remove();
                        }
                        else {
                            $('input[name="subscribe_email"]').after('<label id="subscribe_email-error" class="error" for="subscribe_email">'+data.msg+'</label>')
                        }
                    },
                    error: function () {
                        openModal("Error");
                    }
                });

                return false;
            }
        });
    }

    // province & district
    if ($('select.province_id').length>0 && $('select.district_id').length>0) {
        $('select.province_id').on('changed.bs.select', function (e) {
            var selected = e.target;
            var provinceId = selected.value;
            var group = selected.getAttribute('address-group');
            var selectDistrict = $('select[name="district_id"][address-group="'+group+'"]')

            $.ajax({
                url: '/ajax/get-districts',
                dataType: 'json',
                method: 'post',
                data: {
                    'provinceId' : provinceId
                },
                success: function (data) {
                    if (data.error === 0) {
                        var options = '';
                        $.each(data.districts, function(index, item) {
                            options += '<option value="' + item.district_id + '">' + item.type + ' ' + item.name + '</option>'
                        });

                        selectDistrict.html(options);
                        selectDistrict.selectpicker('refresh');
                    }
                },
                error: function () {
                    openModal("Error");
                }
            });
        });
    }

    function openModal(modalContent)
    {
        $('#modal').find('.modal-body').html(modalContent);
        $('#modal').modal();
    }

    if ($('.modalContent').length>0) {
        openModal('<p>'+$('.modalContent').html()+'</p>')
    }

// my account

    $('#modal').on('shown.bs.modal', function (e) {

    });

    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
});