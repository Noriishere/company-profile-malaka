<?php

$db = require __DIR__ . '/app/Core/Migrations.php';

$files = glob(__DIR__ . '/database/seeders/*.php');
natsort($files);

echo "== SEEDING START ==\n";
echo "Seeders found: " . count($files) . "\n";

foreach ($files as $file) {
    $name = basename($file);
    echo "▶ Running: $name\n";

    $seeder = require $file;
    $seeder($db);

    echo "✔ Done: $name\n";
}

echo "== SEEDING FINISHED ==\n";
