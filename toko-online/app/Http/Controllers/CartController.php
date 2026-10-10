<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $currentQty = isset($cart[$id]) ? $cart[$id]['qty'] : 0;

        if ($currentQty + 1 > $product->stok) {
            return back()->with('error', 'Jumlah beli melebihi stok yang tersedia!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'nama' => $product->nama_barang,
                'harga' => $product->harga,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if ($request->qty > $product->stok) {
            return back()->with('error', 'Jumlah melebihi stok tersedia!');
        }

        if ($request->qty <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id]['qty'] = $request->qty;
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Keranjang diperbarui!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Barang dihapus dari keranjang!');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang dikosongkan!');
    }
}