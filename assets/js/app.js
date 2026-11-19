/**
 * ============================================================================
 * KONFIGURASI UTAMA PERMANA LAUNDRY
 * Edit bagian ini untuk menyesuaikan nomor WhatsApp, alamat, tarif, & konten.
 * ============================================================================
 */
const PERMANA_CONFIG = {
  contact: {
    businessName: 'Permana Laundry',
    whatsappNumber: '6289691502028', // Gunakan kode negara 62 tanpa tanda +
    whatsappDisplay: '0896-9150-2028',
    email: 'permanalaundry@gmail.com',
    address: 'Jl. Pesantren I No.52, RT.002/RW.007, Kreo Selatan, Kec. Larangan, Kota Tangerang, Banten 15156',
    operationalHours: 'Senin – Minggu: 11.00 – 00.00 WIB',
    serviceModeLabel: 'Drop-Off & Ambil di Outlet',
    mapsEmbedUrl:
      'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7932.360550585235!2d106.73899692207634!3d-6.239955600911147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f101d108bbef%3A0xebab601b5e57cbb4!2sPermana%20Laundry!5e0!3m2!1sid!2sid!4v1795077276826!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin',
  },

  categories: [
    { id: 'kiloan', name: 'Laundry Kiloan' },
    { id: 'express', name: 'Express & Kilat' },
    { id: 'satuan', name: 'Satuan & Bedcover' },
    { id: 'setrika', name: 'Setrika Uap Saja' },
  ],

  services: [
    // --- Kategori: Kiloan ---
    {
      id: 'cuci-komplit-reguler',
      categoryId: 'kiloan',
      name: 'Cuci Komplit Reguler',
      price: 7000,
      unit: 'kg',
      duration: '2–3 Hari',
      badge: 'Terlaris',
      description: 'Cuci higienis 1 mesin 1 pelanggan, pengeringan penuh 100%, setrika uap rapi, parfum pilihan, dan lipat kemasan.',
    },
    {
      id: 'cuci-komplit-1hari',
      categoryId: 'kiloan',
      name: 'Cuci Komplit 1 Hari',
      price: 9000,
      unit: 'kg',
      duration: '24 Jam',
      badge: 'Favorit',
      description: 'Solusi cuci + kering + setrika uap selesai dalam 24 jam dengan standar kebersihan dan keharuman premium.',
    },
    {
      id: 'cuci-kering-lipat',
      categoryId: 'kiloan',
      name: 'Cuci Kering Lipat',
      price: 5500,
      unit: 'kg',
      duration: '1–2 Hari',
      badge: null,
      description: 'Cocok untuk pakaian santai harian dan kaos. Dicuci bersih, dikeringkan mesin hingga bebas lembap, lalu dilipat rapi.',
    },
    {
      id: 'cuci-pakaian-bayi',
      categoryId: 'kiloan',
      name: 'Cuci Komplit Pakaian Bayi',
      price: 10000,
      unit: 'kg',
      duration: '1–2 Hari',
      badge: 'Hypoallergenic',
      description: 'Menggunakan deterjen khusus bayi bebas iritasi, bilas ekstra bersih, dan sterilisasi suhu hangat.',
    },

    // --- Kategori: Express & Kilat ---
    {
      id: 'express-6-jam',
      categoryId: 'express',
      name: 'Express Kilat 6 Jam',
      price: 15000,
      unit: 'kg',
      duration: '6 Jam',
      badge: 'Kilat',
      description: 'Prioritas mesin cuci dan pengering khusus. Pakaian dicuci, disetrika uap, dan siap diambil dalam 6 jam.',
    },
    {
      id: 'express-3-jam',
      categoryId: 'express',
      name: 'Super Express 3 Jam',
      price: 20000,
      unit: 'kg',
      duration: '3 Jam',
      badge: 'Super Cepat',
      description: 'Layanan darurat untuk kebutuhan mendesak. Langsung diproses saat itu juga tanpa antre.',
    },
    {
      id: 'express-satuan-sameday',
      categoryId: 'express',
      name: 'Express Satuan Same-Day',
      price: 25000,
      unit: 'pcs',
      duration: '6 Jam',
      badge: null,
      description: 'Perawatan cepat untuk kemeja kerja, celana bahan, atau seragam yang dibutuhkan di hari yang sama.',
    },

    // --- Kategori: Satuan & Bedcover ---
    {
      id: 'bedcover-single',
      categoryId: 'satuan',
      name: 'Bedcover Single / Twin',
      price: 22000,
      unit: 'pcs',
      duration: '2–3 Hari',
      badge: null,
      description: 'Pencucian tabung besar agar dakron tidak menggumpal, dikeringkan sempurna, dan dikemas tas plastik resleting.',
    },
    {
      id: 'bedcover-king',
      categoryId: 'satuan',
      name: 'Bedcover Queen / King',
      price: 30000,
      unit: 'pcs',
      duration: '2–3 Hari',
      badge: 'Terlaris',
      description: 'Perawatan menyeluruh untuk bedcover ukuran besar agar kembali mengembang, bebas tungau, dan wangi segar.',
    },
    {
      id: 'sprei-set',
      categoryId: 'satuan',
      name: 'Sprei Set + Sarung Bantal',
      price: 15000,
      unit: 'pcs',
      duration: '2 Hari',
      badge: null,
      description: 'Cuci dan setrika uap licin untuk 1 set sprei beserta sarung bantal dan guling.',
    },
    {
      id: 'selimut-tebal',
      categoryId: 'satuan',
      name: 'Selimut Tebal / Quilt',
      price: 18000,
      unit: 'pcs',
      duration: '2 Hari',
      badge: null,
      description: 'Pencucian lembut menjaga kelembutan bulu atau serat selimut tanpa merusak tekstur kain.',
    },
    {
      id: 'jas-blazer',
      categoryId: 'satuan',
      name: 'Jas / Blazer Formal',
      price: 25000,
      unit: 'pcs',
      duration: '2–3 Hari',
      badge: null,
      description: 'Teknik pencucian khusus menjaga struktur bahu dan kerah jas, di-finishing setrika uap dan hanger.',
    },
    {
      id: 'gaun-kebaya',
      categoryId: 'satuan',
      name: 'Gaun Pesta / Kebaya',
      price: 35000,
      unit: 'pcs',
      duration: '3 Hari',
      badge: 'Delicate Care',
      description: 'Penanganan manual lembut untuk bahan brokat, payet, atau sutra agar tetap awet dan berkilau.',
    },
    {
      id: 'boneka-bantal',
      categoryId: 'satuan',
      name: 'Boneka / Bantal Kepala',
      price: 15000,
      unit: 'pcs',
      duration: '2–3 Hari',
      badge: null,
      description: 'Membersihkan debu dan noda hingga ke bagian dalam isian silikon/dakron serta pengeringan higienis.',
    },
    {
      id: 'sepatu-sneakers',
      categoryId: 'satuan',
      name: 'Deep Clean Sepatu / Sneakers',
      price: 30000,
      unit: 'pcs',
      duration: '2–3 Hari',
      badge: null,
      description: 'Pembersihan detail bagian upper, midsole, insole, dan tali sepatu menggunakan cairan pembersih khusus.',
    },

    // --- Kategori: Setrika Uap Saja ---
    {
      id: 'setrika-reguler',
      categoryId: 'setrika',
      name: 'Setrika Uap Reguler',
      price: 5000,
      unit: 'kg',
      duration: '1–2 Hari',
      badge: 'Hemat',
      description: 'Khusus pakaian yang sudah dicuci di rumah. Disetrika menggunakan boiler uap anti gosong + parfum.',
    },
    {
      id: 'setrika-express',
      categoryId: 'setrika',
      name: 'Setrika Uap Express 6 Jam',
      price: 9000,
      unit: 'kg',
      duration: '6 Jam',
      badge: null,
      description: 'Layanan setrika uap kilat selesai 6 jam, pakaian licin rapi dan siap langsung masuk lemari.',
    },
  ],

  parfumOptions: [
    'Sakura Blossom (Segar & Lembut)',
    'Ocean Fresh (Bersih & Maskulin)',
    'Downy Mystique (Elegan & Tahan Lama)',
    'Lavender Calm (Menenangkan)',
    'Baby Powder (Lembut & Hypoallergenic)',
    'Tanpa Parfum (Unscented)',
  ],

  quickBundles: [
    {
      label: 'Paket Anak Kost (3 kg)',
      items: [{ serviceId: 'cuci-komplit-reguler', qty: 3 }],
    },
    {
      label: 'Keluarga + Bedcover',
      items: [
        { serviceId: 'cuci-komplit-reguler', qty: 5 },
        { serviceId: 'bedcover-king', qty: 1 },
      ],
    },
    {
      label: 'Express Kerja (2 kg)',
      items: [{ serviceId: 'express-6-jam', qty: 2 }],
    },
  ],

  stats: [
    {
      id: 'pelanggan',
      target: 1500,
      current: 0,
      suffix: '+',
      label: 'Pelanggan Puas',
      sublabel: 'Keluarga & pekerja di Kota Tangerang',
    },
    {
      id: 'tepat-waktu',
      target: 99,
      current: 0,
      suffix: '%',
      label: 'Selesai Tepat Waktu',
      sublabel: 'Komitmen jadwal pengambilan transparan',
    },
    {
      id: 'rating',
      target: 4.9,
      current: 0,
      suffix: '/5',
      label: 'Rating Kepuasan',
      sublabel: 'Berdasarkan ulasan pelanggan outlet',
    },
  ],

  processSteps: [
    {
      step: '01',
      title: 'Antar ke Outlet',
      description: 'Bawa pakaian kotor Anda ke outlet Permana Laundry atau konfirmasi dulu via WhatsApp.',
    },
    {
      step: '02',
      title: 'Timbang & Sortir',
      description: 'Pakaian ditimbang transparan di depan Anda dan dipisahkan berdasarkan warna serta jenis kain.',
    },
    {
      step: '03',
      title: 'Cuci & Setrika Uap',
      description: 'Diproses 1 mesin 1 pelanggan, dikeringkan penuh, lalu disetrika uap boiler anti gosong.',
    },
    {
      step: '04',
      title: 'Siap Diambil',
      description: 'Anda mendapat notifikasi saat pesanan selesai dan siap diambil dalam kemasan rapi & wangi.',
    },
  ],

  testimonials: [
    {
      id: 'testi-1',
      rating: 5,
      serviceUsed: 'Cuci Komplit Reguler',
      quote: 'Sudah langganan lebih dari setahun. Hasil lipatannya rapi banget, wanginya awet di lemari, dan belum pernah ada baju yang tertukar.',
      initials: 'AR',
      name: 'Andini Rahmawati',
      role: 'Karyawan Swasta — Tangerang',
    },
    {
      id: 'testi-2',
      rating: 5,
      serviceUsed: 'Express Kilat 6 Jam',
      quote: 'Penyelamat pas butuh kemeja kerja mendadak. Pagi taruh jam 8, jam 2 siang sudah beres, wangi, dan licin setrika uap.',
      initials: 'BP',
      name: 'Bima Pratama',
      role: 'Warga Sukasari, Tangerang',
    },
    {
      id: 'testi-3',
      rating: 5,
      serviceUsed: 'Bedcover Queen / King',
      quote: 'Bedcover ukuran king dicuci di sini hasilnya mengembang lagi dan bersih total. Dikemas pakai tas plastik rapi jadi gampang disimpan.',
      initials: 'SN',
      name: 'Siti Nurhaliza',
      role: 'Ibu Rumah Tangga — Cikokol',
    },
  ],

  faqs: [
    {
      question: 'Apakah cucian saya dicampur dengan pakaian pelanggan lain?',
      answer: 'Tidak pernah. Permana Laundry menerapkan standar 1 mesin cuci untuk 1 pelanggan (tidak dicampur), sehingga kebersihan lebih terjaga dan meminimalkan risiko pakaian tertukar atau kelunturan.',
    },
    {
      question: 'Apakah tersedia layanan antar-jemput atau harus datang ke outlet?',
      answer: 'Saat ini kami berfokus pada layanan Drop-Off & Ambil Langsung di outlet agar penimbangan digital dapat disaksikan secara transparan dan pesanan langsung diproses tanpa menunggu jadwal kurir.',
    },
    {
      question: 'Berapa minimal berat untuk layanan laundry kiloan?',
      answer: 'Minimal pemesanan untuk layanan laundry kiloan dan setrika uap kiloan adalah 2 kg. Jika berat di bawah 2 kg, perhitungan akan mengikuti tarif minimum 2 kg.',
    },
    {
      question: 'Bagaimana jika hujan terus-menerus, apakah cucian tetap kering tepat waktu?',
      answer: 'Ya, seluruh proses pengeringan di Permana Laundry menggunakan mesin pengering komersial (dryer) berkapasitas besar hingga kering 100%, sehingga pakaian tidak bergantung pada cuaca dan bebas bau apek.',
    },
  ],
};

/**
 * ============================================================================
 * ALPINE.JS APPLICATION STATE & METHODS
 * ============================================================================
 */
function laundryApp() {
  return {
    // --- Navigasi & Tema ---
    darkMode: document.documentElement.classList.contains('dark'),
    mobileMenuOpen: false,
    scrollProgress: 0,
    showBackToTop: false,
    activeSection: 'home',

    // --- Hero Machine Simulator ---
    activeMachineMode: 'wash',
    heroMachineModes: [
      {
        id: 'wash',
        label: '1. Cuci Higienis',
        rpm: '800 RPM',
        temp: 'Air UV 40°C',
        detail: '1 mesin 1 pelanggan dengan deterjen antibakteri lembut di serat kain.',
      },
      {
        id: 'dry',
        label: '2. Kering 100%',
        rpm: 'Dryer Pro',
        temp: 'Sirkulasi 60°C',
        detail: 'Pengeringan penuh tanpa jemur matahari, bebas debu jalanan & bau apek.',
      },
      {
        id: 'iron',
        label: '3. Setrika Uap',
        rpm: 'Steam Boiler',
        temp: 'Uap Halus',
        detail: 'Licin presisi tanpa risiko kain mengilap atau gosong + parfum pilihan.',
      },
    ],

    // --- Marquee & Data Statis ---
    marqueeHighlights: [
      '1 Mesin 1 Pelanggan',
      'Timbangan Digital Akurat',
      'Setrika Uap Boiler Anti Gosong',
      'Pengeringan Penuh 100% Bebas Apek',
      'Express Kilat 6 Jam',
      'Air Tersaring UV Higienis',
    ],

    stats: PERMANA_CONFIG.stats.map((s) => ({ ...s })),
    statsAnimated: false,
    processSteps: PERMANA_CONFIG.processSteps,

    // --- Services & Filter ---
    categories: PERMANA_CONFIG.categories,
    services: PERMANA_CONFIG.services,
    activeCategory: 'kiloan',
    serviceSearch: '',

    // --- Kalkulator Estimasi Harga ---
    selectedServiceId: PERMANA_CONFIG.services[0].id,
    inputQty: 3,
    cart: [],
    calculatorFeedback: '',
    feedbackTimer: null,
    pricePulse: false,
    parfumOptions: PERMANA_CONFIG.parfumOptions,
    selectedParfum: PERMANA_CONFIG.parfumOptions[0],
    orderNote: '',
    quickBundles: PERMANA_CONFIG.quickBundles,

    // --- Testimoni, FAQ & Kontak ---
    testimonials: PERMANA_CONFIG.testimonials,
    faqs: PERMANA_CONFIG.faqs,
    openFaqIndex: 0,
    contact: PERMANA_CONFIG.contact,

    // --- Lifecycle Init ---
    init() {
      // Pantau scroll untuk progress bar, tombol back-to-top, & active section
      const handleScroll = () => {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight =
          document.documentElement.scrollHeight - document.documentElement.clientHeight;
        this.scrollProgress = docHeight > 0 ? Math.min(100, Math.round((scrollTop / docHeight) * 100)) : 0;
        this.showBackToTop = scrollTop > 450;

        const sectionIds = ['home', 'about', 'services', 'check-price', 'testimoni', 'contact'];
        for (let i = sectionIds.length - 1; i >= 0; i--) {
          const el = document.getElementById(sectionIds[i]);
          if (el && scrollTop >= el.offsetTop - 160) {
            this.activeSection = sectionIds[i];
            break;
          }
        }
      };

      window.addEventListener('scroll', handleScroll, { passive: true });
      handleScroll();

      // Sesuaikan default inputQty saat mengganti layanan kg <-> pcs
      this.$watch('selectedServiceId', () => {
        const srv = this.selectedService;
        if (srv) {
          this.inputQty = srv.unit === 'pcs' ? 1 : 3;
        }
      });

      // Animasi counter statistik saat terlihat di layar
      if (this.$refs.statsContainer) {
        const statsObserver = new IntersectionObserver(
          (entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting && !this.statsAnimated) {
                this.statsAnimated = true;
                this.animateStats();
                statsObserver.disconnect();
              }
            });
          },
          { threshold: 0.3 }
        );
        statsObserver.observe(this.$refs.statsContainer);
      }
    },

    // --- Computed Getters ---
    get currentMachineMode() {
      return (
        this.heroMachineModes.find((m) => m.id === this.activeMachineMode) ||
        this.heroMachineModes[0]
      );
    },

    get filteredServices() {
      const keyword = this.serviceSearch.trim().toLowerCase();
      if (keyword !== '') {
        return this.services.filter(
          (s) =>
            s.name.toLowerCase().includes(keyword) ||
            s.description.toLowerCase().includes(keyword) ||
            s.duration.toLowerCase().includes(keyword)
        );
      }
      return this.services.filter((s) => s.categoryId === this.activeCategory);
    },

    get selectedService() {
      return (
        this.services.find((s) => s.id === this.selectedServiceId) || this.services[0]
      );
    },

    get dynamicQtyLabel() {
      return this.selectedService && this.selectedService.unit === 'pcs'
        ? 'Jumlah Item (pcs)'
        : 'Estimasi Berat (kg)';
    },

    get totalEstimate() {
      return this.cart.reduce((sum, item) => sum + item.price * item.qty, 0);
    },

    get whatsappDirectUrl() {
      const message = `Halo ${this.contact.businessName}, saya ingin bertanya mengenai layanan laundry di outlet.`;
      return `https://wa.me/${this.contact.whatsappNumber}?text=${encodeURIComponent(message)}`;
    },

    get whatsappCheckoutUrl() {
      if (this.cart.length === 0) return '#check-price';

      const itemLines = this.cart
        .map(
          (item, idx) =>
            `${idx + 1}. ${item.name} (${item.qty} ${item.unit} × ${this.formatRupiah(
              item.price
            )}) = ${this.formatRupiah(item.price * item.qty)}`
        )
        .join('\n');

      const noteLine = this.orderNote.trim()
        ? `\nCatatan Khusus: ${this.orderNote.trim()}`
        : '';

      const message = [
        `Halo *${this.contact.businessName}*, saya ingin konfirmasi estimasi pesanan laundry:`,
        '',
        '*Rincian Layanan:*',
        itemLines,
        '',
        `Aroma Parfum: ${this.selectedParfum}`,
        `Metode: ${this.contact.serviceModeLabel}${noteLine}`,
        `*Total Estimasi: ${this.formatRupiah(this.totalEstimate)}*`,
        '',
        'Saya akan segera mengantar cucian ke outlet. Terima kasih!',
      ].join('\n');

      return `https://wa.me/${this.contact.whatsappNumber}?text=${encodeURIComponent(message)}`;
    },

    // --- Methods ---
    toggleDarkMode() {
      this.darkMode = !this.darkMode;
      document.documentElement.classList.toggle('dark', this.darkMode);
      localStorage.setItem('permana_laundry_theme', this.darkMode ? 'dark' : 'light');
    },

    scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },

    servicesByCategory(catId) {
      return this.services.filter((s) => s.categoryId === catId);
    },

    formatRupiah(value) {
      return 'Rp ' + Math.round(value).toLocaleString('id-ID');
    },

    selectServiceForCalculator(serviceId) {
      this.selectedServiceId = serviceId;
      const section = document.getElementById('check-price');
      if (section) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    },

    addToCart() {
      const service = this.selectedService;
      const qty = parseFloat(this.inputQty);
      if (!service || isNaN(qty) || qty <= 0) return;

      const existing = this.cart.find((item) => item.id === service.id);
      if (existing) {
        existing.qty = Math.round((existing.qty + qty) * 10) / 10;
      } else {
        this.cart.push({
          id: service.id,
          name: service.name,
          price: service.price,
          unit: service.unit,
          qty: Math.round(qty * 10) / 10,
        });
      }

      this.triggerPricePulse();
      this.showFeedback(`✓ "${service.name}" (${qty} ${service.unit}) ditambahkan ke estimasi.`);
    },

    incrementItem(id) {
      const item = this.cart.find((i) => i.id === id);
      if (!item) return;
      const step = item.unit === 'pcs' ? 1 : 0.5;
      item.qty = Math.round((item.qty + step) * 10) / 10;
      this.triggerPricePulse();
    },

    decrementItem(id) {
      const item = this.cart.find((i) => i.id === id);
      if (!item) return;
      const step = item.unit === 'pcs' ? 1 : 0.5;
      const nextQty = Math.round((item.qty - step) * 10) / 10;
      if (nextQty <= 0) {
        this.removeFromCart(id);
      } else {
        item.qty = nextQty;
        this.triggerPricePulse();
      }
    },

    removeFromCart(id) {
      this.cart = this.cart.filter((i) => i.id !== id);
      this.triggerPricePulse();
    },

    clearCart() {
      this.cart = [];
      this.calculatorFeedback = '';
    },

    applyQuickBundle(bundle) {
      const newCart = [];
      bundle.items.forEach((bItem) => {
        const srv = this.services.find((s) => s.id === bItem.serviceId);
        if (srv) {
          newCart.push({
            id: srv.id,
            name: srv.name,
            price: srv.price,
            unit: srv.unit,
            qty: bItem.qty,
          });
        }
      });
      this.cart = newCart;
      this.triggerPricePulse();
      this.showFeedback(`✓ Simulasi "${bundle.label}" diterapkan.`);
    },

    triggerPricePulse() {
      this.pricePulse = true;
      setTimeout(() => {
        this.pricePulse = false;
      }, 320);
    },

    showFeedback(text) {
      this.calculatorFeedback = text;
      if (this.feedbackTimer) clearTimeout(this.feedbackTimer);
      this.feedbackTimer = setTimeout(() => {
        this.calculatorFeedback = '';
      }, 3200);
    },

    animateStats() {
      const duration = 1400;
      const startTime = performance.now();

      const step = (now) => {
        const elapsed = now - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);

        this.stats.forEach((stat) => {
          const isDecimal = !Number.isInteger(stat.target);
          const val = stat.target * eased;
          stat.current = isDecimal ? val.toFixed(1) : Math.round(val);
        });

        if (progress < 1) {
          requestAnimationFrame(step);
        }
      };

      requestAnimationFrame(step);
    },

    observeReveal(el, delay = 0) {
      if (!el) return;
      el.style.transitionDelay = `${delay}ms`;

      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              el.classList.add('is-visible');
              observer.unobserve(el);
            }
          });
        },
        { threshold: 0.12 }
      );

      observer.observe(el);
    },

    handleSpotlight(event) {
      const card = event.currentTarget;
      const rect = card.getBoundingClientRect();
      const x = event.clientX - rect.left;
      const y = event.clientY - rect.top;
      card.style.setProperty('--mouse-x', `${x}px`);
      card.style.setProperty('--mouse-y', `${y}px`);
    },
  };
}