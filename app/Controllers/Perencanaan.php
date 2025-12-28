<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Perencanaan extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Divisi Perencanaan";
        $this->view('utility/header', $data);
        $this->view('divisi/perencanaan/index', $data);
        $this->view('utility/footer', $data);
    }
}