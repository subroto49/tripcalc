$(function () {
    $.formUtils.addValidator({
        name: 'emptycheck',
        validatorFunction: function (value, $el, config, language, $form) {
            var res = ($.trim(value) == '') ? false : true; 
            return res;
        },
        errorMessage: 'Please provide a value',
        errorMessageKey: 'badValue'
    });

    $.validate({
        modules: 'security',
        lang: 'en'
    });

    setTimeout(function () {
        $('.alert').hide();
    }, 3000);


    $("#add_more").click(function(){
        $("#permanant_div").clone(false).appendTo(".test").find("input[type='text']").val("");
    });
});
