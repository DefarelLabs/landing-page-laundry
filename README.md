# Permana Laundry — Landing Page

Landing page untuk bisnis **Permana Laundry**, dibangun dengan Laravel (Blade), Tailwind CSS, dan Alpine.js. Fitur utama: kalkulator estimasi harga cucian secara real-time.

## Tech Stack

- **Backend & Templating:** Laravel 12 (Blade Templates)
- **Styling:** Tailwind CSS (via Vite)
- **Interaktivitas:** Alpine.js (kalkulator harga reaktif)
- **Database:** MySQL (via XAMPP)

## Persyaratan

Pastikan sudah terpasang di komputermu:

- [XAMPP](https://www.apachefriends.org/) (PHP ^8.2 + MySQL)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (v18 ke atas) + npm
- Git

Cek semuanya sudah terpasang:

```bash
php -v
composer -v
node -v
npm -v
```

> **Catatan:** ekstensi `zip` di `php.ini` (`C:\xampp\php\php.ini`) harus aktif (`extension=zip` tanpa tanda `;` di depan) agar Composer bisa install dependency.

## Instalasi dari Awal

### 1. Clone repository

```bash
cd C:\xampp\htdocs
git clone <URL_REPO_INI> landing-page-laundry
cd landing-page-laundry
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Install dependency JavaScript & Tailwind

```bash
npm install
```

### 4. Setup file environment

Copy `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Setup database

1. Buka **XAMPP Control Panel**, start **Apache** dan **MySQL**.
2. Buka `http://localhost/phpmyadmin`, buat database baru bernama `permana_laundry_landing`.
3. Buka file `.env`, sesuaikan bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=permana_laundry_landing
DB_USERNAME=root
DB_PASSWORD=
```

4. Jalankan migrasi:

```bash
php artisan migrate
```

### 6. Jalankan project (butuh 2 terminal)

**Terminal 1** — compile Tailwind CSS (biarkan tetap berjalan):

```bash
npm run dev
```

**Terminal 2** — jalankan server Laravel:

```bash
php artisan serve
```

Buka browser ke **http://127.0.0.1:8000**

## Struktur Project (bagian yang relevan dengan landing page)

```
routes/web.php                              → Route utama landing page
app/Http/Controllers/LandingController.php  → Data layanan & harga
resources/views/layouts/app.blade.php       → Layout HTML dasar
resources/views/landing/index.blade.php     → Isi landing page + kalkulator Alpine.js
```

## Mengubah Harga Layanan

Harga dan daftar layanan (Cuci Reguler, Cuci Kilat, dll) belum diambil dari database — masih berupa array statis di:

```
app/Http/Controllers/LandingController.php
```

Edit array `$services` di method `index()` untuk menambah/mengubah layanan. Tampilan Services Section dan kalkulator harga akan otomatis ikut berubah.

## Mengubah Kontak & Alamat

Masih di file yang sama (`LandingController.php`), edit array `$contact`:

- `whatsapp_number` — format internasional tanpa tanda `+` (contoh: `6281234567890`)
- `email`
- `address`
- `operational` (jam operasional)

## Build untuk Production

Sebelum deploy ke server production:

```bash
npm run build
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
```

Pastikan `.env` di server production diisi kredensial yang sesuai (jangan pernah commit `.env` ke Git).

## Yang Tidak Boleh Di-commit ke Git

File-file berikut sudah otomatis di-exclude lewat `.gitignore` bawaan Laravel — **jangan pernah** menghapusnya dari `.gitignore` atau memaksa `git add -f`:

- `.env` — berisi kredensial database & application key
- `/vendor` — dependency PHP (re-generate via `composer install`)
- `/node_modules` — dependency JS (re-generate via `npm install`)
- `/public/build` — hasil compile Tailwind/Vite (re-generate via `npm run build`)

## Troubleshooting

| Masalah | Solusi |
|---|---|
| `zip extension missing` saat `composer create-project` | Aktifkan `extension=zip` di `php.ini`, restart terminal |
| Landing page tampil tanpa styling (polos) | Pastikan `npm run dev` sedang berjalan di terminal terpisah |
| Error koneksi database saat `php artisan migrate` | Cek MySQL sudah **Start** di XAMPP Control Panel, dan kredensial `.env` sudah benar |
| `.env` ke-push ke GitHub tanpa sengaja | Jalankan `git rm --cached .env`, commit, lalu **segera** ganti semua kredensial yang sempat ter-expose |
