<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;

class Dashboard extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Admin Dashboard";
        $this->view('admin/utility/header', $data);
        $this->view('admin/dashboard/index', $data);
        $this->view('admin/utility/footer', $data);
    }
}