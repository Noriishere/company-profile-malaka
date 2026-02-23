<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Bph extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();
        $data['watermark'] = "Ronekimedia.com";
        $data['visitors'] = $totalVisitors;
        $data['json'] = "bph";
        $data['division'] = "Badan Pengurus Harian";
        $data['definition'] = "Bertanggung jawab dalam pengelolaan kegiatan harian organisasi, serta memastikan pelaksanaan tugas-tugas yang ditetapkan oleh Dewan Pengurus.";
        $data['Judul'] = "Malaka | Divisi Badan Pengurus Harian";
        $this->view('utility/header', $data);
        $this->view('divisi/bph/index', $data);
        $this->view('utility/footer', $data);
    }
}