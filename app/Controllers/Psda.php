<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Psda extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Divisi P Sumber Daya Anggota";
        $this->view('utility/header', $data);
        $this->view('divisi/psda/index', $data);
        $this->view('utility/footer', $data);
    }
}