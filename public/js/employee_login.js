class ApiResponse {
    constructor(status, message) {
        this.status = status;
        this.message = message;
    }
}

$(document).ready(function() {
    $("#employee-login-form").submit(function(event) {
        event.preventDefault();
        let email = $("#email").val();
        let password = $("#password").val();

        $.ajax({
            url: "/api/employee/login",
            type: "POST",
            // contentType: "application/json",
            // dataType: "json",
            // data: JSON.stringify({
            //     email: username,
            //     password: password
            // }),
            data:{
                email:email,
                password:password
            },
            success: function(data) {
                if (data.status === 200) {
                    alert("Login Successful!");
                    //window.location.href = "/admin/dashboard";
                } else {
                    if (data.message) {
                        var alert_message="";
                        data.message.forEach(message => {
                            alert_message+=message;
                        });
                        Swal.fire({
                            title: "Error",
                            text: alert_message,
                            icon: "error"
                          });
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
});
