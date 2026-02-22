<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Disiplin extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();

        $data['visitors'] = $totalVisitors;
        $data['json'] = "disiplin";
        $data['division'] = "Disiplin";
        $data['definition'] = "Bertanggung jawab dalam menegakkan aturan, menjaga kedisiplinan, serta memastikan tata tertib dalam organisasi.";
        $data['Judul'] = "Malaka | Divisi Disiplin";
        $this->view('utility/header', $data);
        $this->view('divisi/disiplin/index', $data);
        $this->view('utility/footer', $data);
    }
}