<section id="hero" class="bg-white" x-data="{ open: false }">

    <nav class="w-full py-4">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">

            <a href="index.html"
               class="flex items-center gap-3 no-underline text-gray-800
                      visited:text-gray-800 active:text-gray-800 focus:text-gray-800">
                <img src="assets/logo_malaka.png" alt="Logo MALAKA" class="w-12 h-12">
                <span class="font-semibold tracking-wide">
                    MALAKA | UBP KARAWANG
                </span>
            </a>

            <ul class="hidden lg:flex items-center gap-8 font-medium">
                <li>
                    <a href="index.html"
                       class="no-underline text-gray-800
                              visited:text-gray-800 active:text-gray-800 focus:text-gray-800
                              hover:text-gray-600 transition-colors">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="#tentang-kami"
                       class="no-underline text-gray-800
                              visited:text-gray-800 active:text-gray-800 focus:text-gray-800
                              hover:text-gray-600 transition-colors">
                        Tentang Kami
                    </a>
                </li>

                <li class="relative" x-data="{ d: false }">
                    <button @click="d = !d"
                            class="text-gray-800 hover:text-gray-600 transition-colors
                                   focus:outline-none focus:text-gray-800">
                        Divisi
                    </button>
                    <ul x-show="d" @click.outside="d = false" x-transition
                        class="absolute bg-white shadow-lg rounded-lg mt-2 w-56 py-2 z-50">
                        <li><a href="BPH.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Badan Pengurus Harian</a></li>
                        <li><a href="Jarkom.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Jaringan & Komunikasi</a></li>
                        <li><a href="Disiplin.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Disiplin</a></li>
                        <li><a href="Penjaminan-Mutu.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Penjaminan Mutu</a></li>
                        <li><a href="Pencegahan.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pencegahan</a></li>
                        <li><a href="Perencanaan.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Perencanaan</a></li>
                        <li><a href="psda.html" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">PSDA</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#footer"
                       class="no-underline text-gray-800
                              visited:text-gray-800 active:text-gray-800 focus:text-gray-800
                              hover:text-gray-600 transition-colors">
                        Kontak
                    </a>
                </li>

                <li>
                    <a href="https://malakaubpkarawang.my.id/Galeri-Kegiatan/foto.php"
                       class="no-underline text-gray-800
                              visited:text-gray-800 active:text-gray-800 focus:text-gray-800
                              hover:text-gray-600 transition-colors">
                        Galeri
                    </a>
                </li>

                <li>
                    <a href="saran/contact_form.php"
                       class="no-underline text-gray-800
                              visited:text-gray-800 active:text-gray-800 focus:text-gray-800
                              hover:text-gray-600 transition-colors">
                        Saran
                    </a>
                </li>

                <li class="relative" x-data="{ w: false }">
                    <button @click="w = !w"
                            class="text-gray-800 hover:text-gray-600 transition-colors
                                   focus:outline-none focus:text-gray-800">
                        Website Kami
                    </button>
                    <ul x-show="w" @click.outside="w = false" x-transition
                        class="absolute bg-white shadow-lg rounded-lg mt-2 w-48 py-2">
                        <li><a href="uangkas/index.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Uangkas MALAKA</a></li>
                        <li><a href="absen/index.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Absensi MALAKA</a></li>
                    </ul>
                </li>
            </ul>

            <button @click="open = !open"
                    class="lg:hidden text-2xl text-gray-800 focus:outline-none">
                ☰
            </button>
        </div>

        <div x-show="open" x-transition class="lg:hidden bg-white shadow-md">
            <ul class="flex flex-col px-6 py-4 space-y-3 font-medium">
                <li><a href="index.html" class="block text-gray-800">Beranda</a></li>
                <li><a href="#tentang-kami" class="block text-gray-800">Tentang Kami</a></li>
                <li><a href="BPH.html" class="block text-gray-800">BPH</a></li>
                <li><a href="Jarkom.html" class="block text-gray-800">Jarkom</a></li>
                <li><a href="Disiplin.html" class="block text-gray-800">Disiplin</a></li>
                <li><a href="#footer" class="block text-gray-800">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <div>
                <h3 class="text-lg uppercase tracking-widest text-gray-500">
                    Unit Kegiatan Mahasiswa
                </h3>

                <h1 class="text-4xl md:text-5xl font-bold mt-4 leading-tight">
                    Mahasiswa Melawan Narkotika
                </h1>

                <h3 class="text-lg mt-4 text-gray-600">
                    Universitas Buana Perjuangan Karawang
                </h3>

                <a href="https://youtu.be/HtChAde3gvs?si=JiSCS-Oz6djA2jSN"
                   target="_blank"
                   class="inline-block mt-8 px-8 py-3 bg-gray-800 text-white rounded-lg
                          visited:text-white active:text-white focus:text-white
                          hover:scale-105 transition">
                    Lihat Video
                </a>
            </div>

            <div class="flex justify-center">
                <img src="assets/hero/hero8.png"
                     alt="Hero MALAKA"
                     class="max-w-md w-full rounded-xl shadow-lg">
            </div>

        </div>
    </div>

</section>
