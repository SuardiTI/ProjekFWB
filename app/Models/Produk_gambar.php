<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_gambar extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukGambarFactory> */
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'path_gambar'
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
