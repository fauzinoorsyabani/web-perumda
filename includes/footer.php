<!-- Footer -->
<footer class="bg-[#06182B] text-slate-300 mt-auto">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10">
    <div class="grid md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-white/10">
      <!-- Brand Identity -->
      <div class="lg:col-span-4 space-y-4">
        <a href="index.php" class="inline-flex items-center gap-3">
          <img
            src="assets/images/logo-perumda.png"
            alt="Logo Perumda Tirta Sukapura"
            class="h-11 w-auto object-contain bg-white rounded-lg p-1.5"
            onerror="this.style.display='none'"
          />
          <div>
            <div class="font-display font-extrabold text-white text-base">
              <?= e($officeInfo['name']) ?>
            </div>
            <div class="text-xs text-sky-300 font-medium">
              BUMD Pemerintah <?= e($officeInfo['region']) ?>
            </div>
          </div>
        </a>
        <p class="text-sm text-slate-400 leading-relaxed">
          Melayani kebutuhan air minum bersih yang <strong>aman, kontinu, dan transparan</strong>
          bagi masyarakat Kabupaten &amp; Kota Tasikmalaya sejak 1925.
        </p>
      </div>

      <!-- Navigasi -->
      <div class="lg:col-span-2 space-y-3 text-sm">
        <h3 class="font-display font-bold text-white text-xs uppercase tracking-wider">Halaman</h3>
        <ul class="space-y-2.5">
          <?php foreach ($navLinks as $item): ?>
            <li>
              <a href="<?= e($item['href']) ?>" class="text-slate-400 hover:text-white transition-colors">
                <?= e($item['label']) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Portal Digital -->
      <div class="lg:col-span-3 space-y-3 text-sm">
        <h3 class="font-display font-bold text-white text-xs uppercase tracking-wider">Portal Digital</h3>
        <ul class="space-y-2.5">
          <li><a href="<?= e($officeInfo['bill_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white transition-colors">Cek Tagihan Air</a></li>
          <li><a href="<?= e($officeInfo['simpel_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white transition-colors">Daftar Baru (SIMPEL)</a></li>
          <li><a href="<?= e($officeInfo['complaint_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white transition-colors">Pengaduan Online</a></li>
          <li><a href="<?= e($officeInfo['simpadu_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white transition-colors">Launcher SIMPADU</a></li>
          <li><a href="<?= e($officeInfo['gis_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-white transition-colors">GIS Jaringan Pipa</a></li>
        </ul>
      </div>

      <!-- Kontak Kantor Pusat -->
      <div class="lg:col-span-3 space-y-3 text-sm">
        <h3 class="font-display font-bold text-white text-xs uppercase tracking-wider">Kantor Pusat</h3>
        <p class="text-slate-400 leading-relaxed">
          <?= e($officeInfo['address']) ?>
        </p>
        <div class="space-y-1.5 pt-1">
          <div>
            <a href="tel:<?= e($officeInfo['phone_clean']) ?>" class="text-white font-bold hover:text-sky-300 transition-colors">
              <?= e($officeInfo['phone']) ?>
            </a>
            <span class="text-xs text-slate-400 ml-1">(Call Center)</span>
          </div>
          <div class="text-slate-400 text-xs">Telp. <?= e($officeInfo['office_phone']) ?></div>
          <div>
            <a href="mailto:<?= e($officeInfo['email']) ?>" class="text-sky-300 hover:text-white text-xs transition-colors">
              <?= e($officeInfo['email']) ?>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400">
      <p>© <?= date('Y') ?> <strong><?= e($officeInfo['name']) ?></strong>. Hak cipta dilindungi.</p>
      <div class="flex items-center gap-4">
        <a href="sitemap.xml.php" class="hover:text-white transition-colors">Sitemap</a>
        <a href="llms.txt" class="hover:text-white transition-colors">AI Info (llms.txt)</a>
        <a href="kontak.php" class="hover:text-white transition-colors">Bantuan</a>
      </div>
    </div>
  </div>
</footer>

<script src="assets/js/app.js"></script>
</body>
</html>
