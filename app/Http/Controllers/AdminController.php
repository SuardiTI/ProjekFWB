<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function lihatProduk()
     {
          $produk = Produk::with('user')->get();
          return view('admin.lihat_produk', compact('produk'));
     }

     public function hapus(Request $request)
     {
          $produk = Produk::findOrFail($request->id);
          $produk->delete();
          return redirect()->route('lihatProduk')->with('success', 'Produk berhasil dihapus');
     }

     public function lihatPenjual()
     {
          $pengguna = User::where('role', 'penjual')->get();
          return view ('admin.daftarPenjual', compact('pengguna'));
     }

     public function lihatPembeli()
     {
          $pembeli = User::where('role', 'pembeli')->get();
          return view('admin.daftarPembeli', compact('pembeli'));
     }

     public function lihatProdukPerseller($id)
     {
          $prdk = Produk::with('user')->where('user_id',$id)->get();
          return view('admin.lihatProdukSeller', compact('prdk'));
     }

     public function hapusAkunSeller(Request $request)
     {
          $pengguna = User::findOrFail($request->id); 
          $pengguna->delete();
          return redirect()->route('lihatPenjual')->with('success', 'Akun berhasil dihapus');
     }

     public function hapusAkunPembeli(Request $request)
     {
          $costumer = User::findOrFail($request->id); 
          $costumer->delete();
          return redirect()->route('lihatPembeli')->with('success', 'Akun berhasil dihapus');
     }


}
