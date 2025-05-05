<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailJoki extends Model
{
    protected $table = 'detail_joki';

    protected $fillable = ['order_id','username_game','password_game','instruksi','status_pekerjaan'];
    
    public function order() {
        return $this->belongsTo(Order::class, 'order_id' ,'id');
    }
}
