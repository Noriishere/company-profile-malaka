<style>
    /* Fix Glitch Radius */
    .card-hover-fix {
        -webkit-mask-image: -webkit-radial-gradient(white, black);
        mask-image: radial-gradient(white, black);
    }
</style>

<section class="w-full pt-8 pb-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 lg:px-8">

        <div class="text-center mb-8 lg:mb-16 max-w-4xl mx-auto" data-aos="fade-up">
            <h4 class="text-primary font-bold tracking-widest uppercase text-[10px] md:text-xs mb-2">Divisi & Biro</h4>
            <h2 class="text-2xl md:text-5xl font-extrabold text-slate-900 mb-4 md:mb-6">
                Divisi <span class="text-primary"><?= htmlspecialchars($data['division']) ?></span>
            </h2>
            <div class="w-16 h-1 md:w-24 md:h-1.5 bg-primary mx-auto rounded-full mb-4 md:mb-6"></div>
            <p class="text-slate-500 text-xs md:text-lg leading-relaxed px-4">
                <?= htmlspecialchars($data['definition']) ?>
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-8">

            <?php
            // 1. Tentukan Doksli Asli
            $json_file = 'storage/data_'.$data['json'].'.json';
            // 2. Cek Apakah Doksli Ada
            if (file_exists($json_file)) {
                // 3. Ambil Doksli
                $json_content = file_get_contents($json_file);
                // 4. Decode JSON menjadi Array PHP
                $members = json_decode($json_content, true);
            } else {
                $members = []; // Array Kosong Jika Doksli Menghilang
                echo '<p class="col-span-4 text-center text-red-500">Data anggota tidak ditemukan.</p>';
            }

            // 5. Looping data
            if (!empty($members)) :
                foreach ($members as $m) :
            ?>

                    <div class="group bg-white rounded-xl md:rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 hover:-translate-y-1 md:hover:-translate-y-2 flex flex-col card-hover-fix transform-gpu relative z-0">

                        <div class="relative w-full aspect-[3/4] overflow-hidden bg-gray-200">
                            <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/10 transition-colors z-10 duration-300"></div>
                            <img src="<?= BASE_URL ?><?= $m['foto'] ?>" alt="<?= $m['nama'] ?>" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700 backface-hidden">

                            <div class="absolute top-2 right-2 md:top-3 md:right-3 bg-white/90 backdrop-blur-sm px-2 py-0.5 md:px-3 md:py-1 rounded-full text-[10px] md:text-xs font-bold text-slate-600 shadow-sm z-20 flex items-center gap-1">
                                <i class="fa-solid fa-cake-candles text-pink-500"></i>
                                <?= $m['ultah'] ?>
                            </div>
                        </div>

                        <div class="p-3 md:p-5 flex flex-col flex-grow text-center bg-white relative z-20">
                            <div class="mb-2 md:mb-4">
                                <h3 class="text-sm md:text-lg font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight mb-1 truncate">
                                    <?= $m['nama'] ?>
                                </h3>
                                <p class="text-[10px] md:text-sm font-medium text-slate-500 uppercase tracking-wide border-b border-slate-100 pb-2 md:pb-3 mx-auto w-3/4 md:w-2/3 truncate">
                                    <?= $m['jabatan'] ?>
                                </p>
                            </div>

                            <div class="mt-auto">
                                <a href="https://instagram.com/<?= $m['instagram'] ?>" target="_blank" class="block w-full py-1.5 md:py-2.5 rounded-lg md:rounded-xl bg-slate-50 text-slate-600 text-[10px] md:text-sm font-bold border border-slate-200 hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:text-white hover:border-transparent transition-all duration-300 group/btn">
                                    <i class="fa-brands fa-instagram md:mr-2"></i>
                                    <span class="hidden md:inline">Follow Me</span>
                                    <span class="md:hidden">Follow</span>
                                </a>
                            </div>
                        </div>

                    </div>

            <?php
                endforeach;
            endif;
            ?>

        </div>

        <div class="mt-10 md:mt-16 text-center">
            <a href="../index.php#struktur" class="px-6 py-2 md:px-8 md:py-3 rounded-full border-2 border-slate-200 text-slate-500 text-xs md:text-base font-bold hover:border-primary hover:text-primary hover:bg-white transition-all inline-flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</section>