<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Models\VisitedModel;

class Dashboard extends Controller {

    public function __construct() {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . 'admin/auth');
            exit;
        }
    }

    public function index(){

        $visitorModel = new VisitedModel();

        $data['Judul'] = "Malaka | Admin Dashboard";
        $data['totalVisitors'] = $visitorModel->visitors();
        $data['todayVisitors'] = $visitorModel->todayVisitors();
        $data['weeklyData'] = $visitorModel->last7Days();

        $this->view('admin/utility/header', $data);
        $this->view('admin/dashboard/index', $data);
        $this->view('admin/utility/footer', $data);
    }
}