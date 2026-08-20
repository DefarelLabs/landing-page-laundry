<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    /**
     * Tampilkan halaman landing page Permana Laundry.
     *
     * Struktur $services sengaja dibuat rata dengan kolom tabel `layanan`
     * di database (kode, nama, harga_per_kg, durasi_jam, tipe_hitungan,
     * label_durasi) supaya nanti gampang dipindah jadi query
     * Layanan::where('aktif', true)->get() tanpa perlu ubah struktur
     * data yang dipakai di view/Alpine.
     *
     * 'type' bernilai 'kilo' (dihitung per kg, contoh: Cuci Reguler) atau
     * 'satuan' (dihitung per pcs/set, contoh: Bedcover, Selimut). Ini
     * dipakai kalkulator untuk menentukan label input ("Berat (kg)" vs
     * "Jumlah (pcs)") dan cara hitung subtotal.
     *
     * 'category' dipakai untuk mengelompokkan tampilan di Services
     * Section (tab) — murni untuk kerapian UI, tidak ada di tabel asli.
     */
    public function index()
    {
        $services = [
            // --- Cuci Kiloan ---
            ['key' => 'reguler',    'name' => 'Cuci Reguler',      'price' => 7000,   'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '3 Hari',    'category' => 'Cuci Kiloan'],
            ['key' => '2day',       'name' => 'Cuci 2 Day',        'price' => 8000,   'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '2 Hari',    'category' => 'Cuci Kiloan'],
            ['key' => 'express',    'name' => 'Cuci Express',      'price' => 10000,  'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '1 Hari',    'category' => 'Cuci Kiloan'],
            ['key' => 'kilat',      'name' => 'Cuci Kilat',        'price' => 12000,  'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '6 Jam',     'category' => 'Cuci Kiloan'],

            // --- Setrika ---
            ['key' => 'setrika',    'name' => 'Setrika Reguler',   'price' => 6000,   'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '3 Hari',    'category' => 'Setrika'],
            ['key' => 'setrika-e',  'name' => 'Setrika Express',   'price' => 8000,   'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '1 Hari',    'category' => 'Setrika'],
            ['key' => 'setrika-k',  'name' => 'Setrika Kilat',     'price' => 10000,  'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '6 Jam',     'category' => 'Setrika'],

            // --- Paket ---
            ['key' => 'bulanan',    'name' => 'Paket Bulanan',     'price' => 250000, 'unit' => 'kg',  'type' => 'kilo',   'duration_label' => '3 Hari',    'category' => 'Paket'],

            // --- Item Satuan ---
            ['key' => 'satuan',     'name' => 'Cuci Satuan',       'price' => 10000,  'unit' => 'pcs', 'type' => 'satuan', 'duration_label' => '3 Hari',    'category' => 'Item Satuan'],
            ['key' => 'jas',        'name' => 'Blazer / Jas',      'price' => 25000,  'unit' => 'pcs', 'type' => 'satuan', 'duration_label' => '3 Hari',    'category' => 'Item Satuan'],
            ['key' => 'handuk',     'name' => 'Handuk Express',    'price' => 10000,  'unit' => 'pcs', 'type' => 'satuan', 'duration_label' => '1 Hari',    'category' => 'Item Satuan'],
            ['key' => 'seprai',     'name' => 'Seprai Single',     'price' => 10000,  'unit' => 'pcs', 'type' => 'satuan', 'duration_label' => '3 Hari',    'category' => 'Item Satuan'],
            ['key' => 'selimut',    'name' => 'Selimut Express',   'price' => 20000,  'unit' => 'pcs', 'type' => 'satuan', 'duration_label' => '1 Hari',    'category' => 'Item Satuan'],

            // --- Bedcover ---
            ['key' => 'bedcover1',  'name' => 'Bedcover 1',        'price' => 40000,  'unit' => 'set', 'type' => 'satuan', 'duration_label' => '1 Minggu',  'category' => 'Bedcover'],
            ['key' => 'bedcover2',  'name' => 'Bedcover 2',        'price' => 30000,  'unit' => 'set', 'type' => 'satuan', 'duration_label' => '1 Minggu',  'category' => 'Bedcover'],
            ['key' => 'bedcover3',  'name' => 'Bedcover 3',        'price' => 35000,  'unit' => 'set', 'type' => 'satuan', 'duration_label' => '1 Minggu',  'category' => 'Bedcover'],
            ['key' => 'bedcover',   'name' => 'Bedcover 1 Set',    'price' => 50000,  'unit' => 'set', 'type' => 'satuan', 'duration_label' => '1 Minggu',  'category' => 'Bedcover'],
        ];

        // Urutan kategori yang dipakai untuk tab di Services Section.
        $categories = ['Cuci Kiloan', 'Setrika', 'Paket', 'Item Satuan', 'Bedcover'];

        $testimonials = [
            [
                'name'    => 'Rina Astuti',
                'role'    => 'Pelanggan sejak 2024',
                'rating'  => 5,
                'message' => 'Selalu langganan cuci express di sini, hasilnya wangi dan rapi. Estimasi harganya juga sesuai sama yang dihitung di web.',
            ],
            [
                'name'    => 'Budi Santoso',
                'role'    => 'Pelanggan paket bulanan',
                'rating'  => 5,
                'message' => 'Pakai paket bulanan buat kosan, jauh lebih hemat waktu. Antar jemputnya juga fleksibel lewat WhatsApp.',
            ],
            [
                'name'    => 'Sari Wulandari',
                'role'    => 'Pelanggan cuci kilat',
                'rating'  => 4,
                'message' => 'Pernah butuh cuci kilat mendadak buat acara keluarga, 6 jam beneran selesai. Sangat membantu.',
            ],
        ];

        $contact = [
            'whatsapp_number' => '6281234567890', // format internasional tanpa "+"
            'email'           => 'halo@permanalaundry.com',
            'address'         => 'Jl. Kelapa Dua Raya No. 45, Kel. Kelapa Dua, Kec. Kelapa Dua, Tangerang, Banten 15810',
            'operational'     => 'Setiap hari, 07.00 – 21.00 WIB',
        ];

        return view('landing.index', compact('services', 'categories', 'testimonials', 'contact'));
    }
}
