<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Penjamu extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Divisi Penjaminan Mutu";
        $this->view('utility/header', $data);
        $this->view('divisi/penjamu/index', $data);
        $this->view('utility/footer', $data);
    }
}