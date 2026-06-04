<!DOCTYPE html>
<html>
<head>
    <title>Login Apotek</title>
</head>
<body>

<h2>Login Apotek</h2>

@if ($errors->any())
    <p>{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('login.post') }}">
    @csrf

    <div>
        <label>Username</label>
        <input type="text" name="username">
    </div>

    <br>

    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <br>

    <button type="submit">
        Login
    </button>
</form>

</body>
</html>