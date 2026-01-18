<?php

namespace Malaka\CompanyProfile\Services;

use Malaka\CompanyProfile\Models\PostModel;

class PostService
{
    private PostModel $post;

    public function __construct()
    {
        $this->post = new PostModel();
    }

    public function index(): void
    {
        header('Content-Type: application/json');

        $page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
        $perPage = isset($_GET['per_page'])
            ? min(50, max(1, (int) $_GET['per_page']))
            : 10;

        echo json_encode(
            $this->post->paginate($page, $perPage),
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
    
}
