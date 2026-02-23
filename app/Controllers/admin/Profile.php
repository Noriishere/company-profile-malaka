<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Models\AdminModel;

class Profile extends Controller
{
    private AdminModel $admin;

    public function __construct()
    {
        $this->requireRole(['admin', 'super_admin']);
        $this->admin = new AdminModel();
    }

    public function index()
    {
        $userId = $_SESSION['admin']['id'];
        $data['judul'] = "Profile";
        $data['user'] = $this->admin->getAdminById($userId);

        $this->view('admin/utility/header', $data);
        $this->view('admin/profile/index', $data);
        $this->view('admin/utility/footer');
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_SESSION['admin']['id'];

            $updateData = [
                'nama_lengkap' => trim($_POST['nama_lengkap']),
                'email'        => trim($_POST['email']),
                'password'     => $_POST['password'] ?? ''
            ];

            $this->admin->updateProfile($id, $updateData);

            header('Location: ' . BASE_URL . 'admin/profile');
            exit;
        }
    }
}