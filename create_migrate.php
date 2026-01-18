<?php
if (php_sapi_name() !== 'cli') {
    exit("Run from CLI only.\n");
}

if (!isset($argv[1])) {
    exit("Usage: php create_migrates.php table_name\n");
}

$table = strtolower($argv[1]);
$dir   = __DIR__ . '/database/migrations';

if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$files = glob($dir . '/*.php');

$nextNumber = 1;
if ($files) {
    natsort($files);
    $lastFile = basename(end($files));
    $nextNumber = (int) explode('_', $lastFile)[0] + 1;
}

$number = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
$filename = "{$number}_create_{$table}_table.php";
$path = "$dir/$filename";

$template = <<<PHP
<?php

return [
    'table' => '{$table}',

    'up' => function (\$db) {
        \$db->exec("
            CREATE TABLE IF NOT EXISTS {$table} (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    },

    'down' => function (\$db) {
        \$db->exec("DROP TABLE IF EXISTS {$table}");
    }
];
PHP;

file_put_contents($path, $template);

echo "Migration created: $filename\n";