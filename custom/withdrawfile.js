$(document).ready(function () { 

    $('#Imgipdaddiv').hide();
    
    $("#withraw_img_submit_frm").unbind('submit').bind('submit', function () {
        $(".text-danger").remove();
        event.preventDefault();


        var action = 'fetch_data';
        var selectcurrencetxt = $("#selectcurrencetxt").val();
        var withrawamttxt = $("#withrawamttxt").val();
        var platformtxt = $("#platformtxt").val();

        var usernametxt = $("#usernametxt").val();
        var banktxt = $("#banktxt").val();
        var branchtxt = $("#branchtxt").val();
        var accountnotxt = $("#accountnotxt").val();

        var status = UploadImage();




        function UploadImage() {
            //$(".registerbtn").button('loading');
            $("#address_doc_btn").attr("disabled", true);
            var error_images = '';
            var form_data = new FormData();
            var files = $('#upload')[0].files;
            if (files.length > 1) {
                error_images += 'You can not select more than 1 file';
            } else {
                for (var i = 0; i < files.length; i++) {
                    var name = document.getElementById("upload").files[i].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        error_images += '<p>Invalid File Type</p>';
                    }
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("upload").files[i]);
                    var f = document.getElementById("upload").files[i];
                    var fsize = f.size || f.fileSize;
                    if (fsize > 2000000) {
                        error_images += '<p>File Size Limit Exceeded</p>';
                    } else {
                        form_data.append("file[]", document.getElementById('upload').files[i]);
                    }
                }
            }
            return error_images;
        }
        var form_data = new FormData();
        form_data.append("file[]", document.getElementById('upload').files[0]);
        form_data.append("action", action);
        form_data.append("selectcurrencetxt", selectcurrencetxt);
        form_data.append("withrawamttxt", withrawamttxt);
        form_data.append("platformtxt", platformtxt);

        form_data.append("usernametxt", usernametxt);
        form_data.append("banktxt", banktxt);
        form_data.append("branchtxt", branchtxt);
        form_data.append("accountnotxt", accountnotxt);


        if (status == '') {
            $('#all_doc_submit_btn').attr("disabled", true); //This for the button is disable
            $.ajax({
                url: "backend/withdraw/add_withdraw.php",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data == "Done") {
                        const newstatus = fetch_status(1);
                        $('#main_Status_load').html(newstatus);
                        $('#Imgipdaddiv').hide();
                        $('#all_doc_submit_btn').attr("disabled", false);
                        Swal.fire("Success", data, "success");
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                        
                    } else {
                        const newstatus = fetch_status(0);
                        $('#main_Status_load').html(newstatus);
                        $('#all_doc_submit_btn').attr("disabled", false);
                        Swal.fire("Success", data, "error");
                    }


                },
                error: function (data) {
                    Swal.fire("Success", data, "error");
                    $('#all_doc_submit_btn').attr("disabled", false);
                }
            });
        }
        else {
            $('#msg').html(status);
            $('#all_doc_submit_btn').attr("disabled", false);
        }

    });
});


function fetch_widrowal_detail(id) {
    var action = '';
    $.ajax({
        url: "backend/withdraw/fetch_withraw_details.php",
        method: "POST",
        data: {
            action: action,
            id: id,
        },
        dataType: 'json',
        success: function (data) {
            $('#load_withraw_details').html(data);
            $('#withraw_type_div').hide();
        }
    });
}

function Image_fetch() {

    $(".text-danger").remove();
    var selectcurrencetxt = $("#selectcurrencetxt").val();
    var withrawamttxt = $("#withrawamttxt").val();
    var platformtxt = $("#platformtxt").val();

    if (selectcurrencetxt == "") {
        $("#selectcurrencetxt").after('<p class="text-danger">Required</p>');
        $('#selectcurrencetxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#selectcurrencetxt").find('.text-danger').remove();
        // success out for form 
        $("#selectcurrencetxt").closest('.form-group').addClass('has-success');
    }

    if (withrawamttxt == "") {
        $("#withrawamttxt").after('<p class="text-danger>Amount field is required</p>');
        $('#withrawamttxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#withrawamttxt").find('.text-danger').remove();
        // success out for form 
        $("#withrawamttxt").closest('.form-group').addClass('has-success');
    }
    if (isNaN(withrawamttxt)) {
        $("#withrawamttxt").after('<p class="text-danger">Please check is a No</p>');
        $('#withrawamttxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#withrawamttxt").find('.text-danger').remove();
        // success out for form 
        $("#withrawamttxt").closest('.form-group').addClass('has-success');
    }

    if (platformtxt == "") {
        $("#platformtxt").after('<p class="text-danger">Please field is required</p>');
        $('#platformtxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#platformtxt").find('.text-danger').remove();
        // success out for form 
        $("#platformtxt").closest('.form-group').addClass('has-success');
    }

    if (selectcurrencetxt && withrawamttxt && platformtxt) {
        $(".text-danger").remove();
        $('#Imgipdaddiv').show();
        $('#load_withraw_details').hide();
    }

}

function fetch_status(sucessstatus) {
    var action = '';
    if (sucessstatus) {
        $.ajax({
            url: "backend/withdraw/status_withdraw.php",
            method: "POST",
            data: {
                action: action,
                sucessstatus: sucessstatus,
            },
            dataType: 'json',
            success: function (data) {
                return data;
            }
        });
    }

}

