<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['id_barang' => 'BRG001', 'nama_barang' => 'Buku Tulis A5', 'deskripsi' => 'Buku tulis isi 50 lembar', 'harga' => 5000, 'stok' => 20, 'gambar' => 'buku.jpg'],
            ['id_barang' => 'BRG002', 'nama_barang' => 'Pulpen Gel Hitam', 'deskripsi' => 'Pulpen gel 0.5mm', 'harga' => 3500, 'stok' => 50, 'gambar' => 'pulpen.jpg'],
            ['id_barang' => 'BRG003', 'nama_barang' => 'Pensil 2B', 'deskripsi' => 'Pensil kayu 2B standar ujian', 'harga' => 2500, 'stok' => 30, 'gambar' => 'pensil.jpg'],
            ['id_barang' => 'BRG004', 'nama_barang' => 'Penggaris 30cm', 'deskripsi' => 'Penggaris plastik mika transparan', 'harga' => 4000, 'stok' => 15, 'gambar' => 'penggaris.jpg'],
            ['id_barang' => 'BRG005', 'nama_barang' => 'Penghapus Karet', 'deskripsi' => 'Penghapus pensil warna putih', 'harga' => 2000, 'stok' => 40, 'gambar' => 'penghapus.jpg'],
            ['id_barang' => 'BRG006', 'nama_barang' => 'Tip-Ex Kertas', 'deskripsi' => 'Correction tape 12m', 'harga' => 8000, 'stok' => 10, 'gambar' => 'tipex.jpg'],
            ['id_barang' => 'BRG007', 'nama_barang' => 'Spidol Permanent', 'deskripsi' => 'Spidol hitam cepat kering', 'harga' => 7000, 'stok' => 25, 'gambar' => 'spidol.jpg'],
            ['id_barang' => 'BRG008', 'nama_barang' => 'Stabilo Kuning', 'deskripsi' => 'Highlighter warna kuning terang', 'harga' => 9000, 'stok' => 18, 'gambar' => 'stabilo.jpg'],
            ['id_barang' => 'BRG009', 'nama_barang' => 'Map Plastik Button', 'deskripsi' => 'Map dokumen ukuran F4', 'harga' => 4500, 'stok' => 35, 'gambar' => 'map.jpg'],
            ['id_barang' => 'BRG010', 'nama_barang' => 'Gunting Kertas', 'deskripsi' => 'Gunting stainless steel 6 inch', 'harga' => 12000, 'stok' => 12, 'gambar' => 'gunting.jpg'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}