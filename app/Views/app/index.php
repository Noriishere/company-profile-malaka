 <section id="beranda" class="w-full pt-4 pb-8 md:pt-6 md:pb-12">
     <div class="container mx-auto px-4 lg:px-8">
         <div class="relative w-full min-h-[500px] md:min-h-[700px] rounded-[2rem] md:rounded-[2.5rem] overflow-visible bg-primary flex flex-col group transition-all duration-300">
             <div class="absolute inset-0 z-0 rounded-[2rem] md:rounded-[2.5rem] overflow-hidden">
                 <img src="<?= BASE_URL ?>image/bersama.png" alt="Background" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                 <div class="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/70 to-transparent"></div>
             </div>

             <div class="relative z-10 p-6 md:p-12 text-white flex flex-col flex-grow h-full justify-center pb-20 md:pb-32">
                 <div class="max-w-3xl">
                     <h3 class="text-sm md:text-xl font-medium mb-2 md:mb-4 tracking-wide text-blue-100">Unit Kegiatan Mahasiswa</h3>
                     <h1 class="text-3xl sm:text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight mb-4 md:mb-8 drop-shadow-md">
                         Mahasiswa Melawan <br />Narkotika
                     </h1>
                     <p class="text-sm sm:text-base md:text-xl lg:text-2xl font-medium opacity-90 mb-8 md:mb-12 max-w-xl leading-relaxed text-shadow-sm">
                         Universitas Buana Perjuangan Karawang.
                     </p>
                     <button id="openVideoBtn" class="group flex items-center gap-2 md:gap-3 w-fit px-6 py-2 md:px-8 md:py-4 border-2 border-white rounded-full hover:bg-white hover:text-primary transition-all duration-300 cursor-pointer z-50">
                         <span class="text-sm md:text-lg font-bold">Lihat Video</span>
                         <i class="fa-solid fa-play text-xs md:text-sm group-hover:translate-x-1 transition-transform"></i>
                     </button>
                 </div>
                 
             </div>
     
             <div class="absolute bottom-0 left-0 w-full flex justify-center z-20">
                 <div class="relative flex items-end max-w-[90%]">
                     <svg class="w-4 h-4 sm:w-6 sm:h-6 md:w-10 md:h-10 text-white -mr-[1px] mb-[0.5px] flex-shrink-0" viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path d="M40 40V0C40 22.0914 22.0914 40 0 40H40Z" />
                     </svg>
                     <div class="bg-white h-8 sm:h-12 md:h-20 w-auto px-6 sm:px-10 md:px-16 rounded-t-[1rem] sm:rounded-t-[1.5rem] md:rounded-t-[2.5rem] flex items-center justify-center">
                         <span class="text-[10px] sm:text-lg md:text-3xl font-extrabold text-black tracking-widest pt-1 md:pt-2 whitespace-nowrap">
                             MALAKA
                         </span>
                     </div>
                     <svg class="w-4 h-4 sm:w-6 sm:h-6 md:w-10 md:h-10 text-white -ml-[1px] mb-[0.5px] flex-shrink-0" viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path d="M0 40V0C0 22.0914 17.9086 40 40 40H0Z" />
                     </svg>
                 </div>
             </div>
         </div>

         <div id="videoModal" class="fixed inset-0 z-[9999] flex items-center justify-center px-4 invisible opacity-0 transition-all duration-500">
             <div id="modalOverlay" class="absolute inset-0 bg-slate-900/90 backdrop-blur-md transition-opacity duration-500"></div>
             <div id="modalContent" class="relative w-full max-w-5xl bg-black rounded-2xl shadow-2xl overflow-hidden transform scale-90 transition-all duration-500">
                 <button id="closeVideoBtn" class="absolute top-4 right-4 z-50 group bg-black/50 hover:bg-red-600 text-white rounded-full w-10 h-10 flex items-center justify-center transition-all duration-300 backdrop-blur-sm border border-white/10 cursor-pointer">
                     <i class="fa-solid fa-xmark text-lg group-hover:rotate-90 transition-transform duration-300"></i>
                 </button>
                 <div class="relative pt-[56.25%] w-full bg-black">
                     <iframe id="youtubeFrame"
                         class="absolute top-0 left-0 w-full h-full"
                         src=""
                         title="YouTube video player"
                         frameborder="0"
                         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                         referrerpolicy="strict-origin-when-cross-origin"
                         allowfullscreen>
                     </iframe>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <div class="w-full bg-primary overflow-hidden border-y-4 border-white h-16 md:h-24 flex items-center relative z-10">
     <div class="flex whitespace-nowrap w-full">
         <div class="animate-marquee flex items-center shrink-0">
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
         </div>
         <div class="animate-marquee flex items-center shrink-0" aria-hidden="true">
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
         </div>
     </div>
 </div>
 <section id="struktur" class="w-full pt-6 pb-12 lg:pt-8 lg:pb-16 bg-white">
     <div class="container mx-auto px-4 lg:px-8">
         <div class="text-left mb-8 lg:mb-10">
             <h4 class="text-primary font-bold tracking-widest uppercase text-xs mb-2">Struktur Organisasi</h4>
             <h2 class="text-2xl md:text-4xl font-extrabold text-slate-900">
                 Pengurus <span class="text-primary">MALAKA</span>
             </h2>
             <div class="w-20 h-1.5 bg-primary mt-4 rounded-full"></div>
         </div>

         <div class="flex justify-center mb-8 lg:mb-10">
             <div class="w-full md:w-2/3 lg:w-1/2">
                 <a href="<?= BASE_URL ?>divisi/bph" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                     <div class="w-full aspect-[2/1] relative z-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                         <img src="<?= BASE_URL ?>image/bersama.png" alt="Badan Pengurus Harian" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                     </div>
                     <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-4 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                         <h3 class="text-white font-bold text-lg md:text-xl tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                             Badan Pengurus Harian
                         </h3>
                     </div>
                 </a>
             </div>
         </div>

         <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
             <a href="<?= BASE_URL ?>divisi/jarkom" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                 <div class="w-full aspect-[2/1] relative z-0">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                     <img src="img/bersama.png" alt="Divisi Jarkom" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                 </div>
                 <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-2 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                     <h3 class="text-white font-bold text-base md:text-lg tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                         Divisi Jarkom
                     </h3>
                 </div>
             </a>

             <a href="<?= BASE_URL ?>divisi/disiplin" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                 <div class="w-full aspect-[2/1] relative z-0">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                     <img src="img/bersama.png" alt="Divisi Disiplin" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                 </div>
                 <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-2 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                     <h3 class="text-white font-bold text-base md:text-lg tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                         Divisi Disiplin
                     </h3>
                 </div>
             </a>

             <a href="<?= BASE_URL ?>divisi/pencegahan" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                 <div class="w-full aspect-[2/1] relative z-0">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                     <img src="img/bersama.png" alt="Divisi Pencegahan" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                 </div>
                 <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-2 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                     <h3 class="text-white font-bold text-base md:text-lg tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                         Divisi Pencegahan
                     </h3>
                 </div>
             </a>

             <a href="<?= BASE_URL ?>divisi/perencanaan" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                 <div class="w-full aspect-[2/1] relative z-0">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                     <img src="img/bersama.png" alt="Divisi Perencanaan" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                 </div>
                 <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-2 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                     <h3 class="text-white font-bold text-base md:text-lg tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                         Divisi Perencanaan
                     </h3>
                 </div>
             </a>

             <a href="<?= BASE_URL ?>divisi/psda" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                 <div class="w-full aspect-[2/1] relative z-0">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                     <img src="img/bersama.png" alt="Divisi PSDA" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                 </div>
                 <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-2 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                     <h3 class="text-white font-bold text-base md:text-lg tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                         Divisi PSDA
                     </h3>
                 </div>
             </a>

             <a href="<?= BASE_URL ?>divisi/penjaminan-mutu" class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                 <div class="w-full aspect-[2/1] relative z-0">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10"></div>
                     <img src="img/bersama.png" alt="Divisi Penjaminan Mutu" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                 </div>
                 <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] bg-primary py-3 px-2 rounded-xl z-20 shadow-lg text-center group-hover:bg-white transition-colors duration-300">
                     <h3 class="text-white font-bold text-base md:text-lg tracking-wide leading-tight group-hover:text-primary transition-colors duration-300">
                         Divisi Penjaminan Mutu
                     </h3>
                 </div>
             </a>
         </div>
     </div>
 </section>

 <section class="relative w-full py-12 lg:py-16 overflow-hidden bg-slate-900">
     <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-slate-900 to-slate-900"></div>
     <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>
     <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl translate-y-1/2 pointer-events-none"></div>

     <div class="container mx-auto px-4 relative z-10 text-center">
         <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
             Yuk, Jadi Bagian dari <span class="text-blue-400">MALAKA!</span>
         </h2>
         <p class="text-gray-300 text-base md:text-xl max-w-2xl mx-auto mb-2 leading-relaxed">
             Berikan kontribusimu dalam memerangi narkotika dan ciptakan generasi muda yang sehat dan cerdas.
         </p>
         <p class="text-gray-400 text-sm md:text-base mb-8">
             Daftar sekarang dengan satu klik tombol di bawah ini!
         </p>

         <div class="flex flex-col md:flex-row items-center md:items-start justify-center gap-4 md:gap-6">
             <a href="<?= BASE_URL ?>kontak" class="w-full md:w-64 h-14 rounded-full border-2 border-gray-500 text-gray-300 font-bold tracking-wide hover:border-white hover:text-white hover:bg-white/5 transition-all duration-300 flex items-center justify-center">
                 CONTACT PERSON
             </a>
             <a href="#" class="w-full md:w-72 h-14 rounded-full bg-primary text-white font-extrabold tracking-wide hover:scale-105 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group">
                 DAFTAR SEKARANG
                 <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
             </a>
             <div class="flex flex-col items-center gap-2 w-full md:w-auto">
                 <a href="tes" class="w-full md:w-64 h-14 rounded-full border-2 border-teal-400 text-teal-400 font-bold tracking-wide hover:bg-teal-400 hover:text-slate-900 transition-all duration-300 flex items-center justify-center">
                     TES KECOCOKAN
                 </a>
                 <span class="text-xs text-teal-200/60 italic max-w-xs leading-tight">
                     (Khusus untuk kamu yang bingung)
                 </span>
             </div>
         </div>
     </div>
 </section>

 <section id="berita" class="w-full py-12 lg:py-16 bg-white overflow-hidden">
     <div class="container mx-auto px-4 lg:px-8">
         <div class="flex flex-row justify-between items-end mb-8 lg:mb-12">
             <div class="text-left">
                 <h4 class="text-primary font-bold tracking-widest uppercase text-[10px] md:text-xs mb-1 md:mb-2">Berita Terkini</h4>
                 <h2 class="text-2xl md:text-4xl font-extrabold text-slate-900 flex items-center gap-2 md:gap-3">
                     <i class="fa-solid fa-circle text-red-600 text-xs md:text-lg animate-pulse"></i>
                     Latest <span class="text-primary">News</span>
                 </h2>
                 <div class="w-12 md:w-20 h-1 md:h-1.5 bg-primary mt-2 md:mt-4 rounded-full"></div>
             </div>

             <a href="berita" class="group flex items-center gap-1 md:gap-2 px-4 py-2 md:px-6 md:py-3 rounded-full border border-primary text-primary font-bold hover:bg-primary hover:text-white transition-all duration-300 text-xs md:text-base whitespace-nowrap">
                 Lihat Semua
                 <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
             </a>
         </div>

         <div id="latest-news"
             class="flex md:grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 overflow-x-auto snap-x snap-mandatory pb-4 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 scrollbar-hide">

             <!-- Skeleton Loading -->
             <div class="min-w-[85%] md:min-w-0 snap-center bg-gray-200 h-64 rounded-3xl animate-pulse"></div>
             <div class="min-w-[85%] md:min-w-0 snap-center bg-gray-200 h-64 rounded-3xl animate-pulse"></div>
             <div class="min-w-[85%] md:min-w-0 snap-center bg-gray-200 h-64 rounded-3xl animate-pulse"></div>

         </div>
     </div>
 </section>

 <div class="w-full bg-primary overflow-hidden border-y-4 border-white h-16 md:h-24 flex items-center relative z-10">
     <div class="flex whitespace-nowrap w-full">
         <div class="animate-marquee flex items-center shrink-0">
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
         </div>
         <div class="animate-marquee flex items-center shrink-0" aria-hidden="true">
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
             <span class="text-2xl md:text-5xl font-extrabold text-white px-6 md:px-12 uppercase tracking-widest">MALAKA</span>
             <span class="text-lg md:text-3xl text-white">■</span>
         </div>
     </div>
 </div>

 <section id="tentang" class="relative w-full py-16 lg:py-20 bg-slate-50 overflow-hidden">
     <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
     <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-300/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>

     <div class="container mx-auto px-4 lg:px-8 relative z-10">
         <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
             <div class="w-full lg:w-1/3 flex justify-center">
                 <div class="relative group">
                     <div class="absolute inset-0 bg-primary/10 rounded-full blur-2xl transform group-hover:scale-110 transition-transform duration-500"></div>
                     <div class="relative w-56 h-56 md:w-64 md:h-64 bg-white rounded-full shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] flex items-center justify-center border border-slate-100 z-10">
                         <img src="https://malakaubpkarawang.com/assets/logo_malaka.png" alt="Logo MALAKA" class="w-36 md:w-44 h-auto object-contain">
                     </div>
                 </div>
             </div>

             <div class="w-full lg:w-2/3 text-left space-y-5">
                 <div>
                     <h4 class="text-primary font-bold tracking-widest uppercase text-xs mb-2">Tentang Kami</h4>
                     <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 leading-tight">
                         Mengenal Lebih Dekat <br /> <span class="text-primary">UKM MALAKA</span>
                     </h2>
                     <div class="w-16 h-1 bg-primary mt-3 rounded-full"></div>
                 </div>

                 <div class="text-slate-600 text-sm md:text-base leading-relaxed space-y-4 text-justify">
                     <p>
                         Selamat datang di website resmi UKM Mahasiswa Melawan Narkotika (MALAKA).
                         MALAKA adalah unit kegiatan mahasiswa yang baru saja berdiri dan diresmikan pada tanggal
                         <span class="font-bold text-slate-800">20 Januari 2021</span>.
                     </p>
                     <p>
                         Kami adalah organisasi mahasiswa yang bergerak di bidang
                         <span class="font-semibold text-primary">pendidikan, pengenalan, dan pemahaman</span>
                         tentang bahaya Narkotika. MALAKA bertekad menjadi pelopor bagi mahasiswa, pelajar,
                         dan kaum muda untuk menjadikan Karawang muda tanpa Narkotika.
                     </p>
                     <div class="bg-white border-l-4 border-primary p-4 shadow-sm rounded-r-md">
                         <p class="text-sm font-medium text-slate-700 italic">
                             "UKM MALAKA berkolaborasi aktif dengan
                             <span class="text-primary font-bold">BNN Kabupaten Karawang</span>."
                         </p>
                     </div>
                     <p>
                         Sebagai <span class="font-bold text-slate-800">UKM pertama di Karawang</span>
                         yang berfokus pada bahaya narkotika, kami berkomitmen melindungi generasi penerus bangsa.
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <script>
     function loadLatestNews() {
         fetch('/api/posts.php?page=1')
             .then(res => res.json())
             .then(res => {

                 const container = document.getElementById('latest-news');
                 container.innerHTML = '';

                 if (!res.data || res.data.length === 0) {
                     container.innerHTML = '<p class="text-gray-500">Belum ada berita.</p>';
                     return;
                 }

                 // Ambil 3 berita pertama
                 const latest = res.data.slice(0, 3);

                 latest.forEach(post => {
                     container.innerHTML += `
                <article class="min-w-[85%] md:min-w-0 snap-center bg-gray-100 p-3 md:p-4 rounded-3xl hover:shadow-xl transition-all duration-300 group cursor-pointer border border-gray-200">

                    <div class="w-full aspect-video rounded-2xl overflow-hidden relative">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 z-10"></div>
                        <img src="/posts/uploads/${post.thumbnail}"
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="mt-4 px-1 pb-1">
                        <h3 class="text-base md:text-xl font-extrabold text-slate-900 leading-snug mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                            ${post.title}
                        </h3>

                        <p class="text-[10px] md:text-sm text-slate-500 font-semibold">
                            ${post.creator} • ${new Date(post.created_at).toLocaleDateString()}
                        </p>

                        <a href="/berita/detail/${post.id}"
                           class="inline-block mt-3 text-primary font-semibold text-sm">
                           Baca →
                        </a>
                    </div>

                </article>
                `;
                 });

             });
     }

     loadLatestNews();
 </script>