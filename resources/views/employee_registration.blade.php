<!-- resources/views/employee_login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <title>Employee Resgistration</title>
</head>

<body>

    <div class="container">
        <h2>Employee Registraion</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="employee-registration-form">
            @csrf

            <div class="reg-div">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="reg-div">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="reg-div">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/employee_registration.js') }}"></script>
</body>

</html>
