<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
</head>
<body>
    <h2>Keranjang belanja</h2>
    <p><i>Tanpa login</i> | <a href="{{ route('catalog') }}">Kembali ke Toko</a></p>
    <hr>

    @if(count($cartItems) > 0)
        @foreach($cartItems as $item)
            <div style="margin-bottom: 10px;">
                <strong>{{ $item['nama'] }}</strong><br>
                Rp {{ number_format($item['harga'], 0, ',', '.') }} x {{ $item['qty'] }} = Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                
                <form action="{{ route('cart.decrease', $item['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">[-]</button>
                </form>
                {{ $item['qty'] }}
                <form action="{{ route('cart.increase', $item['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">[+]</button>
                </form>
                <form action="{{ route('cart.remove', $item['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">[hps]</button>
                </form>
            </div>
        @endforeach
        <hr>
        <h3>Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>

        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">[ Kosongkan keranjang ]</button>
        </form>
    @else
        <p>Keranjang kamu kosong.</p>
    @endif
</body>
</html>