$(document).ready(function(){
    var _return_url = $('#data-table').attr('data-return-action');
    var _update_url = $('#data-table').attr('data-update-action');
    var _temp_url = $('#data-table').attr('data-temp-action');
    var _origin_url = $('#data-table').attr('data-origin-action');
    var _validate_url = $('#data-table').attr('data-validate-action');
    var _update_password_url = $('#data-table').attr('data-uppass-action');

    $('#data-submit').on('click',function(e){
        e.preventDefault();

        $.post(_update_url,$('#data-form').serialize(), function(result){
            if(result.success){
                window.location.href = _return_url;
            }else{
                alert(result.message);
                window.location.href = _origin_url;
            }

        });

    });

    $('#template-data').on('click',function(e){
        alert('暫存輸入資料');
        $.post(_temp_url,$('#data-form').serialize(), function(result){
            if(result.success){
                window.location.href = _return_url;
            }else{
                window.location.href = _origin_url;
            }

        });
    });

    $('#update-password').on('click',function(e){
        alert('修改密碼完成');
        $.post(_update_password_url,$('#data-form').serialize(), function(result){
            if(result.success){
                window.location.href = _origin_url;
            }

        });
    });

    $('#validate').on('click',function(e){
        $.post(_validate_url,{ Data_mail : $(this).attr('data-mail')}, function(result){
            if(result.success){
                alert('已寄送驗證碼，請到信箱查看');
            }

        });
    });

});
