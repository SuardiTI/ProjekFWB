<div align="center">
<h1>AkunMarket</h1>
<h3>Website Jual Beli Akun Game Dan Joki</h3>

![Logo Unsulbar](public/image.png)

<h3>Suardi</h3>
<h3>D0223006</h3><br>

<h3>FRAMEWORK WEB BASED</h3>
<h3>2025</h3>
<br><br>
</div>
<h2 align = "center">ROLE DAN FITUR-FITURNYA</h2>
<ul>
  <li>Admin
    <ol>
        <li>Melihat user lain yang memiliki akun di database</li>
        <li>Menghapus akun penjual atau pembeli</li>
         <li>Menghapus produk yang di post oleh penjual</li>
        <li>Memverifikasi pembayaran</li>
    </ol>
  </li>
  <li>Penjual</li>
    <ol>
        <li>Melihat, Menambah, Mengedit, Menghapus produk</li>
        <li>Melihat daftar produk yang dijual</li>
        <li>Mendapatkan informasi akun costumer yang akan di joki</li>
    </ol>
  <li>Pembeli</li>
    <ol>
        <li>Melihat produk yang dijual oleh seller</li>
        <li>Melakukan pembelian produk</li>
        <li>Mengisi detail akun yang akan di joki oleh penjual</li>
    </ol>
</ul><br><br>

<h2 align= "center">TABEL-TABEL DATABASE BESERTA FIELD DAN TIPE DATANYA </h2>
<ol>
    <li>pengguna</li>
<table>
  <thead>
    <tr>
      <th>Nama field</th>
      <th>Tipe data</th>
      <th>keterangan</th>
    </tr>
  </thead>
  <tbody>
   <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
    <tr>
      <td>name</td>
      <td>string</td>
      <td>nama pengguna</td>
    </tr>
    <tr>
      <td>email</td>
      <td>string</td>
      <td>email pengguna</td>
    </tr>
    <tr>
      <td>password</td>
      <td>string</td>
      <td>password pengguna</td>
    </tr>
     <tr>
      <td>role</td>
      <td>enum('admin', 'penjual', 'pembeli')</td>
      <td>role pengguna (admin, penjual, pembeli)</td>
    </tr>
  </tbody>
</table><br>


<li>produk</li>
 <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>pengguna_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel pengguna</td>
      </tr>
      <tr>
        <td>kategori</td>
        <td>enum('akun', 'joki')</td>
        <td></td>
      </tr>
      <tr>
        <td>nama_game</td>
        <td>string</td>
        <td></td>
      </tr>
      <tr>
        <td>deskripsi</td>
        <td>text</td>
        <td></td>
      </tr>
      <tr>
        <td>harga</td>
        <td>decimal(10, 2)</td>
        <td></td>
      </tr>
      <tr>
        <td>status</td>
        <td>enum('tersedia', 'terjual')</td>
        <td></td>
      </tr>
    </tbody>
  </table><br>

  <li>produk_gambar</li>
  <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>produk_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel produk</td>
      </tr>
      <tr>
        <td>path_gambar</td>
        <td>string</td>
        <td></td>
      </tr>
    </tbody>
  </table><br>

  <li>orders</li>
   <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>pengguna_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel pengguna</td>
      </tr>
      <tr>
        <td>produk_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel produk</td>
      </tr>
      <tr>
        <td>total_harga</td>
        <td>decimal(10, 2)</td>
        <td></td>
      </tr>
      <tr>
        <td>status</td>
        <td>enum('pending', 'gagal', 'selesai')</td>
        <td></td>
      </tr>
    </tbody>
  </table><br>

   <li>transaksi</li>
  <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>order_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel orders</td>
      </tr>
      <tr>
        <td>metode_pembayaran</td>
        <td>string</td>
        <td></td>
      </tr>
      <tr>
        <td>status_pembayaran</td>
        <td>enum('pending', 'berhasil', 'gagal')</td>
        <td></td>
      </tr>
      <tr>
        <td>jumlah_dibayar</td>
        <td>decimal(10, 2)</td>
        <td></td>
      </tr>
      <tr>
        <td>bukti_pembayaran</td>
        <td>string</td>
        <td></td>
      </tr>
      <tr>
        <td>tanggal_pembayaran</td>
        <td>date</td>
        <td></td>
      </tr>
    </tbody>
  </table><br>


   <li>akun_digital</li>
  <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>produk_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel produk</td>
      </tr>
      <tr>
        <td>username</td>
        <td>text</td>
        <td></td>
      </tr>
      <tr>
        <td>password</td>
        <td>text</td>
        <td></td>
      </tr>
    </tbody>
  </table><br>


  <li>detail_joki</li>
  <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>order_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel orders</td>
      </tr>
      <tr>
        <td>username_game</td>
        <td>string</td>
        <td></td>
      </tr>
      <tr>
        <td>password_game</td>
        <td>string</td>
        <td></td>
      </tr>
      <tr>
        <td>instruksi</td>
        <td>text</td>
        <td></td>
      </tr>
      <tr>
        <td>status_pekerjaan</td>
        <td>enum('belum_mulai', 'proses', 'selesai')</td>
        <td></td>
      </tr>
    </tbody>
  </table><br>

   <li>reviews</li>
  <table>
    <thead>
      <tr>
        <th>Nama field</th>
        <th>Tipe data</th>
        <th>keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>id</td>
        <td>bigint unsigned</td>
        <td>Primary Key</td>
      </tr>
      <tr>
        <td>pengguna_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel pengguna</td>
      </tr>
      <tr>
        <td>produk_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel produk</td>
      </tr>
      <tr>
        <td>rating</td>
        <td>decimal</td>
        <td></td>
      </tr>
      <tr>
        <td>ulasan</td>
        <td>text</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</ol><br><br>

<h2 align="center">JENIS RELASI DAN TABEL YANG BERELASI</h2>
<li>One To Many</li>
<li>One To One</li>
<br>

<ol>
  <li>Pengguna memiliki banyak Produk
    <ul>
      <li>Pengguna hasMany Produk</li>
      <li>Produk belongsTo Pengguna</li>
    </ul>
  </li>
  <li>Pengguna memiliki banyak Order
    <ul>
      <li>Pengguna hasMany Order</li>
      <li>Order belongsTo Pengguna</li>
    </ul>
  </li>
  <li>Pengguna memiliki banyak Review
    <ul>
      <li>Pengguna hasMany Review</li>
      <li>Review belongsTo Pengguna</li>
    </ul>
  </li>
  <li>Produk memiliki banyak ProdukGambar
    <ul>
      <li>Produk hasMany ProdukGambar</li>
      <li>ProdukGambar belongsTo Produk</li>
    </ul>
  </li>
  <li>Produk memiliki banyak Review
    <ul>
      <li>Produk hasMany Review</li>
      <li>Review belongsTo Produk</li>
    </ul>
  </li>
  <li>Produk dimiliki oleh banyak Order
    <ul>
      <li>Produk hasMany Order</li>
      <li>Order belongsTo Produk</li>
    </ul>
  </li>
  <li>Produk memiliki satu AkunDigital
    <ul>
      <li>Produk hasOne AkunDigital</li>
      <li>AkunDigital belongsTo Produk</li>
    </ul>
  </li>
  <li>Order memiliki satu Transaksi
    <ul>
      <li>Order hasOne Transaksi</li>
      <li>Transaksi belongsTo Order</li>
    </ul>
  </li>
  <li>Order memiliki satu DetailJoki
    <ul>
      <li>Order hasOne DetailJoki</li>
      <li>DetailJoki belongsTo Order</li>
    </ul>
  </li>
</ol>

