<?php

namespace Malaka\CompanyProfile\Controllers\divisi;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\VisitorServices;

class Pencegahan extends Controller{
    public function index(){
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();

        $data['visitors'] = $totalVisitors;
        $data['json'] = "pencegahan";
        $data['division'] = "Pencegahan";
        $data['definition'] = "Bertanggung jawab dalam merancang dan melaksanakan strategi untuk mencegah risiko, menjaga keamanan, serta memastikan keberlanjutan organisasi.";    
        $data['Judul'] = "Malaka | Divisi Pencegahan";
        $this->view('utility/header', $data);
        $this->view('divisi/pencegahan/index', $data);
        $this->view('utility/footer', $data);
    }
}