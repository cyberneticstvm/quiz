var step = 1; var prev = '';
$(document).ready(function(){
    $(".next").click(function(){
        var nextstep = false;        
        prev = $(this).closest('form').find('.step:visible').attr('id');
        var itype = $(this).closest('form').find('.step:visible').data('input');
        var next = $(this).closest('form').find('.step:visible').find('input:checked').data('next');        
        nextstep = checkForm(prev, itype);
        if(nextstep == true){            
            step = parseInt(next.substring(1));
            $("#"+next).show();
            $(".step").not("#"+next).hide();
            hideButtons(step);
            stepProgress(step);
        }else{
            if(itype == 'radio'){
                alert("Please select an option");
            }else{
                alert("Please select two options");
            }
        }
    });

    $(".back").click(function(){
        var next = $(this).closest('form').find('.step:visible').find('input:checked').data('prev');
        next = (next) ? next : prev;
        step = parseInt(next.substring(1));
        $("#"+next).show();
        $(".step").not("#"+next).hide();
        hideButtons(step);
        stepProgress(step);
    });


    $('form').submit(function(){
        $(".submit").attr("disabled", true);
        $(".submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>&nbsp;Loading...");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function checkForm(div, itype){
    var count = 0;
    $("#"+div).find('input').each(function(){        
        if($(this).is(':checked')){
            count++
        }
    });
    if(itype == 'radio' && count == 1)
        return true;
    if(itype == 'checkbox' && count == 2)
        return true;
    return false;
}

stepProgress = function (currstep) {
    var percent = parseFloat(100 / $(".step").length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width", percent + "%")
      .html(percent + "%");
};

hideButtons = function (step) {
    var limit = parseInt($(".step").length);
    $(".action").hide();
    if (step < limit) {
      $(".next").show();
    }
    if (step > 1) {
      $(".back").show();
    }
    if (step == limit) {
      $(".next").hide();
      $(".submit").show();
    }
};