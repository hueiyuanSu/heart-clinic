$(document).ready(function(){
	$('#logout').on('click',function(e){
        e.preventDefault();

        $.post('/index/logout',function(result){
            if(result.success){
                window.location.href = '/index';
            }
        });
    });
});
