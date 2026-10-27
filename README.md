# 🚗 Sistem Manajemen Parkir Apotek

Sistem Manajemen Parkir Apotek adalah aplikasi berbasis web yang dibangun khusus untuk mengelola sistem parkir kendaraan (motor dan mobil) di area apotek. Aplikasi ini dikembangkan menggunakan **PHP Native** dengan arsitektur **MVC (Model-View-Controller)**, **OOP**, dan **PDO** untuk keamanan database. 

Proyek ini dirancang secara komprehensif untuk memenuhi standar indikator kelulusan **Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak (RPL)**.

## ✨ Fitur Utama

- **Role-Based Access Control (RBAC):** Memiliki 3 tingkatan hak akses (Admin, Petugas, Owner) dengan pembatasan URL (Security Protection).
- **Master Data:** Fitur CRUD (Create, Read, Update, Delete) lengkap untuk Manajemen Pengguna, Area Parkir, dan Tarif Parkir.
- **Transaksi Cerdas:** Pencatatan kendaraan masuk (Plat, Jenis, Warna, Pemilik) dan kendaraan keluar dengan perhitungan durasi jam serta total biaya secara otomatis.
- **Manajemen Area:** Penambahan dan pengurangan otomatis kapasitas atau slot area parkir saat kendaraan masuk dan keluar.
- **Cetak Struk Thermal:** Fitur cetak struk tiket parkir yang sudah disesuaikan tata letaknya untuk printer thermal kasir.
- **Laporan Pendapatan:** Rekapitulasi laporan parkir dan pendapatan finansial yang bisa difilter berdasarkan tanggal (khusus Owner).
- **Log Aktivitas:** Perekaman jejak riwayat aktivitas seluruh pengguna secara real-time (Login, Logout, Tambah Data, Ubah, Hapus).

## 💻 Teknologi yang Digunakan

- **Bahasa Pemrograman:** PHP (Versi 7.4 / 8.x)
- **Arsitektur:** MVC (Model-View-Controller) & OOP
- **Database:** MySQL (dengan ekstensi PDO untuk perlindungan SQL Injection)
- **Frontend / UI:** HTML5, Tailwind CSS (via CDN)
- **Web Server Lokal:** Apache (XAMPP / Laragon)

## 🔐 Informasi Akun Demo (Role Login)

Setelah database berhasil diimpor, Anda dapat masuk ke dalam sistem menggunakan salah satu akun berikut:

| Role Akses | Username | Password | Deskripsi Hak Akses |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin` | `12345` | Akses penuh ke Master Data (Area, Tarif, User) & Log Aktivitas. |
| **Petugas** | `petugas` | `12345` | Akses ke Gerbang Parkir (Input Kendaraan, Selesaikan Parkir, Cetak Struk). |
| **Owner** | `owner` | `12345` | Akses khusus untuk melihat Rekap Laporan Pendapatan Keuangan. |

> *Catatan: Password dienkripsi menggunakan fungsi `password_hash()` standar PHP pada database.*

## 🚀 Panduan Instalasi (Localhost)

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer lokal Anda:

### 1. Persiapan Lingkungan
Pastikan Anda sudah menginstal web server lokal seperti **XAMPP**, **Laragon**, atau **WAMP**. Aktifkan layanan **Apache** dan **MySQL**.

### 2. Unduh Repositori
Clone repositori ini atau unduh dalam format ZIP.
```bash
git clone [https://github.com/username_anda/parkir_apotek.git](https://github.com/username_anda/parkir_apotek.git)