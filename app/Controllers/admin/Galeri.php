<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;

class Galeri extends Controller{
    public function __construct()
    {
        if(!isset($_SESSION['admin'])){
            header('Location: ' . BASE_URL . 'admin/auth');
            exit;
        }
    }
    
}