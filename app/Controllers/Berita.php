<?php

namespace Malaka\CompanyProfile\Controllers;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Models\PostModel;
use Malaka\CompanyProfile\Services\VisitorServices;

class Berita extends Controller
{
    public function index()
    {
        $visitorService = new VisitorServices();
        $totalVisitors  = $visitorService->handle();
        $data['watermark'] = "Ronekimedia.com";
        $data['visitors'] = $totalVisitors;
        $data['Judul'] = "Malaka | Berita";
        $this->view('utility/header', $data);
        $this->view('berita/index', $data);
        $this->view('utility/footer', $data);
    }
    public function detail($id = null)
    {
        if (!$id) {
            header('Location: /berita');
            exit;
        }

        $postModel = new PostModel();
        $post = $postModel->findById((int)$id);

        if (!$post) {
            header('Location: /berita');
            exit;
        }

        $data = [
            'Judul' => $post['title'] . ' | MALAKA',
            'post'  => $post
        ];

        $this->view('utility/header', $data);
        $this->view('berita/detail', $data);
        $this->view('utility/footer');
    }
}
