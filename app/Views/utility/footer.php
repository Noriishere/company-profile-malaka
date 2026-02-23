<footer class="w-full bg-gray-50 py-6 md:py-8 border-t border-gray-200 font-sans relative z-30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col space-y-4">
            <div class="flex flex-wrap gap-1 text-xs md:text-sm font-bold text-slate-900 tracking-wide">
                <a href="#tentang" class="hover:text-primary transition-colors">Tentang Kami</a>
                <span class="text-slate-400">/</span>
                <a href="kontak" class="hover:text-primary transition-colors">Kontak</a>
                <span class="text-slate-400">/</span>
                <a href="#struktur" class="hover:text-primary transition-colors">Divisi</a>
            </div>

            <hr class="border-gray-300 w-full">

            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-[10px] md:text-xs font-medium text-slate-600 flex items-center gap-2">
                    <i class="fa-solid fa-eye text-primary"></i>
                    <span>Total Pengunjung:</span>
                    <span class="font-bold text-slate-900">
                        <?= number_format($data['visitors']) ?>
                    </span>
                </div>

                <p class="text-[10px] md:text-xs font-bold text-slate-900">
                    Copyright © 2026 <span class="text-primary">Malaka UBP Karawang</span>
                </p>
                <div class="flex items-center lg:mr-5 gap-3">
                    <a href="https://www.youtube.com/@malakaubpkarawang" target="_blank" class="text-slate-900 hover:text-red-600 transition-colors duration-300">
                        <i class="fa-brands fa-youtube text-lg"></i>
                    </a>
                    <a href="https://www.tiktok.com/@malaka.ubpkarawang" target="_blank" class="text-slate-900 hover:text-black transition-colors duration-300">
                        <i class="fa-brands fa-tiktok text-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/malaka.ubpkarawang" target="_blank" class="text-slate-900 hover:text-pink-600 transition-colors duration-300">
                        <i class="fa-brands fa-instagram text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<button id="backToTop" class="fixed bottom-8 right-8 z-[999] bg-primary hover:bg-blue-700 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-all duration-500 opacity-0 invisible translate-y-10 hover:scale-110">
    <i class="fa-solid fa-rocket text-lg"></i>
</button>

<div class="fixed bottom-2 right-4 z-[50] pointer-events-none">
    <p class="text-[10px] md:text-xs font-medium text-slate-500 opacity-30">
        Website ini dibuat dan dikelola oleh tim
        <a href="https://ronekimedia.com" target="_blank" class="font-bold text-primary pointer-events-auto hover:underline">
            <?= htmlspecialchars($data['watermark']) ?>
        </a>
    </p>
</div>

<script>
    // Membungkus script dengan event listener ini memastikan semua elemen HTML sudah siap sebelum script jalan
    document.addEventListener("DOMContentLoaded", function() {

        // --- 1. Logic Back To Top ---
        const backToTopBtn = document.getElementById('backToTop');

        if (backToTopBtn) {
            window.addEventListener('scroll', () => {
                // Jika scroll lebih dari 300px, munculkan tombol
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'invisible', 'translate-y-10');
                    backToTopBtn.classList.add('opacity-100', 'visible', 'translate-y-0');
                } else {
                    // Jika kurang, sembunyikan
                    backToTopBtn.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    backToTopBtn.classList.add('opacity-0', 'invisible', 'translate-y-10');
                }
            });

            // Aksi saat diklik (Scroll ke atas)
            backToTopBtn.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // --- 2. Logic Mobile Menu (Untuk Navbar) ---


        // --- 3. Logic Video Modal (Untuk Halaman Beranda) ---
        const openBtn = document.getElementById('openVideoBtn');
        const closeBtn = document.getElementById('closeVideoBtn');
        const modal = document.getElementById('videoModal');
        const overlay = document.getElementById('modalOverlay');
        const modalContent = document.getElementById('modalContent');
        const iframe = document.getElementById('youtubeFrame');

        // Cek apakah elemen ada sebelum menjalankan (menghindari error di halaman lain)
        if (openBtn && modal) {
            // URL Video YouTube (Ganti ID videonya jika perlu)
            const youtubeVideoUrl = "https://www.youtube.com/embed/HtChAde3gvs?autoplay=1&rel=0";

            openBtn.addEventListener('click', (e) => {
                e.preventDefault();
                iframe.src = youtubeVideoUrl;
                modal.classList.remove('invisible', 'opacity-0');
                modal.classList.add('visible', 'opacity-100');
                modalContent.classList.remove('scale-90');
                modalContent.classList.add('scale-100');
            });

            function closeModal() {
                modal.classList.remove('visible', 'opacity-100');
                modal.classList.add('invisible', 'opacity-0');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-90');
                // Hapus src agar video berhenti main
                setTimeout(() => {
                    iframe.src = "";
                }, 300);
            }

            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (overlay) overlay.addEventListener('click', closeModal);

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('invisible')) {
                    closeModal();
                }
            });
        }
    });
</script>
</body>

</html>