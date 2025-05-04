<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function produk() {
        return $this->hasMany(Produk::class, 'pengguna_id','id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'pengguna_id','id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'pengguna_id','id');
    }
}
