# Aplikasi Pemesanan Hotel - Ujikom SMK RPL Paket 2

Demo: **COMING SOON**

## Gambaran Umum Sistem
Aplikasi Pemesanan Hotel ini hanya digunakan untuk melakukan reservasi kamar saja, tidak mencakup fitur pembayaran.

## Dibuat menggunakan
* PHP Native 7.4
* Framework Frontend Bootstrap 4.1.3
* Database MySQL

## Fitur Umum:
* Sistem Autentikasi & Otorisasi, meliputi:
  * Register & Login, Pengamanan password menggunakan hashing dari function bawaan php native
  * Sistem Autentikasi, pembatasan hak akses menggunakan session

Terdapat 3 user:
* Tamu (Tidak menggunakan akun)
  * Lihat Tipe Kamar & Fasilitas Hotel
  * Buat Reservasi & Print Out Bukti Reservasi
  * Cari Data Reservasi

* Administrator
  * CRUD Kamar
  * CRUD Fasilitas Hotel

* Resepsionis
  * Cek Data Reservasi
  * Cari Data Reservasi berdasarkan Tanggal Cek In atau Nama Tamu
