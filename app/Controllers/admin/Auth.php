<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\AuthService;
use Malaka\CompanyProfile\Services\SecurityLogService;

class Auth extends Controller
{
    private AuthService $auth;
    private SecurityLogService $securityLog;

    private int $maxAttempts = 5;
    private int $blockDuration = 900; // 15 menit (900 detik)

    public function __construct()
    {
        $this->auth = new AuthService();
        $this->securityLog = new SecurityLogService();
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

        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['login_blocked_until'] = null;
        }

        if (
            $_SESSION['login_blocked_until'] !== null &&
            time() < $_SESSION['login_blocked_until']
        ) {
            $remaining = $_SESSION['login_blocked_until'] - time();

            $data['error'] = "Terlalu banyak percobaan login. Coba lagi dalam {$remaining} detik.";
            $data['judul'] = 'Login Admin';
            $this->view('admin/auth/login', $data);
            return;
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

                $this->securityLog->log($username, 'login_attempt', 'success');

                $_SESSION['admin'] = $admin;
                $_SESSION['login_attempts'] = 0;
                $_SESSION['login_blocked_until'] = null;

                session_regenerate_id(true);

                header('Location: ' . BASE_URL . 'admin/dashboard');
                exit;
            }

            $_SESSION['login_attempts']++;

            $this->securityLog->log($username, 'login_attempt', 'failed');

            if ($_SESSION['login_attempts'] >= $this->maxAttempts) {

                $_SESSION['login_blocked_until'] = time() + $this->blockDuration;

                $this->securityLog->log($username, 'login_attempt', 'blocked');

                $data['error'] = "Akun diblokir sementara 15 menit karena terlalu banyak percobaan login.";
            } else {

                $remaining = $this->maxAttempts - $_SESSION['login_attempts'];

                $data['error'] = "Username atau password salah. Sisa percobaan: {$remaining}";
            }
        }

        $data['judul'] = 'Login Admin';
        $this->view('admin/auth/login', $data ?? []);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['admin'])) {
            $this->securityLog->log($_SESSION['admin']['username'] ?? 'unknown', 'logout', 'success');
        }

        session_destroy();

        header('Location: ' . BASE_URL . 'admin/auth');
        exit;
    }
}