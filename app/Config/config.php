<?php
$host = $_SERVER['HTTP_HOST'] ?? 'company-profile-malaka.test';
define('BASE_URL', 'http://' . $host . '/');
define('BASE_ASSET', BASE_URL);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);