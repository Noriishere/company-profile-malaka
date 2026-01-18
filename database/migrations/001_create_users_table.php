<?php

return [
    'table' => 'users',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE IF NOT EXISTS users (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                username varchar(100) unique,
                password varchar(100),
                email varchar(100) unique,
                role enum('user', 'admin'),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    },

    'down' => function ($db) {
        $db->exec("DROP TABLE IF EXISTS users");
    }
];