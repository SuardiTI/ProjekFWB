<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'ulasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Reviewer
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
