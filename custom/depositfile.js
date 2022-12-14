$(document).ready(function () {
    //how_doller_rate(); // Show the doller Rate
    $('#Imgipdaddiv').hide();
    $("#Identity_img_submit_frm").unbind('submit').bind('submit', function () {
        $(".text-danger").remove();
        event.preventDefault();


        var action = 'fetch_data';
        var deposit_type = $("#deposit_type").val();

        var selectbacktxt = $("#selectbacktxt").val();
        var selectcurrencetxt = $("#selectcurrencetxt").val();
        var depositamttxt = $("#depositamttxt").val();
        var platformtxt = $("#platformtxt").val();
        var copencode_txt = $("#copencode_txt").val();



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
        form_data.append("deposit_type", deposit_type);
        form_data.append("selectbacktxt", selectbacktxt);
        form_data.append("selectcurrencetxt", selectcurrencetxt);
        form_data.append("depositamttxt", depositamttxt);
        form_data.append("platformtxt", platformtxt);
        form_data.append("copencode_txt", copencode_txt);



        if (status == '') {
            $('#all_doc_submit_btn').attr("disabled", true); //This for the button is disable
            $.ajax({
                url: "backend/deposit/add_deposit.php",
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
        url: "backend/deposit/fetch_deposit_details.php",
        method: "POST",
        data: {
            action: action,
            id: id,
        },
        dataType: 'json',
        success: function (data) {
            $('#load_deposit_details').html(data);
            $('#deposit_type_div').hide();
        }
    });
}


function Image_fetch() {

    $(".text-danger").remove();
    var selectbacktxt = $("#selectbacktxt").val();
    var selectcurrencetxt = $("#selectcurrencetxt").val();
    var depositamttxt = $("#depositamttxt").val();
    var platformtxt = $("#platformtxt").val();

    if (selectbacktxt == "") {
        $("#selectbacktxt").after('<p class="text-danger">Select the Bank</p>');
        $('#selectbacktxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#selectbacktxt").find('.text-danger').remove();
        // success out for form 
        $("#selectbacktxt").closest('.form-group').addClass('has-success');
    }

    if (selectcurrencetxt == "") {
        $("#selectcurrencetxt").after('<p class="text-danger">equired</p>');
        $('#selectcurrencetxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#selectcurrencetxt").find('.text-danger').remove();
        // success out for form 
        $("#selectcurrencetxt").closest('.form-group').addClass('has-success');
    }

    if (depositamttxt == "") {
        $("#depositamttxt").after('<p class="text-danger">Name field is required</p>');
        $('#depositamttxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#depositamttxt").find('.text-danger').remove();
        // success out for form 
        $("#depositamttxt").closest('.form-group').addClass('has-success');
    }
    if (isNaN(depositamttxt)) {
        $("#depositamttxt").after('<p class="text-danger">Please check is a No</p>');
        $('#depositamttxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#depositamttxt").find('.text-danger').remove();
        // success out for form 
        $("#depositamttxt").closest('.form-group').addClass('has-success');
    }

    if (platformtxt == "") {
        $("#platformtxt").after('<p class="text-danger">Name field is required</p>');
        $('#platformtxt').closest('.form-group').addClass('has-error');
    } else {
        // remov error text field
        $("#platformtxt").find('.text-danger').remove();
        // success out for form 
        $("#platformtxt").closest('.form-group').addClass('has-success');
    }

    if (selectbacktxt && selectcurrencetxt && depositamttxt && platformtxt) {
        $(".text-danger").remove();
        $('#Imgipdaddiv').show();
        $('#load_deposit_details').hide();
    }

}

function change_amt() {
    var dollerratetxt = $("#dollerratetxt").val();
    var depositamttxt = $("#depositamttxt").val();

    var amt = depositamttxt / dollerratetxt;
    const result1 = amt.toFixed(2);
    $("#doller_amt_lbl").html('<p class="text-center text-white fw-bold m-0 fs-4" ><span class="text-danger">$</span>&nbsp;' + result1 + '</p>');
}

function fetch_status(sucessstatus) {
    var action = '';
    if (sucessstatus) {
        $.ajax({
            url: "backend/deposit/starus_deposit.php",
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

