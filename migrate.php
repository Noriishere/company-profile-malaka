<?php

$db = require __DIR__ . '/app/Core/Migrations.php';

echo "== INIT ==\n";

$db->exec("DROP TABLE IF EXISTS migrations");

$db->exec("
    CREATE TABLE migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

echo "Migration table recreated\n\n";

$files = glob(__DIR__ . '/database/migrations/*.php');
natsort($files);

echo "Files found : " . count($files) . PHP_EOL;
echo "-----------------------------\n";

foreach ($files as $file) {
    $name = basename($file);
    echo "\n▶ Processing: $name\n";

    if (!preg_match('/create_(.+)_table/', $name, $m)) {
        echo "  Table name   : NOT DETECTED\n";
        continue;
    }

    $table = $m[1];
    echo "  Table name   : $table\n";

    $exists = $db->query("
        SELECT COUNT(*)
        FROM information_schema.tables
        WHERE table_schema = DATABASE()
          AND table_name = '{$table}'
    ")->fetchColumn();

    echo "  Table exists : " . ($exists ? 'YES' : 'NO') . "\n";

    $migration = require $file;

    try {
        if ($exists && isset($migration['down'])) {
            echo "  ACTION       : DROP TABLE\n";
            $migration['down']($db);
        }

        echo "  ACTION       : RUN UP\n";
        $migration['up']($db);

        $stmt = $db->prepare(
            "INSERT INTO migrations (migration) VALUES (?)"
        );
        $stmt->execute([$name]);

        echo "  RESULT       : REBUILT\n";

    } catch (Throwable $e) {
        echo "  RESULT       : FAILED\n";
        throw $e;
    }
}

echo "\n== MIGRATION FINISHED ==\n";