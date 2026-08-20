@extends('layouts.app')

@section('title', 'Permana Laundry — Laundry Bersih, Cepat, Terpercaya di Tangerang')
@section('description', 'Cuci reguler, express, kilat, setrika, hingga bedcover. Hitung estimasi harga multi-layanan secara instan di Permana Laundry.')

@section('content')

    {{-- ==========================================================
         NAVBAR
    =========================================================== --}}
    <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4" aria-label="Navigasi utama">
            <a href="{{ route('landing.index') }}" class="flex items-center gap-2 text-lg font-bold text-slate-900">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-600 text-white">P</span>
                Permana Laundry
            </a>

            <div class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
                <a href="#testimoni" class="transition hover:text-sky-600">Testimoni</a>
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
        <section class="mx-auto max-w-6xl px-6 pb-20 pt-10 md:pb-28 md:pt-24">
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
             TESTIMONI SECTION
             Statis dulu (array dari controller). Kalau nanti mau ambil
             dari database + form input testimoni pelanggan, tinggal
             ganti $testimonials di LandingController jadi query model.
        =========================================================== --}}
        <section id="testimoni" class="border-t border-slate-100 py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Apa Kata Pelanggan</h2>
                    <p class="mt-3 text-slate-500">Pengalaman nyata dari pelanggan yang sudah langganan di Permana Laundry.</p>
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-3">
                    @foreach ($testimonials as $testimonial)
                        <figure class="rounded-2xl border border-slate-200 bg-white p-7">
                            <div class="flex gap-0.5 text-amber-400" aria-hidden="true">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="h-4 w-4 {{ $i < $testimonial['rating'] ? 'fill-amber-400' : 'fill-slate-200' }}" viewBox="0 0 20 20">
                                        <path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.2-5.4 3.2 1.3-6-4.6-4.1 6.1-.6z"/>
                                    </svg>
                                @endfor
                            </div>

                            <blockquote class="mt-4 text-sm leading-relaxed text-slate-600">
                                "{{ $testimonial['message'] }}"
                            </blockquote>

                            <figcaption class="mt-5 flex items-center gap-3 border-t border-slate-100 pt-4">
                                <span class="flex h-9 w-9 flex-none items-center justify-center rounded-full bg-sky-100 text-sm font-semibold text-sky-700">
                                    {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">{{ $testimonial['name'] }}</p>
                                    <p class="text-xs text-slate-400">{{ $testimonial['role'] }}</p>
                                </div>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ==========================================================
             SERVICES SECTION
             17 layanan dikelompokkan per kategori pakai tab (Alpine),
             supaya tidak menumpuk jadi grid raksasa yang berantakan.
        =========================================================== --}}
        <section id="layanan" class="border-t border-slate-100 bg-slate-50/60 py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Layanan Kami</h2>
                    <p class="mt-3 text-slate-500">Pilih kategori untuk melihat layanan yang tersedia.</p>
                </div>

                <div x-data="{ tab: '{{ $categories[0] }}' }" class="mt-10">
                    {{-- Tab kategori --}}
                    <div class="flex flex-wrap justify-center gap-2" role="tablist" aria-label="Kategori layanan">
                        @foreach ($categories as $category)
                            <button
                                type="button"
                                role="tab"
                                @click="tab = '{{ $category }}'"
                                :aria-selected="tab === '{{ $category }}'"
                                class="rounded-full px-4 py-2 text-sm font-semibold transition"
                                :class="tab === '{{ $category }}'
                                    ? 'bg-sky-600 text-white'
                                    : 'bg-white text-slate-600 border border-slate-200 hover:border-slate-300'"
                            >
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>

                    {{-- Grid layanan, difilter lewat x-show sesuai tab aktif --}}
                    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($services as $service)
                            <article
                                x-show="tab === '{{ $service['category'] }}'"
                                x-cloak
                                class="rounded-2xl border border-slate-200 bg-white p-6 transition hover:border-sky-200 hover:shadow-sm"
                            >
                                <h3 class="text-base font-semibold text-slate-900">{{ $service['name'] }}</h3>
                                <p class="mt-1 text-xs text-slate-400">Estimasi selesai {{ $service['duration_label'] }}</p>

                                <div class="mt-4 border-t border-slate-100 pt-4">
                                    <p class="text-lg font-bold text-sky-600">
                                        Rp{{ number_format($service['price'], 0, ',', '.') }}
                                        <span class="text-sm font-medium text-slate-400">/{{ $service['unit'] }}</span>
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- ==========================================================
             INTERACTIVE PRICE ESTIMATOR — MULTI LAYANAN (KERANJANG)
             Alur: pilih layanan dari dropdown (dikelompokkan per
             kategori pakai <optgroup>) → isi berat/jumlah → klik
             "Tambah" → item masuk ke daftar (cart). Total dihitung dari
             seluruh item di cart, bukan cuma satu layanan seperti versi
             sebelumnya. User bisa hapus item dari cart kalau salah pilih.
        =========================================================== --}}
        <section id="kalkulator" class="py-20">
            <div class="mx-auto max-w-6xl px-6">
                <div class="mx-auto max-w-xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">Kalkulator Estimasi Harga</h2>
                    <p class="mt-3 text-slate-500">Bisa gabungkan beberapa layanan sekaligus dalam satu perhitungan.</p>
                </div>

                <div
                    x-data="priceEstimator({{ Illuminate\Support\Js::from($services) }})"
                    class="mx-auto mt-12 max-w-2xl rounded-3xl border border-slate-200 bg-white p-8 shadow-sm md:p-10"
                >
                    {{-- Form tambah layanan --}}
                    <div class="grid gap-4 sm:grid-cols-[1fr_auto_auto] sm:items-end">
                        <div>
                            <label for="layanan-pilih" class="text-sm font-semibold text-slate-900">Pilih Layanan</label>
                            <select
                                id="layanan-pilih"
                                x-model="selectedKey"
                                class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100"
                            >
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category }}">
                                        @foreach ($services as $service)
                                            @if ($service['category'] === $category)
                                                <option value="{{ $service['key'] }}">
                                                    {{ $service['name'] }} — Rp{{ number_format($service['price'], 0, ',', '.') }}/{{ $service['unit'] }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="jumlah-input" class="text-sm font-semibold text-slate-900" x-text="qtyLabel"></label>
                            <input
                                id="jumlah-input"
                                type="number"
                                min="0.5"
                                step="0.5"
                                x-model.number="qty"
                                class="mt-2 w-24 rounded-lg border border-slate-300 px-3 py-2.5 text-center text-sm font-semibold text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-100"
                            >
                        </div>

                        <button
                            type="button"
                            @click="addToCart()"
                            class="rounded-lg bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-sky-700"
                        >
                            + Tambah
                        </button>
                    </div>

                    {{-- Daftar item yang sudah ditambahkan --}}
                    <div class="mt-8" x-show="cart.length > 0" x-cloak>
                        <p class="text-sm font-semibold text-slate-900">Daftar Layanan</p>
                        <ul class="mt-3 divide-y divide-slate-100 rounded-xl border border-slate-100">
                            <template x-for="(item, index) in cartWithDetails" :key="item.key">
                                <li class="flex items-center justify-between px-4 py-3 text-sm">
                                    <div>
                                        <p class="font-medium text-slate-900" x-text="item.name"></p>
                                        <p class="text-xs text-slate-400" x-text="item.qty + ' ' + item.unit + ' × Rp' + formatRupiah(item.price)"></p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="font-semibold text-slate-900" x-text="'Rp' + formatRupiah(item.subtotal)"></span>
                                        <button
                                            type="button"
                                            @click="removeFromCart(index)"
                                            class="text-slate-400 transition hover:text-red-500"
                                            aria-label="Hapus item"
                                        >
                                            ✕
                                        </button>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <p class="mt-4 text-center text-sm text-slate-400" x-show="cart.length === 0">
                        Belum ada layanan ditambahkan.
                    </p>

                    {{-- Output real-time --}}
                    <div class="mt-8 flex items-center justify-between rounded-2xl bg-slate-900 px-6 py-6">
                        <div>
                            <p class="text-sm text-slate-400">Estimasi Total</p>
                            <p class="mt-1 text-3xl font-extrabold text-white" x-text="'Rp' + formatRupiah(total)"></p>
                        </div>
                        <p class="text-right text-xs text-slate-400" x-text="cart.length + ' layanan dipilih'"></p>
                    </div>

                    <a
                        :href="whatsappLink"
                        target="_blank"
                        rel="noopener"
                        class="mt-6 flex w-full items-center justify-center rounded-full bg-sky-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-sky-700"
                        :class="cart.length === 0 && 'pointer-events-none opacity-40'"
                    >
                        Antar Cucian via WhatsApp
                    </a>
                    <p class="mt-3 text-center text-xs text-slate-400">*Estimasi. Harga final mengikuti berat/jumlah aktual saat penimbangan di outlet.</p>
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

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        /**
         * priceEstimator(services)
         * ------------------------
         * Komponen Alpine.js untuk kalkulator harga multi-layanan (keranjang).
         *
         * @param {Array} services - seluruh layanan dari server, tiap item
         *   punya: key, name, price, unit, type ('kilo' | 'satuan'), category.
         *
         * State:
         * - selectedKey : key layanan yang sedang dipilih di dropdown.
         * - qty         : berat (kg) atau jumlah (pcs/set), tergantung `type`.
         * - cart        : daftar item yang sudah ditambahkan, tiap entri
         *                 hanya menyimpan { key, qty } — detail (nama,
         *                 harga) diambil ulang dari `services` lewat getter
         *                 `cartWithDetails`, jadi tidak ada data terduplikasi.
         *
         * Kenapa cart hanya simpan key+qty, bukan seluruh objek layanan?
         * Supaya kalau harga di server berubah saat reload, cart tidak
         * membawa data harga basi — selalu dihitung ulang dari `services`.
         */
        function priceEstimator(services) {
            return {
                services: services,
                selectedKey: services[0]?.key ?? null,
                qty: 1,
                cart: [],

                get selectedService() {
                    return this.services.find(s => s.key === this.selectedKey) ?? this.services[0];
                },

                // Label input menyesuaikan tipe layanan yang sedang dipilih
                get qtyLabel() {
                    return this.selectedService?.type === 'satuan'
                        ? `Jumlah (${this.selectedService.unit})`
                        : `Berat (${this.selectedService?.unit ?? 'kg'})`;
                },

                // Tambah item ke cart. Kalau layanan yang sama sudah ada,
                // qty-nya ditambah (bukan bikin baris duplikat).
                addToCart() {
                    const qty = Math.max(Number(this.qty) || 0, 0);
                    if (!this.selectedKey || qty <= 0) return;

                    const existing = this.cart.find(item => item.key === this.selectedKey);
                    if (existing) {
                        existing.qty += qty;
                    } else {
                        this.cart.push({ key: this.selectedKey, qty });
                    }

                    this.qty = 1; // reset input setelah ditambahkan
                },

                removeFromCart(index) {
                    this.cart.splice(index, 1);
                },

                // Gabungkan tiap entri cart dengan detail layanan + subtotalnya.
                // Ini yang dipakai untuk render daftar & dihitung ulang
                // otomatis oleh Alpine setiap kali `cart` berubah.
                get cartWithDetails() {
                    return this.cart.map(item => {
                        const service = this.services.find(s => s.key === item.key);
                        return {
                            key: item.key,
                            name: service?.name ?? item.key,
                            unit: service?.unit ?? '',
                            price: service?.price ?? 0,
                            qty: item.qty,
                            subtotal: Math.round((service?.price ?? 0) * item.qty),
                        };
                    });
                },

                // Total = jumlah subtotal seluruh item di cart
                get total() {
                    return this.cartWithDetails.reduce((sum, item) => sum + item.subtotal, 0);
                },

                formatRupiah(value) {
                    return Math.round(value).toLocaleString('id-ID');
                },

                // Ringkasan seluruh isi cart dikirim sebagai pesan WhatsApp
                get whatsappLink() {
                    const lines = this.cartWithDetails
                        .map(item => `- ${item.name}: ${item.qty} ${item.unit} = Rp${this.formatRupiah(item.subtotal)}`)
                        .join('\n');

                    const message = `Halo Permana Laundry, saya ingin antar cucian:\n${lines}\n\nEstimasi total: Rp${this.formatRupiah(this.total)}`;

                    return `https://api.whatsapp.com/send?phone={{ $contact['whatsapp_number'] }}&text=${encodeURIComponent(message)}`;
                },
            }
        }
    </script>

@endsection
