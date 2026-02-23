<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>403 Forbidden</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    biru: '#2C61A7',
                    abu: '#E4E2DC'
                }
            }
        }
    }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50 flex items-center justify-center px-6">

    <div class="max-w-2xl w-full bg-white rounded-2xl shadow-xl border border-gray-200">

        <!-- Header Bar -->
        <div class="h-2 bg-biru rounded-t-2xl"></div>

        <div class="p-12 text-center">

            <!-- Code -->
            <h1 class="text-6xl font-semibold text-biru tracking-wide">
                403
            </h1>

            <!-- Title -->
            <h2 class="mt-6 text-2xl font-medium text-gray-800">
                Akses Ditolak
            </h2>

            <!-- Description -->
            <p class="mt-4 text-gray-600 text-sm leading-relaxed max-w-md mx-auto">
                Sistem mendeteksi bahwa Anda tidak memiliki izin yang diperlukan
                untuk mengakses halaman ini.
                <br class="hidden sm:block">
                Silakan kembali ke halaman sebelumnya atau hubungi administrator.
            </p>

            <!-- Divider -->
            <div class="w-16 h-px bg-gray-300 mx-auto my-10"></div>

            <!-- Action -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">

                <a href="<?= BASE_URL ?>"
                   class="px-6 py-3 bg-biru text-white rounded-lg shadow hover:shadow-md transition duration-200">
                    Kembali ke Beranda
                </a>

                <button onclick="history.back()"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition duration-200">
                    Halaman Sebelumnya
                </button>

            </div>

        </div>

        <!-- Footer -->
        <div class="bg-gray-50 text-center py-4 text-xs text-gray-400 rounded-b-2xl border-t">
            © <?= date('Y') ?> Malaka Company Profile — System Access Control
        </div>

    </div>

</body>
</html>