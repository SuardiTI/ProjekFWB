<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
        'kontak_pembeli',
        'total_harga',
        'status',
        'konfirmasi_admin',
        'status_pengiriman',
        'konfirmasi_customer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Pembeli
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }

    public function detailJoki()
    {
        return $this->hasOne(Detail_joki::class);
    }
}
