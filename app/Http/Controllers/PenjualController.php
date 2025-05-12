<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Produk_gambar;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualController extends Controller
{
  public function lihat()
  {
    $produk = Produk::with('user')->where('user_id', Auth::user()->id)->get();
    return view('seller.lihatProduk', compact('produk'));
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

  public function listjoki()
  {
    return view('seller.listJoki');
  }

  
    
}
