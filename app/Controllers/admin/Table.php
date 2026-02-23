<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Models\AdminModel;

class Table extends Controller
{
    private AdminModel $admin;

    public function __construct()
    {
        $this->requireRole(['super_admin']);
        $this->admin = new AdminModel();
    }

    public function index()
    {
        $data['Judul'] = "Manage Admin";
        $data['admins'] = $this->admin->getAllAdmins();

        $this->view('admin/utility/header', $data);
        $this->view('admin/table/index', $data);
        $this->view('admin/utility/footer');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'nama_lengkap' => trim($_POST['nama_lengkap']),
                'username'     => trim($_POST['username']),
                'email'        => trim($_POST['email']),
                'password'     => $_POST['password'],
                'role'         => $_POST['role']
            ];

            if (
                empty($data['nama_lengkap']) ||
                empty($data['username']) ||
                empty($data['email']) ||
                empty($data['password'])
            ) {
                $data['error'] = "Semua field wajib diisi.";
            } else {

                $this->admin->createAdmin($data);

                header('Location: ' . BASE_URL . 'admin/table');
                exit;
            }
        }

        $data['Judul'] = "Tambah Admin";
        $data['error'] = $data['error'] ?? null;

        $this->view('admin/utility/header', $data);
        $this->view('admin/table/create', $data);
        $this->view('admin/utility/footer');
    }

    public function delete($id)
    {
        $target = $this->admin->getAdminById($id);

        if ($target['role'] === 'super_admin') {
            die('Tidak bisa menghapus Super Admin');
        }

        $this->admin->deleteAdmin($id);

        header('Location: ' . BASE_URL . 'admin/table');
        exit;
    }
    public function edit($id)
    {
        $adminData = $this->admin->getAdminById($id);

        if (!$adminData) {
            http_response_code(404);
            die('Admin tidak ditemukan');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $updateData = [
                'nama_lengkap' => trim($_POST['nama_lengkap']),
                'username'     => trim($_POST['username']),
                'email'        => trim($_POST['email']),
                'password'     => $_POST['password'] ?? '',
                'role'         => $_POST['role']
            ];

            $this->admin->updateAdminFull($id, $updateData);

            header('Location: ' . BASE_URL . 'admin/table');
            exit;
        }

        $data['Judul'] = "Edit Admin";
        $data['admin'] = $adminData;

        $this->view('admin/utility/header', $data);
        $this->view('admin/table/edit', $data);
        $this->view('admin/utility/footer');
    }
}
