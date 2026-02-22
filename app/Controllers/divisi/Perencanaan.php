<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Perencanaan extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();

        $data['visitors'] = $totalVisitors;
        $data['json'] = "perencanaan";
        $data['division'] = "Perencanaan";
        $data['definition'] = "Bertanggung jawab dalam merancang strategi, mengelola sumber daya, serta memastikan kelancaran operasional organisasi.";
        $data['Judul'] = "Malaka | Divisi Perencanaan";
        $this->view('utility/header', $data);
        $this->view('divisi/perencanaan/index', $data);
        $this->view('utility/footer', $data);
    }
}