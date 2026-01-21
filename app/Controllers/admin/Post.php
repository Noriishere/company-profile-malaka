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
        $data['Judul'] = 'Malaka | Post Berita';
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

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $userId = $_SESSION['admin']['id'] ?? null;
            if (!$userId) {
                throw new \Exception('Unauthorized');
            }

            $title = trim($_POST['title'] ?? '');
            $content1 = $_POST['paragraph1'] ?? '';
            $content2 = $_POST['paragraph2'] ?? null;

            if ($title === '' || $content1 === '') {
                throw new \Exception('Judul dan isi berita wajib diisi');
            }

            $allowedTags =
                '<p><br><strong><em><u>' .
                '<ul><ol><li>' .
                '<h1><h2><h3>' .
                '<blockquote><code><pre>' .
                '<a><img>';

            $cleanContent1 = strip_tags($content1, $allowedTags);
            $cleanContent2 = $content2
                ? strip_tags($content2, $allowedTags)
                : null;

            $uploadDir = __DIR__ . '/../../../public/posts/uploads/';

            if (!isset($_FILES['image1'])) {
                throw new \Exception('Gambar utama wajib diupload');
            }

            $image1 = $this->uploadImage($_FILES['image1'], $uploadDir);

            $image2 = null;
            if (!empty($_FILES['image2']['name'])) {
                $image2 = $this->uploadImage($_FILES['image2'], $uploadDir);
            }

            $this->postModel->store([
                'user_id'     => $userId,
                'title'       => $title,
                'image1'      => $image1,
                'paragraph1'  => $cleanContent1,
                'image2'      => $image2,
                'paragraph2'  => $cleanContent2
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
        $data['post'] = $post;

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

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['admin']['id'])) {
                throw new \Exception('Unauthorized');
            }

            $post = $this->postModel->findById($id);
            if (!$post) {
                throw new \Exception('Post tidak ditemukan');
            }

            $title = trim($_POST['title'] ?? '');
            $content1 = $_POST['paragraph1'] ?? '';
            $content2 = $_POST['paragraph2'] ?? null;

            if ($title === '' || $content1 === '') {
                throw new \Exception('Judul dan isi wajib diisi');
            }

            $allowedTags =
                '<p><br><strong><em><u>' .
                '<ul><ol><li>' .
                '<h1><h2><h3>' .
                '<blockquote><code><pre>' .
                '<a><img>';

            $clean1 = strip_tags($content1, $allowedTags);
            $clean2 = $content2 ? strip_tags($content2, $allowedTags) : null;

            $uploadDir = __DIR__ . '/../../../public/posts/uploads/';

            // image lama
            $image1 = $post['image1'];
            $image2 = $post['image2'];

            // kalau upload baru → replace
            if (!empty($_FILES['image1']['name'])) {
                $image1 = $this->uploadImage($_FILES['image1'], $uploadDir);
                if ($post['image1'] && file_exists($uploadDir . $post['image1'])) {
                    unlink($uploadDir . $post['image1']);
                }
            }

            if (!empty($_FILES['image2']['name'])) {
                $image2 = $this->uploadImage($_FILES['image2'], $uploadDir);
                if ($post['image2'] && file_exists($uploadDir . $post['image2'])) {
                    unlink($uploadDir . $post['image2']);
                }
            }

            $this->postModel->update($id, [
                'title' => $title,
                'image1' => $image1,
                'paragraph1' => $clean1,
                'image2' => $image2,
                'paragraph2' => $clean2
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

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['admin']['id'])) {
            throw new \Exception('Unauthorized');
        }

        $post = $this->postModel->findById($id);
        if (!$post) {
            throw new \Exception('Post tidak ditemukan');
        }

        $uploadDir = __DIR__ . '/../../../public/posts/uploads/';

        // hapus image utama
        if (!empty($post['image1']) && file_exists($uploadDir . $post['image1'])) {
            unlink($uploadDir . $post['image1']);
        }

        // hapus image kedua
        if (!empty($post['image2']) && file_exists($uploadDir . $post['image2'])) {
            unlink($uploadDir . $post['image2']);
        }

        // hapus dari DB
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
