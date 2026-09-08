<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Models\MaintenanceModel;

class Maintenance extends Controller
{
    private MaintenanceModel $maintenance;
    public function __construct()
    {
        $this->requireRole(['super_admin']);
        $this->maintenance = new MaintenanceModel();
    }

    public function index()
    {
        $data['Judul'] = "Manage Maintenance Mode";
        $data['status'] = $this->maintenance->getStatus();
        $this->view('admin/utility/header', $data);
        $this->view('admin/maintenance/index', $data);
        $this->view('admin/utility/footer');
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $isActive = isset($_POST['is_active']) ? (int)$_POST['is_active'] : 0;
            $until = !empty($_POST['until']) ? $_POST['until'] : null;

            $this->maintenance->updateStatus($isActive, $until);

            header('Location: /admin/maintenance');
            exit;
        }
    }   
}
