<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_joki extends Model
{
    /** @use HasFactory<\Database\Factories\DetailJokiFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'username_game',
        'password_game',    
        'instruksi',
        'status_pekerjaan'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
