<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Penjamu extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();

        $data['visitors'] = $totalVisitors;
        $data['json'] = "penjamu";
        $data['division'] = "Penjaminan Mutu";
        $data['definition'] = "Bertanggung jawab dalam memastikan kualitas, standar operasional, serta peningkatan berkelanjutan dalam organisasi.";
        $data['Judul'] = "Malaka | Divisi Penjaminan Mutu";
        $this->view('utility/header', $data);
        $this->view('divisi/penjamu/index', $data);
        $this->view('utility/footer', $data);
    }
}