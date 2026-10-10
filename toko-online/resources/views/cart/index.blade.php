@extends('layouts.app')

@section('content')
<h2>Keranjang Belanja</h2>
@if(session('cart') && count(session('cart')) > 0)
    <table class="table align-middle mt-3">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $item)
                @php 
                    $subtotal = $item['harga'] * $item['qty']; 
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td style="width: 150px;">
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                            @csrf
                            <input type="number" name="qty" value="{{ $item['qty'] }}" class="form-control form-control-sm me-1" min="1">
                            <button class="btn btn-sm btn-secondary">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="3" class="text-end">Total Harga:</td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger">Kosongkan Keranjang</button>
        </form>
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button class="btn btn-success px-4">Checkout Sekarang</button>
        </form>
    </div>
@else
    <div class="alert alert-info mt-3">Keranjang belanja Anda masih kosong.</div>
@endif
@endsection