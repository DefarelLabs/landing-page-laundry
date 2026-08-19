@extends('layouts.app')

@section('title', 'Permana Laundry — Laundry Bersih, Cepat, Terpercaya di Tangerang')
@section('description', 'Cuci reguler, cuci kilat, dan setrika saja. Hitung estimasi harga cucianmu secara instan sebelum antar ke Permana Laundry.')

@section('content')

    {{-- ==========================================================
         NAVBAR
         Sticky, transparan-ke-solid sederhana, tanpa dropdown ribet.
    =========================================================== --}}
    <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4" aria-label="Navigasi utama">
            <a href="{{ route('landing.index') }}" class="flex items-center gap-2 text-lg font-bold text-slate-900">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-600 text-white">P</span>
                Permana Laundry
            </a>

            <div class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
                <a href="#layanan" class="transition hover:text-sky-600">Layanan</a>
                <a href="#kalkulator" class="transition hover:text-sky-600">Cek Harga</a>
                <a href="#kontak" class="transition hover:text-sky-600">Kontak</a>
            </div>

            <a href="#kalkulator"
               class="rounded-full bg-sky-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700">
                Hitung Harga
            </a>
        </nav>
    </header>

    <main>
        {{-- ==========================================================
             HERO SECTION
        =========================================================== --}}
        <section class="mx-auto max-w-6xl px-6 pb-20 pt-16 md:pb-28 md:pt-24">
            <div class="grid items-center gap-12 md:grid-cols-2">
                <div>
                    <span class="inline-flex items-center rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">
                        Laundry kiloan &amp; express di Tangerang
                    </span>

                    <h1 class="mt-5 text-4xl font-extrabold leading-tight tracking-tight text-slate-900 md:text-5xl">
                        Cucian bersih, wangi, dan
                        <span class="text-sky-600">selesai tepat waktu.</span>
                    </h1>

                    <p class="mt-5 max-w-lg text-lg text-slate-500">
                        Permana Laundry mengurus cucianmu dengan standar kebersihan yang konsisten —
                        dari cuci reguler harian sampai express untuk kebutuhan mendadak.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="#kalkulator"
                           class="rounded-full bg-sky-600 px-6 py-3 text-sm font-semibold text-white shadow-sm shadow-sky-200 transition hover:bg-sky-700">
                            Hitung Estimasi Harga
                        </a>
                        <a href="#layanan" class="text-sm font-semibold text-slate-600 transition hover:text-sky-600">
                            Lihat semua layanan →
                        </a>
                    </div>
                </div>

                {{-- Ilustrasi ringan pakai SVG inline, bukan gambar berat --}}
                <div class="relative">
                    <div class="aspect-square w-full max-w-md rounded-3xl bg-sky-50 md:mx-auto md:aspect-[4/5]">
                        <svg viewBox="0 0 200 200" class="h-full w-full p-10 text-sky-600" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <circle cx="100" cy="100" r="70" stroke="currentColor" stroke-width="6" opacity="0.25"/>
                            <circle cx="100" cy="100" r="45" stroke="currentColor" stroke-width="6" opacity="0.5"/>
                            <path d="M100 70a30 30 0 0 1 30 30" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                            <circle cx="100" cy="100" r="10" fill="currentColor"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        {{-- ==========================================================
             SERVICES SECTION
        =========================================================== --}}
        <section id="layanan" class="border-t border-slate-100 bg-slate-50/60 py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Layanan Kami</h2>
                    <p class="mt-3 text-slate-500">Pilih layanan yang paling sesuai dengan kebutuhanmu.</p>
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-3">
                    @foreach ($services as $service)
                        <article class="rounded-2xl border border-slate-200 bg-white p-7 transition hover:border-sky-200 hover:shadow-sm">
                            <h3 class="text-lg font-semibold text-slate-900">{{ $service['name'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-slate-500">{{ $service['description'] }}</p>

                            <div class="mt-6 flex items-end justify-between border-t border-slate-100 pt-4">
                                <div>
                                    <p class="text-xl font-bold text-sky-600">
                                        Rp{{ number_format($service['price'], 0, ',', '.') }}
                                        <span class="text-sm font-medium text-slate-400">/{{ $service['unit'] }}</span>
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">Estimasi selesai {{ $service['eta'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ==========================================================
             INTERACTIVE PRICE ESTIMATOR
             State kalkulator sepenuhnya di Alpine.js (x-data), data harga
             layanan dikirim dari server via json_encode agar single source
             of truth-nya tetap di LandingController, bukan di-hardcode
             dua kali (PHP & JS).
        =========================================================== --}}
        <section id="kalkulator" class="py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Kalkulator Estimasi Harga</h2>
                    <p class="mt-3 text-slate-500">Pilih layanan dan masukkan berat cucian untuk melihat estimasi biaya secara langsung.</p>
                </div>

                <div
                    x-data="priceEstimator({{ Illuminate\Support\Js::from($services) }})"
                    class="mx-auto mt-12 max-w-2xl rounded-3xl border border-slate-200 bg-white p-8 shadow-sm md:p-10"
                >
                    {{-- Input 1: pilih jenis layanan --}}
                    <fieldset>
                        <legend class="text-sm font-semibold text-slate-900">Jenis Layanan</legend>
                        <div class="mt-4 grid gap-3 sm:grid-cols-3">
                            <template x-for="service in services" :key="service.key">
                                <label
                                    class="flex cursor-pointer flex-col rounded-xl border p-4 text-sm transition"
                                    :class="selected === service.key
                                        ? 'border-sky-600 bg-sky-50 ring-1 ring-sky-600'
                                        : 'border-slate-200 hover:border-slate-300'"
                                >
                                    <input
                                        type="radio"
                                        name="service"
                                        class="sr-only"
                                        :value="service.key"
                                        x-model="selected"
                                    >
                                    <span class="font-semibold text-slate-900" x-text="service.name"></span>
                                    <span class="mt-1 text-slate-500" x-text="'Rp' + formatRupiah(service.price) + '/kg'"></span>
                                </label>
                            </template>
                        </div>
                    </fieldset>

                    {{-- Input 2: berat cucian --}}
                    <div class="mt-8">
                        <label for="berat" class="text-sm font-semibold text-slate-900">Berat Cucian (kg)</label>
                        <div class="mt-3 flex items-center gap-4">
                            <input
                                id="berat"
                                type="number"
                                min="1"
                                step="0.5"
                                x-model.number="weight"
                                class="w-28 rounded-lg border border-slate-300 px-4 py-2.5 text-center text-lg font-semibold text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100"
                            >
                            {{-- Slider opsional biar lebih interaktif di desktop --}}
                            <input
                                type="range"
                                min="1"
                                max="50"
                                step="0.5"
                                x-model.number="weight"
                                class="flex-1 accent-sky-600"
                                aria-label="Geser untuk mengatur berat cucian"
                            >
                        </div>
                    </div>

                    {{-- Output real-time --}}
                    <div class="mt-8 flex items-center justify-between rounded-2xl bg-slate-900 px-6 py-6">
                        <div>
                            <p class="text-sm text-slate-400">Estimasi Total</p>
                            <p class="mt-1 text-3xl font-extrabold text-white" x-text="'Rp' + formatRupiah(total)"></p>
                        </div>
                        <p class="text-right text-xs text-slate-400" x-text="weight + ' kg × Rp' + formatRupiah(pricePerKg) + '/kg'"></p>
                    </div>

                    <a
                        :href="whatsappLink"
                        target="_blank"
                        rel="noopener"
                        class="mt-6 flex w-full items-center justify-center rounded-full bg-sky-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-sky-700"
                    >
                        Antar Cucian via WhatsApp
                    </a>
                    <p class="mt-3 text-center text-xs text-slate-400">*Estimasi. Harga final mengikuti berat aktual saat penimbangan di outlet.</p>
                </div>
            </div>
        </section>

        {{-- ==========================================================
             CONTACT & LOCATION SECTION
        =========================================================== --}}
        <section id="kontak" class="border-t border-slate-100 bg-slate-50/60 py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="grid gap-12 md:grid-cols-2">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-slate-900">Hubungi &amp; Kunjungi Kami</h2>
                        <p class="mt-3 max-w-md text-slate-500">
                            Antar langsung cucianmu ke outlet, atau hubungi kami dulu lewat WhatsApp untuk penjemputan.
                        </p>

                        <dl class="mt-8 space-y-6 text-sm">
                            <div class="flex gap-4">
                                <dt class="mt-0.5 flex h-9 w-9 flex-none items-center justify-center rounded-full bg-sky-100 text-sky-600" aria-hidden="true">📍</dt>
                                <dd>
                                    <p class="font-semibold text-slate-900">Alamat</p>
                                    <p class="mt-1 text-slate-500">{{ $contact['address'] }}</p>
                                </dd>
                            </div>
                            <div class="flex gap-4">
                                <dt class="mt-0.5 flex h-9 w-9 flex-none items-center justify-center rounded-full bg-sky-100 text-sky-600" aria-hidden="true">✉️</dt>
                                <dd>
                                    <p class="font-semibold text-slate-900">Email</p>
                                    <a href="mailto:{{ $contact['email'] }}" class="mt-1 block text-slate-500 hover:text-sky-600">{{ $contact['email'] }}</a>
                                </dd>
                            </div>
                            <div class="flex gap-4">
                                <dt class="mt-0.5 flex h-9 w-9 flex-none items-center justify-center rounded-full bg-sky-100 text-sky-600" aria-hidden="true">🕑</dt>
                                <dd>
                                    <p class="font-semibold text-slate-900">Jam Operasional</p>
                                    <p class="mt-1 text-slate-500">{{ $contact['operational'] }}</p>
                                </dd>
                            </div>
                        </dl>

                        <a
                            href="https://api.whatsapp.com/send?phone={{ $contact['whatsapp_number'] }}&text={{ urlencode('Halo Permana Laundry, saya ingin bertanya tentang layanan laundry.') }}"
                            target="_blank"
                            rel="noopener"
                            class="mt-8 inline-flex items-center gap-2 rounded-full bg-emerald-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700"
                        >
                            Chat via WhatsApp
                        </a>
                    </div>

                    {{-- Placeholder peta — ganti src dengan embed Google Maps outlet asli --}}
                    <div class="overflow-hidden rounded-3xl border border-slate-200">
                        <iframe
                            title="Lokasi Permana Laundry"
                            src="https://maps.google.com/maps?q=Permana%20Laundry%2C%20Tangerang&t=&z=14&ie=UTF8&iwloc=&output=embed"
                            class="h-full min-h-[320px] w-full"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- ========================================================== FOOTER =========================================================== --}}
    <footer class="border-t border-slate-100 py-8">
        <div class="mx-auto max-w-6xl px-6 text-center text-sm text-slate-400">
            © {{ date('Y') }} Permana Laundry. Seluruh hak cipta dilindungi.
        </div>
    </footer>

    {{-- ==========================================================
         Alpine.js — cukup 1 file kecil, tanpa build step tambahan
         di luar yang sudah disediakan Laravel + Vite.
    =========================================================== --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        /**
         * priceEstimator(services)
         * ------------------------
         * Komponen Alpine.js untuk kalkulator harga reaktif.
         *
         * @param {Array} services - daftar layanan dari server (key, name, price)
         *
         * Cara kerja:
         * 1. `selected` menyimpan key layanan yang dipilih (default: layanan pertama).
         * 2. `weight` menyimpan berat cucian dalam kg (angka, bisa desimal).
         * 3. `pricePerKg` & `total` adalah getter (computed) — otomatis
         *    dihitung ulang oleh Alpine setiap kali `selected` atau `weight`
         *    berubah, tanpa perlu event listener manual.
         * 4. `whatsappLink` juga computed, jadi pesan WhatsApp otomatis berisi
         *    ringkasan estimasi terbaru saat tombol diklik.
         */
        function priceEstimator(services) {
            return {
                services: services,
                selected: services[0]?.key ?? null,
                weight: 3, // nilai awal biar output langsung terisi saat halaman dibuka

                // Ambil objek layanan yang sedang aktif dipilih
                get activeService() {
                    return this.services.find(s => s.key === this.selected) ?? this.services[0];
                },

                get pricePerKg() {
                    return this.activeService?.price ?? 0;
                },

                // Total = harga per kg x berat. Dibulatkan & dijaga tidak minus.
                get total() {
                    const weight = Math.max(Number(this.weight) || 0, 0);
                    return Math.round(this.pricePerKg * weight);
                },

                // Format angka ke gaya ribuan Indonesia (7000 -> "7.000")
                formatRupiah(value) {
                    return Math.round(value).toLocaleString('id-ID');
                },

                // Link WhatsApp berisi ringkasan pesanan, siap dikirim ke outlet
                get whatsappLink() {
                    const message = `Halo Permana Laundry, saya ingin antar cucian:
`
                        + `- Layanan: ${this.activeService?.name}
`
                        + `- Berat: ${this.weight} kg
`
                        + `- Estimasi total: Rp${this.formatRupiah(this.total)}`;

                    return `https://api.whatsapp.com/send?phone={{ $contact['whatsapp_number'] }}&text=${encodeURIComponent(message)}`;
                },
            }
        }
    </script>

@endsection
