<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Disiplin extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Divisi Disiplin";
        $this->view('utility/header', $data);
        $this->view('divisi/disiplin/index', $data);
        $this->view('utility/footer', $data);
    }
}