<?php

return [
    'table' => 'visitors',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE IF NOT EXISTS visitors (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                visitor_token varchar(255) NOT NULL,
                ip_address varchar(255) NOT NULL,
                user_agent text NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    },

    'down' => function ($db) {
        $db->exec("DROP TABLE IF EXISTS visitors");
    }
];