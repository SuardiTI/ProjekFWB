<?php

namespace App\Http\Controllers;

use App\Models\Detail_joki;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Produk_gambar;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualController extends Controller
{
  // public function lihat()
  // {
  //   $produk = Produk::with('user')->where('user_id', Auth::user()->id)->get();
  //   return view('seller.lihatProduk', compact('produk'));
  // }
  public function lihat()
  {
    $produk = Produk::where('status', 'tersedia')
      ->where('user_id', Auth::user()->id)
      ->orderBy('updated_at', 'desc')
      ->get();
    return view('seller.lihatProduk', compact('produk'));
  }

  public function lihatProdukTerjual()
  {
    $produkTerjual = Produk::where('status', 'terjual')
      ->where('user_id', Auth::user()->id)
      ->orderBy('updated_at', 'desc')
      ->get();
    return view('seller.produkTerjual', compact('produkTerjual'));
  }

  public function lihattmbh()
  {   
      return view('seller.tambahProduk'); 
  }
  
  public function tambah(Request $request)
  {
      // dd($request);

      $request->validate([
        'kategori' => 'required|string',
        'nama_game' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric|min:0',
        'path_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
    ]);
      $data = new Produk();
      $data->user_id = Auth::user()->id;
      $data->kategori = $request->kategori;
      $data->nama_game = $request->nama_game;
      $data->path_gambar = $request->path_gambar;
      $data->deskripsi = $request->deskripsi;
      $data->harga = $request->harga;
      $data->status = $request->status;

      if ($request->hasFile('path_gambar')) {
          $data->path_gambar = $request->file('path_gambar')->store('gambar_game', 'public');
      }
      $data->save();
      return redirect()->route('lihat')->with('success', 'Produk berhasil ditambahkan');
  }

  public function edit(Request $request)
  {
      $edit = Produk::findOrFail($request->id);
      if($request->isMethod('post')){
         $request->validate([
          'kategori' => 'required|string',
          'nama_game' => 'required|string|max:255',
          'deskripsi' => 'required|string',
          'harga' => 'required|numeric|min:0',
          'path_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048',
        ]);
        
        $edit->kategori = $request->kategori;
        $edit->nama_game = $request->nama_game;
        $edit->path_gambar = $request->path_gambar;
        $edit->deskripsi = $request->deskripsi;
        $edit->harga = $request->harga;
        $edit->status = $request->status;

        if ($request->hasFile('path_gambar')) {
            $edit->path_gambar = $request->file('path_gambar')->store('gambar_game', 'public');
        }
        $edit->save();
        return redirect()->route('lihat')->with('success', 'Produk berhasil diubah');
      }
      return view('seller.editProduk', compact('edit'));
  }

  public function hapus(Request $request)
  {
    // dd($request->id);
    $produk = Produk::findOrFail($request->id);
    $produk->delete();
    return redirect()->route('lihat')->with('success', 'Produk berhasil Dihapus');
  }

  public function listCekout()
  {
    $order = Order::with(['transaksi','user','produk'])
          ->whereHas('produk', function($query) {
              $query->where('kategori', 'akun');
          })
          ->orderBy('created_at', 'asc')
          ->get();

    return view('seller.listCekout', compact('order'));
  }

  public function kirimAkun($id)
  {
    $akun = Order::findOrFail($id);
    $akun->status_pengiriman = 'sudah_dikirim';
    $akun->save();
    return redirect()->route('listcekout')->with('success', 'Pekerjaan telah dimulai');
  }

  public function listJoki()
  {
    $order = Order::with(['transaksi','user','produk', 'detailJoki'])
          ->whereHas('produk', function($query) {
              $query->where('kategori', 'joki');
          })
          ->orderBy('created_at', 'asc')
          ->get();

    return view('seller.listJoki', compact('order'));
  }

  public function mulaipengerjaan($id)
  {
    $joki = Detail_joki::findOrFail($id);

    $joki->status_pekerjaan = 'proses';
    $joki->save();
    return redirect()->route('listJoki')->with('success', 'Pekerjaan telah dimulai');
  }

  public function selesaiPengerjaan($id)
  {
    $joki = Detail_joki::findOrFail($id);
    $joki->status_pekerjaan = 'selesai';
    $joki->save();
    return redirect()->route('listJoki')->with('success', 'Pekerjaan telah dimulai');
  }
}