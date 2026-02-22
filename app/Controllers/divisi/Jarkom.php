<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Jarkom extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();

        $data['visitors'] = $totalVisitors;
        $data['json'] = "jarkom";
        $data['division'] = "Jaringan & Komunikasi";
        $data['definition'] = "Bertanggung jawab dalam mengelola informasi, publikasi media sosial, serta menjalin hubungan komunikasi eksternal.";
        $data['Judul'] = "Malaka | Divisi Jarkom";
        $this->view('utility/header', $data);
        $this->view('divisi/jarkom/index', $data);
        $this->view('utility/footer', $data);
    }
}