$(document).ready( function() {

    var params = getParams();
    var sorting = "";

    // language switch
    if ($('.language-switch').length>0) {
        $('.language-switch').find('a.lang').click(function (e) {
            e.preventDefault();
            $('input[name="locale"]').val($(this).attr('data-lang'));
            $('#frmLanguageSwitch').submit();
        });
    }

    function htmlReplyFail(msg) {
        var html = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="col-white" aria-hidden="true">×</span></button><ul>';
        html += '<li>'+msg+'</li>';
        html += '</ul></div>';
        return html;
    }
    function htmlReplySuccess(msg) {
        var html = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="col-white" aria-hidden="true">×</span></button><ul>';
        html += '<li>'+msg+'</li>';
        html += '</ul></div>';
        return html;
    }
    function autoHideAlert() {
        if ($('.alert').length > 0) {
            setTimeout(function () {
                $('.alert').fadeOut(1000);
            }, 3000);
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ajaxStart(function () {
        $('.page-loader-wrapper').fadeIn();
    });
    $(document).ajaxStop(function () {
        $('.page-loader-wrapper').fadeOut();
    });

    // validation
    $.validator.setDefaults({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, function(size){
        return trans.over_max_size + filesize(size,{ exponent:2, round:1 });
    });

    // get tagName
    function tagName(selector) {
        return selector.prop("tagName").toLowerCase();
    }

    var leftNav = $('#leftsidebar');
    // show hide nav
    $('body').on('click', '.navHide', function() {
        leftNav.removeClass('bounceInLeft').addClass('bounceOutLeft');
        $('section.content').animate({
            marginLeft: '20px'
        }, 'liner');
        $('.navShow').removeClass('hide');
    });
    $('body').on('click', '.navShow', function() {
        $('section.content').animate({
            marginLeft: '265px'
        }, 'liner');
        leftNav.removeClass('bounceOutLeft').addClass('bounceInLeft');
    });

    // Delete inline
    $('body').on('click', '.btnDelete', function (e) {
        e.preventDefault();
        var deleteLink = $(this).attr('data-action');
        swal({
            title: trans.swal_delete_title,
            text: trans.swal_delete_text,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: trans.swal_delete_btn_confirm,
            closeOnConfirm: false
        }, function () {
            $('#frmDelete').attr('action', deleteLink).submit();
        });
    });

    // input-mask
        // positiveNumber
        if ($('body').find('.positiveNumber').length > 0) {
            positiveNumber();
        }
        function positiveNumber() {
            $('body').find('.positiveNumber').inputmask({
                'alias': 'numeric',
                'groupSeparator': '',
                'autoGroup': true,
                'digits': 0,
                'digitsOptional': false,
                'prefix': '',
                'allowMinus': false,
                'rightAlign' : false,
                removeMaskOnSubmit: true
            });
        }
        // currencyPositive
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

    // switch checkbox
    if ($('.switch input[type=checkbox]').length>0) {
        // default
        $('body').find('.switch input[type=checkbox]').each( function() {
            var switchInput = $(this);
            formatSwitch(switchInput)
        });
        // on change
        $('body').on('change', '.switch input[type=checkbox]', function () {
            var switchInput = $(this);
            formatSwitch(switchInput)
        });

        function formatSwitch(switchInput) {
            var switchStatus = switchInput.prop('checked');
            var switchOn = switchInput.closest('.switch').find('.switchOn');
            var switchOff = switchInput.closest('.switch').find('.switchOff');

            if (switchStatus == true) {
                switchInput.val(1);
                switchOn.addClass('switchOnActive');
                switchOff.removeClass('switchOffActive');
            }
            else {
                switchInput.val(0);
                switchOff.addClass('switchOffActive');
                switchOn.removeClass('switchOnActive');
            }
        }
    }

    // table resize
    if ($("table.tableResize").length>0) {
        $("table.tableResize").colResizable({
            hoverCursor: 'ew-resize',
            dragCursor: 'ew-resize'
        });
    }

    // sorting
    if (!$.isEmptyObject(params) && params.sorting != undefined) {
        sorting = params.sorting;
        var sortingField = $('body').find('.table th.sorting[data-sort='+sorting+']');
        if (params.by == 'asc') {
            sortingField.addClass('sorting_asc');
        }
        else {
            sortingField.addClass('sorting_desc');
        }
    }
    $('body').on('click', '.table th.sorting', function() {
        var th = $(this);
        var dataSort = th.attr('data-sort');
        var url = window.location.href;
        params = getParams();

        if ($.isEmptyObject(params)) {
            sorting += '?sorting=' + dataSort + '&by=asc';
            window.location.href = url + sorting;
        }
        else {
            if (params.sorting == undefined || params.sorting==="") {
                sorting += '&sorting=' + dataSort + '&by=asc';
                window.location.href = url + sorting;
            }
            else {
                var newUrl = "";
                var currentUrl = location.href;
                var currentSort = params.sorting;
                if (currentSort != dataSort) {
                    newUrl = currentUrl.replace("sorting="+currentSort, "sorting="+dataSort);
                }
                else {
                    if (params.by == 'asc') {
                        newUrl = currentUrl.replace("by=asc", "by=desc");
                    }
                    else {
                        newUrl = currentUrl.replace("by=desc", "by=asc");
                    }
                }
                window.location.href = newUrl;
            }
        }
    });

    function getParams(k) {
        var p={};
        location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v});
        return k?p[k]:p;
    }

    // character limit
    if ($('.limit').length>0) {
        $('.limit255').maxlength({
            max : 255,
            feedbackText : '{c}/{m}'
        });
        $('.limit1024').maxlength({
            max : 1024,
            feedbackText : '{c}/{m}'
        });
    }

    // spinner for increase + decrease
    if ($(".spinner").length>0) {
        $(".spinner").spinner();
    }
    
    // modal
    function openModal(modalId, frmId, valId)  {
        var whichModal = $('#'+modalId);
        var formOpen;
        whichModal.on('show.bs.modal', function (e) {
            whichModal.find('#'+frmId).each( function() {
                formOpen = $(this);
                whichModal.find('.frmModal').each( function() {
                    $(this).addClass('hide');
                });
                // reset form in case not frmStatus
                if (frmId != 'frmStatus') {
                    whichModal.find('input[type="password"]').val('');
                    whichModal.find('input[type="text"]').val('');
                    whichModal.find('label.error').remove();
                }
                formOpen.removeClass('hide');
            });

            // set id of item
            if (whichModal.find('input[name="id"]').length>0) {
                whichModal.find('input[name="id"]').val(valId);
            }

            // in case have submit button
            if (whichModal.find('.btnModalSubmit').length>0) {
                whichModal.find('.btnModalSubmit').click( function() {
                    formOpen.submit();
                });
            }

            // on click status buttons
            $('body').on('click', '#frmStatus a.btn', function(e) {
                e.preventDefault();
                $('.page-loader-wrapper').fadeIn();
                var form = $(this).closest('#frmStatus');
                var status = $(this).attr('data-status');
                form.find('input[name="status"]').val(status);
                form.submit();
            });
        });

        whichModal.modal({
            'backdrop' : 'static',
            'keyboard' : false
        });

    }

    // status inline
    $('body').on('click', '.btnStatus', function() {
        var id = $(this).attr('data-id');
        openModal('modal', 'frmStatus', id);
    });

    // edit inline
    if ($('body').find('.editInline').length>0) {
        var newEditInline = '<span></span><i class="material-icons iconEditInline">mode_edit</i>';
        // change value in td
        $('body').find('.editInline').each( function() {
            var td = $(this);
            var current = td.html();
            td.html('').html(newEditInline).find('span').html(current);
        });
        // on click editInline
        $('body').on('click', '.editInline', function() {
            var td = $(this);
            var current = td.find('span').html();
            if (td.find('input').length==0) {
                td.html('').html('<input type="text" class="inputEditInline positiveNumber" maxlength="3" data-old="'+current+'" value="' + current + '" />');
                positiveNumber();
                $('.inputEditInline').focus().select();
            }
        });
        // on blur
        $('body').on('blur', '.editInline input.inputEditInline', function() {
            var input = $(this);
            setValueEditInline(input);
        });
        // on enter
        $('body').on('keydown', '.editInline input.inputEditInline', function(e) {
            var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
            if (key == 13) {
                e.preventDefault();
                var input = $(this);
                setValueEditInline(input);
            }
        });

        function setValueEditInline(selector) {
            var old = selector.attr('data-old');
            var current = selector.val();
            var td = selector.parent('td.editInline');
            var field = td.attr('data-field');
            var fieldId = td.attr('data-field-id');
            var id = td.attr('data-id');
            var table = td.attr('data-table');
            if (current == '') {
                current = old;
            }
            $.ajax({
                url: ajaxUrl + '/edit-inline',
                dataType: 'json',
                method: 'post',
                data: {
                    table : table,
                    fieldId : fieldId,
                    id : id,
                    field : field,
                    val : current
                },
                success: function (data) {
                    if (data.error == 0) {
                        td.html('').html(newEditInline).find('span').html(current);
                        td.closest('.card').find('.body').find('.block-header').after(htmlReplySuccess(data.msg));
                    }
                    else {
                        td.html('').html(newEditInline).find('span').html(old);
                        td.closest('.card').find('.body').find('.block-header').after(htmlReplyFail(data.msg));
                    }
                    autoHideAlert();
                },
                error: function () {
                    swal({
                        title: trans.swal_error_title,
                        text: trans.swal_error_content,
                        type: "error"
                    },
                    function(){
                        selector.focus().select();
                    });
                    autoHideAlert();
                }
            });

        }
    }

    // change password
    $('body').on('click', '.btnChangePassword', function() {
        var id = $(this).attr('data-id');
        openModal('modal', 'frmChangePassword', id);
    });

    // search form disable filed is empty
    function disabledEmptyFields(form) {
        form.find('input[type="text"]').each( function() {
            if ($(this).val().trim() == '' || $(this).val().trim() == '') {
                $(this).prop('disabled', true);
            }
        });
    }

    // searchStatus in search box
    if ($('.searchStatus').length>0) {
        // on click checkAll
        $('#search_all').click( function() {
            var checkAll  = $(this).prop('checked');
            if (checkAll) {
                $('.searchStatus').find('input[type="checkbox"]').prop('checked', true);
                $('.searchStatus').find('input.searchVal').val('');
            }
            else {
                $('.searchStatus').find('input[type="checkbox"]').prop('checked', false);
                var theFirst = $('.searchStatus').find('input[type="checkbox"]:nth-of-type(2)');
                theFirst.prop('checked', true);
                $('.searchStatus').find('input.searchVal').val(theFirst.val());
            }
        });
        // on click checkItem
        $('.searchStatus').find('input[type="checkbox"]:not(#search_all)').click( function() {
            $('.searchStatus').find('input[type="checkbox"]').prop('checked', false);
            $(this).prop('checked', true);
            $('.searchStatus').find('input.searchVal').val($(this).val());
        });
    }

    // reset search form
    $('body').on('click', '.btnResetSearch', function() {
        $(this).closest('form.searchForm')[0].reset();

        $(this).closest('form.searchForm').find('input[type="text"]').each( function() {
            $(this).val('');
        });

        $(this).closest('form.searchForm').find('input[type="radio"]').each( function() {
            $(this).prop('checked', false)
        });

        /*$(this).closest('form.searchForm').find('input[type="checkbox"]').each( function() {
            $(this).prop('checked', false)
        });*/
        $(this).closest('form.searchForm').find('#search_all').prop('checked', true);

        $('.selectpicker').val('');
        $('.selectpicker').selectpicker("refresh");

    });

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
                    swal({
                        title: trans.swal_error_title,
                        text: trans.swal_error_content,
                        type: "error"
                    });
                }
            });
        });
    }

    // gen password auto
    function genPassword() {
        return Math.random().toString(36).substr(2, 6).toUpperCase();
    }

    // open KCFinder
    function openKCFinder_singleFile(input, type, fnCallback)
    {
        window.KCFinder = {
            callBack: function(url) {
                var newUrl = url.substr(url.indexOf('/upload/'));
                input.val(newUrl);
                window.KCFinder = null;
                if(typeof fnCallback == "function"){
                    fnCallback();
                }
            }
        };
        window.open('/kcfinder/browse.php?type='+type+'&dir='+type+'/public', 'kcfinder_textbox',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, resizable=1, ' +
            'scrollbars=0, width=800, height=600, top=30, left=30'
        );
    }
    function openKCFinderMulti(textarea, type, fnCallback) {
        window.KCFinder = {
            callBackMultiple: function(files) {
                window.KCFinder = null;
                for (var i = 0; i < files.length; i++) {
                    var newFilename = files[i].substr(files[i].indexOf('/upload/'));
                    textarea.value += newFilename + "\n";
                }
                if (typeof fnCallback == "function") {
                    fnCallback();
                }
            }
        };
        /*window.KCFinder = {
            callBackMultiple: function(files) {
                window.KCFinder = null;
                var arr = new Array();
                if (field.val()!="") {
                    arr = JSON.parse(field.val())
                }
                for (var i = 0; i < files.length; i++) {
                    arr.push(files[i])
                }
                field.val(JSON.stringify(arr))
                if(typeof fnCallback == "function"){
                    fnCallback();
                }
            }
        };*/
        if (type == "image") {
            window.open('/kcfinder/browse.php?type=images&dir=images/public', 'kcfinder_multiple',
                'status=0, toolbar=0, location=0, menubar=1, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }
        else if (type == "doc") {
            window.open('/kcfinder/browse.php?type=docs&dir=docs/public', 'kcfinder_multiple',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=800, height=600'
            );
        }
    }

    if ($('.thumbnailContainer').length>0) {
        // is single or multiple
        var uploadMultiple = false;
        if ($('.thumbnailMultiple').length>0) {
            uploadMultiple = true;
        }
        var thumbnailWrapDefault = '<div class="thumbnailWrap">';
            thumbnailWrapDefault += '<a href="#" class="thumbnailFrame">';
                thumbnailWrapDefault += '<img src="'+themeUrl+'/images/default.jpg" class="img-responsive thumbnail" />';
                if (uploadMultiple == true) {
                    thumbnailWrapDefault += '<input type="text" name="picture[]" class="inputPicture hiddenInput" readonly />';
                }
                else {
                    thumbnailWrapDefault += '<input type="text" name="picture" class="inputPicture hiddenInput" readonly />';
                }
            thumbnailWrapDefault += '</a>';
            thumbnailWrapDefault += '<i class="material-icons col-red delThumbnail hide">clear</i>';
        thumbnailWrapDefault += '</div>';

        // on click frame
        $('body').on('click', 'a.thumbnailFrame', function(e) {
            e.preventDefault();
            var input = $(this).children('.inputPicture');
            openKCFinder_singleFile(input, 'images', function () {
                var filename = input.val();
                var thumbnailFrame = input.parent('a.thumbnailFrame');

                thumbnailFrame.children('img.thumbnail').attr('src', '/storage' + filename);
                thumbnailFrame.next('.delThumbnail').removeClass('hide');
                var countDelThumbnail = $('.thumbnailContainer').find('.delThumbnail:visible').length;
                if (uploadMultiple == true && countDelThumbnail <= 4) {
                    $('.thumbnailContainer').append(thumbnailWrapDefault);
                }
            });
        });
        // click delete picture
        $('body').on('click', '.delThumbnail', function(e) {
            var thumbnailWrap = $(this).parent('.thumbnailWrap');
            thumbnailWrap.remove();
            var countDelThumbnail = $('.thumbnailContainer').find('.delThumbnail:visible').length;
            var countThumbnailFrame = $('.thumbnailContainer').find('.thumbnailFrame:visible').length;
            if (uploadMultiple == false) {
                $('.thumbnailContainer').append(thumbnailWrapDefault);
            }

        });
    }

    //TinyMCE
    if ($('.tinyEditor').length>0) {
        tinymce.init({
            selector: 'textarea.tinyEditor',
            menubar: false
        });
    }

    // select supplier => fill location
    if ($('select[name="supplier_id"]').length>0) {
        $('select[name="supplier_id"]').on('changed.bs.select', function (e) {
            var selected = e.target;
            var supplierId = selected.value;
            var provinceId = selected[e.target.selectedIndex].getAttribute('data-location-id');
            if ($(this).attr('class').indexOf('forSearch') == -1
                && $('input[name="province_name"]').length>0) {
                $.ajax({
                    url: ajaxUrl + '/get-supplier',
                    dataType: 'json',
                    method: 'post',
                    data: { supplierId : supplierId },
                    success: function (data) {
                        if (data.error == 0) {
                            var supplier = data.supplier;
                            $('input[name="province_name"]').val(supplier['province_name']);
                        }
                    },
                    error: function () {
                        swal("Error");
                    }
                });
            }
            else {
                if ($('select[name="province_id"]').length>0) {
                    console.log('asdfasdf')
                    $('select[name="province_id"]').val(provinceId)
                    $('select[name="province_id"]').selectpicker('refresh');
                }
            }
        });
    }

    if ($('.hasDetailRow').length>0) {
        $('.hasDetailRow').find('td.details-control').each(function () {
            var td = $(this);
            var tr = $(this).parent();
            var numberCols = tr.children('td').length;
            td.click(function () {
                if (!tr.hasClass('shown')) {
                    var dataId = td.attr('data-id');
                    var dataNote = td.attr('data-note');
                    if ($('.tableOrder').length>0) {
                        extendOrder(tr, dataId, dataNote, numberCols);
                    }
                }
                else {
                    tr.next('tr').remove();
                    tr.removeClass('shown');
                }
            });
        });
    }
/* =============================== PAGES */
// Supplier
    if ($('#frmSupplier').length>0) {
        $('#frmSupplier').validate({
            rules : {
                name : {
                    required : true,
                    maxlength : 255
                },
                province_id : {
                    required : true
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    }
    // upload file NOT USE KCFinder
    if ($('#frmUploadPicture').length>0) {

        $('body').on('click', 'a.btnPicture', function(e) {
            e.preventDefault();
            $('#frmUploadPicture').find('input[type="file"]').click();
        });
        $('body').on('change', 'input[type="file"]', function() {
            $('#frmUploadPicture').submit();
        });
        $('#frmUploadPicture').validate({
            rules : {
                file :  {
                    required: true,
                    accept: "image/*",
                    filesize: maxsize // byte
                }
            },
            errorPlacement: function(error, element) {
                $('.errorPicture').html(error).removeClass('hide');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    }
// User
    $('body').on('click', '.btnGeneratePassword', function () {
        var password = genPassword();
        $('input[name="password_auto"]').val(password);
        $('input[name="password"]').val(password);
        $('input[name="password_confirmation"]').val(password);
        $('.btnClearAutoPassword').removeClass('hide');
    });
    $('body').on('click', '.btnClearAutoPassword', function () {
            $('input[name="password_auto"]').val('');
            $('input[name="password"]').val('');
            $('input[name="password_confirmation"]').val('');
            $(this).addClass('hide');
        });
    if ($('#frmUser').length>0) {
        $('#frmUser').validate({
            rules : {
                name : {
                    required : true,
                    maxlength : 255
                },
                email : {
                    required : true,
                    email: true
                },
                password : {
                    required: true,
                    minlength: 6,
                    maxlength: 255
                },
                password_confirmation : {
                    equalTo : "#password"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    }
    if ($('#frmChangePassword').length>0) {
        $('#frmChangePassword').validate({
            rules : {
                password : {
                    required: true,
                    minlength: 6,
                    maxlength: 255
                },
                password_confirmation : {
                    equalTo : "#password"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    }
// Category
    if ($('#frmSearchCategory').length>0) {
        $('#frmSearchCategory').validate({
            rules : {
                category_name : {
                    require_from_group: [1, ".searchCategory"],
                    maxlength : 255
                },
                category_status : {
                    require_from_group: [1, ".searchCategory"]
                }
            },
            submitHandler: function (form) {
                disabledEmptyFields($('#frmSearchCategory'));
                form.submit();
            }
        });
    }
    if ($('#frmCategory').length>0) {
        $('#frmCategory').validate({
            rules: {
                category_name: {
                    required : true,
                    maxlength: 255
                },
                category_desc: {
                    maxlength: 1024
                },
                category_order: {
                    required : true,
                    max: 999
                }
            }
        });
    }
// Product
    if ($('#frmProduct').length>0) {
        $('#frmProduct').validate({
            rules: {
                supplier_id: {
                    required: true
                },
                category_id: {
                    required: true
                },
                name: {
                    required: true,
                    maxlength: 255
                }
            }
        });
    }
// Order
    function extendOrder(tr, dataId, dataNote, numberCols) {
        $.ajax({
            url: ajaxUrl + '/get-order-detail',
            dataType: 'json',
            method: 'post',
            data: {
                orderId : dataId
            },
            success: function (data) {
                if (data.error == 0) {
                    var detailContent = '';
                    detailContent += '<div class="col-sm-12 p-l-20 p-t-5">';
                    detailContent += '<p class="font-bold">'+trans.order_detail+'</p>';
                    detailContent += '<table class="table tblExtend">';
                    detailContent += '<thead>';
                    detailContent += '<tr>';
                    detailContent += '<td class="align-center">#</td>';
                    detailContent += '<td class="align-center">'+trans.product_name+'</td>';
                    detailContent += '<td class="align-center">'+trans.product_price+'</td>';
                    detailContent += '<td class="align-center">'+trans.product_quantity+'</td>';
                    detailContent += '<td class="align-center">'+trans.product_total+'</td>';
                    detailContent += '</tr>';
                    detailContent += '</thead>';
                    $.each(data.orderDetails, function(index, orderDetail) {
                        detailContent += '<tr>';
                        detailContent += '<td class="align-center">'+(index+1)+'</td>';
                        detailContent += '<td>'+orderDetail['product_name']+'</td>';
                        detailContent += '<td class="align-right"><span class="currencyPositive">'+orderDetail['price']+'</span></td>';
                        detailContent += '<td class="align-right">'+orderDetail['quantity']+'</td>';
                        detailContent += '<td class="align-right"><span class="currencyPositive">'+orderDetail['total']+'</span></td>';
                        detailContent += '</tr>';
                    });
                    detailContent += '</table>';
                    detailContent += '</div>';
                    detailContent += '<div class="col-sm-12 p-l-20 p-t-5">';
                    detailContent += '<p class="font-bold">'+trans.note+'</p>';
                    detailContent += '<textarea class="form-control orderNote" rows="5">'+dataNote+'</textarea>';
                    detailContent += '<button class="btn btn-primary m-t-10 align-right btnSaveOrderNote" data-id="'+dataId+'">'+trans.btn_save_order_note+'</button>';
                    detailContent += '<span class="successReply col-red p-l-20"></span>';
                    detailContent += '</div>';
                    var trExtend = '<tr class="row-extend"><td class="bg-yellow"></td><td style="padding: 10px !important" colspan="' + (numberCols - 1) + '">' + detailContent + '</td></tr>';
                    tr.after(trExtend);
                    tr.addClass('shown');
                    currencyPositive(); // active currency format
                }
                else {
                    swal({ type : 'error', title : data.msg });
                }
            },
            error: function () {
                swal({ type : 'error', title : trans.swal_error_title });
            }
        });
    }
    $('body').on('click', '.btnSaveOrderNote', function() {
        var btnSave = $(this);
        var orderId = btnSave.attr('data-id');
        var note = btnSave.prev('textarea.orderNote').val().trim();
        if (note == "") {
            swal({ type : 'error', title : trans.require_input_content });
        }
        else {

            $.ajax({
                url: ajaxUrl + '/update_order_note',
                dataType: 'json',
                method: 'post',
                data: {
                    orderId : orderId,
                    note : note
                },
                success: function (data) {
                    if (data.error == 0) {
                        btnSave.next('.successReply').html(data.msg).fadeIn('fast').delay(3000).fadeOut('slow');
                    }
                    else {
                        swal({ type : 'error', title : data.msg });
                    }
                },
                error: function () {
                    swal({ type : 'error', title : trans.swal_error_title });
                }
            });
        }
    });
});