<?php
$status = $data['status'];
$isActive = (int)$status['is_active'] === 1;
?>
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-slate-200">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">
                Maintenance Mode
            </h1>
            <p class="text-sm text-slate-500 mt-2">
                Aktifkan mode maintenance untuk menonaktifkan akses pengguna sementara.
            </p>
        </div>

        <!-- Status -->
        <div class="flex items-center justify-between bg-slate-50 border border-slate-200 rounded-xl p-4 mb-6">
            <div>
                <p class="text-sm text-slate-500">Status Saat Ini</p>
                <p class="text-lg font-semibold <?= $isActive ? 'text-red-600' : 'text-green-600' ?>">
                    <?= $isActive ? 'Maintenance Aktif' : 'Website Live' ?>
                </p>

                <?php if ($isActive && !empty($status['until'])): ?>
                    <p class="text-xs text-slate-400 mt-1">
                        Sampai: <?= date('d M Y H:i', strtotime($status['until'])) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Form -->
            <form method="POST" action="/admin/maintenance/update" class="space-y-6">

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Aktifkan Maintenance?
                    </label>

                    <select name="is_active"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                        <option value="0">Tidak</option>
                        <option value="1">Ya, Aktifkan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Sampai Tanggal (Opsional)
                    </label>
                    <input type="datetime-local"
                        name="until"
                        class="w-full border border-slate-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">
                    <p class="text-xs text-slate-400 mt-2">
                        Kosongkan jika ingin manual dimatikan.
                    </p>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-xl font-semibold transition-all duration-300">
                        Simpan Pengaturan
                    </button>
                </div>

            </form>
        </div>
    </div>