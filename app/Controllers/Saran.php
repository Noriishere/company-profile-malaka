<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Saran extends Controller{
    public function index(){
        $data['Judul'] = "Malaka | Kritik & Saran";
        $this->view('utility/header', $data);
        $this->view('app/saran/index', $data);
        $this->view('utility/footer', $data);
    }
}