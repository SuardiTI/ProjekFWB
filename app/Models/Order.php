<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['pengguna_id', 'produk_id', 'total_harga', 'status'];

    public function pembeli() {
        return $this->belongsTo(Pengguna::class, 'pengguna_id','id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id','id');
    }

    public function transaksi() {
        return $this->hasOne(Transaksi::class, 'order_id','id');
    }

    public function jokiDetail() {
        return $this->hasOne(DetailJoki::class, 'order_id','id');
    }
}
