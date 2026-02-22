<?php

namespace Malaka\CompanyProfile\Models;

use Malaka\CompanyProfile\Core\Database;

class AdminModel extends Database
{
    private $tb = 'users';

    public function getAdminByUsername($username)
    {
        $this->query("SELECT * FROM {$this->tb} WHERE username = :username");
        $this->bindValue('username', $username);
        return $this->single();
    }
    public function createAdmin(array $data): bool
    {
        $this->query("
            INSERT INTO {$this->tb} (nama_lengkap, username, email, password)
            VALUES (:nama_lengkap, :username, :email, :password)
        ");

        $this->bindValue('nama_lengkap', $data['nama_lengkap']);
        $this->bindValue('username',   $data['username']);
        $this->bindValue('email',      $data['email']);
        $this->bindValue('password',   $data['password']);

        return $this->execute();
    }
}
