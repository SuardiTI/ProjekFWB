<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['order_id', 'metode_pembayaran', 'status_pembayaran', 'jumlah_dibayar', 'bukti_pembayaran', 'tanggal_pembayaran'];
    
    public function order() {
        return $this->belongsTo(Order::class, 'order_id','id');
    }
}
