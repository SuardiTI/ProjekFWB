<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AkunDigital extends Model
{
    protected $table = 'akun_digital';

    protected $fillable = ['produk_id','username', 'password',];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
