/**
 * @author Wojciech Dasiukiewicz <wojciech.dasiukiewicz@gmail.com> www.ninjacode.pl
 * This is simple javascript code to make dynamicaly 
 * calculator request via AJAX
 */
$(document).ready(function() {
    var newValue = "";
    var wasNumber = false;
    $('.button').click(function() {
        if ($(this).val() == "=") {
            if(wasNumber == true){
                $.ajax({
                    url:'calculate.php',
                    type:'POST',
                    data:{request:$('#requ').val()},
                    success:function(response){
                        alert(response);
                    }
                });
            }else{
                alert("Your mathematical operation contains an error.");
            }
        } else if ($(this).val() == "c") {
            $('#requ').val("");
            newValue = "";
        } else {
            if ($(this).hasClass('number_button')) {
                newValue += $(this).val();
                wasNumber = true;
            } else {
                if (wasNumber == true) {
                    newValue += " " + $(this).val() + " ";
                    wasNumber = false;
                }
            }
            $('#requ').val(newValue);
        }
    });
});


