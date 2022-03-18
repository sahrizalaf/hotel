# Aplikasi Pemesanan Hotel - Ujikom SMK RPL 2021/2022 Paket 2

Demo: **COMING SOON**

## Gambaran Umum Sistem
Aplikasi Pemesanan Hotel ini hanya digunakan untuk melakukan reservasi kamar saja, tidak mencakup fitur pembayaran.

## Dibuat menggunakan
* PHP Native 7.4
* Framework Frontend Bootstrap 4.1.3
* Database MySQL

## Fitur Umum:
* Sistem Autentikasi & Otorisasi Pengguna, meliputi:
  * Register & Login, Pengamanan password menggunakan hashing dari bawaan php native
  * Sistem Autentikasi, pembatasan hak akses menggunakan session
* Basic CRUD menggunakan mysqli prosedural

Terdapat 3 user:
* Tamu (Tidak menggunakan akun), dapat melakukan:
  * Lihat Tipe Kamar & Fasilitas Hotel
  * Buat Reservasi & Print Out Bukti Reservasi
  * Cari Data Reservasi

* Administrator, dapat melakukan:
  * CRUD Kamar
  * CRUD Fasilitas Hotel

* Resepsionis, dapat melakukan:
  * Cek Data Reservasi (Melihat, Mengubah, Menghapus)
  * Cari Data Reservasi berdasarkan Tanggal Cek In atau Nama Tamu
