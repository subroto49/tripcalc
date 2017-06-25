$(function () {
    var pathname = window.location.pathname.split('/');
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

    $("#add_more").click(function () {
        $("#hidden-clone").clone(false).appendTo(".add-more").find("input[type='text']").val("");
    });

    $("#add_more_list").click(function () {
        $("#hidden-clone").clone(false).appendTo(".add-more").find("input[type='text']").val("").focus();
    });
    if ($("#save_success_flag").length) {
        var succ_val = $.trim($("#save_success_flag").val());
        switch (succ_val) {
            case '0':
                $("#result_modal").addClass('error_modal_data');
                $(".modal").modal('toggle');
                break;
            case '1':
                $("#result_modal").addClass('success_modal_data');
                $(".modal").modal('toggle');
                break;
        }
    }
    
    $("#add_to_list").click(function(){
       $(".add_new_friend").modal('toggle'); 
    });
});

function call_autosuggest(obj) {
    var url = 'friends/fetch_friends/'+$(obj).val();
    $(obj).autocomplete({
        source: url,
        minLength: 2,
        select : function(event, ui){
            $("body").data("friends_id",ui.item.id);
        }
    });
}