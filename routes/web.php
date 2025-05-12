<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::any('{any}', function () {
//     dd(request()->path());
// })->where('any', '.*');

Route::get('/', function () {
    return view('welcome');
})
->middleware('guest');   
// //agar tidak kembali ke halaman landing page by url

// Route::get('/dark', function () {
//     return view('dashboard');
// }); 

Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])->name('dashboard');




// Route::get('/loginweb', function () {
//     return view('auth.loginweb');
// });
// Route::get('/testing', function () {
//     return "sdadasdada";
// })->name('testing');

// Route::get('/tambahtambah', function () {
//     return view('seller.tambahProduk2');
// })->name('tambahProduk2');

// // Route::get('/registerweb', function () {
// //     return view('auth.registerweb');
// // });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});


Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/lihatProduk', [AdminController::class, 'lihatProduk'])->name('lihatProduk');
    Route::get('/adminhapus/{id}', [AdminController::class, 'hapus'])->name('hapus');
    Route::get('/lihatPenjual', [AdminController::class, 'lihatPenjual'])->name('lihatPenjual');
    Route::get('/lihatpembeli', [AdminController::class, 'lihatPembeli'])->name('lihatPembeli');
    Route::get('/lihatprodukperseller/{id}', [AdminController::class, 'lihatProdukPerseller'])->name('lihatProdukPerseller');

    Route::get('/adminhapusseller/{id}', [AdminController::class, 'hapusAkunSeller'])->name('hapusAkunSeller');
    Route::get('/adminhapuscustomer/{id}', [AdminController::class, 'hapusAkunPembeli'])->name('hapusAkunPembeli');
    
});


Route::middleware('auth', 'role:penjual')->group(function () {
    Route::get('/lihat', [PenjualController::class, 'lihat'])->name('lihat');
    Route::get('/lihattmbh', [PenjualController::class, 'lihattmbh'])->name('lihattmbh');
    Route::post('/tambah', [PenjualController::class, 'tambah'])->name('tambah');
    Route::match(['get', 'post'], '/editproduk/{id}', [PenjualController::class, 'edit'])->name('editproduk');
    Route::get('/sellerhapus/{id}', [PenjualController::class, 'hapus'])->name('hapusproduk');

    Route::get('/listjoki', [PenjualController::class, 'listjoki'])->name('listjoki');
});

Route::middleware('auth', 'role:pembeli')->group(function () {
    Route::get('/dashboardcustomer', [PembeliController::class, 'lihatProduk'])->name('dashboardCustomer');
    Route::get('/beliProduk/{id}', [PembeliController::class, 'cekout'])->name('beliProduk');
    Route::post('/beli', [PembeliController::class, 'beli'])->name('beli');
    Route::get('/statusPesanan', [PembeliController::class, 'lihatStatus'])->name('lihatStatus');
});


require __DIR__.'/auth.php';    




