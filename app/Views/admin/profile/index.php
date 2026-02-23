<div class="min-h-screen ml-0 lg:ml-64 px-4 sm:px-6 lg:px-8 pt-20 lg:pt-10 space-y-8">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Profile</h1>
        <p class="text-sm text-gray-500">Kelola informasi akun Anda</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 max-w-2xl">

        <form method="POST" action="<?= BASE_URL ?>admin/profile/update" class="space-y-6">

            <!-- Username (Readonly) -->
            <div>
                <label class="block text-sm text-gray-600 mb-2">Username</label>
                <input type="text"
                       value="<?= htmlspecialchars($user['username']) ?>"
                       disabled
                       class="w-full px-4 py-3 bg-gray-100 border rounded-xl">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm text-gray-600 mb-2">Email</label>
                <input type="email"
                       name="email"
                       value="<?= htmlspecialchars($user['email']) ?>"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm text-gray-600 mb-2">
                    Password Baru
                    <span class="text-xs text-gray-400">(Kosongkan jika tidak ingin mengganti)</span>
                </label>
                <input type="password"
                       name="password"
                       class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-biru outline-none">
            </div>

            <!-- Button -->
            <div class="pt-4">
                <button class="px-6 py-3 bg-biru text-white rounded-xl shadow hover:shadow-lg transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>