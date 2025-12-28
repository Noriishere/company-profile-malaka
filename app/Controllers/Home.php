<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Home extends Controller
{
    public function index()
    {
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();

        $data['visitors'] = $totalVisitors;
        $data['Judul'] = "Malaka | Mahasiswa Melawan Narkotika";
        $this->view('utility/header', $data);
        $this->view('app/index', $data);
        $this->view('utility/footer', $data);
    }
}
