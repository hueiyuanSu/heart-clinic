jQuery('#datetimepicker-start').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
    onShow:function( ct    ){
        this.setOptions({
                            maxDate:jQuery('#datetimepicker-end').val()?jQuery('#datetimepicker-end').val():false
                        
        })
                
    }
        
});

jQuery('#datetimepicker-end').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
    onShow:function( ct    ){
        this.setOptions({
                            minDate:jQuery('#datetimepicker-start').val()?jQuery('#datetimepicker-start').val():false
                        
        })
                
    }
        
});
