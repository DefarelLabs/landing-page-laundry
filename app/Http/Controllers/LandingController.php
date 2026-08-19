<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    /**
     * Tampilkan halaman landing page Permana Laundry.
     *
     * Daftar layanan didefinisikan di sini sebagai array statis agar mudah
     * diubah tanpa migrasi database. Struktur ini juga langsung dipakai
     * oleh kalkulator harga (Alpine.js) via json_encode, jadi kalau kamu
     * menambah/mengubah harga di sini, tampilan & kalkulator otomatis sinkron.
     *
     * Kalau nanti mau dikelola dari admin, tinggal ganti array ini dengan
     * Service::where('is_active', true)->get() dari database.
     */
    public function index()
    {
        $services = [
            [
                'key'         => 'reguler',
                'name'        => 'Cuci Reguler',
                'description' => 'Cuci + kering + lipat rapi. Estimasi selesai 2 hari.',
                'price'       => 7000,
                'unit'        => 'kg',
                'eta'         => '± 48 jam',
            ],
            [
                'key'         => 'express',
                'name'        => 'Cuci Kilat (Express)',
                'description' => 'Diprioritaskan, cocok untuk kebutuhan mendesak.',
                'price'       => 10000,
                'unit'        => 'kg',
                'eta'         => '± 6 jam',
            ],
            [
                'key'         => 'setrika',
                'name'        => 'Setrika Saja',
                'description' => 'Pakaian sudah bersih, tinggal disetrika & dilipat.',
                'price'       => 5000,
                'unit'        => 'kg',
                'eta'         => '± 24 jam',
            ],
        ];

        $contact = [
            'whatsapp_number' => '6289691502028', // format internasional tanpa "+"
            'email'           => 'permanalaundry@gmail.com',
            'address'         => 'Jl. Pesantren I No.52, RT.002/RW.007, Kreo Selatan, Kec. Larangan, Kota Tangerang, Banten 15156',
            'operational'     => 'Setiap hari, 11.00 – 23.59 WIB',
        ];

        return view('landing.index', compact('services', 'contact'));
    }
}
