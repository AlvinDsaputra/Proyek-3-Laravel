<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Keranjang belanja kosong!');
        }

        $idOrder = 'ORD' . date('Ymd') . rand(100, 999);
        $totalHarga = 0;

        DB::beginTransaction();
        try {
            foreach ($cart as $id => $item) {
                $totalHarga += $item['harga'] * $item['qty'];
            }

            Order::create([
                'id_order'          => $idOrder,
                'id_user'           => Auth::user()->id_user,
                'tanggal_order'     => now(),
                'total_harga'       => $totalHarga,
                'alamat_pengiriman' => Auth::user()->alamat,
            ]);

            foreach ($cart as $id => $item) {
                OrderDetail::create([
                    'id_order'     => $idOrder,
                    'id_barang'    => $id,
                    'harga_satuan' => $item['harga'],
                    'jumlah_beli'  => $item['qty'],
                ]);

                // Potong stok produk
                $product = Product::findOrFail($id);
                $product->stok -= $item['qty'];
                $product->save();
            }

            session()->forget('cart');
            DB::commit();

            return redirect()->route('orders.history')->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal checkout: ' . $e->getMessage());
        }
    }

    public function history()
    {
        $orders = Order::where('id_user', Auth::user()->id_user)
            ->orderBy('tanggal_order', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }
}