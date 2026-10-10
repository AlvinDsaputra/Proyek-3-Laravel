@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center mb-3">Registrasi Akun Baru</h3>
        <form action="{{ route('register.post') }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            <div class="mb-2"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
            <div class="mb-2"><label>Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="mb-2"><label>Username</label><input type="text" name="username" class="form-control" required></div>
            <div class="mb-2"><label>Password</label><input type="password" name="password" class="form-control" required></div>
            <div class="mb-2"><label>No HP</label><input type="text" name="no_hp" class="form-control" required></div>
            <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required></textarea></div>
            <button class="btn btn-success w-100">Daftar Akun</button>
        </form>
    </div>
</div>
@endsection