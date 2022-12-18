
var loadadminusertbl;
$(document).ready(function () {
    loadadminusertbl = $("#adminuser_list_tbl").DataTable({
        'ajax': '../backend/admin/admin_users/fetch_admin_user_listall.php',
        'order': [],
        "scrollX": true
    });

});
function add_new_user_mdl_load() {
    $('#admin_usertblHeader').text('Add Admin User');
    $('#admin_add_btn_div').html('<button type="submit" class="btn btn-danger" id="admin_user_change_btn" onclick="add_new_admin()">Add Admin</button>');
    $('#copencode_andOther').html();


}
function add_new_admin() {
    $('#edit_admin_user_frm').unbind('submit').bind('submit', function () {

        $(".text-danger").remove();

        var nametxt = $('#nametxt').val();
        var email = $('#emailtxt').val();
        var password = $('#passwordtxt').val();
        var typetxt = $('#stypetxt').val();
        var status = $('#statustxt').val();

        if (nametxt == "") {
            $("#nametxt").after('<p class="text-danger">Name field is required</p>');
            $('#nametxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#nametxt").find('.text-danger').remove();
            // success out for form 
            $("#nametxt").closest('.form-group').addClass('has-success');
        }
        if (email == "") {
            $("#emailtxt").after('<p class="text-danger">Email field is required</p>');
            $('#emailtxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#emailtxt").find('.text-danger').remove();
            // success out for form 
            $("#emailtxt").closest('.form-group').addClass('has-success');
        }
        if (password == "") {
            $("#passwordtxt").after('<p class="text-danger">Password field is required</p>');
            $('#passwordtxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#passwordtxt").find('.text-danger').remove();
            // success out for form 
            $("#passwordtxt").closest('.form-group').addClass('has-success');
        }
        if (typetxt == "") {
            $("#typetxt").after('<p class="text-danger">Type field is required</p>');
            $('#typetxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#typetxt").find('.text-danger').remove();
            // success out for form 
            $("#typetxt").closest('.form-group').addClass('has-success');
        }
        if (status == "") {
            $("#statustxt").after('<p class="text-danger">Status field is required</p>');
            $('#statustxt').closest('.form-group').addClass('has-error');
        } else {
            // remov error text field
            $("#statustxt").find('.text-danger').remove();
            // success out for form 
            $("#statustxt").closest('.form-group').addClass('has-success');
        }

        if (nametxt && email && password && typetxt && status) {
            var form = $(this);
            $('#admin_user_change_btn').button('loading');

            $.ajax({
                url: '../backend/admin/admin_users/add_Admin_user.php',
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {

                    if (response.success == true) {
                        //console.log(response);
                        // submit btn
                        $('#admin_user_change_btn').button('reset');
                        Swal.fire("Success",response.messages , "success");

                        // reload the manage member table 
                        loadadminusertbl.ajax.reload(null, false);
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
    });
    return false;
}

function edit_admin_user(id) {
    $('#admin_usertblHeader').text('Edit Admin User');
    $('#admin_add_btn_div').html('<button type="submit" class="btn btn-danger" id="admin_user_change_btn">Save changes</button>');

    $.ajax({
        url: "../backend/admin/admin_users/fetch_selected_admin.php",
        method: "POST",
        data: { id: id },
        dataType: 'json',
        success: function (response) {
            //This for the add Values
            $('#adminidtxt').val(response[0]['id']);
            $('#nametxt').val(response[0]['name']);
            $('#emailtxt').val(response[0]['email']);

            $('#passwordtxt').val(response[0]['password']);
            $('#stypetxt').val(response[0]['type']);
            $('#statustxt').val(response[0]['activity_status']);

            //Submit the frm
            $('#edit_admin_user_frm').unbind('submit').bind('submit', function () {

                $(".text-danger").remove();

                var idtxt = $('#adminidtxt').val();
                var nametxt = $('#nametxt').val();
                var email = $('#emailtxt').val();
                var password = $('#passwordtxt').val();
                var typetxt = $('#stypetxt').val();
                var status = $('#statustxt').val();

                if (nametxt == "") {
                    $("#nametxt").after('<p class="text-danger">Name field is required</p>');
                    $('#nametxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#nametxt").find('.text-danger').remove();
                    // success out for form 
                    $("#nametxt").closest('.form-group').addClass('has-success');
                }
                if (email == "") {
                    $("#emailtxt").after('<p class="text-danger">Email field is required</p>');
                    $('#emailtxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#emailtxt").find('.text-danger').remove();
                    // success out for form 
                    $("#emailtxt").closest('.form-group').addClass('has-success');
                }
                if (password == "") {
                    $("#passwordtxt").after('<p class="text-danger">Password field is required</p>');
                    $('#passwordtxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#passwordtxt").find('.text-danger').remove();
                    // success out for form 
                    $("#passwordtxt").closest('.form-group').addClass('has-success');
                }
                if (typetxt == "") {
                    $("#typetxt").after('<p class="text-danger">Type field is required</p>');
                    $('#typetxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#typetxt").find('.text-danger').remove();
                    // success out for form 
                    $("#typetxt").closest('.form-group').addClass('has-success');
                }
                if (status == "") {
                    $("#statustxt").after('<p class="text-danger">Status field is required</p>');
                    $('#statustxt').closest('.form-group').addClass('has-error');
                } else {
                    // remov error text field
                    $("#statustxt").find('.text-danger').remove();
                    // success out for form 
                    $("#statustxt").closest('.form-group').addClass('has-success');
                }

                if (idtxt && nametxt && email && password && typetxt && status) {
                    var form = $(this);
                    $('#admin_user_change_btn').button('loading');

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success: function (response) {

                            if (response.success == true) {
                                //console.log(response);
                                // submit btn
                                $('#admin_user_change_btn').button('reset');
                                Swal.fire("Success",response.messages , "success");
                                // reload the manage member table 
                                loadadminusertbl.ajax.reload(null, false);
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
            });
            return false;
        }
    });
}

function delete_admin_user(id) {
    if (id) {
        $('#delete_admin_user_div').html('<button type="button" class="btn btn-danger" onclick="delete_admin_user_btn_press(' + id + ')">Delete</button>');
    }
}

function delete_admin_user_btn_press(id) {
    if (id) {
        $.ajax({
            url: "../backend/admin/admin_users/delete_user.php",
            method: "POST",
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                if(response.success == true){
                    loadadminusertbl.ajax.reload(null, false);
                    Swal.fire("Success",response.messages , "success");
                }else{
                    Swal.fire("Success",response.messages , "error");
                }
            }
        });
    }
}

