<main class="w-full bg-white min-h-screen font-poppins text-slate-800">

    <!-- ================= HEADER ================= -->
    <section class="pt-16 pb-10">
        <div class="container mx-auto px-4 lg:px-8 max-w-5xl text-center">
            
            <div class="flex items-center justify-center gap-2 text-sm text-slate-500 font-medium mb-6">
                <a href="/index.php" class="hover:text-primary transition-colors">Beranda</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <a href="/berita" class="hover:text-primary transition-colors">Berita</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-primary">Detail Berita</span>
            </div>

            <!-- CATEGORY -->
            <span class="inline-flex items-center justify-center bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full mb-6 tracking-wide uppercase">
                <?= htmlspecialchars($data['post']['category']) ?>
            </span>

            <!-- TITLE -->
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight mb-6">
                <?= htmlspecialchars($data['post']['title']) ?>
            </h1>

            <!-- META -->
            <div class="flex items-center justify-center gap-6 text-sm md:text-base text-slate-500 font-medium border-t border-b border-slate-100 py-4 w-fit mx-auto px-8">
                
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-xs">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span>
                        Oleh <span class="text-slate-900 font-bold">
                            <?= htmlspecialchars($data['post']['creator']) ?>
                        </span>
                    </span>
                </div>

                <div class="w-1 h-1 bg-slate-300 rounded-full"></div>

                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-calendar text-primary"></i>
                    <span>
                        <?= date('d F Y', strtotime($data['post']['created_at'])) ?>
                    </span>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= THUMBNAIL ================= -->
    <?php if (!empty($data['post']['thumbnail'])) : ?>
    <section class="pb-10">
        <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
            <div class="relative w-full aspect-video md:aspect-[21/9] rounded-[2rem] md:rounded-[3rem] overflow-hidden shadow-2xl shadow-slate-200">
                <img 
                    src="/posts/uploads/<?= htmlspecialchars($data['post']['thumbnail']) ?>"
                    alt="<?= htmlspecialchars($data['post']['title']) ?>"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-1000"
                >
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ================= ISI BERITA ================= -->
    <section class="pb-16">
        <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
            
            <article class="text-lg text-black leading-relaxed space-y-6 text-justify">
                <?= $data['post']['paragraph'] ?>
            </article>

            <!-- BACK BUTTON -->
            <div class="mt-12 pt-8 border-t border-slate-100 text-center">
                <a href="/berita"
                   class="inline-flex items-center gap-2 text-primary font-bold hover:underline">
                   <i class="fa-solid fa-arrow-left"></i>
                   Kembali ke Berita
                </a>
            </div>

        </div>
    </section>

</main>