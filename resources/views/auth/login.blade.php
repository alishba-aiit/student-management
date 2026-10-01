<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/login">

    @csrf

    <input
        type="email"
        name="email"
        placeholder="Email"
    >

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password"
    >

    <br><br>

    <button type="submit">Login</button>

</form>

<br>

<a href="/register">Create account</a>

</body>
</html>