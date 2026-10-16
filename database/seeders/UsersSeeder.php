<?php

return function ($db) {
    // $db->exec("DELETE FROM users");

    $stmt = $db->prepare("
        INSERT INTO users (username, password, email,role) VALUES (?,?,?,?)
    ");
    // kalo ada isinya baru di uncomment
    $stmt->execute([
    ]);
};
