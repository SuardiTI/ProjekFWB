<?php

namespace App\Http\Controllers;

use App\Models\Detail_joki;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Review;
use App\Models\Transaksi;
use App\Models\Wishlist;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PembeliController extends Controller
{
    public function lihatProduk()
    {
        // $produk = Produk::all();
        $produk = Produk::where('status', 'tersedia')->get();
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
      

        DB::beginTransaction();
        try{
            $produk = Produk::findOrFail($request->produk_id);

            if ($produk->kategori == 'joki') {
                $request->validate([
                    'username_game' => 'required|string|max:255',
                    'password_game' => 'required|string|max:255',
                    'instruksi' => 'nullable|string|max:500',
                ]);
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'produk_id' => $produk->id,
                'kontak_pembeli' => $request->kontak_pembeli,
                'total_harga' => $produk->harga,
            ]);
        
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

            ]);
            if($produk->kategori == 'joki'){
                Detail_joki::create([
                    'order_id' => $order->id,
                    'username_game' => $request->username_game,
                    'password_game' => $request->password_game,
                    'instruksi' => $request->instruksi,
                ]);
            }

            $produk->status = 'terjual';
            $produk->save();

            DB::commit();

            return redirect()->route('dashboardCustomer')->with('success', 'Checkout berhasil! Silakan tunggu proses admin.');
        }catch (\Exception $e) {

            DB::rollBack();

            if (isset($buktiPath) && Storage::disk('public')->exists($buktiPath)) {
                Storage::disk('public')->delete($buktiPath);
            }
            return redirect()->back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }

    public function lihatStatus()
    {
    $order = Order::where('user_id', Auth::id())
        ->whereHas('produk', function ($query) {
            $query->where('kategori', 'akun'); 
        })
        ->with('transaksi', 'produk') 
        ->get();

    return view('costumer.statusPembelian', compact('order'));
    }

    public function statusJoki()
    {
    $order = Order::where('user_id', Auth::id())
        ->whereHas('produk', function ($query) {
            $query->where('kategori', 'joki'); 
        })
        ->with('transaksi', 'produk')
        ->get();

    return view('costumer.statusJoki', compact('order'));
    }

    public function buatWishlist($id)
    {
        Produk::findOrFail($id);

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

    public function selesaikanTransaksi($id)
    {
    $order = Order::where('id', $id)
         ->where('user_id', Auth::id())
         ->firstOrFail();

    $order->konfirmasi_customer = 'sudah';
    $order->save();

    return redirect()->route('lihatStatus')->with('success', 'Transaksi berhasil diselesaikan');
   }
}
