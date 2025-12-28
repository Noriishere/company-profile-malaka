<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Pencegahan extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Divisi Pencegahan";
        $this->view('utility/header', $data);
        $this->view('divisi/jarkom/index', $data);
        $this->view('utility/footer', $data);
    }
}