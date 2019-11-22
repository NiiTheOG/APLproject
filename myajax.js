$(document).ready(function(){
    
    // jquery methods go here
    $("#shterm").keyup(function(){
        //grab the text field
        var myterm = $('#shterm').val();
        $.get("processsearch.php?sterm="+myterm, function(data, status){
            $('#showhere').html(data);
        });
    });
});

