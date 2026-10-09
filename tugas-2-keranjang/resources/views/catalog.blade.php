<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Alat Tulis</title>
</head>
<body>
    <h2>Toko Alat Tulis</h2>
    <p><a href="{{ route('cart') }}">[ Keranjang ({{ $totalItems }}) ]</a></p>
    <hr>
    <h3>Daftar barang</h3>

    @foreach($barangs as $b)
        <div style="margin-bottom: 15px;">
            <strong>{{ $b->nama }}</strong><br>
            Rp {{ number_format($b->harga, 0, ',', '.') }}<br>
            <form action="{{ route('cart.add', $b->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">[Masukkan ke krj]</button>
            </form>
        </div>
    @endforeach
</body>
</html>