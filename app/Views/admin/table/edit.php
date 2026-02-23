<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Edit Admin</h1>
        <p class="text-sm text-gray-500">Perbarui informasi akun administrator</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 max-w-2xl">

        <form method="POST" class="space-y-6">
            <div>
                <label class="block text-sm text-gray-600 mb-2">Username</label>
                <input type="text" name="username"
                       value="<?= htmlspecialchars($admin['username']) ?>"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Email</label>
                <input type="email" name="email"
                       value="<?= htmlspecialchars($admin['email']) ?>"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">
                    Password Baru
                    <span class="text-xs text-gray-400">(Kosongkan jika tidak ingin mengganti)</span>
                </label>
                <input type="password" name="password"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-2">Role</label>
                <select name="role"
                        class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">

                    <option value="admin"
                        <?= $admin['role'] === 'admin' ? 'selected' : '' ?>>
                        Admin
                    </option>

                    <option value="super_admin"
                        <?= $admin['role'] === 'super_admin' ? 'selected' : '' ?>>
                        Super Admin
                    </option>

                </select>
            </div>

            <div class="pt-4 flex gap-4">
                <button class="px-6 py-3 bg-biru text-white rounded-xl shadow hover:shadow-lg transition">
                    Simpan Perubahan
                </button>

                <a href="<?= BASE_URL ?>admin/table"
                   class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>