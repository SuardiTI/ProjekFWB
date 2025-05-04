<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = ['pengguna_id', 'kategori', 'nama_game', 'deskripsi', 'harga','status'];

    public function pengguna() {
        return $this->belongsTo(Pengguna::class, 'pengguna_id','id');
    }

    public function gambar() {
        return $this->hasMany(ProdukGambar::class, 'produk_id','id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'produk_id','id');
    }

    public function akunDigital() {
        return $this->hasOne(AkunDigital::class, 'produk_id','id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'produk_id','id');
    }
}
