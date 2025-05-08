<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Pembeli
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->string('kontak_pembeli'); // WA atau email
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['pending', 'gagal', 'selesai'])->default('pending');
            $table->enum('konfirmasi_admin', ['belum', 'diterima', 'ditolak'])->default('belum');
            $table->enum('status_pengiriman', ['belum_dikirim', 'sudah_dikirim'])->default('belum_dikirim');
            $table->enum('konfirmasi_customer', ['belum', 'sudah'])->default('belum');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
