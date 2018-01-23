$(document).ready(function(){

//datetimepicker
    $('#startTime').datetimepicker({
        format:'Y/m/d H:i',
        defaultTime:'08:00'
    });

    $('#endTime').datetimepicker({
        format:'Y/m/d H:i',
        defaultTime:'18:00',
        onShow:function( ct ){
            this.setOptions({
                minDate:jQuery('#startTime').val()?moment(jQuery('#startTime').val()).format("YYYY/MM/DD"):false,
                // minTime:jQuery('#startTime').val()?moment(jQuery('#startTime').val()).format("HH:mm"):false
            });
        },
    });

});
