<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\AuthService;

class Auth extends Controller
{
    private AuthService $auth;

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . 'admin/dashboard');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            $admin = $this->auth->attempt($username, $password);

            if ($admin) {
                $_SESSION['admin'] = $admin;
                header('Location: ' . BASE_URL . 'admin/dashboard');
                exit;
            }

            $data['error'] = 'Username atau password salah';
        }

        $data['judul'] = 'Login Admin';
        $this->view('admin/auth/login', $data ?? []);
    }
}
