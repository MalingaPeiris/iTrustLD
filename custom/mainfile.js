

function logoutFunc() {
    var action="logout";
    $.ajax({
        url: "backend/user/logout.php",
        method: "POST",
        data: {
            action: action,
        },
        success: function (data) {
            Swal.fire("Success", "Logout Done", "success");
            setTimeout(function () {
                window.location.href = "index.php";
            }, 1000);

        }
    });

}