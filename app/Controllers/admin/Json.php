<?php

namespace Malaka\CompanyProfile\Controllers\Admin;

use Malaka\CompanyProfile\Core\Controller;
use Malaka\CompanyProfile\Helpers\ImageUploader;

class Json extends Controller
{
    use ImageUploader;
    private string $storagePath;

    public function __construct()
    {
        $this->requireRole(['super_admin']);
        $this->storagePath = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    }

    private function getFilePath(string $filename): string
    {
        $filename = basename($filename);
        return $this->storagePath . '/' . $filename;
    }

    private function readJson(string $filename): array
    {
        $path = $this->getFilePath($filename);

        if (!file_exists($path)) {
            return [];
        }

        if (pathinfo($path, PATHINFO_EXTENSION) !== 'json') {
            return [];
        }

        $data = json_decode(file_get_contents($path), true);

        return is_array($data) ? $data : [];
    }

    private function writeJson(string $filename, array $data): void
    {
        $path = $this->getFilePath($filename);

        file_put_contents(
            $path,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        );
    }

    public function index()
    {
        $files = glob($this->storagePath . '/*.json');

        $data['Judul'] = "JSON Storage";
        $data['files'] = array_map('basename', $files);

        $this->view('admin/utility/header', $data);
        $this->view('admin/json/files', $data);
        $this->view('admin/utility/footer');
    }

    public function viewJson($filename)
    {
        $filename = basename($filename);
        $path = $this->getFilePath($filename);

        if (!file_exists($path) || pathinfo($path, PATHINFO_EXTENSION) !== 'json') {
            http_response_code(404);
            die('File tidak ditemukan');
        }

        $jsonData = $this->readJson($filename);

        $data = [
            'Judul' => 'Manage JSON - ' . $filename,
            'filename' => $filename,
            'members' => $jsonData,
            'total' => count($jsonData)
        ];

        $this->view('admin/utility/header', $data);
        $this->view('admin/json/index', $data);
        $this->view('admin/utility/footer');
    }

    public function create($filename)
    {
        $filename = basename($filename);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $json = $this->readJson($filename);

            $json[] = [
                'nama'      => trim($_POST['nama']),
                'jabatan'   => trim($_POST['jabatan']),
                'foto'      => trim($_POST['foto']),
                'ultah'     => trim($_POST['ultah']),
                'instagram' => trim($_POST['instagram'])
            ];

            $this->writeJson($filename, $json);

            header('Location: ' . BASE_URL . 'admin/json/viewJson/' . $filename);
            exit;
        }

        $data = [
            'judul' => 'Tambah Data - ' . $filename,
            'filename' => $filename
        ];

        $this->view('admin/utility/header', $data);
        $this->view('admin/json/create', $data);
        $this->view('admin/utility/footer');
    }

    public function edit($filename, $index)
    {
        $json = $this->readJson($filename);

        if (!isset($json[$index])) {
            http_response_code(404);
            die('Data tidak ditemukan');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $json[$index] = [
                'nama'      => trim($_POST['nama']),
                'jabatan'   => trim($_POST['jabatan']),
                'foto'      => trim($_POST['foto']),
                'ultah'     => trim($_POST['ultah']),
                'instagram' => trim($_POST['instagram'])
            ];

            $this->writeJson($filename, $json);

            header('Location: ' . BASE_URL . 'admin/json/viewJson/' . basename($filename));
            exit;
        }

        $data = [
            'Judul' => 'Edit Data - ' . $filename,
            'filename' => $filename,
            'member' => $json[$index],
            'index' => $index
        ];

        $this->view('admin/utility/header', $data);
        $this->view('admin/json/edit', $data);
        $this->view('admin/utility/footer');
    }

    public function delete($filename, $index)
    {
        $json = $this->readJson($filename);

        if (!isset($json[$index])) {
            http_response_code(404);
            die('Data tidak ditemukan');
        }

        unset($json[$index]);
        $json = array_values($json);

        $this->writeJson($filename, $json);

        header('Location: ' . BASE_URL . 'admin/json/viewJson/' . basename($filename));
        exit;
    }
}
