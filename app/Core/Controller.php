<?php

namespace Malaka\CompanyProfile\Core;

class Controller
{
    public function view($view, $data = [])
    {
        // Ekstrak data agar bisa dipakai langsung di view
        extract($data);

        // Buat path lengkap view-nya
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        // Cek dulu file-nya ada gak
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View file not found: " . $viewPath);
        }
    }

    public function model($model)
    {
        $modelPath = __DIR__ . '/../Models/' . $model . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            $modelClass = "FpSmt3\\WebTracker\\Models\\$model";
            return new $modelClass;
        } else {
            die("Model file not found: " . $modelPath);
        }
    }
    protected function requireRole(array $roles)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['admin'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }

        if (!in_array($_SESSION['admin']['role'], $roles)) {
            http_response_code(403);
            $this->view('app/forbidden');
            exit;
        }
    }
}
