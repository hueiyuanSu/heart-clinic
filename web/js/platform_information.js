$(document).ready(function(){
    var _create_url = $('#platform-table').attr('data-create-action');
    var _return_url = $('#platform-table').attr('data-return-action');
    var _temp_url = $('#platform-table').attr('data-temp-action');

    $('#platform-submit').on('click',function(e){
        e.preventDefault();

        // console.log($('#platform-form').serialize());
        alert('申請表已傳送至協會');
        $.post(_create_url,$('#platform-form').serialize(), function(result){
            if(result.success){
                window.location.href = _return_url;
            }else{
                window.location.href = _return_url;
            }

        });

    });

    $('#template-data').on('click',function(e){
        alert('暫存輸入資料');
        $.post(_temp_url,$('#platform-form').serialize(), function(result){
            if(result.success){
                window.location.href = _return_url;
            }else{
                window.location.href = _return_url;
            }

        });
    });

});
