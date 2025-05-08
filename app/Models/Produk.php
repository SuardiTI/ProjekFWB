<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori',
        'nama_game',
        'deskripsi',
        'harga',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Penjual
    }

    public function gambar()
    {
        return $this->hasMany(Produk_gambar::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
