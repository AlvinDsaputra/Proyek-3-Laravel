<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function catalog()
    {
        $barangs = Barang::all();
        $cart = session()->get('cart', []);
        $totalItems = array_sum($cart);

        return view('catalog', compact('barangs', 'totalItems'));
    }

    public function cart()
    {
        $cartSession = session()->get('cart', []);
        $cartItems = [];
        $total = 0;

        if (!empty($cartSession)) {
            $barangs = Barang::whereIn('id', array_keys($cartSession))->get();

            foreach ($barangs as $barang) {
                $qty = $cartSession[$barang->id];
                $subtotal = $barang->harga * $qty;
                $total += $subtotal;

                $cartItems[] = [
                    'id' => $barang->id,
                    'nama' => $barang->nama,
                    'harga' => $barang->harga,
                    'qty' => $qty,
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('cart', compact('cartItems', 'total'));
    }

    public function add($id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = ($cart[$id] ?? 0) + 1;
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]++;
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]--;
            if ($cart[$id] <= 0) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back();
    }
}