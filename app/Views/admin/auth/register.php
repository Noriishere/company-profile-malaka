<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $judul ?? 'Register Admin' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-600 to-teal-700 font-[Poppins]">

<div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
    <h1 class="text-2xl font-semibold text-center mb-6">Register Admin</h1>

    <?php if (!empty($error)): ?>
        <div class="mb-4 text-sm text-red-600 bg-red-100 p-3 rounded-lg">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <input
            type="text"
            name="nama_lengkap"
            placeholder="Nama Lengkap"
            required
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500"
        >

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500"
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500"
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-emerald-500"
        >

        <button class="w-full py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">
            Register
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        Sudah punya akun?
        <a href="<?= BASE_URL ?>admin/auth" class="text-emerald-600 hover:underline">
            Login
        </a>
    </p>
</div>

</body>
</html>
