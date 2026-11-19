# Permana Laundry — Modern Laundry Landing Page & Price Calculator

Template landing page modern dan responsif untuk usaha laundry (sistem *drop-off* datang langsung ke outlet), dilengkapi dengan **kalkulator estimasi biaya multi-layanan** dan **integrasi pemesanan otomatis ke WhatsApp**.

Proyek ini dibangun tanpa memerlukan database maupun proses *build* rumit sehingga bisa langsung dicoba, dikustomisasi, dan di-*deploy* secara gratis.

---

## Fitur Utama

- **Kalkulator Estimasi Multi-Layanan:** Pelanggan dapat menggabungkan layanan kiloan (`kg`), satuan/bedcover (`pcs`), dan express dalam satu daftar estimasi lengkap dengan tombol tambah/kurang kuantitas (`+` / `-`) serta paket simulasi cepat 1-klik.
- **Konfirmasi Pesanan Otomatis via WhatsApp:** Rincian layanan, pilihan aroma parfum, catatan khusus, dan total estimasi otomatis diformat menjadi pesan WhatsApp yang rapi dan siap kirim.
- **Katalog Layanan dengan Filter & Pencarian:** Filter berdasarkan kategori (*Kiloan*, *Express & Kilat*, *Satuan & Bedcover*, *Setrika Saja*) maupun pencarian kata kunci secara *real-time*.
- **Simulasi Proses Mesin Cuci Interaktif:** Visual tabung mesin cuci animasi di bagian *Hero* yang menampilkan tahapan pencucian (*Cuci Higienis*, *Kering 100%*, dan *Setrika Uap*).
- **Dark Mode & Light Mode:** Mendukung deteksi otomatis tema perangkat pengguna dan menyimpan preferensi tema di `localStorage`.
- **Konfigurasi Terpusat (`assets/js/app.js`):** Seluruh data bisnis (nama usaha, nomor WhatsApp, alamat, daftar tarif, testimoni, dan FAQ) dipisahkan dalam satu objek JavaScript agar mudah diubah.

---

## Struktur Proyek

```text
landing-page-laundry/
├── index.html              # Struktur utama halaman web
├── README.md               # Dokumentasi proyek
└── assets/
    ├── css/
    │   └── style.css       # Animasi kustom, efek spotlight, & utilitas tampilan
    └── js/
        └── app.js          # Konfigurasi data outlet & logika interaktif Alpine.js
```

---

## Cara Menjalankan di Komputer Lokal

1. **Clone atau unduh repositori ini:**
   ```bash
   git clone https://github.com/DefarelLabs/landing-page-laundry.git
   cd permana-laundry
   ```
2. **Jalankan di browser:**
   - Klik dua kali file `index.html` untuk membukanya langsung di browser, **atau**
   - Gunakan ekstensi **Live Server** di VS Code, **atau**
   - Jalankan server lokal ringan menggunakan Python:
     ```bash
     python -m http.server 8000
     ```
     Lalu buka `http://localhost:8000` di browser.

---

## Cara Kustomisasi untuk Bisnis Anda

Buka file **`assets/js/app.js`** dan edit bagian **`PERMANA_CONFIG`** di bagian paling atas file:

1. **Informasi Kontak & Lokasi (`contact`):**
   - Ubah `businessName`, `whatsappNumber` (gunakan format kode negara tanpa `+`, contoh: `6281234567890`), `email`, `address`, dan `operationalHours`.
   - Ganti `mapsEmbedUrl` dengan URL *embed* Google Maps lokasi outlet Anda.
2. **Daftar Kategori & Tarif Layanan (`categories` & `services`):**
   - Tambah, ubah harga (`price`), satuan (`kg` atau `pcs`), durasi pengerjaan, maupun label promo (`badge`).
3. **Pilihan Parfum & Paket Simulasi (`parfumOptions` & `quickBundles`):**
   - Sesuaikan daftar aroma parfum yang tersedia di outlet dan paket simulasi cepat pada kalkulator.
4. **Testimoni & FAQ (`testimonials` & `faqs`):**
   - Ganti dengan ulasan pelanggan asli dan pertanyaan yang paling sering diajukan di outlet Anda.

---

## Cara Deploy Gratis

Karena proyek ini murni menggunakan HTML, CSS, dan JavaScript statis, Anda bisa meng-online-kannya secara gratis melalui:

- **GitHub Pages:** Masuk ke *Settings* → *Pages* pada repositori GitHub Anda, lalu pilih branch `main` dan folder `/ (root)`.
- **Vercel / Netlify:** Hubungkan repositori GitHub Anda dan langsung *deploy* tanpa perlu mengatur perintah *build*.

---

## Teknologi yang Digunakan

- **HTML5 Semantic**
- **Tailwind CSS (via CDN)** — Styling responsif & dukungan *Dark Mode*
- **CSS3 Custom Animations** — Efek gelembung sabun, *marquee*, *spotlight card*, dan *scroll reveal*
- **Alpine.js v3 (via CDN)** — Manajemen *state* kalkulator, filter layanan, dan interaksi UI

---

## Lisensi

Proyek ini dirilis menggunakan **MIT License** — bebas digunakan, dimodifikasi, maupun dikembangkan kembali untuk kebutuhan personal maupun komersial.