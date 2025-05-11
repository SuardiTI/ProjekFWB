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
    <li>users</li>
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
        <td>user_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel users</td>
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
        <td>user_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel users</td>
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
        <td>user_id</td>
        <td>bigint unsigned</td>
        <td>Foreign Key ke tabel users</td>
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
<li>Many To Many</li>
<li>One To Many</li>
<li>One To One</li>
<br>

<h1 align='center'>UPDATE TABEL</h1>
<h2 align="center">TABEL-TABEL DATABASE BESERTA FIELD DAN TIPE DATANYA</h2>
<ol>
    <li>users</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
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
                <td>Nama pengguna</td>
            </tr>
            <tr>
                <td>email</td>
                <td>string</td>
                <td>Email pengguna (unique)</td>
            </tr>
            <tr>
                <td>password</td>
                <td>string</td>
                <td>Password pengguna</td>
            </tr>
            <tr>
                <td>role</td>
                <td>enum('admin', 'penjual', 'pembeli')</td>
                <td>Role pengguna</td>
            </tr>
            <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
    <li>produks</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>bigint unsigned</td>
                <td>Primary Key</td>
            </tr>
            <tr>
                <td>user_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel users (Penjual)</td>
            </tr>
            <tr>
                <td>kategori</td>
                <td>enum('akun', 'joki')</td>
                <td>Kategori produk</td>
            </tr>
            <tr>
                <td>nama_game</td>
                <td>string</td>
                <td>Nama game terkait produk</td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td>text</td>
                <td>Deskripsi produk</td>
            </tr>
            <tr>
                <td>harga</td>
                <td>decimal(10, 2)</td>
                <td>Harga produk</td>
            </tr>
            <tr>
                <td>status</td>
                <td>enum('tersedia', 'terjual')</td>
                <td>Status ketersediaan produk (default: tersedia)</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
    <li>produk_gambars</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
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
                <td>Foreign Key ke tabel produks</td>
            </tr>
            <tr>
                <td>path_gambar</td>
                <td>string</td>
                <td>Path/lokasi file gambar produk</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
    <li>orders</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>bigint unsigned</td>
                <td>Primary Key</td>
            </tr>
            <tr>
                <td>user_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel users (Pembeli)</td>
            </tr>
            <tr>
                <td>produk_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel produks</td>
            </tr>
             <tr>
                <td>kontak_pembeli</td>
                <td>string</td>
                <td>Kontak pembeli (WA atau email)</td>
            </tr>
            <tr>
                <td>total_harga</td>
                <td>decimal(10, 2)</td>
                <td>Total harga order</td>
            </tr>
            <tr>
                <td>status</td>
                <td>enum('pending', 'gagal', 'selesai')</td>
                <td>Status order (default: pending)</td>
            </tr>
             <tr>
                <td>konfirmasi_admin</td>
                <td>enum('belum', 'diterima', 'ditolak')</td>
                <td>Status konfirmasi oleh admins (default: belum)</td>
            </tr>
             <tr>
                <td>status_pengiriman</td>
                <td>enum('belum_dikirim', 'sudah_dikirim')</td>
                <td>Status pengiriman/distribusi (default: belum_dikirim)</td>
            </tr>
             <tr>
                <td>konfirmasi_customer</td>
                <td>enum('belum', 'sudah')</td>
                <td>Status konfirmasi penerimaan oleh customers (default: belum)</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
    <li>transaksis</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
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
                <td>Metode pembayaran yang digunakan</td>
            </tr>
            <tr>
                <td>status_pembayaran</td>
                <td>enum('pending', 'berhasil', 'gagal')</td>
                <td>Status pembayaran (default: pending)</td>
            </tr>
            <tr>
                <td>jumlah_dibayar</td>
                <td>decimal(10, 2)</td>
                <td>Jumlah uang yang dibayar</td>
            </tr>
            <tr>
                <td>bukti_pembayaran</td>
                <td>string</td>
                <td>Path/lokasi bukti pembayaran (nullable)</td>
            </tr>
            <tr>
                <td>tanggal_pembayaran</td>
                <td>date</td>
                <td>Tanggal pembayaran dilakukan</td>
            </tr>
             <tr>
                <td>status_distribusi</td>
                <td>enum('belum_dikirim', 'sudah_dikirim')</td>
                <td>Status distribusi produk/layanan (default: belum_dikirim)</td>
            </tr>
             <tr>
                <td>tanggal_distribusi</td>
                <td>timestamp</td>
                <td>Tanggal distribusi dilakukan (nullable)</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
    <li>detail_jokis</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
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
                <td>Username game untuk joki</td>
            </tr>
            <tr>
                <td>password_game</td>
                <td>string</td>
                <td>Password game untuk joki</td>
            </tr>
            <tr>
                <td>instruksi</td>
                <td>text</td>
                <td>Instruksi khusus untuk joki</td>
            </tr>
            <tr>
                <td>status_pekerjaan</td>
                <td>enum('belum_mulai', 'proses', 'selesai')</td>
                <td>Status pengerjaan joki (default: belum_mulai)</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
    <li>reviews</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>bigint unsigned</td>
                <td>Primary Key</td>
            </tr>
            <tr>
                <td>user_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel users (Reviewer)</td>
            </tr>
            <tr>
                <td>produk_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel produks</td>
            </tr>
            <tr>
                <td>rating</td>
                <td>decimal(2, 1)</td>
                <td>Rating produk (skala 0.0 - 9.9)</td>
            </tr>
            <tr>
                <td>ulasan</td>
                <td>text</td>
                <td>Isi ulasan/komentar produk</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
     <li>user_transaksis</li>
    <table>
        <thead>
            <tr>
                <th>Nama field</th>
                <th>Tipe data</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>bigint unsigned</td>
                <td>Primary Key</td>
            </tr>
            <tr>
                <td>user_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel users</td>
            </tr>
            <tr>
                <td>transaksi_id</td>
                <td>bigint unsigned</td>
                <td>Foreign Key ke tabel transaksis</td>
            </tr>
             <tr>
                <td>created_at</td>
                <td>timestamp</td>
                <td>Waktu pembuatan record</td>
            </tr>
             <tr>
                <td>updated_at</td>
                <td>timestamp</td>
                <td>Waktu terakhir diupdate record</td>
            </tr>
        </tbody>
    </table><br>
</ol>

<h2 align="center">TABEL YANG BERELASI</h2>
<li>User one to many Produk</li>
<li>User one to many Order</li>
<li>User one to many Review</li>
<li>User many to many Transaksi (via pivot user_transaksis)</li>
<li>Produk one to many Order</li>
<li>Produk one to many Review</li>
<li>Order one to one Transaksi</li>
<li>Order one to one Detail Joki</li>
<li>Transaksi many to many User (via pivot user_transaksis)</li>