<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';

    protected $fillable = ['pengguna_id','produk_id','produk_id','rating','ulasan'];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id','id');
    }

    public function pengguna() {
        return $this->belongsTo(Pengguna::class, 'pengguna_id','id');
    }
}
