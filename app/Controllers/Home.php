<?php
namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;

class Home extends Controller {
    public function index(){
        
        $data['Judul'] = "Malaka | Mahasiswa Melawan Narkotika";
        $this->view('utility/header', $data);
        $this->view('app/index', $data);
        $this->view('utility/footer', $data);
    }
}