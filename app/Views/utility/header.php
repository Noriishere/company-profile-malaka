<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['Judul'] ?? 'Malaka - Mahasiswa Melawan Narkotika') ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2C61A7',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        marquee: 'marquee 25s linear infinite',
                    },
                    keyframes: {
                        marquee: {
                            '0%': {
                                transform: 'translateX(0%)'
                            },
                            '100%': {
                                transform: 'translateX(-100%)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-poppins text-slate-800 bg-white min-h-screen flex flex-col">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                <a href="<?= BASE_URL ?>">
                    <img src="<?= BASE_URL ?>image/logo_malaka.png" alt="Malaka" class="h-10">
                </a>

                <!-- DESKTOP MENU -->
                <ul class="hidden lg:flex items-center gap-8">
                    <li>
                        <a href="<?= BASE_URL ?>#beranda"
                            class="text-black hover:text-primary transition font-medium text-sm">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="<?= BASE_URL ?>#tentang"
                            class="text-black hover:text-primary transition font-medium text-sm">
                            Tentang Kami
                        </a>
                    </li>

                    <li class="relative group h-full flex items-center">
                        <a href="<?= BASE_URL ?>#struktur"
                            class="text-black hover:text-primary transition font-medium text-sm flex items-center gap-1 cursor-pointer">
                            Divisi
                            <i
                                class="fa-solid fa-chevron-down text-[10px] transition-transform group-hover:rotate-180"></i>
                        </a>

                        <div
                            class="absolute top-full left-0 w-60 bg-white border border-gray-100 shadow-lg rounded-lg opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 transform z-50">
                            <div class="py-2 flex flex-col">
                                <a href="<?= BASE_URL ?>divisi/bph"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Badan Pengurus Harian
                                </a>
                                <a href="<?= BASE_URL ?>divisi/jarkom"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Divisi Jarkom
                                </a>
                                <a href="<?= BASE_URL ?>divisi/disiplin"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Divisi Disiplin
                                </a>
                                <a href="<?= BASE_URL ?>divisi/pencegahan"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Divisi Pencegahan
                                </a>
                                <a href="<?= BASE_URL ?>divisi/perencanaan"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Divisi Perencanaan
                                </a>
                                <a href="<?= BASE_URL ?>divisi/psda"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Divisi PSDA
                                </a>
                                <a href="<?= BASE_URL ?>divisi/penjaminan-mutu"
                                    class="px-4 py-2 text-sm text-black hover:bg-primary hover:text-white transition-colors">
                                    Divisi Penjaminan Mutu
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="<?= BASE_URL ?>berita"
                            class="text-black hover:text-primary transition font-medium text-sm">
                            Berita
                        </a>
                    </li>

                    <li>
                        <a href="<?= BASE_URL ?>kontak"
                            class="text-black hover:text-primary transition font-medium text-sm">
                            Kontak
                        </a>
                    </li>
                </ul>

                <!-- MOBILE BUTTON -->
                <button id="mobileMenuBtn"
                    class="lg:hidden text-primary text-2xl p-2 focus:outline-none">
                    <i class="fa-solid fa-bars transition-all duration-300"></i>
                </button>
            </div>
        </nav>

        <!-- MOBILE MENU -->
        <div id="mobileMenu"
            class="hidden lg:hidden bg-white border-t border-slate-100 shadow-2xl absolute top-full left-0 w-full z-40 transition-all duration-300 origin-top max-h-[85vh] overflow-y-auto rounded-b-3xl">

            <ul class="flex flex-col py-4">
                <li>
                    <a href="<?= BASE_URL ?>#beranda"
                        class="mobile-link block px-8 py-3 text-black hover:text-primary hover:bg-slate-50 transition font-medium">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>#tentang"
                        class="mobile-link block px-8 py-3 text-black hover:text-primary hover:bg-slate-50 transition font-medium">
                        Tentang Kami
                    </a>
                </li>

                <li>
                    <button id="mobileDivisiBtn"
                        class="w-full flex justify-between items-center px-8 py-3 text-black hover:text-primary hover:bg-slate-50 transition font-medium focus:outline-none">
                        <span>Divisi</span>
                        <i id="mobileDivisiIcon"
                            class="fa-solid fa-chevron-down text-xs transition-transform duration-300"></i>
                    </button>

                    <ul id="mobileDivisiMenu"
                        class="hidden bg-slate-50 border-y border-slate-100/50">

                        <li><a href="<?= BASE_URL ?>divisi/bph"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Badan Pengurus Harian
                            </a></li>

                        <li><a href="<?= BASE_URL ?>divisi/jarkom"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Divisi Jarkom
                            </a></li>

                        <li><a href="<?= BASE_URL ?>divisi/disiplin"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Divisi Disiplin
                            </a></li>

                        <li><a href="<?= BASE_URL ?>divisi/pencegahan"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Divisi Pencegahan
                            </a></li>

                        <li><a href="<?= BASE_URL ?>divisi/perencanaan"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Divisi Perencanaan
                            </a></li>

                        <li><a href="<?= BASE_URL ?>divisi/psda"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Divisi PSDA
                            </a></li>

                        <li><a href="<?= BASE_URL ?>divisi/penjaminan-mutu"
                                class="mobile-link block px-12 py-3 text-sm text-slate-600 hover:text-primary">
                                Divisi Penjaminan Mutu
                            </a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>#berita"
                        class="mobile-link block px-8 py-3 text-black hover:text-primary hover:bg-slate-50 transition font-medium">
                        Berita
                    </a>
                </li>

                <li>
                    <a href="<?= BASE_URL ?>#kontak"
                        class="mobile-link block px-8 py-3 text-black hover:text-primary hover:bg-slate-50 transition font-medium">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <script>
        // LOGIKA MOBILE MENU
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            const icon = mobileMenuBtn.querySelector('i');

            function toggleMenu() {
                mobileMenu.classList.toggle('hidden');

                // Ubah icon burger <-> silang
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-xmark');
                }
            }

            mobileMenuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleMenu();
            });

            // LOGIKA DROPDOWN DIVISI (MOBILE)
            const mobileDivisiBtn = document.getElementById('mobileDivisiBtn');
            const mobileDivisiMenu = document.getElementById('mobileDivisiMenu');
            const mobileDivisiIcon = document.getElementById('mobileDivisiIcon');

            if (mobileDivisiBtn && mobileDivisiMenu && mobileDivisiIcon) {
                mobileDivisiBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    mobileDivisiMenu.classList.toggle('hidden');

                    if (mobileDivisiMenu.classList.contains('hidden')) {
                        mobileDivisiIcon.classList.remove('rotate-180');
                    } else {
                        mobileDivisiIcon.classList.add('rotate-180');
                    }
                });
            }

            // Tutup menu saat link diklik
            const mobileLinks = document.querySelectorAll('.mobile-link');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');

                    // Reset dropdown divisi juga
                    if (mobileDivisiMenu) {
                        mobileDivisiMenu.classList.add('hidden');
                        if (mobileDivisiIcon) mobileDivisiIcon.classList.remove('rotate-180');
                    }
                });
            });

            // Tutup menu jika klik di luar
            document.addEventListener('click', (e) => {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        icon.classList.remove('fa-xmark');
                        icon.classList.add('fa-bars');

                        // Reset dropdown divisi
                        if (mobileDivisiMenu) {
                            mobileDivisiMenu.classList.add('hidden');
                            if (mobileDivisiIcon) mobileDivisiIcon.classList.remove('rotate-180');
                        }
                    }
                }
            });
        }
    </script>