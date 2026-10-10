@extends('layouts.app')

@section('content')
<h2 class="mb-4">Katalog Barang Toko Online</h2>
<div class="row">
    @foreach($products as $p)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $p->nama_barang }}</h5>
                <p class="card-text text-muted">{{ $p->deskripsi }}</p>
                <h6 class="text-primary">Rp {{ number_format($p->harga, 0, ',', '.') }}</h6>
                <p class="small mb-2">Stok: <strong>{{ $p->stok }}</strong></p>
                
                @auth
                    @if($p->stok > 0)
                        <form action="{{ route('cart.add', $p->id_barang) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-primary w-100">+ Ke Keranjang</button>
                        </form>
                    @else
                        <button class="btn btn-sm btn-secondary w-100" disabled>Stok Habis</button>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary w-100">Login untuk Beli</a>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection