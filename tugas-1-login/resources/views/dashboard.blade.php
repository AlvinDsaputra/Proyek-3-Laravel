<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { font-family: monospace; padding: 20px; }
        .box { border: 1px dashed #000; padding: 15px; width: 450px; }
        .top { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <div class="box">
        <div class="top">
            <h3>Dashboard</h3>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">[ Logout ]</button>
            </form>
        </div>
        <hr>
        <p><strong>Selamat datang, {{ Auth::user()->nama_lengkap }}!</strong></p>
        <p>Halaman ini hanya bisa dibuka setelah login.</p>
        <p>Username: {{ Auth::user()->username }}</p>
    </div>
</body>
</html>