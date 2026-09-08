<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Maintenance - MALAKA</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2C61A7', // Warna Biru Khas Malaka
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'spin-slow': 'spin 3s linear infinite',
                        'bounce-slow': 'bounce 2s infinite',
                    }
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="font-poppins text-slate-800 bg-white h-screen flex flex-col justify-between overflow-hidden">

    <main class="flex-grow flex items-center justify-center relative">
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-50 rounded-full blur-3xl -z-10 animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-blue-100 rounded-full blur-3xl -z-10"></div>

        <div class="container mx-auto px-4 text-center max-w-2xl">

            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-4 leading-tight">
                Website Sedang <br class="hidden md:block" /> 
                <span class="text-primary">Dalam Perbaikan</span>
            </h1>
            
            <p class="text-slate-500 text-sm md:text-lg mb-10 leading-relaxed px-4">
                Mohon maaf atas ketidaknyamanannya. Kami sedang melakukan peningkatan performa sistem dan update fitur terbaru untuk pengalaman yang lebih baik.
                <br class="hidden md:block">
                Silakan kembali lagi nanti!
            </p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <a href="https://wa.me/628988737275" target="_blank" class="w-full md:w-auto px-8 py-3 bg-primary text-white font-bold rounded-full hover:bg-blue-700 transition-all shadow-lg hover:shadow-blue-500/30 flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Hubungi Admin
                </a>
                
                <div class="flex items-center gap-3">
                    <span class="text-sm font-bold text-slate-400 uppercase tracking-wide mr-2">Update Info:</span>
                    <a href="https://www.instagram.com/malaka.ubpkarawang/" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 text-slate-500 flex items-center justify-center hover:bg-pink-500 hover:text-white hover:border-pink-500 transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@malaka_ubpk" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 text-slate-500 flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-all">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

        </div>
    </main>

</body>
</html>