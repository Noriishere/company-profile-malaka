<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Tambah Data</h1>
        <p class="text-sm text-gray-500">
            File: <span class="font-medium"><?= htmlspecialchars($filename) ?></span>
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 max-w-2xl">

        <form method="POST" class="space-y-6">

            <div>
                <label class="block text-sm text-gray-600 mb-2">Nama</label>
                <input type="text" name="nama" required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none transition">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Jabatan</label>
                <input type="text" name="jabatan" required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none transition">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Foto</label>
                <input type="text" name="foto" required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none transition">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Ultah</label>
                <input type="text" name="ultah" required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none transition">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Instagram</label>
                <input type="text" name="instagram" required
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none transition">
            </div>

            <div class="pt-4 flex gap-4">

                <button class="px-6 py-3 bg-biru text-white rounded-xl shadow hover:shadow-lg transition duration-300">
                    Simpan Data
                </button>

                <a href="<?= BASE_URL ?>admin/json/viewJson/<?= $filename ?>"
                   class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>