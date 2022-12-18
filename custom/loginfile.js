//fgfdgfd
$(document).ready(function() {
   
    //if the form submit
    $("#loginFrm").unbind('submit').bind('submit', function() {

		// remove the error 
		$('.text-danger').remove();
		
        //This part for the getting value if empty or Not
        var UserName  = $("#username").val();
        var password = $("#password").val();
        if(UserName == "") {
			$("#username").after('<p class="text-danger"> Email field is required</p>');
			$('#username').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#username").find('.text-danger').remove();
			// success out for form 
			$("#username").closest('.form-group').addClass('has-success');	  	
		}

		if(password == "") {
			$("#password").after('<p class="text-danger">Passsword field is required</p>');

			$('#password').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#password").find('.text-danger').remove();
			// success out for form 
			$("#password").closest('.form-group').addClass('has-success');	  	
		}

        if(UserName && password) {
			var form = $(this);
			// button loading
			$("#sininBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#sininBtn").button('reset');

					if(response.success == true) {
						gotoconfirmdetails();
					}else {
						Swal.fire("Success", response.messages, "error");
					}
	

				} // /success
			}); // /ajax	
        } // if
        return false;
    });
});

function gotoconfirmdetails() {
    window.location.href = "confirm_details.php";
}
