<?php

return [
    'table' => 'maintenance',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE IF NOT EXISTS maintenance (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                is_active TINYINT(1) NOT NULL DEFAULT 0,
                until DATETIME NULL,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    },

    'down' => function ($db) {
        $db->exec("DROP TABLE IF EXISTS maintenance");
    }
];