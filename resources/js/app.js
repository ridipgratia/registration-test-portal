import './bootstrap';
$('#login-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/admin/login',
        data: $(this).serialize(),
        success: function (response) {
            if (response.success) {
                window.location.href = response.redirect;
            } else {
                alert(response.message);
            }
        },
        error: function () {
            alert('An error occurred');
        }
    });
});

$('#logout-button').click(function () {
    $.ajax({
        type: 'POST',
        url: '/admin/logout',
        success: function (response) {
            if (response.success) {
                window.location.href = response.redirect;
            } else {
                alert('Logout failed');
            }
        },
        error: function () {
            alert('An error occurred');
        }
    });
});
