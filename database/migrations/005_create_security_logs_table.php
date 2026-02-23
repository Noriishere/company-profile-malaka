<?php

return [
    'table' => 'security_logs',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE security_logs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NULL,
                ip_address VARCHAR(45) NOT NULL,
                user_agent TEXT NULL,
                action VARCHAR(50) NOT NULL,
                status VARCHAR(20) NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            );
        ");
    },

    'down' => function ($db) {
        $db->exec("DROP TABLE IF EXISTS security_logs");
    }
];