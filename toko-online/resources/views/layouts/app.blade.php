<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Online Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-link navbar-brand fw-bold" href="{{ route('home') }}">Toko Online</a>
            <div class="navbar-nav ms-auto">
                @auth
                    <a class="nav-link" href="{{ route('cart.index') }}">Keranjang ({{ count(session('cart', [])) }})</a>
                    <a class="nav-link" href="{{ route('orders.history') }}">Riwayat Pesanan</a>
                    <span class="nav-link text-warning">Halo, {{ Auth::user()->nama_lengkap }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-light ms-2">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
        
        @yield('content')
    </div>
</body>
</html>