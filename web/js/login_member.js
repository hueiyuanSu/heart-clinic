$(document).ready(function(){
    var _return_url = $('#login-table').attr('data-return-action');
    var _login_url = $('#login-table').attr('data-login-action');
    var _check_url = $('#login-table').attr('data-check-action');


    $('#login').on('click',function(e){
        e.preventDefault();

        $.post(_check_url,$('#login-form').serialize(), function(result){
            if(result.success){
                window.location.href = _return_url + result.memberid;
            }else{
                alert('輸入的mail或密碼有錯');
                window.location.href = _login_url;
            }
        });
    });
});
