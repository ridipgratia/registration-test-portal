
class ApiResponse {
    constructor(status, message) {
        this.status = status;
        this.message = message;
    }
}

$(document).ready(function() {
    $("#employee-registration-form").submit(async function(event) {
        event.preventDefault();
        let name = $("#name").val();
        let email = $("#email").val();
        let password = $("#password").val();

        await $.ajax({
            url: "/api/employee/register",
            type: "POST",
            // contentType: "application/json",
            // dataType: "json",
            // data: JSON.stringify({
            //     email: username,
            //     password: password
            // }),
            data:{
                name:name,
                email:email,
                password:password
            },
            success: function(data) {
                if (data.status === 200) {
                    alert("registration Successful!");
                    window.location.href = "/employee/login";
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
