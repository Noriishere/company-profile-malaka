<?php

return [
    'table' => 'posts',

    'up' => function ($db) {
        $db->exec("
            CREATE TABLE IF NOT EXISTS posts (
                id BIGINT AUTO_INCREMENT PRIMARY KEY,
                user_id BIGINT NOT NULL,
                title varchar(30) unique NOT NULL,
                image1 varchar(50) NOT NULL,
                paragraph1 text NOT NULL,
                image2 varchar(50),
                paragraph2 text,
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
        $db->exec("DROP TABLE IF EXISTS posts");
    }
];