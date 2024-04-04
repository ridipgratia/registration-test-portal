@extends('layouts.app')

@section('content')
    <h1>Admin Login</h1>
    <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

    <p id="login-message"></p>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
