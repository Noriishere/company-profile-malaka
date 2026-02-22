<style>
    .fade-in { animation: fadeIn 0.5s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div class="w-full bg-slate-50 py-6">
    <div class="container mx-auto px-4 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
        
        <h2 class="text-lg md:text-xl font-bold text-slate-700 w-full md:w-auto text-center md:text-left">
            Tes Kecocokan Divisi
        </h2>
        
        <div id="progress-container" class="hidden flex-col w-full md:w-64 transition-all duration-300">
            <div class="flex justify-between w-full mb-1 px-1">
                <span class="text-[10px] font-bold text-primary tracking-wider">PROGRESS</span>
                <span id="progress-text" class="text-[10px] font-bold text-slate-400">0/0</span>
            </div>
            <div class="w-full bg-slate-200 rounded-full h-2">
                <div id="progress-bar-inner" class="bg-primary h-full rounded-full transition-all duration-500 ease-out w-0"></div>
            </div>
        </div>
    </div>
</div>

<main class="flex-grow flex flex-col items-center justify-start w-full px-4 md:px-8 py-10 bg-slate-50">
    
    <div class="w-full max-w-4xl mx-auto">
        
        <div id="start-screen" class="flex flex-col items-center justify-center text-center fade-in py-8">
            <div class="mb-6 relative">
                <div class="absolute inset-0 bg-blue-100 rounded-full blur-xl opacity-70 animate-pulse"></div>
                <i class="fa-solid fa-clipboard-question text-6xl md:text-8xl text-primary relative z-10"></i>
            </div>
            
            <h1 class="text-3xl md:text-6xl font-extrabold text-slate-900 mb-6 leading-tight">
                Bingung Masuk <br class="hidden md:block" /> <span class="text-primary">Divisi Mana?</span>
            </h1>
            
            <p class="text-slate-500 text-base md:text-xl max-w-2xl mb-10 leading-relaxed">
                Jawab pertanyaan santai ini untuk menemukan peran terbaikmu di UKM Malaka. Tidak ada jawaban salah, jadilah dirimu sendiri!
            </p>
            
            <button onclick="startQuiz()" class="group relative px-10 py-4 bg-primary text-white text-lg font-bold rounded-full shadow-xl shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-1 transition-all duration-300 overflow-hidden w-full md:w-auto">
                <span class="relative z-10 flex items-center justify-center gap-3">
                    Mulai Tes Sekarang <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
            </button>
        </div>

        <div id="quiz-screen" class="hidden flex-col w-full fade-in py-4">
            
            <div class="text-center mb-10 md:mb-16">
                <span class="inline-block px-4 py-1.5 bg-blue-100 text-primary text-xs md:text-sm font-bold rounded-full mb-6">
                    Pertanyaan <span id="q-number">1</span>
                </span>
                <h2 id="question-text" class="text-2xl md:text-4xl font-bold text-slate-800 leading-snug max-w-4xl mx-auto">
                    </h2>
            </div>

            <div id="answer-buttons" class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full">
                </div>
        </div>

        <div id="result-screen" class="hidden flex-col items-center text-center fade-in w-full py-8">
            
            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">HASIL ANALISIS KAMU</h4>
            
            <div class="relative mb-8 group">
                <div class="absolute inset-0 bg-gradient-to-tr from-primary to-blue-300 rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
                <img id="result-image" src="https://malakaubpkarawang.com/assets/logo_malaka.png" alt="Logo Divisi" class="relative z-10 w-32 h-32 md:w-48 md:h-48 object-contain drop-shadow-2xl transform transition-transform duration-500 hover:scale-105">
            </div>
            
            <h2 id="result-title" class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-8">
                </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 w-full text-left mb-10">
                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-100">
                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
                        <i class="fa-solid fa-fingerprint text-xl text-primary"></i>
                    </div>
                    <h5 class="font-bold text-slate-800 text-lg mb-2">Kenapa Cocok?</h5>
                    <p id="result-why" class="text-slate-600 leading-relaxed"></p>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-100">
                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
                        <i class="fa-solid fa-list-check text-xl text-primary"></i>
                    </div>
                    <h5 class="font-bold text-slate-800 text-lg mb-2">Tugas Utama</h5>
                    <ul id="result-tasks" class="space-y-2 text-slate-600 list-disc list-inside marker:text-primary"></ul>
                </div>
            </div>

            <div class="flex flex-col gap-3 w-full md:w-auto md:min-w-[350px]">
                <a id="share-btn" href="#" target="_blank" class="w-full px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#20bd5a] transition-all flex items-center justify-center gap-2 shadow-lg hover:shadow-green-500/30 transform hover:-translate-y-1">
                    <i class="fa-brands fa-whatsapp text-xl"></i> Share Hasil
                </a>
                
                <button onclick="location.reload()" class="w-full px-8 py-4 bg-white border-2 border-slate-200 text-slate-700 font-bold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-rotate-right"></i> Coba Lagi
                </button>
                
                <a href="index.php" class="w-full px-8 py-4 bg-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-300 transition-all flex items-center justify-center gap-2 mt-2">
                    <i class="fa-solid fa-house"></i> Kembali ke Home
                </a>
            </div>
        </div>

    </div>
</main>

<script src="<?= BASE_URL ?>js/divisi.js"></script>