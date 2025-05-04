<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukGambar extends Model
{
    protected $table = 'produk_gambar';

    protected $fillable = ['produk_id', 'path_gambar'];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id','id');
    }
}
