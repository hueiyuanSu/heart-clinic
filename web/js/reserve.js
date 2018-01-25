$(document).ready(function(){
    $( "#disease" ).change(function () {
        var str = "";
        $( "select option:selected" ).each(function() {
            console.log($(this).text());
        });
    }).change();
});
