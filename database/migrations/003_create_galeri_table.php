<?php

return [
    'table' => 'galeri',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE IF NOT EXISTS galeri (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    },

    'down' => function ($db) {
        $db->exec("DROP TABLE IF EXISTS galeri");
    }
];