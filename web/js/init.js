
$(document).ready(function(){
	var $root = $('html, body');
	$(document).on('click', '.smooth-link', function(event){
        // event.preventDefault();
        var href = $.attr(this, 'href');
        $root.animate({
            scrollTop: $(href).offset().top
        }, 500, function () {
            window.location.hash = href;
        });
        return false;
    });
});

jQuery('#datetimepicker-reserve').datetimepicker({
    timepicker:false,
    format:'Y-m-d',
    closeOnDateSelect:false,
    onShow:function(ct){
        this.setOptions({
            minDate:Date()
        })

    },
});

jQuery('#datetimepicker-time').datetimepicker({
    datepicker:false,
    format:'H:i',
    closeOnDateSelect:false,
    allowTimes:[
    '08:00',
    '09:00',
    '10:00',
    '11:00',
    '12:00',
    '13:00',
    '14:00',
    '15:00',
    '16:00',
    '17:00',
    '18:00',
    '19:00',
    '20:00',
    ],
    onShow:function(ct){
        this.setOptions({
            minDate:Date()
        })

    },
});

