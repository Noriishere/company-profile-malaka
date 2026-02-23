<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Psda extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();
        $data['watermark'] = "Ronekimedia.com";
        $data['visitors'] = $totalVisitors;
        $data['json'] = "psda";
        $data['division'] = "Pengembangan Sumber Daya Anggota";
        $data['definition'] = "Bertanggung jawab dalam mengelola sumber daya anggota, termasuk pengembangan, kesejahteraan, serta pemberdayaan anggota organisasi.";
        $data['Judul'] = "Malaka | Divisi Pengembangan Sumber Daya Anggota";
        $this->view('utility/header', $data);
        $this->view('divisi/psda/index', $data);
        $this->view('utility/footer', $data);
    }
}