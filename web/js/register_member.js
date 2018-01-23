$(document).ready(function(){
    var _index_url = $('#register-table').attr('data-index-action');
    var _create_url = $('#register-table').attr('data-create-action');
    var _return_url = $('#register-table').attr('data-return-action');


    $('#register-submit').on('click',function(e){
        e.preventDefault();

        if($('#setting-password').val() == $('#confirm-password').val()){
            if($('#register-form input[type="password"]').val().length>=8 && hasCapital($('#setting-password').val()) &&
            hasLowercase($('#setting-password').val()) && hasNumber($('#setting-password').val())){
                if($('#check').prop('checked') == true){
                    $.post(_create_url,$('#register-form').serialize(), function(result){
                        if(result.success){
                            window.location.href = _return_url;
                        }else{
                            window.location.href = _index_url;
                        }
                    });
                }else{
                    alert('並未勾選服務條款、隱私條款、 風險揭露');
                }
            }
            else{
                alert('密碼至少8字，內含英文大小寫及數字');
            }
        }else{
            alert('密碼輸入不正確');
        }
    });

    function hasCapital(str){
        var result = str.match(/^.*[A-Z]+.*$/);
        if(result==null) return false;
        return true;
    }

    function hasLowercase(str){
        var result = str.match(/^.*[a-z]+.*$/);
        if(result==null) return false;
        return true;
    }

    function hasNumber(str){
        var result = str.match(/^.*[0-9]+.*$/);
        if(result==null) return false;
        return true;
    }
});
