function checkEmail()
{
    var email = $("#email").val();

    $.ajax({
        type: "POST",
        url:  "validate.php",
        data: {email: email},
        success: function(data)
        {
            if(data == 'true')
            {
                $("#emailErr").removeClass('hidden');
                $("#emailDiv").addClass('has-error');
                $("#submit").attr('disabled', true);
            }
            else
			{
				$("#emailErr").addClass('hidden');
				$("#emailDiv").removeClass('has-error');
				$("#submit").removeAttr('disabled');
			}
        }
    });      
}

window.setInterval(checkEmail,500);