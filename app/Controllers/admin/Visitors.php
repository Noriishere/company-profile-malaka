<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Models\VisitedModel;

class Visitors extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . 'admin/auth');
            exit;
        }
    }

    public function index()
    {
        $visitorModel = new VisitedModel();

        $search = $_GET['search'] ?? null;
        $start  = $_GET['start'] ?? null;
        $end    = $_GET['end'] ?? null;
        $sort   = $_GET['sort'] ?? 'DESC';
        $page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $limit = 10;
        $offset = ($page - 1) * $limit;

        $data['Judul'] = "Malaka | Admin Dashboard";
        $data['totalVisitors'] = $visitorModel->visitors();
        $data['todayVisitors'] = $visitorModel->todayVisitors();
        $data['weeklyData'] = $visitorModel->last7Days();

        $data['visitors'] = $visitorModel->getVisitors(
            $search,
            $start,
            $end,
            $sort,
            $limit,
            $offset
        );

        $totalData = $visitorModel->countVisitors($search, $start, $end);

        $data['totalPages'] = ceil($totalData / $limit);
        $data['currentPage'] = $page;
        $data['search'] = $search;
        $data['start'] = $start;
        $data['end'] = $end;
        $data['sort'] = $sort;

        $this->view('admin/utility/header', $data);
        $this->view('admin/visitors/index', $data);
        $this->view('admin/utility/footer', $data);
    }
}