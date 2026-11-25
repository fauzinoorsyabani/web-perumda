document.addEventListener('DOMContentLoaded', () => {
  // Initialize Lucide icons
  if (window.lucide) {
    window.lucide.createIcons();
  }

  // 1. Mobile Navigation Toggle
  const mobileBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const iconOpen = document.getElementById('menu-icon-open');
  const iconClose = document.getElementById('menu-icon-close');

  if (mobileBtn && mobileMenu) {
    const closeMenu = () => {
      mobileMenu.classList.add('hidden');
      iconOpen?.classList.remove('hidden');
      iconClose?.classList.add('hidden');
    };

    mobileBtn.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.toggle('hidden');
      iconOpen?.classList.toggle('hidden', !isHidden);
      iconClose?.classList.toggle('hidden', isHidden);
    });

    mobileMenu.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', closeMenu);
    });
  }

  // 2. Interactive Water Bill Calculator
  const tariffButtons = document.querySelectorAll('[data-tariff-btn]');
  const cubicRange = document.getElementById('cubic-range');
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

  let activeTariff = {
    rate1: 2800,
    rate2: 3800,
    rate3: 5200,
    admin: 10000,
  };

  const updateCalculator = () => {
    if (!cubicRange) return;
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
    if (tier1Label) tier1Label.textContent = `Blok I (0–10 m³: ${t1} m³)`;
    if (tier1Cost) tier1Cost.textContent = formatRupiah(c1);
    if (tier2Label) tier2Label.textContent = `Blok II (11–20 m³: ${t2} m³)`;
    if (tier2Cost) tier2Cost.textContent = formatRupiah(c2);
    if (tier3Label) tier3Label.textContent = `Blok III (>20 m³: ${t3} m³)`;
    if (tier3Cost) tier3Cost.textContent = formatRupiah(c3);
    if (adminCost) adminCost.textContent = formatRupiah(activeTariff.admin);
  };

  tariffButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      tariffButtons.forEach((b) => {
        b.classList.remove('bg-sky-500/20', 'border-sky-400', 'text-white', 'shadow-sm');
        b.classList.add('bg-white/5', 'border-white/10', 'text-slate-300');
      });
      btn.classList.add('bg-sky-500/20', 'border-sky-400', 'text-white', 'shadow-sm');
      btn.classList.remove('bg-white/5', 'border-white/10', 'text-slate-300');

      activeTariff = {
        rate1: Number(btn.dataset.rate1),
        rate2: Number(btn.dataset.rate2),
        rate3: Number(btn.dataset.rate3),
        admin: Number(btn.dataset.admin),
      };
      updateCalculator();
    });
  });

  cubicRange?.addEventListener('input', updateCalculator);
  updateCalculator();

  // 3. Profile & Water System Tabs
  const tabButtons = document.querySelectorAll('[data-tab-target]');
  const tabPanels = document.querySelectorAll('[data-tab-panel]');

  tabButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.tabTarget;
      tabButtons.forEach((b) => {
        const active = b.dataset.tabTarget === target;
        b.classList.toggle('bg-white', active);
        b.classList.toggle('text-sky-700', active);
        b.classList.toggle('shadow-sm', active);
        b.classList.toggle('text-slate-600', !active);
      });
      tabPanels.forEach((panel) => {
        panel.classList.toggle('hidden', panel.dataset.tabPanel !== target);
      });
    });
  });

  // 4. News Category Filter
  const filterBtns = document.querySelectorAll('[data-news-filter]');
  const newsCards = document.querySelectorAll('[data-news-card]');

  filterBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      const cat = btn.dataset.newsFilter;
      filterBtns.forEach((b) => {
        const active = b.dataset.newsFilter === cat;
        b.classList.toggle('bg-sky-600', active);
        b.classList.toggle('text-white', active);
        b.classList.toggle('shadow-sm', active);
        b.classList.toggle('bg-white', !active);
        b.classList.toggle('text-slate-600', !active);
        b.classList.toggle('border', !active);
        b.classList.toggle('border-slate-200', !active);
      });
      newsCards.forEach((card) => {
        const match = cat === 'Semua' || card.dataset.category === cat;
        card.classList.toggle('hidden', !match);
      });
    });
  });

  // 5. News Reader Modal
  const modal = document.getElementById('news-modal');
  const modalImg = document.getElementById('news-modal-img');
  const modalCat = document.getElementById('news-modal-category');
  const modalTitle = document.getElementById('news-modal-title');
  const modalBody = document.getElementById('news-modal-body');
  const modalLink = document.getElementById('news-modal-link');
  const closeModalBtns = document.querySelectorAll('[data-close-modal]');

  const closeModal = () => {
    modal?.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  };

  newsCards.forEach((card) => {
    card.addEventListener('click', () => {
      if (!modal) return;
      const data = JSON.parse(card.dataset.newsJson || '{}');
      if (modalImg) {
        modalImg.src = data.image || '';
        modalImg.alt = data.title || '';
        modalImg.style.display = 'block';
      }
      if (modalCat) modalCat.textContent = data.category || '';
      if (modalTitle) modalTitle.textContent = data.title || '';
      if (modalLink) modalLink.href = data.href || '#';
      if (modalBody) {
        modalBody.innerHTML = '';
        (data.content || []).forEach((paragraph) => {
          const p = document.createElement('p');
          p.textContent = paragraph;
          modalBody.appendChild(p);
        });
      }
      modal.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    });
  });

  closeModalBtns.forEach((btn) => btn.addEventListener('click', closeModal));
  modal?.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });
});
