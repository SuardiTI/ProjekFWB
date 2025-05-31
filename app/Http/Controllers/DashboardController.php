<?php

namespace App\Http\Controllers;

use App\Models\Detail_joki;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function pengguna()
     {
          //admin
          $penggunaAktif = DB::table('sessions')
               ->where('last_activity', '>=', Carbon::now()->subMinutes(10)->timestamp)
               ->whereNotNull('user_id')
               ->join('users', 'sessions.user_id', '=', 'users.id')
               ->where('users.role', '!=', 'admin')
               ->count();

            $jumlahPenjual = User::where('role', 'penjual')->count();
            $jumlahPembeli = User::where('role', 'pembeli')->count();
            $totalUang = Produk::where('status','tersedia')->sum('harga');
            $produkTersedia = Produk::where('status', 'tersedia')->count();
            $produkTerjual = Produk::where('status', 'terjual')->count();
            $banyakAkun = Produk::where('kategori', 'akun')->count();
            $banyakJoki = Produk::where('kategori', 'joki')->count();
            $menungguKonfirmasi = Order::where('konfirmasi_admin', 'belum')->count();

            //total produk untuk penjual
            $userId = Auth::id();
            $totalProdukSaya = Produk::where('user_id', $userId)->count();
            $totalAkun = Produk::where('user_id', $userId)->where('kategori', 'akun')->count();
            $totalJoki = Produk::where('user_id', $userId)->where('kategori', 'joki')->count();
            $produkSold = Produk::where('user_id', $userId)->where('status', 'terjual')->count();
            $totalHargaProduk = Produk::where('user_id', $userId)->sum('harga');
            $statusJoki = Detail_joki::where('status_pekerjaan', 'belum_mulai')
                                        ->whereHas('order', function ($query) use ($userId) {
                                            $query->where('user_id', $userId);
                                        })->count();
            $produkBelumDikirim = Order::where('status_pengiriman', 'belum_dikirim')
                                        ->whereHas('produk', function ($query) use ($userId) {
                                            $query->where('user_id', $userId);
                                        })
                                        ->count();
            $pendapatan = Produk::where('user_id', $userId)->where('status', 'terjual')->sum('harga');

          return view('dashboard', compact(
            'penggunaAktif',
            'produkTersedia',
            'produkTerjual',
            'totalUang',
            'banyakAkun',
            'banyakJoki',
            'menungguKonfirmasi',
            'jumlahPenjual',
            'jumlahPembeli',

            //penjual
            'totalProdukSaya',
            'totalAkun',
            'totalJoki',
            'totalHargaProduk',
            'produkSold',
            'statusJoki',
            'produkBelumDikirim',
            'pendapatan'

        ));
          
     }
}
