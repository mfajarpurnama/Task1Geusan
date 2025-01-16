Aplikasi Manajemen Produk

README ini ngejelasin tentang Aplikasi Manajemen Produk, mulai dari apa aja yang dibutuhin, cara install, sampai gimana cara makenya.

Gambaran Umum

Aplikasi Manajemen Produk ini adalah aplikasi berbasis web buat ngatur produk, deskripsi produk, varian, dan aksi lainnya kayak edit atau hapus produk. Desainnya modern dan gampang dipakai.

Fitur Utama

- Kelola produk sama deskripsinya.

- Tambah, edit, atau hapus varian produk.

- Tampilan simpel, responsif, dan gampang dipahami.

- Ada sidebar buat navigasi, plus tombol "Tambah Produk Baru" yang selalu kelihatan.

- Tabel interaktif buat liatin produk yang udah dimasukin.

Kebutuhan Sistem

Software yang Dibutuhin

Buat jalanin aplikasi ini, kamu  butuh:

1.Backend

- Laravel (minimal versi 8.x)

- PHP (minimal versi 8.0)

- Composer

2.Frontend

- Bootstrap 5.3.0 atau lebih baru

- Bootstrap Icons

- jQuery 3.6.4 atau lebih baru

- DataTables (plugin jQuery) versi 1.13.6

Database

- MySQL atau yang mirip-mirip (MariaDB, PostgreSQL, dll.)

Server

- Apache/Nginx

- Server lokal (kayak XAMPP, WAMP, Laragon)

3.Spesifikasi Komputer

- RAM minimal 4GB

- Prosesor dual-core atau lebih oke

- Ruang kosong di hard disk minimal 200MB buat aplikasi (database nggak masuk hitungan ya)

Cara Install

Ikutin langkah-langkah ini buat setup aplikasinya:

1.Backend
git clone <repository-url>
cd <repository-folder>

2.Install dependensi PHP:

composer install

3.Konfigurasi environment:

- Bikin file .env dari .env.example:

cp .env.example .env

- Masukin info database ke file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_kamu
DB_USERNAME=user_database_kamu
DB_PASSWORD=password_database_kamu

4.Migrasi database:

php artisan migrate --seed

5.Jalanin server lokal Laravel:

php artisan serve

Frontend

1.Pastikan semua pustaka (Bootstrap, jQuery, DataTables) udah dimuat lewat CDN.

- Ini udah disiapin di bagian <head> file HTML.

Database

- Bikin database MySQL baru, terus sesuaikan info login di file .env.

Cara Pakai

1.Buka aplikasi di browser di http://localhost:8000.

2.Navigasi lewat sidebar.

3.Tambah, edit, atau hapus produk dan variannya dengan gampang.

4.Kalau mau nambah produk baru, tinggal klik tombol "Tambah Produk Baru" di pojok kanan bawah.

Struktur Kode

- HTML/Blade Templates: Ada di folder resources/views.

- Routes: Diset di file routes/web.php.

- Controller: Ada di folder app/Http/Controllers.

- Model: Ada di folder app/Models.

- CSS/JS: Pustaka eksternal udah dimuat via CDN.

Tips Tambahan

- Jangan lupa set izin buat folder storage sama bootstrap/cache:

chmod -R 775 storage bootstrap/cache

Kalau nanti butuh ngejalanin pekerjaan background, bisa pake queue system.

Lisensi

Proyek ini pake lisensi MIT. Cek file LICENSE buat detail lebih lanjut.

Terima Kasih

- Bootstrap

- Laravel

- DataTables

- jQuery

