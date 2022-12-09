var loadfile;
$(document).ready(function () {
    loadfile = $("#list_tbl").DataTable({
        'ajax': '../backend/admin/withraws/fetch_pending_withraws.php',
        'order': [],
        "scrollX": true
    });

});

function view_withraw(id) {
    $.ajax({
        url: "../backend/admin/withraws/fetch_selected_withraws.php",
        method: "POST",
        data: { id: id },
        dataType: 'json',
        success: function (response) {
            //This for the add Values
            //````````````````````````
            
            $('#Withraw_ImageShow').html('<img src="../backend/withdraw/' + response.image + '" alt=""  style="max-width: 400px; min-width: 200px; max-height: 450px; min-height: 300px;">');
            $('#trans_id_txt').val(response.tran_id);
            $('#lkramttxt').val(response.lkramt);
            $('#dolleramttxt').val(response.dolleramt);

            $('#usernametxt').val(response.name);
            $('#statusupdatetxt').val(response.status);
            $('#messagetxt').val(response.message);

            
            $('#bankusernametxt').val(response.bankusername);
            $('#banktxt').val(response.bank);
            $('#branchtxt').val(response.branch);
            $('#accountnotxt').val(response.account_no);

            $('#tanferdatetxt').val(response.up_date);
            $('#subcriptionidtxt').val(response.subscription);

            $('#vithraw_id_txt').val(id);

            //Submit the frm
            $('#withraws_status_change_frm').unbind('submit').bind('submit', function () {

                $(".text-danger").remove();

                var statusupdatetxt = $('#statusupdatetxt').val();
                var messagetxt = $('#messagetxt').val();


                if (statusupdatetxt == "") {
                    $("#statusupdatetxt").after('<p class="text-danger">Status field is required</p>');
                    $('#statusupdatetxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#statusupdatetxt").find('.text-danger').remove();
                    // success out for form 
                    $("#statusupdatetxt").closest('.form-group').addClass('has-success');
                }
                if (messagetxt == "") {
                    $("#messagetxt").after('<p class="text-danger">Message field is required</p>');
                    $('#messagetxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#messagetxt").find('.text-danger').remove();
                    // success out for form 
                    $("#messagetxt").closest('.form-group').addClass('has-success');
                }


                if (statusupdatetxt && messagetxt) {
                    var form = $(this);
                    $('#withraws_status_change_btn').button('loading');

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success: function (response) {

                            if (response.success == true) {
                                //console.log(response);
                                // submit btn
                                $('#withraws_status_change_btn').button('reset');
                                Swal.fire("Success", response.messages, "success");
                                // reload the manage member table 
                                loadfile.ajax.reload(null, false);
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
