<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">JSON Storage</h1>
            <p class="text-sm text-gray-500">Kelola seluruh file data JSON</p>
        </div>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($files as $file): ?>
        <a href="<?= BASE_URL ?>admin/json/viewJson/<?= $file ?>"
           class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100 p-6">

            <div class="flex items-center gap-4">
                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-yellow-100 text-yellow-500 text-xl group-hover:scale-110 transition">
                    <i class="fa-solid fa-folder"></i>
                </div>

                <div>
                    <p class="font-medium text-gray-800 truncate"><?= htmlspecialchars($file) ?></p>
                    <p class="text-xs text-gray-400">JSON File</p>
                </div>
            </div>

        </a>
        <?php endforeach; ?>

    </div>

</div>