<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Manage JSON Data</h1>
            <p class="text-sm text-gray-500">
                File: <span class="font-medium"><?= htmlspecialchars($filename) ?></span>
            </p>
        </div>

        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-500">
                Total Data: <span class="font-semibold text-biru"><?= $total ?></span>
            </span>

            <a href="<?= BASE_URL ?>admin/json/create/<?= $filename ?>"
                class="px-5 py-2.5 bg-biru text-white rounded-xl shadow hover:shadow-lg transition duration-300">
                + Tambah Data
            </a>
        </div>
    </div>

    <!-- Card Container -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 space-y-4">

        <?php if (empty($members)): ?>
            <div class="text-center text-gray-400 py-12">
                <i class="fa-solid fa-folder-open text-4xl mb-4"></i>
                <p class="text-sm">Belum ada data di file ini.</p>
            </div>
        <?php endif; ?>

        <?php foreach ($members as $index => $m): ?>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border border-gray-100 rounded-xl p-5 hover:shadow-md transition duration-200">

                <!-- Left -->
                <div>
                    <h3 class="font-semibold text-gray-800 text-lg">
                        <?= htmlspecialchars($m['nama']) ?>
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        <?= htmlspecialchars($m['jabatan']) ?>
                    </p>

                    <div class="flex flex-wrap gap-4 text-xs text-gray-400 mt-3">
                        <span>Ultah: <?= htmlspecialchars($m['ultah']) ?></span>
                        <span>Instagram: <?= htmlspecialchars($m['instagram']) ?></span>
                    </div>
                </div>

                <!-- Right -->
                <div class="flex items-center gap-6 text-sm">

                    <a href="<?= BASE_URL ?>admin/json/edit/<?= $filename ?>/<?= $index ?>"
                        class="text-biru hover:underline font-medium">
                        Edit
                    </a>

                    <a href="<?= BASE_URL ?>admin/json/delete/<?= $filename ?>/<?= $index ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                        class="text-red-500 hover:underline font-medium">
                        Delete
                    </a>

                </div>

            </div>
        <?php endforeach; ?>
        <a href="<?= BASE_URL ?>admin/json" class="text-sm text-biru hover:underline ">Kembali ke Daftar File</a>
    </div>

</div>