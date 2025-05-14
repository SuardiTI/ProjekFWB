<?php

namespace App\Http\Controllers;

use App\Models\Detail_joki;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembeliController extends Controller
{
    public function lihatProduk()
    {
        $produk = Produk::all();
        return view('costumer.dashboard', compact('produk'));
    }

    public function cekout($id)
    {
        $produk = Produk::findOrFail($id);
        return view('costumer.beliProduk', compact('produk'));
    }

    public function beli(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'kontak_pembeli' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'jumlah_dibayar' => 'required|numeric|min:1',
            'tanggal_pembayaran' => 'required|date',
            'bukti_pembayaran' => 'nullable|image|max:2048',
        ]);
        // Ambil data produk
        $produk = Produk::findOrFail($request->produk_id);

        // Simpan ke tabel orders
        $order = Order::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'kontak_pembeli' => $request->kontak_pembeli,
            'total_harga' => $produk->harga,
            // status & lainnya otomatis default
        ]);

        // bukti pembayaran 
        $buktiPath = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('bukti', 'public');
        }

        
        Transaksi::create([
            'order_id' => $order->id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_dibayar' => $request->jumlah_dibayar,
            'tanggal_pembayaran' => now(),
            'bukti_pembayaran' => $buktiPath,
            // status & distribusi pakai default
        ]);
        if($produk->kategori == 'joki'){
            Detail_joki::create([
                'order_id' => $order->id,
                'username_game' => $request->username_game,
                'password_game' => $request->password_game,
                'instruksi' => $request->instruksi,
            ]);
        }

        return redirect()->route('lihatStatus', $produk->id)->with('success', 'Checkout berhasil! Silakan tunggu proses admin.');
    }
    
    public function lihatStatus()
    {

        $order = Order::where('user_id', Auth::id())
        ->with('transaksi', 'produk', 'detailJoki')
        ->get();
        // dd($order);

        return view('costumer.statusPembelian', compact('order'));
    }

    public function buatWishlist($id)
    {
        $produk = Produk::findOrFail($id);

        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('produk_id', $id)
            ->first();
        
        if ($wishlist) {
            return redirect()->back()->with('error', 'Produk sudah ada di wishlist');
       }
       Wishlist::create([
            'user_id' => Auth::id(),
            'produk_id' => $id,
        ]);
        return redirect()->route('lihatwishlist')->with('success', 'Produk berhasil ditambahkan ke wishlist');
   }
   
   public function lihatWishlist()
   {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)
            ->with('produk')
            ->get();
            
        return view('costumer.wishlist', compact('wishlist'));
   }
        
}
