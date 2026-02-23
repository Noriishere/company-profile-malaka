<?php

namespace Malaka\CompanyProfile\Services;

use Malaka\CompanyProfile\Models\AdminModel;

class AuthService
{
    private AdminModel $admin;

    public function __construct()
    {
        $this->admin = new AdminModel();
    }

    public function attempt(string $username, string $password): ?array
    {
        $admin = $this->admin->getAdminByUsername($username);

        if (!$admin) {
            return null;
        }

        if (!password_verify($password, $admin['password'])) {
            return null;
        }

        return [
            'id' => $admin['id'],
            'username' => $admin['username'],
            'email' => $admin['email'],
            'role' => $admin['role']
        ];
    }
}