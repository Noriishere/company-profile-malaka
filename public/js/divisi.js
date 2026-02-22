// --- KONFIGURASI DATA HASIL ---
// Ganti URL gambar sesuai lokasi file asli Anda
const resultsData = {
    "Jarkom": { 
        title: "DIVISI JARKOM", 
        image: "https://malakaubpkarawang.com/assets/logo_malaka.png", 
        why: "Kamu memiliki jiwa kreatif dan ekspresif. Kamu selalu update dengan tren digital dan tahu cara menyampaikan pesan agar menarik perhatian banyak orang.", 
        tasks: ["Mengelola Social Media (IG/TikTok)", "Desain Grafis & Konten Kreatif", "Dokumentasi Kegiatan"] 
    },
    "Disiplin": { 
        title: "DIVISI DISIPLIN", 
        image: "https://malakaubpkarawang.com/assets/logo_malaka.png", 
        why: "Kamu adalah pribadi yang tegas dan berintegritas. Bagimu, keteraturan adalah kunci kesuksesan, dan kamu berani menegakkan aturan demi kebaikan bersama.", 
        tasks: ["Menegakkan Tata Tertib", "Menjaga Kondusifitas Acara", "Menjadi Role Model Kedisiplinan"] 
    },
    "Pencegahan": { 
        title: "DIVISI PENCEGAHAN", 
        image: "https://malakaubpkarawang.com/assets/logo_malaka.png", 
        why: "Kamu adalah eksekutor lapangan yang tangguh. Kamu lebih suka bertindak langsung, sigap menghadapi masalah teknis, dan memastikan acara berjalan lancar.", 
        tasks: ["Persiapan Teknis & Logistik", "Koordinasi Lapangan", "Mitigasi Kendala saat Acara"] 
    },
    "Perencanaan": { 
        title: "DIVISI PERENCANAAN", 
        image: "https://malakaubpkarawang.com/assets/logo_malaka.png", 
        why: "Kamu visioner dan strategis. Kamu suka merancang konsep dari nol, menyusun jadwal yang rapi, dan memastikan tujuan besar organisasi tercapai.", 
        tasks: ["Menyusun Program Kerja", "Membuat Rundown & Timeline", "Perancangan Konsep Acara"] 
    },
    "PSDA": { 
        title: "DIVISI PSDA", 
        image: "https://malakaubpkarawang.com/assets/logo_malaka.png", 
        why: "Kamu memiliki empati tinggi dan peduli pada pengembangan orang lain. Kamu jago membangun suasana tim yang solid dan membantu teman untuk berkembang.", 
        tasks: ["Mengelola Database Anggota", "Training & Upgrading Skill", "Bonding & Keakraban Tim"] 
    },
    "Penjaminan Mutu": { 
        title: "DIVISI PENJAMINAN MUTU", 
        image: "https://malakaubpkarawang.com/assets/logo_malaka.png", 
        why: "Kamu kritis, teliti, dan perfeksionis. Kamu selalu mencari celah untuk perbaikan dan memastikan standar kualitas organisasi tetap terjaga.", 
        tasks: ["Evaluasi Program Kerja", "Audit Internal Organisasi", "Membuat Standarisasi Mutu"] 
    }
};

// --- STATE VARIABLES ---
let questions = [];
let currentIdx = 0;
let scores = { 
    "Jarkom": 0, "Disiplin": 0, "Pencegahan": 0, 
    "Perencanaan": 0, "PSDA": 0, "Penjaminan Mutu": 0 
};

// --- FETCH DATA SOAL ---
async function loadQuestions() {
    try {
        const response = await fetch('storage/soal.json');
        if (!response.ok) throw new Error('Gagal mengambil data');
        questions = await response.json();
    } catch (error) {
        console.error("Error:", error);
        alert("Gagal memuat soal. Pastikan file 'soal.json' ada dan server berjalan (bukan buka langsung file html).");
    }
}

// Jalankan loadQuestions saat file ini dimuat
loadQuestions();

// --- FUNGSI NAVIGASI LAYAR ---
function switchScreen(id) {
    const screens = ['start-screen', 'quiz-screen', 'result-screen'];
    
    screens.forEach(s => {
        const el = document.getElementById(s);
        if (s === id) {
            el.classList.remove('hidden');
            el.classList.add('flex');
            // Trigger anim fade-in ulang
            el.classList.remove('fade-in');
            void el.offsetWidth; // Force reflow
            el.classList.add('fade-in');
        } else {
            el.classList.add('hidden');
            el.classList.remove('flex');
        }
    });
}

// --- FUNGSI UTAMA ---

function startQuiz() {
    if (questions.length === 0) return alert("Sedang memuat soal, tunggu sebentar...");
    
    // Reset
    currentIdx = 0;
    for (let key in scores) scores[key] = 0;
    
    // Tampilkan Navigasi Progress
    document.getElementById('progress-container').classList.remove('hidden');
    document.getElementById('progress-container').classList.add('flex');
    
    switchScreen('quiz-screen');
    showQuestion();
}

function showQuestion() {
    const q = questions[currentIdx];
    
    // Update Text UI
    document.getElementById('q-number').innerText = currentIdx + 1;
    document.getElementById('question-text').innerText = q.question;
    document.getElementById('progress-text').innerText = `${currentIdx + 1}/${questions.length}`;
    
    // Update Progress Bar
    const percent = ((currentIdx + 1) / questions.length) * 100;
    document.getElementById('progress-bar-inner').style.width = `${percent}%`;

    // Render Pilihan Jawaban
    const btnContainer = document.getElementById('answer-buttons');
    btnContainer.innerHTML = ''; // Kosongkan tombol lama

    q.answers.forEach(ans => {
        const btn = document.createElement('button');
        // Styling tombol jawaban full modern
        btn.className = `
            text-left w-full p-5 rounded-2xl bg-white border-2 border-slate-100 shadow-sm
            hover:border-primary hover:bg-blue-50 hover:shadow-md transition-all duration-200 
            group flex items-start gap-4
        `;
        
        btn.innerHTML = `
            <div class="mt-1 w-6 h-6 rounded-full border-2 border-slate-300 group-hover:border-primary flex-shrink-0 flex items-center justify-center transition-colors">
                <div class="w-3 h-3 rounded-full bg-primary opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
            <span class="text-base md:text-lg text-slate-700 font-medium group-hover:text-primary leading-snug">
                ${ans.text}
            </span>
        `;
        
        btn.onclick = () => selectAnswer(ans.division);
        btnContainer.appendChild(btn);
    });
}

function selectAnswer(division) {
    scores[division]++;
    
    if (currentIdx < questions.length - 1) {
        currentIdx++;
        // Delay sedikit agar transisi lebih smooth
        setTimeout(showQuestion, 200);
    } else {
        showResult();
    }
}

function showResult() {
    // Sembunyikan progress bar
    document.getElementById('progress-container').classList.remove('flex');
    document.getElementById('progress-container').classList.add('hidden');
    
    switchScreen('result-screen');

    // Hitung Pemenang (Nilai Tertinggi)
    const bestDiv = Object.keys(scores).reduce((a, b) => scores[a] > scores[b] ? a : b);
    const data = resultsData[bestDiv];

    // Isi Data ke Halaman Hasil
    document.getElementById('result-title').innerText = data.title;
    document.getElementById('result-image').src = data.image;
    document.getElementById('result-why').innerText = data.why;
    
    const taskList = document.getElementById('result-tasks');
    taskList.innerHTML = '';
    data.tasks.forEach(t => {
        const li = document.createElement('li');
        li.innerText = t;
        taskList.appendChild(li);
    });

    // Update Link WhatsApp
    const shareText = `Ternyata aku cocok banget masuk *${data.title}* di UKM MALAKA! \n\n"${data.why}"\n\nCek kecocokan kamu disini: https://malakaubpkarawang.my.id/tes`;
    document.getElementById('share-btn').href = `https://wa.me/?text=${encodeURIComponent(shareText)}`;
}