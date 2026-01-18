<?php

namespace Malaka\CompanyProfile\Models;

use Malaka\CompanyProfile\Core\Database;

class AdminModel extends Database
{
    private $tb = 'users';
    public function isVisited($token)
    {
        $this->query("SELECT 1 FROM visitors WHERE visitor_token = ? LIMIT 1");
        $this->bindValue(1, $token);
        $this->execute();
        return $this->rowCount() > 0;
    }
    public function store($data)
    {
        $this->query("
        INSERT INTO visitors (visitor_token, ip_address, user_agent)
        VALUES (?, ?, ?)
    ");
        $this->bindValue(1, $data['visitor_token']);
        $this->bindValue(2, $data['ip_address']);
        $this->bindValue(3, $data['user_agent']);
        $this->execute();
    }
    public function visitors()
    {
        $this->query("SELECT COUNT(*) as total FROM visitors");
        return (int) $this->single()['total'];
    }

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
