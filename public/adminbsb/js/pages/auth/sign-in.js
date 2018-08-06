$(function () {
    $('#sign_in').validate({
        rules: {
            username: {
                required : true
            },
            password: {
                required : true
            }
        },
        messages: {
            username: {
                required: '* 必須項目です<br/>* 半角英数で入力してください',
            },
            password: {
                required: '* 必須項目です'
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        }
    });
});