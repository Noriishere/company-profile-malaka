# Bikin views




# Cara Migrasi database

Ikuti tutorial agar paham

---

### Create migrate

Jalanin ini di CMD

```
php create_migrate.php 'nama_table'
```

Syntax diatas digunakan untuk otomatisasi membuat file migrasi yang berada di lokasi:

```

C:/folder-web/database/migtrations/xxx_create_namaTable_table.php

```

Ubah saja code didalam sesuai kebutuhan, kalo paham basis data pasti mudah bikin syntax SQLnya

```

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

```

### Migrate

Jalanin ini di CMD

```
php migrate.php
```

Fungsi? untuk buat table secara langsung di database

### Create Seeder

Jalanin ini di CMD

```
php create_seeder.php 'nama_table'
```

Syntax diatas digunakan untuk otomatisasi membuat file seeder yang berada di lokasi:

```

C:/folder-web/database/seeders/namatableSeeder.php

```

Ubah saja code didalam sesuai kebutuhan, kalo paham basis data pasti mudah bikin syntax SQLnya

```

<?php

return function ($db) {
    $db->exec("DELETE FROM users");

    $stmt = $db->prepare("
        INSERT INTO users (username, password, email,role) VALUES (?,?,?,?)
    ");
    $stmt->execute([
        'malakapost',
        password_hash('admin123', PASSWORD_BCRYPT),
        'malaka@post.com',
        'admin'
    ]);
};

```

### Seeder

Jalanin ini di CMD

```
php seed.php
```

Fungsi? untuk input langsung ke database spesifiknya langsung ke table tujuan seeder
