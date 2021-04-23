# Sistem Informasi Ekstrakurikuler

SI Ekskul adalah kombinasi dari sistem dan proses yang memanajemen ekstrakurikuler dan teknologi informasi melalui perangkat lunak SI Ekskul.

Adapun fitur dalam SI Ekskul ini adalah:

1. Memanajemen Pengguna
2. Memanajemen Kehadiran
3. Memanajemen Soal, Jawaban, dan Nilai Siswa

Serta:

4. Mengubah konten indeks
5. Menambahkan blog

## Requirements

1. PHP version 7.2+
2. PHP MySQL
3. Composer

## How can I Support dev?

- Memberi bintang repo kami ⭐

## Installation

Saya menyarankan anda menggunakan git.

Clone/Download repo ini.

Gunakan Terminal/Command Line lalu masuk ke folder repo.

```powershell
composer install
```

Copy .env.example menjadi .env, sesuaikan isi dari .env tersebut. Jalankan MySQL,

```powershell
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Sekarang kita bisa login yang terdiri dari beberapa role user yaitu:

| Role         | Admin              |
| ------------ | ------------------ |
| **Email**    | admin@gmail.com    |
| **Password** | secret123          |
|              |                    |
| **Role**     | **Petugas**        |
| **Email**    | petugas1@gmail.com |
| **Password** | secret123          |
|              |                    |
| **Role**     | **Siswa**          |
| **Email**    | siswa1@gmail.com   |
| **Password** | secret123          |

Anda bisa mengunjungi link demo [disini](http://si-ekskul.herokuapp.com/home) login menggunakan email password di atas.

**Mohon untuk tidak mengubah password dan meghapus data pengguna di atas.**

