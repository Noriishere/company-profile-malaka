<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Services\PostService;
use Malaka\CompanyProfile\Models\PostModel;
use Malaka\CompanyProfile\Helpers\ImageUploader;

class Post extends Controller
{
    use ImageUploader;

    private PostModel $postModel;

    public function __construct()
    {
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . 'admin/auth');
            exit;
        }

        $this->postModel = new PostModel();
    }

    public function index()
    {
        if (isset($_GET['ajax'])) {
            (new PostService())->index();
            exit;
        }

        $data['Judul'] = 'Malaka | Post Berita';
        $this->view('admin/utility/header', $data);
        $this->view('admin/post/index', $data);
        $this->view('admin/utility/footer', $data);
    }

    public function create()
    {
        $data['Judul'] = 'Tambah Berita';
        $this->view('admin/utility/header', $data);
        $this->view('admin/post/post', $data);
        $this->view('admin/utility/footer', $data);
    }

    public function store()
    {
        header('Content-Type: application/json');

        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new \Exception('Invalid request');
            }

            $userId = $_SESSION['admin']['id'] ?? null;
            if (!$userId) {
                throw new \Exception('Unauthorized');
            }

            $title     = trim($_POST['title'] ?? '');
            $category  = trim($_POST['category'] ?? '');
            $paragraph = $_POST['paragraph'] ?? '';

            if ($title === '' || $category === '' || $paragraph === '') {
                throw new \Exception('Judul, kategori, dan isi berita wajib diisi');
            }

            $allowedTags =
                '<p><br><strong><em><u>' .
                '<ul><ol><li>' .
                '<h1><h2><h3>' .
                '<blockquote><code><pre>' .
                '<a><img>';

            $cleanParagraph = strip_tags($paragraph, $allowedTags);

            if (!isset($_FILES['thumbnail'])) {
                throw new \Exception('Thumbnail wajib diupload');
            }

            $uploadDir = __DIR__ . '/../../../public/posts/uploads/';
            $thumbnail = $this->uploadImage($_FILES['thumbnail'], $uploadDir);

            $this->postModel->store([
                'user_id'   => $userId,
                'title'     => $title,
                'thumbnail' => $thumbnail,
                'category'  => $category,
                'paragraph' => $cleanParagraph
            ]);

            echo json_encode([
                'success' => true,
                'message' => 'Berita berhasil dipublish'
            ]);
            exit;

        } catch (\Throwable $e) {
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            exit;
        }
    }

    public function edit(int $id)
    {
        $post = $this->postModel->findById($id);

        if (!$post) {
            die('Post tidak ditemukan');
        }
        
        $data['Judul'] = 'Edit Berita';
        $data['post']  = $post;
        
        $this->view('admin/utility/header', $data);
        $this->view('admin/post/edit', $data);
        $this->view('admin/utility/footer', $data);
    }

    public function update(int $id)
    {
        header('Content-Type: application/json');

        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new \Exception('Invalid request');
            }

            if (!isset($_SESSION['admin']['id'])) {
                throw new \Exception('Unauthorized');
            }

            $post = $this->postModel->findById($id);
            if (!$post) {
                throw new \Exception('Post tidak ditemukan');
            }

            $title     = trim($_POST['title'] ?? '');
            $category  = trim($_POST['category'] ?? '');
            $paragraph = $_POST['paragraph'] ?? '';

            if ($title === '' || $category === '' || $paragraph === '') {
                throw new \Exception('Judul, kategori, dan isi wajib diisi');
            }

            $allowedTags =
                '<p><br><strong><em><u>' .
                '<ul><ol><li>' .
                '<h1><h2><h3>' .
                '<blockquote><code><pre>' .
                '<a><img>';

            $cleanParagraph = strip_tags($paragraph, $allowedTags);

            $uploadDir = __DIR__ . '/../../../public/posts/uploads/';
            $thumbnail = $post['thumbnail'];

            if (!empty($_FILES['thumbnail']['name'])) {
                $thumbnail = $this->uploadImage($_FILES['thumbnail'], $uploadDir);

                if ($post['thumbnail'] && file_exists($uploadDir . $post['thumbnail'])) {
                    unlink($uploadDir . $post['thumbnail']);
                }
            }

            $this->postModel->update($id, [
                'title'     => $title,
                'thumbnail' => $thumbnail,
                'category'  => $category,
                'paragraph' => $cleanParagraph
            ]);

            echo json_encode([
                'success' => true,
                'message' => 'Berita berhasil diperbarui'
            ]);
            exit;

        } catch (\Throwable $e) {
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            exit;
        }
    }

    public function delete(int $id)
    {
        header('Content-Type: application/json');

        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new \Exception('Invalid request');
            }

            if (!isset($_SESSION['admin']['id'])) {
                throw new \Exception('Unauthorized');
            }

            $post = $this->postModel->findById($id);
            if (!$post) {
                throw new \Exception('Post tidak ditemukan');
            }

            $uploadDir = __DIR__ . '/../../../public/posts/uploads/';

            if (!empty($post['thumbnail']) && file_exists($uploadDir . $post['thumbnail'])) {
                unlink($uploadDir . $post['thumbnail']);
            }

            $this->postModel->delete($id);

            echo json_encode([
                'success' => true,
                'message' => 'Berita berhasil dihapus'
            ]);
            exit;

        } catch (\Throwable $e) {
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
            exit;
        }
    }
}
