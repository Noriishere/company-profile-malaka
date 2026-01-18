<?php

if (php_sapi_name() !== 'cli') {
    exit("Run from CLI only.\n");
}

if (!isset($argv[1])) {
    exit("Usage: php create_seeder.php table_name\n");
}

$table = strtolower($argv[1]);
$class = ucfirst($table) . 'Seeder';

$dir = __DIR__ . '/database/seeders';

if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$filename = $class . '.php';
$path = $dir . '/' . $filename;

if (file_exists($path)) {
    exit("Seeder already exists: $filename\n");
}

$template = <<<PHP
<?php

return function (\$db) {
    \$db->exec("DELETE FROM {$table}");

    \$stmt = \$db->prepare("
        INSERT INTO {$table} () VALUES ()
    ");
    // Di uncomment kalo mau input data
    // \$stmt->execute([...]);
};
PHP;

file_put_contents($path, $template);

echo "Seeder created: database/seeders/$filename\n";