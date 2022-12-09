$(document).ready(function () {
    //Swal.fire("Success", 'Js Working', "success");
    $('#step2details').hide();
    //$('#sinupbtn_div').hide();

    $('#add_new_user_frm').unbind('submit').bind('submit', function () {

        $(".text-danger").remove();

        var fristnametxt = $('#fristnametxt').val();
        var lastnametxt = $('#lastnametxt').val();
        var emailtxt = $('#emailtxt').val();
        var password = $('#password').val();
        var con_password = $('#con_password').val();
        var countrytxt = $('#countrytxt').val();

        var language = $('#language').val();

        var Mobilenotxt = $('#Mobilenotxt').val();
        var dobtxt = $('#dobtxt').val();

        var addresstxt = $('#addresstxt').val();
        var streettxt = $('#streettxt').val();
        var citytxt = $('#citytxt').val();
        var zipcodetxt = $('#zipcodetxt').val();

        if (streettxt == "") {
            $("#streettxt").after('<p class="text-danger">Street field is required</p>');
            $('#streettxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#streettxt").find('.text-danger').remove();
            // success out for form 
            $("#streettxt").closest('.form-group').addClass('has-success');
        }

        if (zipcodetxt == "") {
            $("#zipcodetxt").after('<p class="text-danger">Zip Code field is required</p>');
            $('#zipcodetxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#zipcodetxt").find('.text-danger').remove();
            // success out for form 
            $("#zipcodetxt").closest('.form-group').addClass('has-success');
        }

        if (streettxt == "") {
            $("#streettxt").after('<p class="text-danger">Street field is required</p>');
            $('#streettxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#streettxt").find('.text-danger').remove();
            // success out for form 
            $("#streettxt").closest('.form-group').addClass('has-success');
        }

        if (addresstxt == "") {
            $("#addresstxt").after('<p class="text-danger">Address field is required</p>');
            $('#addresstxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#addresstxt").find('.text-danger').remove();
            // success out for form 
            $("#addresstxt").closest('.form-group').addClass('has-success');
        }

        if (fristnametxt == "") {
            $("#fristnametxt").after('<p class="text-danger">Frist Name field is required</p>');
            $('#fristnametxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#fristnametxt").find('.text-danger').remove();
            // success out for form 
            $("#fristnametxt").closest('.form-group').addClass('has-success');
        }

        if (lastnametxt == "") {
            $("#lastnametxt").after('<p class="text-danger">Last Name field is required</p>');
            $('#lastnametxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#lastnametxt").find('.text-danger').remove();
            // success out for form 
            $("#lastnametxt").closest('.form-group').addClass('has-success');
        }
        if (emailtxt == "") {
            $("#emailtxt").after('<p class="text-danger">Email field is required</p>');
            $('#emailtxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#emailtxt").find('.text-danger').remove();
            // success out for form 
            $("#emailtxt").closest('.form-group').addClass('has-success');
        }

        if (password == "") {
            $("#password").after('<p class="text-danger">Password field is required</p>');
            $('#password').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#password").find('.text-danger').remove();
            // success out for form 
            $("#password").closest('.form-group').addClass('has-success');
        }
        if (con_password == "") {
            $("#con_password").after('<p class="text-danger">Confirm Password field is required</p>');
            $('#con_password').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#con_password").find('.text-danger').remove();
            // success out for form 
            $("#con_password").closest('.form-group').addClass('has-success');
        }
        if (password != con_password) {
            $("#con_password").after('<p class="text-danger">You Enterted Password Dosen t match</p>');
            $('#con_password').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#con_password").find('.text-danger').remove();
            // success out for form 
            $("#con_password").closest('.form-group').addClass('has-success');
        }

        if (countrytxt == "") {
            $("#countrytxt").after('<p class="text-danger">Country field is required</p>');
            $('#countrytxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#countrytxt").find('.text-danger').remove();
            // success out for form 
            $("#countrytxt").closest('.form-group').addClass('has-success');
        }
        if (language == "") {
            $("#language").after('<p class="text-danger">Language field is required</p>');
            $('#language').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#language").find('.text-danger').remove();
            // success out for form 
            $("#language").closest('.form-group').addClass('has-success');
        }
        if (Mobilenotxt == "") {
            $("#Mobilenotxt").after('<p class="text-danger">Mobile No field is required</p>');
            $('#Mobilenotxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#Mobilenotxt").find('.text-danger').remove();
            // success out for form 
            $("#Mobilenotxt").closest('.form-group').addClass('has-success');
        }

        if (dobtxt == "") {
            $("#dobtxt").after('<p class="text-danger">Date of birth field is required</p>');
            $('#dobtxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#dobtxt").find('.text-danger').remove();
            // success out for form 
            $("#dobtxt").closest('.form-group').addClass('has-success');
        }



        if (fristnametxt && lastnametxt && emailtxt && password && con_password && password == con_password && countrytxt && Mobilenotxt && dobtxt && language && addresstxt && streettxt && citytxt && zipcodetxt) {
            var form = $(this);
            $('#signupbtn').button('loading');

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {

                    if (response.success == true) {
                        //console.log(response);
                        // submit btn
                        $('#signupbtn').button('reset');
                        Swal.fire("Success", response.messages, "success");
                        location.reload();
                    }else {
                        $('#signupbtn').button('reset');
                        Swal.fire("Success", response.messages, "error");
                    }

                }// /success
            });	 // /ajax
            return false;
        }
        return false;
    });
    return false;


});

function showOtherfun() {
    $(".text-danger").remove();
    var fristnametxt = $('#fristnametxt').val();
    var lastnametxt = $('#lastnametxt').val();
    var emailtxt = $('#emailtxt').val();
    var Mobilenotxt = $('#Mobilenotxt').val();
    var countrytxt = $('#countrytxt').val();
    var language = $('#language').val();

    if (fristnametxt == "") {
        $("#fristnametxt").after('<p class="text-danger">Frist Name field is required</p>');
        $('#fristnametxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#fristnametxt").find('.text-danger').remove();
        // success out for form 
        $("#fristnametxt").closest('.form-group').addClass('has-success');
    }

    if (lastnametxt == "") {
        $("#lastnametxt").after('<p class="text-danger">Last Name field is required</p>');
        $('#lastnametxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#lastnametxt").find('.text-danger').remove();
        // success out for form 
        $("#lastnametxt").closest('.form-group').addClass('has-success');
    }
    if (emailtxt == "") {
        $("#emailtxt").after('<p class="text-danger">Email field is required</p>');
        $('#emailtxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#emailtxt").find('.text-danger').remove();
        // success out for form 
        $("#emailtxt").closest('.form-group').addClass('has-success');
    }

    if (countrytxt == "") {
        $("#countrytxt").after('<p class="text-danger">Country field is required</p>');
        $('#countrytxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#countrytxt").find('.text-danger').remove();
        // success out for form 
        $("#countrytxt").closest('.form-group').addClass('has-success');
    }
    if (language == "") {
        $("#language").after('<p class="text-danger">Language field is required</p>');
        $('#language').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#language").find('.text-danger').remove();
        // success out for form 
        $("#language").closest('.form-group').addClass('has-success');
    }
    if (Mobilenotxt == "") {
        $("#Mobilenotxt").after('<p class="text-danger">Mobile No field is required</p>');
        $('#Mobilenotxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#Mobilenotxt").find('.text-danger').remove();
        // success out for form 
        $("#Mobilenotxt").closest('.form-group').addClass('has-success');
    }
    if (fristnametxt && lastnametxt && emailtxt && countrytxt && language && Mobilenotxt) {
         $('#step2details').show();
         $('#step1details').hide();
     
         $('#sinupbtn_div').html('<input type="checkbox" required>&nbsp;I accept&nbsp;<a class="loginLink" href="terms-and-conditions.html">Terms and Conditions</a></p>'
         +'<button class="btn btn-danger loginButton w-100" id="signupbtn" type="submit">SIGN UP</button>');

         $('#buttondiv').html('<button class="btn btn-danger loginButton w-100" type="button" onclick="design_backBtn()">BACK</button>');
    }

}

function design_backBtn(){
    $('#step2details').hide();
    $('#step1details').show();

    $('#sinupbtn_div').html('');
    $('#buttondiv').html('<button class="btn btn-danger loginButton w-100" type="button" onclick="showOtherfun()">NEXT</button>');

    
}

