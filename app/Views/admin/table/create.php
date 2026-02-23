<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Tambah Admin</h1>
        <p class="text-sm text-gray-500">Buat akun administrator baru</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 max-w-2xl">

        <?php if (!empty($error)): ?>
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-6">

            <div>
                <label class="block text-sm text-gray-600 mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Username</label>
                <input type="text" name="username"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Email</label>
                <input type="email" name="email"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Password</label>
                <input type="password" name="password"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Role</label>
                <select name="role"
                        class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>

            <div class="pt-4">
                <button class="px-6 py-3 bg-biru text-white rounded-xl shadow hover:shadow-lg transition">
                    Simpan Admin
                </button>
            </div>

        </form>

    </div>

</div>