<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// config
require_once __DIR__ . '/../app/Config/config.php';

// autoload sederhana
spl_autoload_register(function ($class) {
    $prefix = 'Malaka\\CompanyProfile\\';
    $baseDir = __DIR__ . '/../app/';

    if (str_starts_with($class, $prefix)) {
        $relative = str_replace($prefix, '', $class);
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

// timezone
date_default_timezone_set('Asia/Jakarta');
