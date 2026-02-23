<?php

return function ($db) {
    // $db->exec("DELETE FROM users");

    $stmt = $db->prepare("
        INSERT INTO users (username, password, email,role) VALUES (?,?,?,?)
    ");
    // kalo ada isinya baru di uncomment
    $stmt->execute([
        'malakapost',
        password_hash('Malaka2026ubpk', PASSWORD_BCRYPT),
        'malakapost@malaka.com',
        'admin'
    ]);
};