<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $judul ?? 'Login' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass-card {
            backdrop-filter: blur(18px);
            background: rgba(255,255,255,0.85);
        }

        .input-style {
            transition: all .3s ease;
        }

        .input-style:focus {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-700 via-purple-700 to-indigo-900">

<div class="w-full max-w-md glass-card rounded-3xl shadow-2xl p-10 border border-white/20">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-semibold text-gray-800 tracking-wide">
            Admin Panel
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Secure Access Portal
        </p>
    </div>

    <form method="POST" class="space-y-6" id="loginForm">

        <div>
            <label class="text-sm text-gray-600">Username</label>
            <input
                type="text"
                name="username"
                required
                class="input-style w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none"
            >
        </div>

        <div>
            <label class="text-sm text-gray-600">Password</label>
            <input
                type="password"
                name="password"
                required
                class="input-style w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none"
            >
        </div>

        <button
            id="loginBtn"
            class="w-full py-3 rounded-xl bg-indigo-600 text-white font-medium tracking-wide hover:bg-indigo-700 transition duration-300 shadow-lg hover:shadow-indigo-500/40"
        >
            Sign In
        </button>

    </form>

    <p class="text-center text-xs text-gray-400 mt-8">
        © <?= date('Y') ?> Malaka Company Profile
    </p>

</div>

<?php if (!empty($error)): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Authentication Failed',
    text: '<?= $error ?>',
    background: '#ffffff',
    color: '#1f2937',
    confirmButtonColor: '#4f46e5',
    customClass: {
        popup: 'rounded-3xl shadow-2xl',
        confirmButton: 'px-6 py-2 rounded-xl text-sm font-medium'
    },
    showClass: {
        popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    }
});
</script>
<?php endif; ?>

<script>
const form = document.getElementById('loginForm');
const btn = document.getElementById('loginBtn');

form.addEventListener('submit', function() {
    btn.innerHTML = 'Authenticating...';
    btn.classList.add('opacity-80');
});
</script>

</body>
</html>