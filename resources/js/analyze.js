

$(document).ready(function () {
    
    $('body').css('display', 'none');
    $('body').fadeIn(200); //一開始淡入

    var question_list = [];
    $("#ex-option-1").attr('disabled', true); // 個人風險關閉
    arrowToggle();
    $(".ex-next").click(function(){
        var actived_question = $(".ex-question.actived");
        var options = actived_question.find(".ex-option-selected");
        var next_id = $(options[0]).attr("data-next");
        if (next_id != ""){
            actived_question.removeClass("actived");
            $("#ex-question-" + next_id).addClass("actived");
            question_list.push(actived_question);
            arrowToggle();
        }else{
            analyze();
        }
    })

    $(".ex-prev").click(function(){
        var actived_question = $(".ex-question.actived");
        var options = actived_question.find(".ex-option-selected");
        options.removeClass("ex-option-selected");
        var prev = question_list.pop();
        actived_question.removeClass("actived");
        prev.addClass("actived");
        arrowToggle();
    })

    $(".ex-option").click(function(){
        var actived_question = $(".ex-question.actived");
        var bf_options = actived_question.find(".ex-option-selected");
        $(this).toggleClass("ex-option-selected");
        var af_options = actived_question.find(".ex-option-selected");
        if (!actived_question.hasClass("ex-question-multiple") && af_options.length > 1) bf_options.removeClass("ex-option-selected");
        arrowToggle();
    });

    function analyze(){
        $("#msg").modal('show');
        const form = document.createElement('form');
        form.method = 'post';
        form.action = '/analyze';
        // csrf
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = "_token";
        hiddenField.value = $('meta[name="csrf-token"]').attr('content');
        form.appendChild(hiddenField);
        // data
        $('.ex-option-selected[data-next=""]').each(function(i, e){
            const field = document.createElement('input');
            field.type = 'hidden';
            field.name = "option_id[]";
            field.value = e.id.replace("ex-option-","");
            form.appendChild(field);
        })
        //submit
        document.body.appendChild(form);
        form.submit();
        return true;
    }

    function arrowToggle(){
        question_list.length ? $(".ex-prev").show(): $(".ex-prev").hide();
        var actived_question = $(".ex-question.actived");
        var options = actived_question.find(".ex-option-selected");
        options.length ? $(".ex-next").show(): $(".ex-next").hide();
    }
});
