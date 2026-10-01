<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h1>Register</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">

    @csrf

    <input
        type="text"
        name="name"
        placeholder="Name"
        value="{{ old('name') }}"
    >

    <br><br>

    <input
        type="email"
        name="email"
        placeholder="Email"
        value="{{ old('email') }}"
    >

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password"
    >

    <br><br>

    <input
        type="password"
        name="password_confirmation"
        placeholder="Confirm Password"
    >

    <br><br>

    <button type="submit">Register</button>

</form>

<br>

<a href="/login">Already have an account? Login</a>

</body>
</html>