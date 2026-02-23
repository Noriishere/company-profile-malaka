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
            INSERT INTO {$this->tb} (nama_lengkap, username, email, password, role)
            VALUES ( :username, :email, :password, :role)
        ");

        $this->bindValue('username',   $data['username']);
        $this->bindValue('email',      $data['email']);
        $this->bindValue('password',   password_hash($data['password'], PASSWORD_DEFAULT));
        $this->bindValue('role',       $data['role']);

        return $this->execute();
    }
    public function getAllAdmins()
    {
        $this->query("SELECT id, username, email, role FROM {$this->tb} ORDER BY id DESC");
        return $this->resultSet();
    }

    public function getAdminById($id)
    {
        $this->query("SELECT * FROM {$this->tb} WHERE id = :id");
        $this->bindValue('id', $id);
        return $this->single();
    }

    public function updateAdmin($id, array $data): bool
    {
        $this->query("
        UPDATE {$this->tb} 
        SET username = :username,
            email = :email,
            role = :role
        WHERE id = :id
    ");

        $this->bindValue('id', $id);
        $this->bindValue('username', $data['username']);
        $this->bindValue('email', $data['email']);
        $this->bindValue('role', $data['role']);

        return $this->execute();
    }

    public function deleteAdmin($id): bool
    {
        $this->query("DELETE FROM {$this->tb} WHERE id = :id");
        $this->bindValue('id', $id);
        return $this->execute();
    }
    public function updateProfile($id, array $data): bool
    {
        if (!empty($data['password'])) {
            $this->query("
            UPDATE {$this->tb}
            SET nama_lengkap = :nama_lengkap,
                email = :email,
                password = :password
            WHERE id = :id
        ");

            $this->bindValue('password', password_hash($data['password'], PASSWORD_DEFAULT));
        } else {
            $this->query("
            UPDATE {$this->tb}
            SET nama_lengkap = :nama_lengkap,
                email = :email
            WHERE id = :id
        ");
        }

        $this->bindValue('id', $id);
        $this->bindValue('nama_lengkap', $data['nama_lengkap']);
        $this->bindValue('email', $data['email']);

        return $this->execute();
    }
    public function updateAdminFull($id, array $data): bool
    {
        if (!empty($data['password'])) {

            $this->query("
            UPDATE {$this->tb}
            SET nama_lengkap = :nama_lengkap,
                username = :username,
                email = :email,
                role = :role,
                password = :password
            WHERE id = :id
        ");

            $this->bindValue('password', password_hash($data['password'], PASSWORD_DEFAULT));
        } else {

            $this->query("
            UPDATE {$this->tb}
            SET nama_lengkap = :nama_lengkap,
                username = :username,
                email = :email,
                role = :role
            WHERE id = :id
        ");
        }

        $this->bindValue('id', $id);
        $this->bindValue('nama_lengkap', $data['nama_lengkap']);
        $this->bindValue('username', $data['username']);
        $this->bindValue('email', $data['email']);
        $this->bindValue('role', $data['role']);

        return $this->execute();
    }
}
