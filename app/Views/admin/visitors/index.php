<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- HEADER -->
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">
                Data Pengunjung
            </h3>
            <p class="text-sm text-slate-500 mt-1">
                Riwayat visitor terbaru website MALAKA
            </p>
        </div>
    </div>

    <!-- TABLE WRAPPER -->
    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="bg-slate-50 text-slate-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4 font-semibold">#</th>
                    <th class="px-6 py-4 font-semibold">IP Address</th>
                    <th class="px-6 py-4 font-semibold">Device / Browser</th>
                    <th class="px-6 py-4 font-semibold">Waktu</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                <?php foreach ($data['visitors'] as $index => $visitor): ?>
                    <tr class="hover:bg-slate-50 transition duration-200">

                        <td class="px-6 py-4 font-medium text-slate-700">
                            <?= $index + 1 ?>
                        </td>

                        <td class="px-6 py-4 text-slate-600 font-mono">
                            <?= htmlspecialchars($visitor['ip_address']) ?>
                        </td>

                        <td class="px-6 py-4 text-slate-600 max-w-md truncate">
                            <?= htmlspecialchars($visitor['user_agent']) ?>
                        </td>

                        <td class="px-6 py-4 text-slate-500">
                            <?= date('d M Y H:i', strtotime($visitor['created_at'])) ?>
                        </td>

                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
        <?php if ($data['totalPages'] > 1): ?>
            <div class="flex items-center justify-between mt-6">

                <!-- PREV -->
                <?php if ($data['currentPage'] > 1): ?>
                    <a href="?page=<?= $data['currentPage'] - 1 ?>&search=<?= $data['search'] ?>&start=<?= $data['start'] ?>&end=<?= $data['end'] ?>&sort=<?= $data['sort'] ?>"
                        class="px-4 py-2 text-sm bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition">
                        ← Prev
                    </a>
                <?php else: ?>
                    <span class="px-4 py-2 text-sm bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed">
                        ← Prev
                    </span>
                <?php endif; ?>


                <!-- PAGE NUMBERS -->
                <div class="flex gap-2">
                    <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                        <a href="?page=<?= $i ?>&search=<?= $data['search'] ?>&start=<?= $data['start'] ?>&end=<?= $data['end'] ?>&sort=<?= $data['sort'] ?>"
                            class="px-4 py-2 text-sm rounded-lg transition
               <?= $i == $data['currentPage']
                            ? 'bg-primary text-white'
                            : 'bg-slate-200 text-slate-700 hover:bg-slate-300' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>


                <!-- NEXT -->
                <?php if ($data['currentPage'] < $data['totalPages']): ?>
                    <a href="?page=<?= $data['currentPage'] + 1 ?>&search=<?= $data['search'] ?>&start=<?= $data['start'] ?>&end=<?= $data['end'] ?>&sort=<?= $data['sort'] ?>"
                        class="px-4 py-2 text-sm bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition">
                        Next →
                    </a>
                <?php else: ?>
                    <span class="px-4 py-2 text-sm bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed">
                        Next →
                    </span>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>

</div>