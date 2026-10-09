<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: monospace; padding: 20px; }
        .box { border: 1px dashed #000; padding: 15px; width: 320px; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h3>localhost:8000/login</h3>
        <hr>
        <h2>Login</h2>
        <p>Masuk untuk membuka dashboard</p>

        @if ($errors->has('username'))
            <div class="error">[ {{ $errors->first('username') }} ]</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <p>
                <label>Username</label><br>
                <input type="text" name="username" value="{{ old('username') }}" required>
            </p>
            <p>
                <label>Password</label><br>
                <input type="password" name="password" required>
            </p>
            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>