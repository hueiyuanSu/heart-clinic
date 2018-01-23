$(document).ready(function(){
    var _return_url = $('#data-table').attr('data-return-action');
    var _create_url = $('#data-table').attr('data-create-action');

    $('#data-submit').on('click',function(e){
        e.preventDefault();

        $.post(_create_url,$('#data-form').serialize(), function(result){
            if(result.success){
                window.location.href = _return_url;
            }

        });
    });

});
