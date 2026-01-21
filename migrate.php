<?php

$db = require __DIR__ . '/app/Core/Migrations.php';
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function tableExists(PDO $db, string $table): bool
{
    return (bool) $db->query("
        SELECT 1
        FROM information_schema.tables
        WHERE table_schema = DATABASE()
          AND table_name = '{$table}'
        LIMIT 1
    ")->fetchColumn();
}

function tableHasRows(PDO $db, string $table): bool
{
    return (bool) $db->query("SELECT 1 FROM `$table` LIMIT 1")->fetchColumn();
}

echo "== MIGRATION START ==\n\n";

$db->exec("DROP TABLE IF EXISTS migrations");

$db->exec("
    CREATE TABLE migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255) NOT NULL,
        executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

$files = glob(__DIR__ . '/database/migrations/*.php');
natsort($files);

foreach ($files as $file) {

    $name = basename($file);
    echo "▶ {$name}\n";

    $migration = require $file;

    if (!isset($migration['table'], $migration['up'])) {
        echo "  SKIP (invalid migration)\n\n";
        continue;
    }

    $table  = $migration['table'];
    $exists = tableExists($db, $table);

    echo "  TABLE   : {$table}\n";
    echo "  EXISTS  : " . ($exists ? 'YES' : 'NO') . "\n";

    try {

        if ($exists && isset($migration['down'])) {
            if (tableHasRows($db, $table)) {
                echo "  DROP    : SKIPPED (has data)\n";
            } else {
                try {
                    $migration['down']($db);
                    echo "  DROP    : OK\n";
                } catch (PDOException $e) {
                    if ($e->getCode() == 3730) {
                        echo "  DROP    : SKIPPED (FK)\n";
                    } else {
                        throw $e;
                    }
                }
            }
        }

        $migration['up']($db);
        echo "  UP      : OK\n";

        $stmt = $db->prepare(
            "INSERT INTO migrations (migration) VALUES (?)"
        );
        $stmt->execute([$name]);

        echo "  RESULT  : DONE\n\n";

    } catch (Throwable $e) {
        echo "  RESULT  : FAILED\n";
        echo "  ERROR   : {$e->getMessage()}\n\n";
        exit(1);
    }
}

echo "== MIGRATION FINISHED ==\n";