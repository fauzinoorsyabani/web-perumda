document.addEventListener('DOMContentLoaded', () => {
  if (window.lucide) {
    window.lucide.createIcons();
  }

  // 1. Sticky Header Elevation
  const siteHeader = document.getElementById('site-header');
  if (siteHeader) {
    const onScroll = () => siteHeader.classList.toggle('is-scrolled', window.scrollY > 12);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // 2. Mobile Navigation Drawer
  const mobileBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const iconOpen = document.getElementById('menu-icon-open');
  const iconClose = document.getElementById('menu-icon-close');

  if (mobileBtn && mobileMenu) {
    mobileBtn.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.toggle('hidden');
      mobileBtn.setAttribute('aria-expanded', String(!isHidden));
      iconOpen?.classList.toggle('hidden', !isHidden);
      iconClose?.classList.toggle('hidden', isHidden);
    });
  }

  // 3. Subtle Editorial Scroll Reveals
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length > 0 && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: '0px 0px -24px 0px' }
    );
    revealEls.forEach((el) => observer.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add('is-visible'));
  }

  // 4. FAQ Accordion
  document.querySelectorAll('[data-faq-toggle]').forEach((btn) => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      if (!item) return;
      const isOpen = item.getAttribute('data-open') === 'true';
      item.setAttribute('data-open', isOpen ? 'false' : 'true');
    });
  });

  // 5. Tariff Simulator (layanan.php)
  const tariffButtons = document.querySelectorAll('[data-tariff-btn]');
  const cubicRange = document.getElementById('cubic-range');
  if (cubicRange) {
    const cubicDisplay = document.getElementById('cubic-display');
    const totalDisplay = document.getElementById('calc-total');
    const tier1Label = document.getElementById('calc-tier1-label');
    const tier1Cost = document.getElementById('calc-tier1-cost');
    const tier2Label = document.getElementById('calc-tier2-label');
    const tier2Cost = document.getElementById('calc-tier2-cost');
    const tier3Label = document.getElementById('calc-tier3-label');
    const tier3Cost = document.getElementById('calc-tier3-cost');
    const adminCost = document.getElementById('calc-admin-cost');

    const formatRupiah = (amount) =>
      new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0,
      }).format(amount);

    let activeTariff = { rate1: 2800, rate2: 3800, rate3: 5200, admin: 10000 };

    const updateCalc = () => {
      const m3 = Number(cubicRange.value);
      const t1 = Math.min(m3, 10);
      const t2 = Math.min(Math.max(m3 - 10, 0), 10);
      const t3 = Math.max(m3 - 20, 0);

      const c1 = t1 * activeTariff.rate1;
      const c2 = t2 * activeTariff.rate2;
      const c3 = t3 * activeTariff.rate3;
      const total = c1 + c2 + c3 + activeTariff.admin;

      if (cubicDisplay) cubicDisplay.textContent = `${m3} m³`;
      if (totalDisplay) totalDisplay.textContent = formatRupiah(total);
      if (tier1Label) tier1Label.textContent = `Blok I (0-10 m³: ${t1} m³)`;
      if (tier1Cost) tier1Cost.textContent = formatRupiah(c1);
      if (tier2Label) tier2Label.textContent = `Blok II (11-20 m³: ${t2} m³)`;
      if (tier2Cost) tier2Cost.textContent = formatRupiah(c2);
      if (tier3Label) tier3Label.textContent = `Blok III (>20 m³: ${t3} m³)`;
      if (tier3Cost) tier3Cost.textContent = formatRupiah(c3);
      if (adminCost) adminCost.textContent = formatRupiah(activeTariff.admin);
    };

    tariffButtons.forEach((btn) => {
      btn.addEventListener('click', () => {
        tariffButtons.forEach((b) => {
          b.classList.remove('bg-[#102A43]', 'text-white');
          b.classList.add('bg-[#F7F7F5]', 'text-[#1C242B]', 'border', 'border-[#DCE1E5]');
        });
        btn.classList.add('bg-[#102A43]', 'text-white');
        btn.classList.remove('bg-[#F7F7F5]', 'text-[#1C242B]', 'border', 'border-[#DCE1E5]');
        activeTariff = {
          rate1: Number(btn.dataset.rate1),
          rate2: Number(btn.dataset.rate2),
          rate3: Number(btn.dataset.rate3),
          admin: Number(btn.dataset.admin),
        };
        updateCalc();
      });
    });

    cubicRange.addEventListener('input', updateCalc);
    updateCalc();
  }

  // 6. News Filter & Search (berita.php)
  const filterBtns = document.querySelectorAll('[data-news-filter]');
  const newsCards = document.querySelectorAll('[data-news-card]');
  const newsSearch = document.getElementById('news-search');
  const newsCount = document.getElementById('news-count');
  const newsEmpty = document.getElementById('news-empty');

  if (newsCards.length > 0) {
    let activeCategory = 'Semua';

    const applyNewsFilter = () => {
      const q = (newsSearch?.value || '').trim().toLowerCase();
      let visible = 0;

      newsCards.forEach((card) => {
        const matchCat = activeCategory === 'Semua' || card.dataset.category === activeCategory;
        const matchQuery = q === '' || (card.dataset.search || '').includes(q);
        const show = matchCat && matchQuery;
        card.classList.toggle('hidden', !show);
        if (show) visible++;
      });

      if (newsCount) newsCount.textContent = `Menampilkan ${visible} tulisan`;
      if (newsEmpty) newsEmpty.classList.toggle('hidden', visible > 0);
    };

    filterBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        activeCategory = btn.dataset.newsFilter || 'Semua';
        filterBtns.forEach((b) => {
          const active = b.dataset.newsFilter === activeCategory;
          b.classList.toggle('bg-[#102A43]', active);
          b.classList.toggle('text-white', active);
          b.classList.toggle('bg-white', !active);
          b.classList.toggle('text-[#52606D]', !active);
          b.classList.toggle('border', !active);
          b.classList.toggle('border-[#DCE1E5]', !active);
        });
        applyNewsFilter();
      });
    });

    newsSearch?.addEventListener('input', applyNewsFilter);
    applyNewsFilter();
  }

  // 7. Branch Filter (kontak.php)
  const branchBtns = document.querySelectorAll('[data-branch-filter]');
  const branchCards = document.querySelectorAll('[data-branch-card]');

  if (branchBtns.length > 0) {
    branchBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const area = btn.dataset.branchFilter || 'Semua';
        branchBtns.forEach((b) => {
          const active = b.dataset.branchFilter === area;
          b.classList.toggle('bg-[#102A43]', active);
          b.classList.toggle('text-white', active);
          b.classList.toggle('bg-[#F7F7F5]', !active);
          b.classList.toggle('text-[#52606D]', !active);
          b.classList.toggle('border', !active);
          b.classList.toggle('border-[#DCE1E5]', !active);
        });
        branchCards.forEach((card) => {
          const match = area === 'Semua' || card.dataset.area === area;
          card.classList.toggle('hidden', !match);
        });
      });
    });
  }

  // 8. Contact Form -> WhatsApp (kontak.php)
  const contactForm = document.getElementById('contact-form');
  const contactFeedback = document.getElementById('contact-feedback');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const waPhone = contactForm.dataset.waPhone || '6282129102345';
      const name = document.getElementById('cf-name')?.value.trim() || '';
      const nosam = document.getElementById('cf-nosam')?.value.trim() || '-';
      const topic = document.getElementById('cf-topic')?.value || '';
      const area = document.getElementById('cf-area')?.value.trim() || '';
      const message = document.getElementById('cf-message')?.value.trim() || '';

      const text =
        `Halo Perumda Air Minum Tirta Sukapura,%0A%0A` +
        `Nama: ${encodeURIComponent(name)}%0A` +
        `No. Sambungan: ${encodeURIComponent(nosam)}%0A` +
        `Keperluan: ${encodeURIComponent(topic)}%0A` +
        `Wilayah: ${encodeURIComponent(area)}%0A%0A` +
        `Pesan:%0A${encodeURIComponent(message)}`;

      if (contactFeedback) {
        contactFeedback.textContent = 'Pesan siap. Membuka WhatsApp Call Center Tirta Sukapura...';
        contactFeedback.classList.remove('hidden');
      }

      window.open(`https://wa.me/${waPhone}?text=${text}`, '_blank', 'noopener,noreferrer');
    });
  }

  // 9. Copy Article Link (berita-detail.php)
  const copyBtn = document.getElementById('copy-link-btn');
  if (copyBtn) {
    copyBtn.addEventListener('click', async () => {
      try {
        await navigator.clipboard.writeText(window.location.href);
        const span = copyBtn.querySelector('span');
        if (span) {
          const prev = span.textContent;
          span.textContent = 'Tautan tersalin';
          setTimeout(() => {
            span.textContent = prev;
          }, 2200);
        }
      } catch {
        // Ignore clipboard denial
      }
    });
  }
});
