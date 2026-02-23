<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Manage Admin</h1>
            <p class="text-sm text-gray-500">Kelola semua akun administrator sistem</p>
        </div>

        <a href="<?= BASE_URL ?>admin/table/create"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-biru text-white rounded-xl shadow hover:shadow-lg transition duration-300">
            + Tambah Admin
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-abu text-gray-600 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Username</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    <?php foreach ($admins as $admin): ?>
                    <tr class="hover:bg-gray-50 transition duration-200">

                        <td class="px-6 py-4 text-gray-600">
                            <?= htmlspecialchars($admin['username']) ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?= htmlspecialchars($admin['email']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php if ($admin['role'] === 'super_admin'): ?>
                                <span class="px-3 py-1 text-xs rounded-full bg-biru/10 text-biru font-medium">
                                    Super Admin
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-600 font-medium">
                                    Admin
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4 text-center">

                            <?php if ($admin['role'] !== 'super_admin'): ?>
                                <div class="flex items-center justify-center gap-4">

                                    <a href="<?= BASE_URL ?>admin/table/edit/<?= $admin['id'] ?>"
                                       class="text-biru hover:underline text-sm">
                                       Edit
                                    </a>

                                    <a href="<?= BASE_URL ?>admin/table/delete/<?= $admin['id'] ?>"
                                       class="text-red-500 hover:underline text-sm">
                                       Delete
                                    </a>

                                </div>
                            <?php else: ?>
                                <span class="text-gray-400 text-sm">Protected</span>
                            <?php endif; ?>

                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <!-- Footer Info -->
        <div class="px-6 py-4 bg-gray-50 text-xs text-gray-500">
            Total Admin: <?= count($admins) ?>
        </div>

    </div>

</div>