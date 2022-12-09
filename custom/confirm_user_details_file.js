$(document).ready(function () {
    $('#verifi_code_div').hide(); //Verify txt hide
    $('#id_confirm_div').hide();

    //Identity Confirm
    $("#Identity_img_submit_frm").unbind('submit').bind('submit', function () { //This for the Confirm Address

        event.preventDefault();


        var action = 'fetch_data';
        var status = UploadImage();
        var select_type_txt = $("#select_type_txt").val();
        function UploadImage() {
            //$(".registerbtn").button('loading');
            $("#ifrntity_img_submit_btn").attr("disabled", true);
            var error_images = '';
            var form_data = new FormData();
            var files = $('#front_Img_upload')[0].files;
            if (files.length > 1) {
                error_images += 'You can not select more than 1 file';
            } else {
                for (var i = 0; i < files.length; i++) {
                    var name = document.getElementById("front_Img_upload").files[i].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        error_images += '<p>Invalid File Type</p>';
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("front_Img_upload").files[i]);
                    var f = document.getElementById("front_Img_upload").files[i];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 2000000) {
                        error_images += '<p>File Size Limit Exceeded</p>';
                    } else {
                        form_data.append("file[]", document.getElementById('front_Img_upload').files[i]);
                    }
                }
            }
            return error_images;
        }
        var form_data = new FormData();
        form_data.append("file[]", document.getElementById('front_Img_upload').files[0]);
        form_data.append("action", action);
        form_data.append("select_type_txt", select_type_txt);
        if (status == '') {
            $('#ifrntity_img_submit_btn').attr("disabled", true); //This for the button is disable
            $.ajax({
                url: "backend/user/confirm_identity.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                  /*   $('#msg').html(data); */
                    if(data.charAt(0) == 1){
                        $('#ifrntity_img_submit_btn').attr("disabled", false);
                        Swal.fire("Success",data, "success");
                        $('#select_type_txt').val('0');
                        $('#image_title').text('Back Image');
                        $('#image_paragraph').text('Please attach the back image of the selected document verification method to begin the verification process.');
                    
                    }else if(data.charAt(0) == 0){
                        location.reload();
                    }else{
                        $('#ifrntity_img_submit_btn').attr("disabled", false);
                        Swal.fire("Success",data, "success");
                    }
                   
                    /* $('#front_upload_btn_div').html('<div class="alert alert-success" role="alert">Done !</div>'); */
                },
                error: function (data) {
                    Swal.fire("Success", 'Error In Img Upload', "error");
                    $('#ifrntity_img_submit_btn').attr("disabled", false);
                }
            });
        } else {
            $('#msg').html(status);
            $('#ifrntity_img_submit_btn').attr("disabled", false);
        }

    });


    $("#submit_address_frm").unbind('submit').bind('submit', function () { //This for the Confirm Address

        event.preventDefault();


        var action = 'fetch_data';
       /*  var addresstxt = $("#addresstxt").val();
        var streettxt = $("#streettxt").val();
        var Citytxt = $("#Citytxt").val();
        var zip_codetxt = $("#zip_codetxt").val(); */

        var status = UploadImage();




        function UploadImage() {
            //$(".registerbtn").button('loading');
            $("#address_doc_btn").attr("disabled", true);
            var error_images = '';
            var form_data = new FormData();
            var files = $('#address_doc_uploa')[0].files;
            if (files.length > 1) {
                error_images += 'You can not select more than 1 file';
            } else {
                for (var i = 0; i < files.length; i++) {
                    var name = document.getElementById("address_doc_uploa").files[i].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        error_images += '<p>Invalid File Type</p>';
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("address_doc_uploa").files[i]);
                    var f = document.getElementById("address_doc_uploa").files[i];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 2000000) {
                        error_images += '<p>File Size Limit Exceeded</p>';
                    } else {
                        form_data.append("file[]", document.getElementById('address_doc_uploa').files[i]);
                    }
                }
            }
            return error_images;
        }
        var form_data = new FormData();
        form_data.append("file[]", document.getElementById('address_doc_uploa').files[0]);
        form_data.append("action", action);
        /* form_data.append("addresstxt", addresstxt);
        form_data.append("streettxt", streettxt);
        form_data.append("Citytxt", Citytxt);
        form_data.append("zip_codetxt", zip_codetxt); */

        if (status == '') {
            $('#address_doc_btn').attr("disabled", true); //This for the button is disable
            $.ajax({
                url: "backend/user/confirm_address.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
    
                    $('#address_doc_btn').attr("disabled", false);
                    Swal.fire("Success",data, "success");
                    location.reload();

                },
                error: function (data) {
                    Swal.fire("Success",data, "error");
                    $('#address_doc_btn').attr("disabled", false);
                }
            });
        }
        else {
            $('#msg').html(status);
            $('#address_doc_btn').attr("disabled", false);
        }

    });
});
//THis for the Address Confirm
function select_Itentity() {
    if ($('#select_type_txt').val() == 1) {

        $('#image_title').text('Front Image');
        $('#image_paragraph').text('Please attach the front image of the selected document verification method to begin the verification process.');
        $('#id_confirm_div').show();

    } else if ($('#select_type_txt').val() == 2) {
        $('#image_title').text('Driving Liscence Image');
        $('#image_paragraph').text('Please attach the front image of the selected document verification method to begin the verification process.');
        $('#id_confirm_div').show();

    }else if ($('#select_type_txt').val() == 3) {
        $('#image_title').text('Passport Image');
        $('#image_paragraph').text('Please attach the front image of the selected document verification method to begin the verification process.');
        $('#id_confirm_div').show();

    }

}
//End------------------------



//confirm the email
function send_to_user_mail() {
    var emailtxt = $("#emailtxt").val();

    if (emailtxt == "") {
        $("#emailtxt").after('<p class="text-danger">Email field is required</p>');
        $('#emailtxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#emailtxt").find('.text-danger').remove();
        // success out for form 
        $("#emailtxt").closest('.form-group').addClass('has-success');
    }


    if (emailtxt) {
        $('#send_mail_btn').button('loading');
        $.ajax({
            url: 'backend/user/send_email_otp.php',
            type: 'post',
            data: {
                emailtxt: emailtxt
            },
            dataType: 'json',
            success: function (response) {

                if (response.success == true) {
                    //console.log(response);
                    // submit btn
                    $('#verifi_code_div').show(); //Verify txt hide
                    //$('#send_mail_btn').button('reset');
                    $('#main_confirm_btn_div').html('<button class="btn btn-danger my-3" id="send_mail_btn" type="button" onclick="confirm_email_address()">Confirm</button>');
                    Swal.fire("Success", response.messages, "success");

                } else {
                    Swal.fire("Success", response.messages, "error");
                    $('#send_mail_btn').button('reset');
                }

            }// /success
        });
    }

}

//This for nthe email Verification Code
function confirm_email_address() {
    var emailtxt = $("#emailtxt").val();
    var verify_code_txt = $("#verify_code_txt").val();

    if (emailtxt == "") {
        $("#emailtxt").after('<p class="text-danger">Email field is required</p>');
        $('#emailtxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#emailtxt").find('.text-danger').remove();
        // success out for form 
        $("#emailtxt").closest('.form-group').addClass('has-success');
    }
    if (verify_code_txt == "") {
        $("#verify_code_txt").after('<p class="text-danger">Verification Code is required</p>');
        $('#verify_code_txt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#verify_code_txt").find('.text-danger').remove();
        // success out for form 
        $("#verify_code_txt").closest('.form-group').addClass('has-success');
    }


    if (emailtxt && verify_code_txt) {
        $('#send_mail_btn').button('loading');
        $.ajax({
            url: 'backend/user/confirm_email.php',
            type: 'post',
            data: {
                emailtxt: emailtxt,
                verify_code_txt: verify_code_txt
            },
            dataType: 'json',
            success: function (response) {

                if (response.success == true) {
                    //console.log(response);
                    // submit btn
                    $('#verify_code_txt').show(); //Verify txt hide
                    $('#send_mail_btn').button('reset');
                    Swal.fire("Success", response.messages, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    Swal.fire("Success", response.messages, "error");
                    $('#send_mail_btn').button('reset');
                }

            }// /success
        });
    }
}