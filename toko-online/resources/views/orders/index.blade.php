@extends('layouts.app')

@section('content')
<h2>Riwayat Pesanan Anda</h2>

@if($orders->count() > 0)
    @foreach($orders as $order)
        <div class="card mb-3 shadow-sm">
            <div class="card-header d-flex justify-content-between">
                <span>ID Order: <strong>{{ $order->id_order }}</strong></span>
                <span>Tgl: {{ $order->tanggal_order }}</span>
            </div>
            <div class="card-body">
                <p class="mb-1">Alamat Pengiriman: {{ $order->alamat_pengiriman }}</p>
                <h6 class="text-primary">Total Bayar: Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h6>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-warning mt-3">Belum ada riwayat pesanan.</div>
@endif
@endsection