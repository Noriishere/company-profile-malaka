<nav class="w-full py-4 bg-white relative">

    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">

        <a href="index.html" class="flex items-center gap-3 text-gray-800 font-semibold">
            <img src="<?= BASE_URL ?>assets/logo_malaka.png" alt="Logo MALAKA" class="w-12 h-12">
            <span>MALAKA | UBP KARAWANG</span>
        </a>

        <ul class="hidden lg:flex items-center gap-8 font-medium">

            <li><a href="index.html" class="nav-link">Beranda</a></li>
            <li><a href="#tentang-kami" class="nav-link">Tentang Kami</a></li>

            <!-- DROPDOWN DIVISI -->
            <li class="relative">
                <button
                    class="nav-link flex items-center gap-1 dropdown-toggle"
                    data-dropdown="divisi"
                    aria-expanded="false">
                    Divisi
                    <span class="text-xs">▼</span>
                </button>

                <ul class="dropdown-menu hidden absolute mt-2 w-56 bg-white rounded-lg shadow-lg py-2 z-50">
                    <li><a href="BPH.html" class="dropdown-item">Badan Pengurus Harian</a></li>
                    <li><a href="Jarkom.html" class="dropdown-item">Jaringan & Komunikasi</a></li>
                    <li><a href="Disiplin.html" class="dropdown-item">Disiplin</a></li>
                    <li><a href="Penjaminan-Mutu.html" class="dropdown-item">Penjaminan Mutu</a></li>
                    <li><a href="Pencegahan.html" class="dropdown-item">Pencegahan</a></li>
                    <li><a href="Perencanaan.html" class="dropdown-item">Perencanaan</a></li>
                    <li><a href="psda.html" class="dropdown-item">PSDA</a></li>
                </ul>
            </li>

            <li><a href="#footer" class="nav-link">Kontak</a></li>

            <li>
                <a href="https://malakaubpkarawang.my.id/Galeri-Kegiatan/foto.php" class="nav-link">
                    Galeri
                </a>
            </li>

            <li><a href="saran/contact_form.php" class="nav-link">Saran</a></li>

            <!-- DROPDOWN WEBSITE -->
            <li class="relative">
                <button
                    class="nav-link flex items-center gap-1 dropdown-toggle"
                    data-dropdown="website"
                    aria-expanded="false">
                    Website Kami
                    <span class="text-xs">▼</span>
                </button>

                <ul class="dropdown-menu hidden absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                    <li><a href="uangkas/index.php" class="dropdown-item">Uangkas MALAKA</a></li>
                    <li><a href="absen/index.php" class="dropdown-item">Absensi MALAKA</a></li>
                </ul>
            </li>

        </ul>

        <!-- MOBILE BUTTON -->
        <button id="mobile-toggle"
                aria-label="Toggle menu"
                class="lg:hidden text-2xl text-gray-800">
            ☰
        </button>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-md">
        <ul class="flex flex-col px-6 py-4 space-y-3 font-medium">
            <li><a href="index.html" class="nav-link">Beranda</a></li>
            <li><a href="#tentang-kami" class="nav-link">Tentang Kami</a></li>
            <li><a href="BPH.html" class="nav-link">BPH</a></li>
            <li><a href="Jarkom.html" class="nav-link">Jarkom</a></li>
            <li><a href="Disiplin.html" class="nav-link">Disiplin</a></li>
            <li><a href="Penjaminan-Mutu.html" class="nav-link">Penjaminan Mutu</a></li>
            <li><a href="Pencegahan.html" class="nav-link">Pencegahan</a></li>
            <li><a href="Perencanaan.html" class="nav-link">Perencanaan</a></li>
            <li><a href="psda.html" class="nav-link">PSDA</a></li>
            <li><a href="#footer" class="nav-link">Kontak</a></li>
            <li><a href="https://malakaubpkarawang.my.id/Galeri-Kegiatan/foto.php" class="nav-link">Galeri</a></li>
            <li><a href="saran/contact_form.php" class="nav-link">Saran</a></li>
            <li><a href="uangkas/index.php" class="nav-link">Uangkas MALAKA</a></li>
            <li><a href="absen/index.php" class="nav-link">Absensi MALAKA</a></li>
        </ul>
    </div>
</nav>
<script src="<?= BASE_URL ?>js/navbar.js"></script>