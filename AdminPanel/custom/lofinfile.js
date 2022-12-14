$(document).ready(function() { 

    $("#formAuthentication").unbind('submit').bind('submit', function() {

		// remove the error 
		$('.text-danger').remove();
		
        //This part for the getting value if empty or Not
        var UserName  = $("#exampleInputEmail").val();
        var password = $("#exampleInputPassword").val();
        if(UserName == "") {
			$("#exampleInputEmail").after('<p class="text-danger"> Email field is required</p>');
			$('#exampleInputEmail').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#exampleInputEmail").find('.text-danger').remove();
			// success out for form 
			$("#exampleInputEmail").closest('.form-group').addClass('has-success');	  	
		}

		if(password == "") {
			$("#exampleInputPassword").after('<p class="text-danger">Passsword field is required</p>');

			$('#exampleInputPassword').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#exampleInputPassword").find('.text-danger').remove();
			// success out for form 
			$("#exampleInputPassword").closest('.form-group').addClass('has-success');	  	
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
						//after upload this file we need to change this part
						if(response.messages == "Non"){
							window.location.href = "/activateAccount.php";
						}else{
							
							location.reload();
						}
					}else {
						$("#password").after('<p class="text-danger"> ' + response.messages + ' </p>');
					}
	

				} // /success
			}); // /ajax	
        } // if
        return false;
    });

});