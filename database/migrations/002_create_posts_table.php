<?php

return [
    'table' => 'posts',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE IF NOT EXISTS posts (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                user_id BIGINT NOT NULL,

                title VARCHAR(255) NOT NULL,
                thumbnail VARCHAR(255) NOT NULL,
                category VARCHAR(100) NOT NULL,
                paragraph TEXT NOT NULL,

                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

                CONSTRAINT fk_posts_user
                    FOREIGN KEY (user_id)
                    REFERENCES users(id)
                    ON DELETE CASCADE
                    ON UPDATE CASCADE
            )
        ");
    },

    'down' => function ($db) {
        $db->exec('DROP TABLE IF EXISTS posts');
    }
];
