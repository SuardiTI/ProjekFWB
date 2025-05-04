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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'penjual', 'pembeli']);
            $table->timestamps();
        });
        

        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade');
            $table->enum('kategori', ['akun', 'joki']);
            $table->string('nama_game');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->enum('status', ['tersedia', 'terjual'])->default('tersedia');
            $table->timestamps();
        }); 
        
        Schema::create('produk_gambar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->string('path_gambar');
            $table->timestamps();
        });
        

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade'); // pembeli
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['pending', 'gagal', 'selesai',])->default('pending');
            $table->timestamps();
        });
        
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('metode_pembayaran');
            $table->enum('status_pembayaran', ['pending', 'berhasil', 'gagal'])->default('pending');
            $table->decimal('jumlah_dibayar', 10, 2);
            $table->string('bukti_pembayaran')->nullable();
            $table->dateTime('tanggal_pembayaran');
            $table->timestamps();
        });

        Schema::create('akun_digital', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->text('username');
            $table->text('password'); 
            $table->timestamps();
        });

        Schema::create('detail_joki', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('username_game');
            $table->string('password_game'); 
            $table->text('instruksi');
            $table->enum('status_pekerjaan', ['belum_mulai', 'proses', 'selesai'])->default('belum_mulai');
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->decimal('rating');
            $table->text('ulasan');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('detail_joki');
        Schema::dropIfExists('akun_digital');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('produk_gambar');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('pengguna');
    }
};