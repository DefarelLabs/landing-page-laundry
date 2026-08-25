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
        /**
         * counterUp(target, duration)
         * ----------------------------
         * Animasi angka dari 0 menuju `target` saat elemen masuk viewport
         * (pakai IntersectionObserver). Dipakai di stats section About.
         */
        function counterUp(target, duration = 1200) {
            return {
                value: 0,
                started: false,
                observe(el) {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting && !this.started) {
                                this.started = true;
                                this.animate(target, duration);
                                observer.disconnect();
                            }
                        });
                    }, { threshold: 0.4 });
                    observer.observe(el);
                },
                animate(target, duration) {
                    const start = performance.now();
                    const step = (now) => {
                        const progress = Math.min((now - start) / duration, 1);
                        this.value = Math.round(progress * target);
                        if (progress < 1) requestAnimationFrame(step);
                    };
                    requestAnimationFrame(step);
                },
            }
        }

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