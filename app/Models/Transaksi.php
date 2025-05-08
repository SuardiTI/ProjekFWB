<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'metode_pembayaran',
        'status_pembayaran',
        'jumlah_dibayar',
        'bukti_pembayaran',
        'tanggal_pembayaran',
        'status_distribusi',
        'tanggal_distribusi'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_transaksis')->withTimestamps();
    }
}
