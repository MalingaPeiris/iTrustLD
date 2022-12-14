var userlisttbl;
$(document).ready(function () {
    userlisttbl = $("#user_list_tbl").DataTable({
        'ajax': '../backend/admin/users/fetch_users.php',
        'order': [],
        "scrollX": true
    });

});


function edit_user(id) {
    $.ajax({
        url: "../backend/admin/users/fetch_selected_users.php",
        method: "POST",
        data: { id: id },
        dataType: 'json',
        success: function (response) {
            //This for the add Values
            //````````````````````````
            
            //$('#uset_identity_img').html('<img src="../backend/user/' + response.image + '" alt=""  style="max-width: 400px; min-width: 200px; max-height: 450px; min-height: 300px;">');
            //$('#trans_id_txt').val(response.tran_id);
           /*  alert(response[0]['fname']); */
            var Img = '';
                for (var i = 0; i < response.length; i++) {
                    if(response[i]['nic_Image'] != 0){
                        Img = Img + '<img src="../backend/user/' + response[i]['nic_Image'] + '" alt="MainImage ' + response[i]['nic_Image'] + '" style="max-width: 400px; min-width: 200px; max-height: 450px; min-height: 300px;"><br>';
                    }
                }
                $('#user_id_txt').val(response[0]['user_id']);

                $('#uset_identity_img').html(Img);
                $('#fnametxt').val(response[0]['fname']);
                $('#lastnametxt').val(response[0]['lname']);
                $('#emailtxt').val(response[0]['email']);
                $('#languagetxt').val(response[0]['language']);
                $('#mobilenotxt').val(response[0]['mobile_no']);
                $('#dobtxt').val(response[0]['dob']);
                $('#addresstxt').val(response[0]['address']);

                $('#streettxt').val(response[0]['street']);
                $('#countrytxt').val(response[0]['country']);
                $('#citytxt').val(response[0]['city']);
                $('#zipcodetxt').val(response[0]['zip_code']);


            //Submit the frm
            $('#edit_user_Details_frm').unbind('submit').bind('submit', function () {

                $(".text-danger").remove();
                var user_id_txt = $('#user_id_txt').val();
                var identity_confirm_txt = $('#identity_confirm_txt').val();
                var address_confirm_txt = $('#address_confirm_txt').val();


                if (identity_confirm_txt == "") {
                    $("#identity_confirm_txt").after('<p class="text-danger">Identity Confirm field is required</p>');
                    $('#identity_confirm_txt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#identity_confirm_txt").find('.text-danger').remove();
                    // success out for form 
                    $("#identity_confirm_txt").closest('.form-group').addClass('has-success');
                }
                if (address_confirm_txt == "") {
                    $("#address_confirm_txt").after('<p class="text-danger">Address Confirm field is required</p>');
                    $('#address_confirm_txt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#address_confirm_txt").find('.text-danger').remove();
                    // success out for form 
                    $("#address_confirm_txt").closest('.form-group').addClass('has-success');
                }


                if (identity_confirm_txt && address_confirm_txt && user_id_txt) {
                    var form = $(this);
                    $('#user_details_edit_btn').button('loading');

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success: function (response) {

                            if (response.success == true) {
                                //console.log(response);
                                // submit btn
                                $('#user_details_edit_btn').button('reset');
                                Swal.fire("Success", response.messages, "success");
                                // reload the manage member table 
                                userlisttbl.ajax.reload(null, false);
                                // remove the error text
                                $(".text-danger").remove();
                                // remove the form error
                                $('.form-group').removeClass('has-error').removeClass('has-success');

                                /* $('#Update-Done-Message').html('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                    '</div>');

                                $(".alert-success").delay(500).show(10, function () {
                                    $(this).delay(3000).hide(10, function () {
                                        $(this).remove();
                                    });
                                }); // /.alert */
                            } // /if

                        }// /success
                    });	 // /ajax
                    return false;
                }
                return false;
            });
            return false;
        }
    });
}

function delete_user(id){

}
