<footer class="bg-[#102A43] text-slate-300 mt-auto">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-10">
    <div class="grid md:grid-cols-2 lg:grid-cols-12 gap-10 pb-10 border-b border-white/15">
      <div class="lg:col-span-4 space-y-3">
        <a href="index.php" class="inline-flex items-center gap-3">
          <img
            src="assets/images/logo-perumda.png"
            alt="Logo Perumda Air Minum Tirta Sukapura"
            class="h-10 w-auto object-contain bg-white rounded-sm p-1"
            onerror="this.style.display='none'"
          />
          <div>
            <div class="font-display font-bold text-white text-base">
              <?= e($officeInfo['name']) ?>
            </div>
            <div class="text-xs text-slate-300">
              BUMD Pemerintah <?= e($officeInfo['region']) ?>
            </div>
          </div>
        </a>
        <p class="text-sm text-slate-300 leading-relaxed pt-1">
          Pengelola layanan air minum di Kabupaten dan Kota Tasikmalaya sejak 1925 dengan 17 kantor cabang dan unit pelayanan.
        </p>
      </div>

      <div class="lg:col-span-2 space-y-2.5 text-sm">
        <h3 class="font-display font-bold text-white text-sm">Informasi</h3>
        <ul class="space-y-2">
          <li><a href="profil.php" class="text-slate-300 hover:text-white">Profil &amp; Struktur</a></li>
          <li><a href="air-minum.php" class="text-slate-300 hover:text-white">Air Minum &amp; Distribusi</a></li>
          <li><a href="layanan.php" class="text-slate-300 hover:text-white">Prosedur Pelanggan</a></li>
          <li><a href="tarif.php" class="text-slate-300 hover:text-white">Tarif Air 2025</a></li>
          <li><a href="berita.php" class="text-slate-300 hover:text-white">Berita &amp; Panduan</a></li>
          <li><a href="galeri.php" class="text-slate-300 hover:text-white">Galeri Foto</a></li>
        </ul>
      </div>

      <div class="lg:col-span-3 space-y-2.5 text-sm">
        <h3 class="font-display font-bold text-white text-sm">Portal Layanan</h3>
        <ul class="space-y-2">
          <li><a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-300 hover:text-white">Cek Tagihan Air</a></li>
          <li><a href="<?= e($officeInfo['simpel_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-300 hover:text-white">Pendaftaran SIMPEL</a></li>
          <li><a href="<?= e($officeInfo['complaint_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-300 hover:text-white">Pengaduan Online</a></li>
          <li><a href="<?= e($officeInfo['simpadu_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-300 hover:text-white">Launcher SIMPADU</a></li>
          <li><a href="<?= e($officeInfo['gis_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-300 hover:text-white">GIS Jaringan Pipa</a></li>
        </ul>
      </div>

      <div class="lg:col-span-3 space-y-2.5 text-sm">
        <h3 class="font-display font-bold text-white text-sm">Kantor Pusat</h3>
        <p class="text-slate-300 leading-relaxed">
          <?= e($officeInfo['address']) ?>
        </p>
        <div class="pt-1 space-y-1 tabular-nums">
          <div>
            <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="text-white font-bold hover:text-sky-300">
              <?= e($officeInfo['phone']) ?>
            </a>
          </div>
          <div class="text-xs text-slate-400">Telp. <?= e($officeInfo['office_phone']) ?></div>
          <div>
            <a href="mailto:<?= e($officeInfo['email']) ?>" class="text-xs text-sky-300 hover:text-white">
              <?= e($officeInfo['email']) ?>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400">
      <p>© <?= date('Y') ?> <?= e($officeInfo['name']) ?>. Hak cipta dilindungi.</p>
      <div class="flex items-center gap-4">
        <a href="sitemap.xml.php" class="hover:text-white">Sitemap</a>
        <a href="llms.txt" class="hover:text-white">llms.txt</a>
        <a href="kontak.php" class="hover:text-white">Kontak</a>
        <a href="admin/login.php" class="hover:text-white">Admin</a>
      </div>
    </div>
  </div>
</footer>

<!-- Global Lightbox Modal for Official Infographics & Gallery Photos -->
<div id="lightbox-modal" class="hidden fixed inset-0 z-50 bg-slate-950/85 flex items-center justify-center p-4">
  <div class="relative max-w-5xl w-full flex flex-col items-center">
    <button type="button" id="lightbox-close" class="self-end mb-2 px-3 py-1.5 rounded-md bg-white text-[#102A43] text-xs font-bold cursor-pointer">
      Tutup (ESC)
    </button>
    <img id="lightbox-img" src="" alt="" class="max-h-[82vh] w-auto object-contain rounded-md bg-white" />
    <p id="lightbox-caption" class="mt-3 text-sm text-slate-200 text-center max-w-2xl"></p>
  </div>
</div>

<script src="assets/js/app.js"></script>
</body>
</html>
