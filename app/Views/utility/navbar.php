<nav x-data="{ 
        mobileOpen: false,
        dropdown: null 
    }"
    class="w-full py-4 bg-white">

    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">

        <a href="index.html" class="flex items-center gap-3 text-gray-800 font-semibold">
            <img src="assets/logo_malaka.png" alt="Logo MALAKA" class="w-12 h-12">
            <span>MALAKA | UBP KARAWANG</span>
        </a>

        <ul class="hidden lg:flex items-center gap-8 font-medium">

            <li><a href="index.html" class="nav-link">Beranda</a></li>

            <li><a href="#tentang-kami" class="nav-link">Tentang Kami</a></li>

            <li class="relative">
                <button
                    @click="dropdown === 'divisi' ? dropdown = null : dropdown = 'divisi'"
                    @keydown.escape.window="dropdown = null"
                    :aria-expanded="dropdown === 'divisi'"
                    class="nav-link flex items-center gap-1">
                    Divisi
                </button>

                <ul x-show="dropdown === 'divisi'"
                    x-transition
                    @click.outside="dropdown = null"
                    class="absolute mt-2 w-56 bg-white rounded-lg shadow-lg py-2 z-50">
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
                <a href="https://malakaubpkarawang.my.id/Galeri-Kegiatan/foto.php"
                   class="nav-link">
                    Galeri
                </a>
            </li>

            <li><a href="saran/contact_form.php" class="nav-link">Saran</a></li>

            <li class="relative">
                <button
                    @click="dropdown === 'website' ? dropdown = null : dropdown = 'website'"
                    @keydown.escape.window="dropdown = null"
                    :aria-expanded="dropdown === 'website'"
                    class="nav-link flex items-center gap-1">
                    Website Kami
                </button>

                <ul x-show="dropdown === 'website'"
                    x-transition
                    @click.outside="dropdown = null"
                    class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                    <li><a href="uangkas/index.php" class="dropdown-item">Uangkas MALAKA</a></li>
                    <li><a href="absen/index.php" class="dropdown-item">Absensi MALAKA</a></li>
                </ul>
            </li>

        </ul>

        <button @click="mobileOpen = !mobileOpen"
                aria-label="Toggle menu"
                class="lg:hidden text-2xl text-gray-800">
            ☰
        </button>
    </div>

    <div x-show="mobileOpen" x-transition class="lg:hidden bg-white shadow-md">
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
            <li>
                <a href="https://malakaubpkarawang.my.id/Galeri-Kegiatan/foto.php"
                   class="nav-link">
                    Galeri
                </a>
            </li>
            <li><a href="saran/contact_form.php" class="nav-link">Saran</a></li>
            <li><a href="uangkas/index.php" class="nav-link">Uangkas MALAKA</a></li>
            <li><a href="absen/index.php" class="nav-link">Absensi MALAKA</a></li>
        </ul>
    </div>
</nav>