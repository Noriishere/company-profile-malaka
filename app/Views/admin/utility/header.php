<?php

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH) ?? '/';

$basePath = '';
if (defined('BASE_URL')) {
    $basePath = trim(parse_url(BASE_URL, PHP_URL_PATH) ?? '', '/');
}

if ($basePath && str_starts_with(trim($path, '/'), $basePath)) {
    $path = substr(trim($path, '/'), strlen($basePath));
}

$currentPath = trim($path, '/');

$menus = [
    [
        'label' => 'Dashboard',
        'href'  => 'admin/dashboard',
        'icon'  => 'fa-house',
    ],
    [
        'label' => 'Posting Berita',
        'href'  => 'admin/post',
        'icon'  => 'fa-newspaper',
    ],
    [
        'label' => 'Table',
        'icon'  => 'fa-table',
        'children' => [
            [
                'label' => 'Admin',
                'href'  => 'admin/table/admin',
                'icon'  => 'fa-user-shield',
            ],
            [
                'label' => 'User',
                'href'  => 'admin/user',
                'icon'  => 'fa-users',
            ]
        ],
    ],

    [
        'label' => 'Account',
        'icon'  => 'fa-user-gear',
        'children' => [
            [
                'label' => 'Detail',
                'href'  => 'admin/profile',
                'icon'  => 'fa-id-card',
            ],
            [
                'label' => 'Laporan visitor',
                'href'  => 'admin/visitors/index',
                'icon'  => 'fa-file '
            ],
            [
                'label' => 'Logout',
                'href'  => 'admin/logout',
                'icon'  => 'fa-right-from-bracket',
                'danger' => true,
            ],
        ],
    ],
];

function isActive(string $href, string $currentPath): bool
{
    $href = trim($href, '/');
    $currentPath = trim($currentPath, '/');

    return $currentPath === $href || str_starts_with($currentPath, $href . '/');
}

function isGroupActive(array $children, string $currentPath): bool
{
    foreach ($children as $child) {
        if (isset($child['href']) && isActive($child['href'], $currentPath)) {
            return true;
        }
    }
    return false;
}

function pillClasses(bool $active): string
{
    $base = 'flex items-center gap-4 px-5 py-3 rounded-xl text-[15px] font-medium transition-all duration-200';

    return $active
        ? $base . ' bg-black text-brand-500'
        : $base . ' text-black hover:bg-abu hover:text-biru';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $data['Judul'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="<?= BASE_URL ?>/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#paragraph',
            height: 300,
            menubar: false,
            plugins: 'lists link image media code table fullscreen',
            toolbar: 'undo redo | h2 h3 | bold italic underline code | ' +
                'alignleft aligncenter alignright | ' +
                'bullist numlist | link | fullscreen code',
            branding: false
        });
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        biru: '#2C61A7',
                        abu: '#E4E2DC'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-abu">
    <button onclick="toggleSidebar()" class="fixed top-4 left-4 z-50 p-2 rounded-lg bg-biru shadow text-white lg:hidden">
        <i class="fa-solid fa-bars text-lg"></i>
    </button>

    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 z-40 bg-black/40 hidden lg:hidden"></div>

    <aside id="sidebar" class="bg-biru text-white fixed top-0 left-0 z-50 h-screen w-64 flex flex-col gap-6 py-6 px-4 border-r border-gray-200 bg-backgroun transition-transform duration-300 transform -translate-x-full lg:translate-x-0">
        <div class="flex items-center gap-3 px-2">
            <img src="<?= BASE_URL ?>image/logo_malaka.png" class="h-10 w-10">
            <span class="text-2xl font-bold text-brand-500">
                MALAKA
            </span>
        </div>

        <nav class="mt-8 flex flex-col gap-1 text-sm">

            <?php foreach ($menus as $menu): ?>
                <?php if (isset($menu['children'])): ?>
                    <?php $groupActive = isGroupActive($menu['children'], $currentPath); ?>

                    <details class="group" <?= $groupActive ? 'open' : '' ?>>
                        <summary
                            class="<?= pillClasses($groupActive); ?> cursor-pointer flex justify-between">
                            <span class="flex items-center gap-4">
                                <i class="fa-solid <?= $menu['icon']; ?> w-5"></i>
                                <?= htmlspecialchars($menu['label']); ?>
                            </span>
                            <i class="fa-solid fa-chevron-down text-xs transition group-open:rotate-180"></i>
                        </summary>

                        <div class="mt-2 ml-4 flex flex-col gap-1">
                            <?php foreach ($menu['children'] as $child): ?>
                                <?php $active = isActive($child['href'], $currentPath); ?>
                                <a href="<?= BASE_URL . $child['href'] ?>">
                                    <div class="<?= pillClasses($active); ?>
                            <?= !empty($child['danger']) ? 'text-red-600 hover:bg-red-50' : '' ?>">
                                        <i class="fa-solid <?= $child['icon']; ?> w-5 text-sm"></i>
                                        <?= htmlspecialchars($child['label']); ?>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </details>

                <?php else: ?>
                    <?php $active = isActive($menu['href'], $currentPath); ?>
                    <a href="<?= BASE_URL . $menu['href'] ?>">
                        <div class="<?= pillClasses($active); ?>">
                            <i class="fa-solid <?= $menu['icon']; ?> w-5"></i>
                            <?= htmlspecialchars($menu['label']); ?>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
    </aside>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }
    </script>