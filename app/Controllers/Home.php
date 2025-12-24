<?php
namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller as CoreController;

class Home extends CoreController {
    public function index(){
        $this->view('utility/header');
        $this->view('app/index');
        $this->view('utility/footer');
    }
}